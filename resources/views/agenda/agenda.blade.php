@extends('layouts.principal')



@section('content')
    
<div id='app'>

     <div class="modal" :class="{ visible: newFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="newFormVisible = false" >&times;</span>
            <h4 class="modal-title" id="myModalLabel" >Registro de Eventos</h4>
            </br>
            <form id="trabajor" @submit.prevent="RegistrarEventos">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Titulo :</label>
                                <input type="text" name="evetnos_titulo" v-model="agenda.titulo" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Alumno :</label>
                                <select name="idrol"  class="form-control" v-model="agenda.idAlumno">
                                    @foreach ($alumno as $alumnos)
                                    <option value="{{$alumnos->idAlumno}}" >{{$alumnos->alumno_nombres}}</option>
                                    @endforeach
                                </select>
                            </section>
                            <section class="col-sm-6">
                                <label>Trabajador :</label>
                                <select name="idrol"  class="form-control" v-model="agenda.idTrabajador">
                                    @foreach ($trabajador as $trabajadores)
                                    <option value="{{$trabajadores->idTrabajador}}" >{{$trabajadores->trabajador_nombres}}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Inicio del Evento :</label>
                                <input type="date" name="eventos_inicio" v-model="agenda.inicio" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fin del Evento :</label>
                                <input type="date" name="eventos_fin" v-model="agenda.fin" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-12">
                                <label>Contenido :</label>
                                <textarea name="eventos_cuerpo" v-model="agenda.cuerpo" class="form-control"></textarea>
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
                                <div class="pull-right form-inline" style="width: 200px;height: 100px;"><br>
                                    <button class="btn btn-danger" @click="MostrarModalNuevo">Agregar Evento</button>
                                </div>
                                
                    </div>

                </div>
                
            </div>
        </section>

                    
                        <div class="card-content table-responsive">
                       
                                    <div id="calendar" ref="calendar"></div>
                                
                            
                        </div>        
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

            RegistrarEventos:function(){
                axios.post('/AcademicSystem/public/api/agenda',this.agenda).then(function(data){
                    Push.create('Usuario Registrado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    

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