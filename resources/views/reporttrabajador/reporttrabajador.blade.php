@extends('layouts.principal')



@section('content')
    
    <div id='app'>
    <div class="modal" :class="{ visible: editFormVisible }" style="overflow-y: auto;">
        <div class="modal-content" style="width: auto;">
            <span class="close" @click="editFormVisible = false">&times;</span>
            <h4 class="modal-title" id="myModalLabel">Actualizar Trabajador</h4>
            </br>
            <form id="alumno" @submit.prevent="ActualizarReporteTrabajador">
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Nombres :</label>
                                <input type="text" name="trabajador_nombres" v-model="reporttrabajador.nombres" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Apellidos :</label>
                                <input type="text" name="trabajador_apellidos"  v-model="reporttrabajador.apellidos" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>DNI :</label>
                                <input type="text" name="trabajador_dni" v-model="reporttrabajador.dni" class="form-control" disabled="true">
                            </section>
                            <section class="col-sm-6">
                                <label>Cargo :</label>
                                <input type="text" name="trabajador_cargo" v-model="reporttrabajador.cargo" class="form-control" disabled="true">
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-sm-6">
                                <label>Celular :</label>
                                <input type="text" name="trabajador_celular" v-model="reporttrabajador.celular" class="form-control" disabled="true">
                            </section>
                             <section class="col-sm-6">
                                <label>Observacion :</label>
                                <input type="text" name="asistencia_observaciones" v-model="reporttrabajador.observacion" class="form-control">
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
                <h2><center><b>Reporte de Asistencia de Trabajadores</b></center></h2>
            </section>
        </div>
    </header>

        <div>
        <section style="padding: 20px">
             <label>Buscar Trabajador : <input type="text" name="" id="searchTerm"></label>
        </section>
        </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover  dataTable"  id="lista">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>Cargo</th>
                    <th>Condicion</th>
                    <th>Tipo Horario</th>
                    <th>Hora Entrada</th>
                    <td>Hora Salida</td>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="rt in reporttrabajadores">
                    <td>${rt.trabajador_nombres}, ${rt.trabajador_apellidos}</td>
                    <td>${rt.trabajador_cargo}</td>
                    <td>${rt.trabajador_condicion}</td>
                    <td>${rt.horario_descripcion}</td>
                    <td>${rt.asistencia_horaentrada}</td>
                    <td>${rt.asistencia_horasalida}</td>
                    <td>
                   <button name="Editar" class="btn btn-primary" @click="showEditar(rt)">Editar</button>
                   <button name="eliminar" class="btn btn-yellow" @click="EliminarAlumno(rt.idAsistencia)">Elimminar</button>
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
                    reporttrabajadores:[],
                    reporttrabajador:{},
                    editFormVisible: false,
                    newFormVisible: false,
                 }
              },

        methods:{
            MostrarModalNuevo:function(){
                //$('#modalregistro').modal('show');
                this.newFormVisible = true;
            },
            showEditar: function(reporttrabajador) {
                this.editFormVisible = true;
                this.reporttrabajador = {
                    id: reporttrabajador.idAsistencia,
                    nombres: reporttrabajador.trabajador_nombres,
                    apellidos: reporttrabajador.trabajador_apellidos,
                    dni: reporttrabajador.trabajador_dni,
                    cargo:  reporttrabajador.trabajador_cargo,
                    celular: reporttrabajador.trabajador_celular,
                    observacion: reporttrabajador.asistencia_observaciones, 
                };
            },

            EliminarReporteTrabajador:function(id){
                axios.delete('/AcademicSystem/public/api/reporttrabajador/'+ id).then(function(data){
                    Push.create('Asistencia Eliminada!',{
                        icon: '{{asset('img/icon.png')}}',
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    // copia de los trabajadores
                    var copy = this.reporttrabajadores.slice(0);
                    // filtras para obtener los trabajadores
                    // que tengan un id diferente
                    copy = copy.filter(function(reportt) {
                        return reportt.idAsistencia !== id;
                    });
                    this.reporttrabajadores = copy;
                }.bind(this))
            },


            ActualizarReporteTrabajador:function(){
                axios.put('/AcademicSystem/public/api/reporttrabajador',this.reporttrabajador).then(function(data){
                    var copy = this.reporttrabajadores.slice(0);
                    copy.forEach(function(reportt) {
                        if (reportt.idAsistencia === this.reporttrabajador.id) {
                            reportt = data.data.mensaje;
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
                    this.reporttrabajadores = copy;
                }.bind(this))
            }

         },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/reporttrabajador').then(function(data){
                    this.reporttrabajadores=data.data;
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop