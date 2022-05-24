<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>FECHA</th>
            <th>FASE 1</th>
            <th>FASE 2</th>
            <th>FASE 3</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $resutl)
        <tr>
            <td>{{ $resutl->id }}</td>
            <td>{{ $resutl->fecha }}</td>
            <td>{{ $resutl->d1 }}</td>
            <td>{{ $resutl->d2 }}</td>
            <td>{{ $resutl->d3 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>