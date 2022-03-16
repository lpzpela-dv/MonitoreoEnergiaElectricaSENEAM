@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    #padd {
        padding-top: 15px;
    }

    #LastVoltvalue,
    #LastAmpvalue {
        font-size: 30px;
    }

    #fontstext,
    #fontstext1 {
        font-size: 20px;
    }
</style>
@endsection
@section('content')
<div id="padd" class="container-fluid">
    <input type="hidden" id="lastValueVolt">
    <hr>
    <table class="table table-borderless">
        {{-- <thead>
            <tr>
                <th scope="col">
                    <h5><span class="badge bg-success">Encendido</span></h5>
                    <h5><span class="badge bg-danger">Apagado</span></h5>
                </th>
            </tr>
        </thead> --}}
        <tbody>
            <tr>
                <th scope="row">Estatus de Areas</th>
                <td>
                    <h5><span class="badge bg-success">CCAR1</span></h5>
                </td>
                <td>
                    <h5><span class="badge bg-danger">CCAR2</span></h5>
                </td>
                <td>
                    <h5><span class="badge bg-danger">VOR</span></h5>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <h5><span class="badge bg-danger">RADAR</span></h5>
                </td>
                <td>
                    <h5><span class="badge bg-danger">TERRENA</span></h5>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="row justify-content-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Log de eventos</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td class="text-center">Carga de sitio CCRA2 APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td class="text-center">Carga de sitio CCRA2 ENCENDIDO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td class="text-center">Carga de sitio TERRENA APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td class="text-center">Carga de sitio CCRA2 APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td class="text-center">Carga de sitio CCRA2 APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td class="text-center">Carga de sitio CCRA2 APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td class="text-center">Carga de sitio CCRA2 APAGADO</td>
                    <td>15/03/2022 12:22:00</td>
                </tr>

            </tbody>
        </table>
    </div>

    {{-- modal para seleccionar aeropuerto --}}
    <div class="modal fade" id="selecAero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aeropuerto:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <select id="disabledSelect" class="form-select">

                                @foreach ($aeropuertos as $aeropuerto)
                                <option>{{ $aeropuerto['aeropuerto'] }} - {{ $aeropuerto['description'] }}</option>
                                @endforeach

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>



    {{--
    <table class="table">
        <tbody>
            <tr>
                <th>
                    CCAR1
                </th>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box">
                                <!-- Apply any bg-* class to to the icon to color it -->
                                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" id="fontstext1">Estado:</span>
                                    <span class="info-box-number" id="LastVoltvalue">Encendido</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litros</span>
                                    <span class="info-box-number">40,110</span>
                                    <!-- The progress section is optional -->
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% 17 Enero 13:25
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    CCAR2
                </th>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box">
                                <!-- Apply any bg-* class to to the icon to color it -->
                                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" id="fontstext1">Estado:</span>
                                    <span class="info-box-number" id="LastVoltvalue">Encendido</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litros</span>
                                    <span class="info-box-number">40,110</span>
                                    <!-- The progress section is optional -->
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% 17 Enero 13:25
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    VOR
                </th>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box">
                                <!-- Apply any bg-* class to to the icon to color it -->
                                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" id="fontstext1">Estado:</span>
                                    <span class="info-box-number" id="LastVoltvalue">Encendido</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litros</span>
                                    <span class="info-box-number">40,110</span>
                                    <!-- The progress section is optional -->
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% 17 Enero 13:25
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    RADAR
                </th>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box">
                                <!-- Apply any bg-* class to to the icon to color it -->
                                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" id="fontstext1">Estado:</span>
                                    <span class="info-box-number" id="LastVoltvalue">Encendido</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litros</span>
                                    <span class="info-box-number">40,110</span>
                                    <!-- The progress section is optional -->
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% 17 Enero 13:25
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    Terrena
                </th>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box">
                                <!-- Apply any bg-* class to to the icon to color it -->
                                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" id="fontstext1">Estado:</span>
                                    <span class="info-box-number" id="LastVoltvalue">Encendido</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litros</span>
                                    <span class="info-box-number">40,110</span>
                                    <!-- The progress section is optional -->
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        70% 17 Enero 13:25
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> --}}



    {{--

    <div class="row">
        <div class="col">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Litros</span>
                    <span class="info-box-number">40,110</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                        <div class="progress-bar" style="width: 65.8%"></div>
                    </div>
                    <span class="progress-description">
                        70% 17 Enero 13:25
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" id="fontstext1">Última Lectura Voltaje</span>
                    <span class="info-box-number" id="LastVoltvalue">220v</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div> --}}








    {{-- <div class="row">
        <div class="col">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fas fa-hockey-puck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Litros</span>
                    <span class="info-box-number">41,410</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                        70% 17 Enero 13:25
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fas fa-plug"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" id="fontstext">Última Lectura Amperaje</span>
                    <span class="info-box-number" id="LastAmpvalue">40Amp</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

    </div>--}}
</div>
{{--
<hr>
<div class="container-fluid">


</div> --}}
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="js/dgeneral.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
{{-- <script src="js/graph.js"></script> --}}
@endsection