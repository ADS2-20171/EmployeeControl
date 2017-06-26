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
                                <input type="text" name="horario_descripcion" v-model="hora.descripcion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Horario de Inicio :</label>
                                <input type="time" name="horario_inicio"  v-model="hora.inicio" class="form-control">
                            </section>
                             <section class="col-sm-6">
                                <label>Horario Fin :</label>
                                <input type="time" name="horario_fin"  v-model="hora.fin" class="form-control">
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
                    <td>${getDifference(h.horario_inicio, h.horario_fin)}</td>
                    <td></td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(h)">Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarHorario(h.idHorario)">Elimminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        {!! $ho->render() !!}
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
                    hora:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(hora) {
                this.editFormVisible = true;
                this.hora = {
                    id:hora.idHorario,
                    descripcion: hora.horario_descripcion,
                    inicio: hora.horario_inicio,
                    fin: hora.horario_fin,
                };
            },



           getDifference:function(_start, _end) {
                  const start = moment.utc(_start, 'HH:mm:ss');
                  const end = moment.utc(_end, 'HH:mm:ss');
                  const diffHours = end.diff(start, 'hours');
                  end.subtract(diffHours, 'hours');
                  const diffMinutes = end.diff(start, 'minutes');
                  end.subtract(diffMinutes, 'minutes');
                  const diffSeconds = end.diff(start, 'seconds');

                  const difference = moment(`${diffHours}:${diffMinutes}:${diffSeconds}`, 'HH:mm:ss');
                  return difference.format('HH:mm:ss');
                },

            EliminarHorario:function(id){
                axios.delete('/AcademicSystem/public/api/horario/' + id).then(function(data){
                    Push.create('Horario Eliminado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    // copia de los Usuarios
                    var copy = this.horarios.slice(0);
                    // filtras para obtener los Usuarios
                    // que tengan un id diferente
                    copy = copy.filter(function(hora) {
                        return hora.idHorario !== id;
                    });
                    this.horarios = copy;
                }.bind(this))
            },


            ActualizarHorario:function(){
                axios.put('/AcademicSystem/public/api/horario',this.hora).then(function(data){
                    var copy = this.horarios.slice(0);
                    copy.forEach(function(hr) {
                        if (hr.idHorario === this.hora.id) {
                            hr = data.data.mensaje;
                        }
                    }.bind(this));
                    Push.create('Horario Actualizado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    this.horarios.push(data.data);
                }.bind(this))
            },


            RegistrarHorario:function(){
                axios.post('/AcademicSystem/public/api/horario',this.horario).then(function(data){
                    Push.create('Horario Registrado!',{
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