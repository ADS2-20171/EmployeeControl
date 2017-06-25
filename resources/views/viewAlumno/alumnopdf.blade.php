<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@foreach ($al as $als)
    <section>
        <h2>Datos del Estudiante</h2>
        <br>
        <div>
            <label>Nombres y Apellidos</label>
            <h4>{{$als->alumno_nombres}} , {{$als->alumno_apellidos}}</h4>
        </div>
        <div>
            <label>DNI </label>
            <h3>{{$als->alumno_dni}}</h3>
        </div>
        <div>
            <label>Fecha de Nacimiento</label>
            <h3>{{$als->alumno_fechaNac}}</h3>
        </div>
        <div>
            <label>Direccion</label>
            <h3>{{$als->alumno_direccion}}</h3>
        </div>
    </section>

    <section>
        <h2>Datos del Apoderado</h2>
        <br>
        <div class="row">
            <label>Nombres y Apellidos</label>
            <h4>{{$als->apoderado_nombres}} , {{$als->apoderado_apellidos}}</h4>
        </div>
        <div class="row">
            <label>Direccion</label>
            <h4>{{$als->apoderado_direccion}}</h4>
        </div>
        <div class="row">
            <label>DNI</label>
            <h3>{{$als->apoderado_dni}}</h3>
        </div>
        <div class="row">
            <label>Celular</label>
            <h3>{{$als->apoderado_celular}}</h3>
        </div>
    </section>
@endforeach



	<section>
        <table border="1">
                                <thead>
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
</body>
</html>