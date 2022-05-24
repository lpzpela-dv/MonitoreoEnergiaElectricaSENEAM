<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>FECHA</th>
            <th>DIESEL</th>
            <th>PORCENTAJE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $resutl)
        <tr>
            <td>{{ $resutl->id }}</td>
            <td>{{ $resutl->fecha }}</td>
            <td>{{ $resutl->volDiesel }}</td>
            <td>{{ $resutl->pocentaje }}</td>
        </tr>
        @endforeach
    </tbody>
</table>