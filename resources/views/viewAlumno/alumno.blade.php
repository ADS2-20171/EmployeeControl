@extends('layouts.principal')



@section('content')
    
<style type="text/css">
.container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin: 20px;
  max-width: 980px;
  padding: 32px;
  padding: 2rem;
}
.title {
  font-size: 20px;
  margin: 0;
  text-align: center;
  padding-left: 70px;
  text-transform: uppercase;
}
.photo {
  border: 2px solid #555;
  height: 120px;
  margin: 0;
  width: 100px;
}
.block-title {
  font-size: 17px;
  padding-bottom: 5px;
  text-transform: uppercase;
}
.left {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
}
.right {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 100px;
          flex: 0 0 100px;
}
/* Input */
input[type="text"] {
  border: none;
  border-bottom: 2px solid #555;
  width: 100%;
  font :  150% sans-serif;
}
label {
  font-size: 15px;
  text-transform: uppercase;
  white-space: nowrap;
}
label.quest {
  display: block;
  font-size: 16px;
  text-align: center;
  text-transform: none;
  width: 100%;
}
.form-group {
  /border: 1px solid red;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin: 6px 0;
}
.form-group input[type="text"] {
  margin-left: 15px;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
}
.form-group input[type="text"]:focus {
  outline: none !important;
}
.block {
  margin: 20px 0;
  margin-right: 30px;
}
.block:first-of-type {
  margin-top: 40px;
}

