@extends('layouts.principal')



@section('content')
    
<div id='app'>
<div class="modal" :class="{ visible: editFormVisible }" style="overflow-y: auto;">
        <div class="modal-content" style="width: auto;" >
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar Usuario</h4>
            </br>
            <form id="trabajor" @submit.prevent="ActualizarUsuario">
                     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombre :</label>
                                <input type="text" name="name" v-model="users.name" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>E-mail :</label>
                                <input type="text" name="email"  v-model="users.email" class="form-control">
                            </section>
                             <section class="col-sm-6">
                                <label>Contraseña :</label>
                                <input type="text" name="password"  v-model="users.password" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Rol :</label>
                                <select name="idrol"  class="form-control" v-model="users.idrol">
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->idrol}}" >{{$rol->nombre}}</option>
                                    @endforeach
                                </select>
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
                <h2><b>Usuarios</b></h2>
            </section>
        </div>
    </header>

<div role="content">
    <article class="col-sm-12 col-md-12 col-lg-5" id="formulario">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="u in usuarios">
                    <td>${u.name}</td>
                    <td>${u.email}</td>
                    <td>${u.idrol}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(u)">Editar</button></br>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarUsuario(u.id)">Elimminar</button>
                    </td>
                </tr>  
                
            </tbody>
          
        </table>
    </div>
    </article>
    <article class="col-sm-12 col-md-12 col-lg-7" id="formulario">
    <div role="content">
             <header role="heading">
               <h2>Registro de Usuarios</h2>
             </header>
            </br>
            <form id="horario" name="horario" @submit.prevent="RegistrarUsuario">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Alumnos :</label>
                                <select name="idrol"  class="form-control" v-model="usuario.alumno">
                                @foreach($alumnos as $alumno)
                                    <option value="{{$alumno->idAlumno}}">{{$alumno->alumno_nombres}} {{$alumno->alumno_apellidos}}</option>
                                   
                                @endforeach
                                </select>
                            </section>
                            <section class="col-sm-6">
                                <label>Trabajadores :</label>
                                <select name="idrol"  class="form-control" v-model="usuario.trabajador">
                                @foreach($trabajadores as $trabajador)
                                    <option value="{{$trabajador->idTrabajador}}" >{{$trabajador->trabajador_nombres}} {{$trabajador->trabajador_apellidos}}</option>
                                   
                                @endforeach
                                </select>
                            </section>
                            <section class="col-sm-6">
                                <label>E-mail :</label>
                                <input type="text" name="email"  v-model="usuario.email" class="form-control">
                            </section>
                             <section class="col-sm-6">
                                <label>Contraseña :</label>
                                <input type="password" name="password"  v-model="usuario.password" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Rol :</label>
                                <select name="idrol"  class="form-control"  v-model="usuario.idrol">
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->idrol}}">{{$rol->nombre}}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                    </div>
                    </br>
                  <footer>
                    <button class="btn btn-success"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Registrar</button>
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
                    usuarios:[],
                    usuario:{},
                    users:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(users) {
                this.editFormVisible = true;
                this.users = {
                    id:users.id,
                    name: users.name,
                    email: users.email,
                    password:users.password,
                    idrol: users.idrol,
                };
            },

            EliminarUsuario:function(users){
                axios.delete('/AcademicSystem/public/api/usuario/' + id).then(function(data){
                    Push.create('Usuario Eliminado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    var clone = {
                        name: this.usuario.name,
                        email: this.usuario.email,
                        idrol: this.usuario.idrol,
                    }
                    this.horarios.push(clone);
                }.bind(this))
            },


            ActualizarUsuario:function(){
                axios.put('/AcademicSystem/public/api/usuario',this.users).then(function(data){
                    var copy = this.usuarios.slice(0);
                    copy.forEach(function(usr) {
                        if (usr.id === this.users.id) {
                            usr = data.data.mensaje;
                        }
                    }.bind(this));
                    Push.create('Usuario Actualizado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    this.usuarios.push(data.data);
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
                    this.usuarios.push(data.data);
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/usuario').then(function(data){
                    this.usuarios=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop