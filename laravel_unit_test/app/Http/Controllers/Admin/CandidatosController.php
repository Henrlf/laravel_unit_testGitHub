<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Candidato\BulkDestroyCandidato;
use App\Http\Requests\Admin\Candidato\DestroyCandidato;
use App\Http\Requests\Admin\Candidato\IndexCandidato;
use App\Http\Requests\Admin\Candidato\StoreCandidato;
use App\Http\Requests\Admin\Candidato\UpdateCandidato;
use App\Models\Candidato;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CandidatosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCandidato $request
     * @return array|Factory|View
     */
    public function index(IndexCandidato $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Candidato::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'email', 'telefone', 'aprovado'],

            // set columns to searchIn
            ['id', 'nome', 'email', 'telefone']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.candidato.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.candidato.create');

        return view('admin.candidato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCandidato $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCandidato $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Candidato
        $candidato = Candidato::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/candidatos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/candidatos');
    }

    /**
     * Display the specified resource.
     *
     * @param Candidato $candidato
     * @throws AuthorizationException
     * @return void
     */
    public function show(Candidato $candidato)
    {
        $this->authorize('admin.candidato.show', $candidato);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Candidato $candidato
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Candidato $candidato)
    {
        $this->authorize('admin.candidato.edit', $candidato);


        return view('admin.candidato.edit', [
            'candidato' => $candidato,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCandidato $request
     * @param Candidato $candidato
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCandidato $request, Candidato $candidato)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Candidato
        $candidato->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/candidatos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/candidatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCandidato $request
     * @param Candidato $candidato
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCandidato $request, Candidato $candidato)
    {
        $candidato->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCandidato $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCandidato $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Candidato::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
