@extends('layouts.principal')



@section('content')

    <div id='app'>
    <div class="modal" :class="{ visible: newFormVisible }" style="overflow-y: auto;">
        <div class="modal-content" style="width: auto;">
            <span class="close" @click="newFormVisible = false">&times;</span>
            </br>
            <form id="trabajor" @submit.prevent="RegistrarAlumnos" enctype="multipart/form-data" files="true">
                   <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                   
                   <h4 class="modal-title" id="myModalLabel">Registrar Datos del Apoderado</h4>
                    <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="apoderado_nombres" v-model="apoderado.nombres" class="form-control" required="Ingrese Nombre del Apoderado">
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
                    </br>

                   <h4 class="modal-title" id="myModalLabel">Registrar Datos del Alumno</h4>
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="alumno_nombres" v-model="alumno.nombresalumno" class="form-control" required="Ingrese el nombre del Alumno">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="alumno_apellidos"  v-model="alumno.apellidosalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="alumno_dni" v-model="alumno.dnialumno" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Nacimiento :</label>
                                <input type="date" id="alumno_fechNac" name="alumno_fechNac" v-model="alumno.fechnacalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Direccion :</label>
                                <input type="text" name="alumno_direccion" v-model="alumno.direccionalumno" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Genero :</label>
                                <input type="text" name="alumno_genero" v-model="alumno.generoalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="alumno_celular" v-model="alumno.celularalumno" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Fecha de Matricula :</label>
                                <input type="date" name="alumno_FechaMatric" v-model="alumno.fechamatricalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nivel :</label>
                                <input type="text" name="alumno_nivel" v-model="alumno.nivelalumno" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Grado :</label>
                                <input type="text" name="alumno_grado" v-model="alumno.gradoalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Seccion :</label>
                                <input type="text" name="alumno_seccion" v-model="alumno.seccionalumno" class="form-control">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="alumno_estado" v-model="alumno.estadoalumno" class="form-control">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Subir Foto del Alumno:</label>
                                <input type="file" name="alumno_imagen" ref="photo" class="form-control">
                            </section>
                              
                        </div>
                    </div>

                  <div class="modal-footer">
                    <button class="btn btn-primary"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>   Registrar</button>
                  </div>
                </form>
        </div>
    </div>

    <div class="modal" :class="{ visible: editFormVisible }" style="overflow-y: auto;">
        <div class="modal-content" style="width: auto;">
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
                    <button class="btn btn-success"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>   Actualizar</button>
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
        </section>
        </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable" >
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
                <tr v-for="a in alumnos" >
                    <td>${a.alumno_nombres}, ${a.alumno_apellidos}</td>
                    <td>${a.alumno_genero}</td>
                    <td>${a.alumno_direccion}</td>
                    <td>${a.alumno_nivel}</td>
                    <td>${a.alumno_grado}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(a)"><i class="fa fa-eye" aria-hidden="true"></i> Editar</button></p>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarAlumno(a.idAlumno)"><i class="fa fa-trash-o" aria-hidden="true"></i> Elimminar</button>
                    </td>
                </tr>
                <tr v-if="alumnos.length===0">
                    <td colspan="20" style="text-align: center;"><img src="{{asset('img/cargar.gif')}}"></td>
                </tr>
                <tr>
                    <td>
                    <button @click="previus()" class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"></i></button>
                    <button @click="next()" class="btn btn-primary"><i class="fa fa-forward" aria-hidden="true"></i></button>
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
                    
                    alumnos:[],
                    alumno:{},
                    apoderado:{},
                    editFormVisible: false,
                    newFormVisible: false,
                    contador: 1,
                    limit: 3,
                 }
              },
        methods:{

            
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(alumno) {
                this.editFormVisible = true;
                this.alumno = {
                    id: alumno.idAlumno,
                    nombres: alumno.alumno_nombres,
                    apellidos: alumno.alumno_apellidos,
                    dni: alumno.alumno_dni,
                    fechnac: alumno.alumno_fechnac,
                    direccion:  alumno.alumno_direccion,
                    genero: alumno.alumno_genero,
                    celular: alumno.alumno_celular,
                    fechamatric: alumno.alumno_FechaMatric,
                    nivel: alumno.alumno_nivel, 
                    grado: alumno.alumno_grado,
                    seccion:alumno.alumno_seccion,
                    estado:alumno.alumno_estado,
                };
            },

            Pagination:function(contador){
                 console.log(this.contador, this.limit);
                axios.get('/AcademicSystem/public/api/alumno/pagination?page='+ this.contador + '&limit=' + this.limit).then(function(response){
                    this.alumnos=response.data;
                    console.log(this.alumnos);
                 }.bind(this))
            },

            previus:function(){
                this.contador --;
                this.Pagination();
            },

            next:function(){
                this.contador ++;
                this.Pagination();
            },

            EliminarAlumno:function(id){
                axios.delete('/AcademicSystem/public/api/alumno/' + id).then(function(data){
                    Push.create('Alumno Eliminado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                     
                    var copy = this.alumnos.slice(0);

                    copy = copy.filter(function(alum) {
                        return alum.idAlumno !== id;
                    });

                    this.alumnos=copy;
                }.bind(this))
            },


            ActualizarAlumnos:function(){
                axios.put('/AcademicSystem/public/api/alumno',this.alumno).then(function(data){
                    var copy = this.alumnos.slice(0);
                    copy.forEach(function(alum) {
                        if (alum.idAlumno === this.alumno.id) {
                            alum = data.data.mensaje;
                        }
                    }.bind(this));

                    Push.create('Alumno Actualizado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    
                    this.alumnos=copy;
                    this.editFormVisible = false;
                }.bind(this))
            },


            RegistrarAlumnos:function(){
                var data = new FormData()

                data.append("nombres", this.apoderado.nombres)
                data.append("apellidos", this.apoderado.apellidos)
                data.append("dni", this.apoderado.dni)
                data.append("direccion", this.apoderado.direccion)
                data.append("celular", this.apoderado.celular)

                data.append("nombresalumno", this.alumno.nombresalumno)
                data.append("apellidosalumno", this.alumno.apellidosalumno)
                data.append("dnialumno", this.alumno.dnialumno)
                data.append("fechnacalumno", this.alumno.fechnacalumno)
                data.append("direccionalumno", this.alumno.direccionalumno)
                data.append("generoalumno", this.alumno.generoalumno)
                data.append("celularalumno", this.alumno.celularalumno)
                data.append("fechamatricalumno", this.alumno.fechamatricalumno)
                data.append("nivelalumno", this.alumno.nivelalumno)
                data.append("gradoalumno", this.alumno.gradoalumno)
                data.append("seccionalumno", this.alumno.seccionalumno)
                data.append("estadoalumno", this.alumno.estadoalumno)
                data.append("photo", this.$refs.photo.files[0])

                


                axios.post('/AcademicSystem/public/api/alumno', data).then(function(data){
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
                    this.newFormVisible = false;
                }.bind(this))
            }

         },

        mounted:function(){
            setTimeout(function(){
                this.Pagination();
            }.bind(this),2000);
        }

       }).$mount('#app')

    </script>


@stop