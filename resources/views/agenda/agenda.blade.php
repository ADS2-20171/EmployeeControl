@extends('layouts.principal')



@section('content')
    
<div id='app'>

     <div class="modal" :class="{ visible: newFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="newFormVisible = false" >&times;</span>
            <h4 class="modal-title" id="myModalLabel" >Registro de Trabajadores</h4>
            </br>
            <form id="trabajor" @submit.prevent="RegistrarTrabajador">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="trabajador_nombres" v-model="agenda.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="trabajador_apellidos"  v-model="agenda.apellidos" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="trabajador_dni" v-model="agenda.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" name="trabajador_FechNac" v-model="agenda.fechnac" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Sexo :</label>
                                <input type="text" name="trabajador_sexo" v-model="agenda.sexo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="trabajador_celular" v-model="agenda.celular" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Fecha de Ingreso :</label>
                                <input type="date" name="trabajador_FechInicio" v-model="agenda.fechinicio" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="trabajador_estado" v-model="agenda.estado" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Cargo :</label>
                                <input type="text" name="trabajador_cargo" v-model="agenda.cargo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Condicion :</label>
                                <input type="text" name="trabajador_condicion" v-model="agenda.condicion" class="form-control">
                            </section>
                        </div>
                    </div>
                    </br>
                  <div class="modal-footer">
                    <button class="btn btn-success"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>   Registrar</button>
                  </div>
                </form>
        </div>
    </div>
    


    <header>
        <center>
            <div>
            <section style="padding: 20px">
                <i class="fa fa-calendar fa-5x" aria-hidden="true"></i><h2><b>Agenda</b></h2>
            </section>
            </div>
        </center>
    </header>

    <div id="content">
        <section>
            <div id="form-full">
                <div class="container">
                    <div class="row">
                                <div class="pull-left form-inline">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>
                                
                                </div>
                                <div class="pull-right form-inline" style="width: 200px;height: 100px;"><br>
                                    <button class="btn btn-danger" @click="MostrarModalNuevo">Agregar Evento</button>
                                </div>
                                
                    </div>

                    
                </div>
                
            </div>
        </section>
    </div>

</div>
    <script>

     new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    agendas:[],
                    agenda:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(usuario) {
                this.editFormVisible = true;
                this.usuario = {
                    descripcion: horario.horario_descripcion,
                    inicio: horario.horario_inicio,
                    fin: horario.horario_fin,
                };
            },

            EliminarUsuario:function(usuario){
                axios.delete('/AcademicSystem/public/api/usuario',this.usuario).then(function(data){
                    Push.create('Usuario Eliminado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
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


            ActualizarUsuario:function(usuario){
                axios.update('/AcademicSystem/public/api/usuario',this.usuario).then(function(data){
                    //alert(data.data.mensaje);
                    
                    var clone = {
                        horario_descripcion: this.horario.descripcion,
                        horario_inicio: this.horario.inicio,
                        horario_fin: this.horario.fin,
                    }
                    this.usuarios.push(clone);
                }.bind(this))
            },


            RegistrarUsuario:function(){
                axios.post('/AcademicSystem/public/api/usuario',this.usuario).then(function(data){
                    Push.create('Usuario Registrado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    var clone = {
                        horario_descripcion: this.horario.descripcion,
                        horario_inicio: this.horario.inicio,
                        horario_fin: this.horario.fin,
                    }
                    this.usuarios.push(clone);
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/agenda').then(function(data){
                    this.agendas=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop