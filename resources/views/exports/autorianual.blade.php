<table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Cuil</th>
            <th>N° Legajo</th>
            <th>Tipo de Autorización</th>
            <th>De</th>
            <th>Hasta</th>
            <th>Motivo</th>
            <th>Fecha Petición</th>
            <th>Materia</th>
        </tr>
        </thead>
        <tbody>
        @foreach($autorianual as $user)
            <tr>
                <td>{{ $user->nombre_usuario }}</td>
                <td>{{ $user->cuil }}</td>
                <td>{{ $user->legajo }}</td>
                <td>{{ $user->tipo_autorizacion }}</td>
                <td>{{ $user->fecha_de }}</td>
                <td>{{ $user->fecha_hasta }}</td>
                <td>{{ $user->motivo }}</td>
                <td>{{ $user->fecha_creacion }}</td>
                <td>{{ $user->materia }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>