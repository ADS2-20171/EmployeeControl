@extends('layouts.principal')



@section('content')
    
<div id='app'>
<div class="modal" :class="{ visible: editFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar de Horario</h4>
            </br>
            <form id="trabajor" @submit.prevent="ActualizarHorario">
                     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Descripcion :</label>
                                <input type="text" name="horario_descripcion" v-model="horario.descripcion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Horario de Inicio :</label>
                                <input type="time" name="horario_inicio"  v-model="horario.inicio" class="form-control">
                            </section>
                             <section class="col-sm-6">
                                <label>Horario Fin :</label>
                                <input type="time" name="horario_fin"  v-model="horario.fin" class="form-control">
                            </section>
                        </div>
                        
                    </div>
                    </br>
                  <div class="modal-footer">
                    <button class="btn btn-danger"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>  Actualizar</button>
                  </div>
                </form>
        </div>
    </div>
 
    <header>
        <div>
            <section style="padding: 20px">
                <h2><b>Horarios</b></h2>
            </section>
        </div>
    </header>

<div role="content">
    <article class="col-sm-12 col-md-12 col-lg-5" id="formulario">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable">
            <thead class="thead-inverse">
                <tr>
                    <th>Descripcion de Horario</th>
                    <th>Horas de Trabajo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="h in horarios">
                    <td>${h.horario_descripcion}</td>
                    <td>${h.horario_inicio}</td>
                    <td>${h.horario_fin}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(h)">Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarTrabajador(h.idHorario)">Elimminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </article>
    <article class="col-sm-12 col-md-12 col-lg-7" id="formulario">
    <div role="content">
             <header role="heading">
               <h2>Registro de Horarios</h2>
             </header>
            </br>
            <form id="horario" name="horario" @submit.prevent="RegistrarHorario">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Descripcion :</label>
                                <input type="text" name="horario_descripcion" v-model="horario.descripcion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Horario de Inicio :</label>
                                <input type="time" name="horario_inicio"  v-model="horario.inicio" class="form-control">
                            </section>
                             <section class="col-sm-6">
                                <label>Horario Fin :</label>
                                <input type="time" name="horario_fin"  v-model="horario.fin" class="form-control">
                            </section>
                        </div>
                        
                    </div>
                    </br>
                  <footer>
                    <button class="btn btn-success"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>   Registrar</button>
                  </footer>
                </form>
    </div>
    </article>


</div>


</div>
    <script>

     new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    horarios:[],
                    horario:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(horario) {
                this.editFormVisible = true;
                this.horario = {
                    descripcion: horario.horario_descripcion,
                    inicio: horario.horario_inicio,
                    fin: horario.horario_fin,
                };
            },

            EliminarHorario:function(horario){
                axios.delete('/AcademicSystem/public/api/horario',this.horario).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        trabajador_nombres: this.trabajador.nombres,
                        trabajador_apellidos: this.trabajador.apellidos,
                        trabajador_sexo: this.trabajador.sexo,
                        trabajador_cargo: this.trabajador.cargo,
                        trabajador_condicion: this.trabajador.condicion

                    }
                    this.horarios.push(clone);
                }.bind(this))
            },


            ActualizarHorario:function(horario){
                axios.update('/AcademicSystem/public/api/horario',this.horario).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        horario_descripcion: this.horario.descripcion,
                        horario_inicio: this.horario.inicio,
                        horario_fin: this.horario.fin,
                    }
                    this.horarios.push(clone);
                }.bind(this))
            },


            RegistrarHorario:function(){
                axios.post('/AcademicSystem/public/api/horario',this.horario).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        horario_descripcion: this.horario.descripcion,
                        horario_inicio: this.horario.inicio,
                        horario_fin: this.horario.fin,
                    }
                    this.horarios.push(clone);
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/horario').then(function(data){
                    this.horarios=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop