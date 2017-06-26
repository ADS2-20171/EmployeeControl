@extends('layouts.principal')



@section('content')
    
    <div id='app'>
    <div class="modal" :class="{ visible: editFormVisible }">
        <div class="modal-content" style="width: 600px;">
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar Alumno</h4>
            </br>
            <form id="alumno" @submit.prevent="ActualizarReporteAlumno">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="alumno_nombres" v-model="reportalumno.nombres" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="alumno_apellidos"  v-model="reportalumno.apellidos" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="alumno_dni" v-model="reportalumno.dni" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Direccion :</label>
                                <input type="text" name="alumno_direccion" v-model="reportalumno.direccion" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Genero :</label>
                                <input type="text" name="alumno_genero" v-model="reportalumno.genero" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="alumno_celular" v-model="reportalumno.celular" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nivel :</label>
                                <input type="text" name="alumno_nivel" v-model="reportalumno.nivel" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Grado :</label>
                                <input type="text" name="alumno_grado" v-model="reportalumno.grado" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Seccion :</label>
                                <input type="text" name="alumno_seccion" v-model="reportalumno.seccion" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Estado :</label>
                                <input type="text" name="alumno_estado" v-model="reportalumno.estado" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row"> 
                            <section class="col-sm-6">
                                <label>Observacion de tardanza :</label>
                                <input type="text" name="alumno_observacion" v-model="reportalumno.observacion" class="form-control" placeholder="Registre la Observacion">
                            </section>
                        </div>
                    </div>
                    </br>
                  <div class="modal-footer">
                    <button class="btn btn-success"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>  Actualizar</button>
                  </div>
                </form>
        </div>
    </div>

    <header>
        <div>
            <section style="padding: 20px">
                <h2><center><b>Reporte de Asistencia de Alumnos</b></center></h2>
            </section>
        </div>
    </header>

        <div>
        <section style="padding: 20px">
             <label>Buscar Alumno : <input type="text" name="" id="searchTerm"></label>
        </section>
        </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable" id="lista">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Seccion</th>
                    <th>Horario Entrada</th>
                    <th>Horario Salida</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ra in reportalumnos">
                    <td>${ra.alumno_nombres}, ${ra.alumno_apellidos}</td>
                    <td>${ra.alumno_nivel}</td>
                    <td>${ra.alumno_grado}</td>
                    <td>${ra.alumno_seccion}</td>
                    <td>${ra.asistencia_horaentrada}</td>
                    <td>${ra.asistencia_horasalida}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(ra)"><i class="fa fa-eye" aria-hidden="true"></i> Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarReporteAlumno(ra.idAsistencia)">Elimminar</button>
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
                    reportalumnos:[],
                    reportalumno:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(reportalumno) {
                this.editFormVisible = true;
                this.reportalumno = {
                    id: reportalumno.idAsistencia,
                    nombres: reportalumno.alumno_nombres,
                    apellidos: reportalumno.alumno_apellidos,
                    dni: reportalumno.alumno_dni,
                    direccion:  reportalumno.alumno_direccion,
                    genero: reportalumno.alumno_genero,
                    celular: reportalumno.alumno_celular,
                    fechamatric: reportalumno.alumno_FechaMatric,
                    nivel: reportalumno.alumno_nivel,
                    grado: reportalumno.alumno_grado,
                    seccion: reportalumno.alumno_seccion,
                    observacion: reportalumno.asistencia_observaciones, 
                };
            },

            EliminarReporteAlumno:function(id){
                axios.delete('/AcademicSystem/public/api/reportalumno/'+ id).then(function(data){
                    Push.create('Asistencia Eliminada!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    // copia de los trabajadores
                    var copy = this.reportalumnos.slice(0);
                    // filtras para obtener los trabajadores
                    // que tengan un id diferente
                    copy = copy.filter(function(reporta) {
                        return reporta.idAsistencia !== id;
                    });
                    this.reportalumnos = copy;
                }.bind(this))
            },


            ActualizarReporteAlumno:function(){
                axios.put('/AcademicSystem/public/api/reportalumno',this.reportalumno).then(function(data){
                    var copy = this.reportalumnos.slice(0);
                    copy.forEach(function(reporta) {
                        if (reporta.idAsistencia === this.reportalumno.id) {
                            reporta = data.data.mensaje;
                        }
                    }.bind(this));
                    Push.create('Asistencia Actualizado!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    this.reportalumnos = copy;
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/reportalumno').then(function(data){
                    this.reportalumnos=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop