import AppForm from '../app-components/Form/AppForm';

Vue.component('candidato-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                apelido:  '' ,
                email:  '' ,
                telefone:  '' ,
                aprovado:  '' ,
                
            }
        }
    }

});