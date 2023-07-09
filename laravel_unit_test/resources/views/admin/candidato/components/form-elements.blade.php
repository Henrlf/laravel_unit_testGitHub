<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.candidato.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.candidato.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('apelido'), 'has-success': fields.apelido && fields.apelido.valid }">
    <label for="apelido" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.candidato.columns.apelido') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.apelido" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('apelido'), 'form-control-success': fields.apelido && fields.apelido.valid}" id="apelido" name="apelido" placeholder="{{ trans('admin.candidato.columns.apelido') }}">
        <div v-if="errors.has('apelido')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('apelido') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.candidato.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.candidato.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.candidato.columns.telefone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}" id="telefone" name="telefone" placeholder="{{ trans('admin.candidato.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('aprovado'), 'has-success': fields.aprovado && fields.aprovado.valid }">
    <label for="aprovado" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.candidato.columns.aprovado') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.aprovado" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('aprovado'), 'form-control-success': fields.aprovado && fields.aprovado.valid}" id="aprovado" name="aprovado" placeholder="{{ trans('admin.candidato.columns.aprovado') }}">
        <div v-if="errors.has('aprovado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('aprovado') }}</div>
    </div>
</div>


