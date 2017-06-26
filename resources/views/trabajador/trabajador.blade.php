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
                                <input type="text" name="trabajador_nombres" v-model="trabajador.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="trabajador_apellidos"  v-model="trabajador.apellidos" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="trabajador_dni" v-model="trabajador.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" name="trabajador_FechNac" v-model="trabajador.fechnac" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Sexo :</label>
                                <input type="text" name="trabajador_sexo" v-model="trabajador.sexo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="trabajador_celular" v-model="trabajador.celular" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Fecha de Ingreso :</label>
                                <input type="date" name="trabajador_FechInicio" v-model="trabajador.fechinicio" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="trabajador_estado" v-model="trabajador.estado" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Cargo :</label>
                                <input type="text" name="trabajador_cargo" v-model="trabajador.cargo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Condicion :</label>
                                <input type="text" name="trabajador_condicion" v-model="trabajador.condicion" class="form-control">
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

    <div class="modal" :class="{ visible: editFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar de Trabajadores</h4>
            </br>
            <form id="trabajor" @submit.prevent="ActualizarTrabajador">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="trabajador_nombres" v-model="trabajador.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="trabajador_apellidos"  v-model="trabajador.apellidos" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="trabajador_dni" v-model="trabajador.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" name="trabajador_FechNac" v-model="trabajador.fechnac" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Sexo :</label>
                                <input type="text" name="trabajador_sexo" v-model="trabajador.sexo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="trabajador_celular" v-model="trabajador.celular" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Fecha de Ingreso :</label>
                                <input type="date" name="trabajador_FechInicio" v-model="trabajador.fechinicio" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="trabajador_estado" v-model="trabajador.estado" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Cargo :</label>
                                <input type="text" name="trabajador_cargo" v-model="trabajador.cargo" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Condicion :</label>
                                <input type="text" name="trabajador_condicion" v-model="trabajador.condicion" class="form-control">
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
                <h2><b>Trabajadores</b></h2>
            </section>
        </div>
    </header>

        <div>
        <section style="padding: 20px">
            <button class="btn btn-primary" @click="MostrarModalNuevo">Agregar</button>
            <label>Buscar Trabajador : <input type="text" name="" id="searchTerm"></label>
        </section>
        </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable" id="listaTrabajador">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>Sexo</th>
                    <th>Cargo</th>
                    <th>Condicion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="t in trabajadores">
                    <td>${t.trabajador_nombres}, ${t.trabajador_apellidos}</td>
                    <td>${t.trabajador_sexo}</td>
                    <td>${t.trabajador_cargo}</td>
                    <td>${t.trabajador_condicion}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(t)">Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarTrabajador(t.idTrabajador)">Elimminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    
    <script>

     new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    trabajadores:[],
                    trabajador:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(trabajador) {
                this.editFormVisible = true;
                this.trabajador = {
                    nombres: trabajador.trabajador_nombres,
                    apellidos: trabajador.trabajador_apellidos,
                    dni: trabajador.trabajador_dni,
                    fechnac: trabajador.trabajador_FechNac,
                    sexo:  trabajador.trabajador_sexo,
                    celular: trabajador.trabajador_celular,
                    fechinicio: trabajador.trabajador_FechInicio,
                    estado: trabajador.trabajador_estado,
                    cargo: trabajador.trabajador_cargo, 
                    condicion: trabajador.trabajador_condicion,
                };
            },

            EliminarTrabajador:function(trabajador){
                axios.delete('/AcademicSystem/public/api/trabajador',this.trabajador).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        trabajador_nombres: this.trabajador.nombres,
                        trabajador_apellidos: this.trabajador.apellidos,
                        trabajador_sexo: this.trabajador.sexo,
                        trabajador_cargo: this.trabajador.cargo,
                        trabajador_condicion: this.trabajador.condicion

                    }
                    this.trabajadores.push(clone);
                }.bind(this))
            },


            ActualizarTrabajador:function(trabajador){
                axios.update('/AcademicSystem/public/api/trabajador',this.trabajador).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        trabajador_nombres: this.trabajador.nombres,
                        trabajador_apellidos: this.trabajador.apellidos,
                        trabajador_sexo: this.trabajador.sexo,
                        trabajador_cargo: this.trabajador.cargo,
                        trabajador_condicion: this.trabajador.condicion
                                }
                    this.trabajadores.push(clone);
                }.bind(this))
            },


            RegistrarTrabajador:function(){
                axios.post('/AcademicSystem/public/api/trabajador',this.trabajador).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        trabajador_nombres: this.trabajador.nombres,
                        trabajador_apellidos: this.trabajador.apellidos,
                        trabajador_sexo: this.trabajador.sexo,
                        trabajador_cargo: this.trabajador.cargo,
                        trabajador_condicion: this.trabajador.condicion

                    }
                    this.trabajadores.push(clone);
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/trabajador').then(function(data){
                    this.trabajadores=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')
    </script>

@stop