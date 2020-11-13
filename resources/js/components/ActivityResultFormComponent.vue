<template>
    <div class="container">

        <button class="btn btn-success" type="button" @click="agregarForm()"> <i class="fas fa-plus-circle"> </i> {{'Agregar Actividad y Respuesta'}}</button>

        <div class="card mb-3 mt-3" v-for="(actividad, index) in actividades">
            <div class="card-body">
                                <span class="float-right" style="cursor:pointer"
                                      @click="eliminarForm(index)">
                                    X
                                </span>

                <h4 class="card-title"> Actividad y Respuesta del Sistema #{{index +1}} <span style="color: #ed1b24">*</span></h4>

                <div class="actividad-form">

                    <div class="form-group mx-sm-3  row">
                        <label :for="'actividad_' + index" class="col-sm-2 col-form-label">Actividad <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <textarea maxlength="500" :id="'actividad_' + index" rows="4" name= "actividades[act][]" v-model="actividad.actividad" class="form-control" placeholder="Actividad"></textarea>
                        </div>
                    </div>

                    <div class="form-group mx-sm-3  row">
                        <label :for="'respuesta_' + index" class="col-sm-2 col-form-label">Respuesta del Sistema <span style="color: #ed1b24">*</span></label>
                        <div class="col-sm-10">
                            <textarea maxlength="500" :id="'respuesta_' + index" rows="4" name= "actividades[resp][]" v-model="actividad.respuesta_sistema" class="form-control" placeholder="Respuesta del Sistema"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ActivityResultFormComponent",
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return{
                actividades: [
                    {
                        activ: '',
                        respuesta: ''
                    }
                ]
            };
        },
        methods: {
            agregarForm(){
                console.log('diste click');
                this.actividades.push({
                    activ: '',
                    respuesta: ''
                });
            },
            eliminarForm(index){
                this.actividades.splice(index,1);
            }
        }
    }
</script>