/* Grilla */
.row:before {
  content: '';
  display: table;
}
.row:after {
  content: '';
  display: table;
  clear: both;
}
.col {
  width: calc(99.9% * 1 - 0px);
}
.col:nth-child(1n) {
  float: left;
  margin-right: 30px;
  clear: none;
}
.col:last-child {
  margin-right: 0;
}
.col:nth-child(undefinedn) {
  margin-right: 0;
  float: right;
}
.col:nth-child(undefinedn + 1) {
  clear: both;
}
.col-2 {
  width: calc(99.9% * 1/2 - 15px);
}
.col-2:nth-child(1n) {
  float: left;
  margin-right: 30px;
  clear: none;
}
.col-2:last-child {
  margin-right: 0;
}
.col-2:nth-child(2n) {
  margin-right: 0;
  float: right;
}
.col-2:nth-child(2n + 1) {
  clear: both;
}
.col-2-3 {
  width: calc(99.9% * 2/3 - 10px);
}
.col-2-3:nth-child(1n) {
  float: left;
  margin-right: 30px;
  clear: none;
}
.col-2-3:last-child {
  margin-right: 0;
}
.col-2-3:nth-child(3n) {
  margin-right: 0;
  float: right;
}
.col-2-3:nth-child(3n + 1) {
  clear: both;
}
.col-3 {
  width: calc(99.9% * 1/3 - 20px);
}
.col-3:nth-child(1n) {
  float: left;
  margin-right: 30px;
  clear: none;
}
.col-3:last-child {
  margin-right: 0;
}
.col-3:nth-child(3n) {
  margin-right: 0;
  float: right;
}
.col-3:nth-child(3n + 1) {
  clear: both;
}
    </style>





    <div id='app'>

            <div class="modal" id="mostrarmodal" style="overflow-y: auto;">
                <div class="modal-content" style="width: 600px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="document.getElementById('mostrarmodal').classList.remove('visible');">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Eventos del Alumno</h4>
                    </br>
                    <div class="modal-body">
                      @foreach ($event as $events)
                                    <label>Titulo</label>
                                    <h3>{{$events->eventos_titulo}}</h3>

                                    <label>Razón</label>
                                    <h3>{{$events->eventos_cuerpo}}</h3>

                                    <label>Inicia</label>
                                    <h3>{{$events->eventos_inicio}}</h3>

                                    <label>Finaliza</label>
                                    <h3>{{$events->eventos_final}}</h3>
                              @endforeach
                    </div>
                    <div class="modal-footer">
                    <h3>* NOTA:</h3>
                    <span>Los eventos mostrados son solo apra el alumno que se identifico.</span>
                  </div>
                  </div>
            </div>






        <section class="container">

                <section class="left">
                     <a  href="{!!route('pdfViewAlumno.index')!!}" class="btn btn-danger" >Exportar Pdf</a>
                  <h2 class="title">Datos del Estudiante</h2>
                  <!-- bloque datos generales -->
                  <article class="block">
                    <h3 class="block-title">datos generales</h3>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="full-name">Nombres:</label>
                          <input type="text" id="full-name" v-model="viewalumnos.alumno_nombres"/>
                        </div>
                      </div>
                    </div>
                    <section class="row">
                      <div class="col-2-3">
                        <div class="form-group">
                          <label for="birth-date">Apellidos:</label>
                          <input type="text" id="birth-date" v-model="viewalumnos.alumno_apellidos" />
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label for="birth-place">DNI :</label>
                          <input type="text" id="birth-place" v-model="viewalumnos.alumno_dni" />
                        </div>
                      </div>
                    </section>
                    <section class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="address">Fecha de  Nacimiento:</label>
                          <input type="text" id="address" v-model="viewalumnos.alumno_fechaNac" />
                        </div>
                      </div>
                    </section>
                    <section class="row">
                      <div class="col">
                        <section class="row" style="padding-left: 25px">
                          <div class="col-2">
                            <div class="form-group">
                              <label for="phone1">Direccion:</label>
                              <input type="text" id="phone1"  v-model="viewalumnos.alumno_direccion"/>
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <label for="owner1">Fecha de Matricula:</label>
                              <input type="text" id="owner1" v-model="viewalumnos.alumno_FechaMatric" />
                            </div>
                          </div>
                        </section>
                      </div>
                    </section>
                  </article>
                  <hr />
                  <!-- bloque datos familiares -->
                  <article class="block">
                    <h3 class="block-title">Datos familiares</h3>
                    <section class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>padre/madre/tutores:</label>
                        </div>
                      </div>
                      <div class="col">
                        <!-- familiar 1 -->
                        <section class="row" style="padding-left: 20px">
                          <div class="col-2-3">
                            <div class="form-group">
                              <label for="fam1-name">Nombre:</label>
                              <input type="text" id="fam1-name" v-model="viewalumnos.apoderado_nombres"/>
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label for="fam1-age">Apellidos:</label>
                              <input type="text" id="fam1-age" v-model="viewalumnos.apoderado_apellidos" />
                            </div>
                          </div>
                        </section>
                        <section class="row" style="padding-left: 20px">
                          <div class="col-2">
                            <div class="form-group">
                              <label for="fam1-degree">Direccion:</label>
                              <input type="text" id="fam1-degree" v-model="viewalumnos.apoderado_direccion" />
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <label for="fam1-job">Telefono:</label>
                              <input type="text" id="fam1-job" v-model="viewalumnos.apoderado_celular" />
                            </div>
                          </div>
                          <div class="col-2">
                            <div class="form-group">
                              <label for="fam1-job">DNI:</label>
                              <input type="text" id="fam1-job" v-model="viewalumnos.apoderado_dni" />
                            </div>
                          </div>
                        </section>
                        <!-- familiar 2 -->
                      </div>
                    </section>
                  </article>
                  <hr />
                  <!-- Bloque de Asistencias -->
                  <article class="block">
                    <h3 class="block-title">Asistencia</h3>
                    <section class="row">
                      
                      <div class="col">
                        <section class="row" style="padding:8px 15px">
                            <table class="table table-striped table-bordered table-hover  dataTable">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Hora de Ingreso</th>
                                        <th>Hora de Salida</th>
                                        <th>Observacion por Tardanza</th>
                                        <th>Tardanza</th>
                                        <th>Calificativo</th>
                                    </tr>
                                </thead>
                                @foreach ($al as $als)
                                <tbody>
                                    <tr>
                                        <td>{{$als->asistencia_horaentrada}}</td>
                                        <td>{{$als->asistencia_horasalida}}</td>
                                        <td>{{$als->asistencia_observaciones}}</td>
                                        <td>{{$als->asistencia_tardanza}}</td>
                                        <td>{{$als->asistencia_asistio}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </section>
                      </div>
                    </section>
                  </article>
                </section>
                <section class="right">
                  <figure class="photo">
                    <img :src="'/AcademicSystem/public/avatar/'+viewalumnos.alumno_imagen" style="border: 2px solid #555; height: 120px; margin: 0; width: 100px;" />
                  </figure>
                </section>
        </section>          
     
    </div>
    

    
    <script>
    new Vue({
        delimiters:['${','}'],
        data:function(){
                return {
                    viewalumnos:[],
                    viewalumno:{},
                 }
              },

        mounted:function(){
            axios.get('/AcademicSystem/public/api/viewAlumno').then(function(data){
                    this.viewalumnos=data.data[0];
                    console.log(data);
            }.bind(this))
        }

       }).$mount('#app')

    </script>


@stop