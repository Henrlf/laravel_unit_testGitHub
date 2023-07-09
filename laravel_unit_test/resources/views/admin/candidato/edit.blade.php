@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.candidato.actions.edit', ['name' => $candidato->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <candidato-form
                :action="'{{ $candidato->resource_url }}'"
                :data="{{ $candidato->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.candidato.actions.edit', ['name' => $candidato->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.candidato.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </candidato-form>

        </div>
    
</div>

@endsection