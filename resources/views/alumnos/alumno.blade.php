@extends('layouts.principal')



@section('content')
    
    <div id='app'>
    <div class="modal" :class="{ visible: newFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="newFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Registro de Alumnos</h4>
            </br>
            <form id="trabajor" @submit.prevent="RegistrarAlumnos">
                   <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="alumno_nombres" v-model="alumno.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="alumno_apellidos"  v-model="alumno.apellidos" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="alumno_dni" v-model="alumno.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" name="alumno_fechNac" v-model="alumno.fechnac" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Direccion :</label>
                                <input type="text" name="alumno_direccion" v-model="alumno.direccion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Genero :</label>
                                <input type="text" name="alumno_genero" v-model="alumno.genero" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="alumno_celular" v-model="alumno.celular" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Matricula :</label>
                                <input type="date" name="alumno_FechaMatric" v-model="alumno.fechamatric" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nivel :</label>
                                <input type="text" name="alumno_nivel" v-model="alumno.nivel" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Grado :</label>
                                <input type="text" name="alumno_grado" v-model="alumno.grado" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Seccion :</label>
                                <input type="text" name="alumno_seccion" v-model="alumno.seccion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="alumno_estado" v-model="alumno.estado" class="form-control">
                            </section>
                        </div>
                    </div>
                    </br>
                    <hr>
                    <h4 class="modal-title" id="myModalLabel">Registrar Datos del Apoderado</h4>
                    <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="apoderado_nombres" v-model="apoderado.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="apoderado_apellidos"  v-model="apoderado.apellidos" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="apoderado_dni" v-model="apoderado.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Direccion :</label>
                                <input type="text" name="apoderado_direccion"  v-model="apoderado.direccion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="apoderado_celular"  v-model="apoderado.celular" class="form-control">
                            </section>
                        </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>   Registrar</button>
                  </div>
                </form>
        </div>
    </div>

    <div class="modal" :class="{ visible: editFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar Alumno</h4>
            </br>
            <form id="alumno" @submit.prevent="ActualizarAlumnos">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="alumno_nombres" v-model="alumno.nombres" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="alumno_apellidos"  v-model="alumno.apellidos" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="alumno_dni" v-model="alumno.dni" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" name="alumno_FechNac" v-model="alumno.fechnac" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Direccion :</label>
                                <input type="text" name="alumno_direccion" v-model="alumno.direccion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Genero :</label>
                                <input type="text" name="alumno_genero" v-model="alumno.genero" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="alumno_celular" v-model="alumno.celular" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Matricula :</label>
                                <input type="text" name="alumno_FechaMatric" v-model="alumno.fechamatric" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nivel :</label>
                                <input type="text" name="alumno_nivel" v-model="alumno.nivel" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Grado :</label>
                                <input type="text" name="alumno_grado" v-model="alumno.grado" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Seccion :</label>
                                <input type="text" name="alumno_seccion" v-model="alumno.seccion" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="alumno_estado" v-model="alumno.estado" class="form-control">
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
        <div>
            <section style="padding: 20px">
                <h2><b>Alumnos</b></h2>
            </section>
        </div>
    </header>

        <div>
        <section style="padding: 20px">
            <button class="btn btn-primary" @click="MostrarModalNuevo">Agregar</button>
            <label>Buscar Alumno : <input type="text" name="" id="searchTerm"></label>
        </section>
        </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>Sexo</th>
                    <th>Direccion</th>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="a in alumnos">
                    <td>${a.alumno_nombres}, ${a.alumno_apellidos}</td>
                    <td>${a.alumno_genero}</td>
                    <td>${a.alumno_direccion}</td>
                    <td>${a.alumno_nivel}</td>
                    <td>${a.alumno_grado}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(a)">Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarAlumno(a.idAlumno)">Elimminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        {!! $al->render() !!}
    </div>
    </div>
    
    <script>

     new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    alumnos:[],
                    alumno:{},
                    apoderado:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(alumno, apoderado) {
                this.editFormVisible = true;
                this.alumno = {
                    nombres: trabajador.trabajador_nombres,
                    apellidos: trabajador.trabajador_apellidos,
                    dni: trabajador.trabajador_dni,
                    fechnac: trabajador.trabajador_FechNac,
                    genero:  trabajador.trabajador_sexo,
                    celular: trabajador.trabajador_celular,
                    fechinicio: trabajador.trabajador_FechInicio,
                    estado: trabajador.trabajador_estado,
                    cargo: trabajador.trabajador_cargo, 
                    condicion: trabajador.trabajador_condicion,
                };
            },

            EliminarAlumno:function(alumno){
                axios.delete('/AcademicSystem/public/api/alumno',this.alumno).then(function(data){
                    Push.create('Alumno Eliminado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    var clone = {
                        alumno_nombres: this.alumno.nombres,
                        alumno_apellidos: this.alumno.apellidos,
                        alumno_sexo: this.alumno.sexo,
                        alumno_direccion: this.alumno.direccion,
                        alumno_nivel: this.alumno.nivel,
                        alumno_grado: this.alumno.grado  
                    }
                    this.alumnos.push(clone);
                }.bind(this))
            },


            ActualizarAlumnos:function(alumno){
                axios.update('/AcademicSystem/public/api/alumno',this.alumno).then(function(data){
                    alert(data.data.mensaje);
                    var clone = {
                        alumno_nombres: this.alumno.nombres,
                        alumno_apellidos: this.alumno.apellidos,
                        alumno_sexo: this.alumno.sexo,
                        alumno_direccion: this.alumno.direccion,
                        alumno_nivel: this.alumno.nivel,
                        alumno_grado: this.alumno.grado  
                    }
                    this.alumnos.push(clone);
                }.bind(this))
            },


            RegistrarAlumnos:function(){
                axios.post('/AcademicSystem/public/api/alumno',this.alumno).then(function(data){
                    Push.create('Alumno Registrado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    var clone = {
                        alumno_nombres: this.alumno.nombres,
                        alumno_apellidos: this.alumno.apellidos,
                        alumno_sexo: this.alumno.sexo,
                        alumno_direccion: this.alumno.direccion,
                        alumno_nivel: this.alumno.nivel,
                        alumno_grado: this.alumno.grado                       
                    }
                    this.alumnos.push(clone);
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/alumno').then(function(data){
                    this.alumnos=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop