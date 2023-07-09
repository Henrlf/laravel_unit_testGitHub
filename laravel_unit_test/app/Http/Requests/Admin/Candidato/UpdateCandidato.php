<?php

namespace App\Http\Requests\Admin\Candidato;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCandidato extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.candidato.edit', $this->candidato);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'apelido' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', 'string'],
            'telefone' => ['sometimes', 'string'],
            'aprovado' => ['sometimes', 'integer'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
