<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alert</title>
</head>

<body>
    <div class="shadow p-3 mb-5 bg-body rounded">
        <h2>Sistema Monitoreo SENEAM BETA</h2>
        <h3>{{ $data['alarma'] }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Litros</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $data['volDiesel'] }}</th>
                    <th>{{ $data['porDiesel'] }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>