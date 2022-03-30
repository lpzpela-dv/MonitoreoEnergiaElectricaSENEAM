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
                    <th>Voltaje Fase 1</th>
                    <th>Voltaje Fase 2</th>
                    <th>Voltaje Fase 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $data['VoltL1'] }}</th>
                    <th>{{ $data['VoltL2'] }}</th>
                    <th>{{ $data['VoltL3'] }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>