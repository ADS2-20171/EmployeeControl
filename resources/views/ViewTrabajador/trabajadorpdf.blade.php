<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@foreach ($ta as $tas)
    <section>
        <h2>Datos del Estudiante</h2>
        <br>
        <div>
            <label>Nombres y Apellidos</label>
            <h4>{{$tas->trabajador_nombres}} , {{$tas->trabajador_apellidos}}</h4>
        </div>
        <div>
            <label>DNI </label>
            <h3>{{$tas->trabajador_dni}}</h3>
        </div>
        <div>
            <label>Fecha de Nacimiento</label>
            <h3>{{$tas->trabajador_FechNac}}</h3>
        </div>
        <div>
            <label>Cargo</label>
            <h3>{{$tas->trabajador_cargo}}</h3>
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
                                @foreach ($ta as $tas)
                                <tbody>
                                    <tr>
                                        <td>{{$tas->asistencia_horaentrada}}</td>
                                        <td>{{$tas->asistencia_horasalida}}</td>
                                        <td>{{$tas->asistencia_observaciones}}</td>
                                        <td>{{$tas->asistencia_tardanza}}</td>
                                        <td>{{$tas->asistencia_asistio}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
        </table>
	</section>
</body>
</html>