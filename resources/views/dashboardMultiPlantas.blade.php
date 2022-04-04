@extends('adminlte::page')
@section('css')
<style>
    #padd {
        padding-top: 15px;
    }

    #LastVoltvalue,
    #LastAmpvalue {
        font-size: 35px;
    }

    #fontstext,
    #fontstext1 {
        font-size: 20px;
    }

    #btn {
        padding-top: 20px;
    }
</style>
@endsection
@section('content')
<div id="padd" class="container-fluid">
    <input type="hidden" id="lastValue">
    <input type="hidden" id="stCFE">
    <input type="hidden" id="stPlanta">
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
            <div class="row">
                <div id="contCFE" class="col-md-6">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Contactor CFE</span>
                            <span class="info-box-number">ACTIVADO</span>
                        </div>
                    </div>
                </div>
                <div id="contPlanta" class="col-md-6">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Contactor Planta</span>
                            <span class="info-box-number">DESACTIVADO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div id="btn">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input type="hidden" id="cfeVal" value="Volt">
                    <button type="button" class="btn btn-sm btn-dark active" name="cfeVal" id="Volt1">Volts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cfeVal" id="Amp1">Amp</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cfeVal" id="Watts1">Watts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cfeVal" id="KwH1">Kw/h</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cfeVal" id="Fp1">FP</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cfeVal" id="Hz1">Hz</button>
                </div>
            </div>
            <canvas id="myChart" height="110hv"></canvas>
        </div>
        <div class="col-md-6">
            <div id="btn">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input type="hidden" id="plantaVal" value="Volt">
                    <button type="button" class="btn btn-sm btn-dark active" name="plantaVal" id="Volt2">Volts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="plantaVal" id="Amp2">Amp</button>
                    <button type="button" class="btn btn-sm btn-dark" name="plantaVal" id="Watts2">Watts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="plantaVal" id="KwH2">Kw/h</button>
                    <button type="button" class="btn btn-sm btn-dark" name="plantaVal" id="Fp2">FP</button>
                    <button type="button" class="btn btn-sm btn-dark" name="plantaVal" id="Hz2">Hz</button>
                </div>
            </div>
            <canvas id="myChart1" height="110hv"></canvas>
        </div>

        <div class="col-md-6 ">
            <div id="btn">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input type="hidden" id="cargaVal" value="Volt">
                    <button type="button" class="btn btn-sm btn-dark active" name="cargaVal" id="Volt3">Volts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cargaVal" id="Amp3">Amp</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cargaVal" id="Watts3">Watts</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cargaVal" id="KwH3">Kw/h</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cargaVal" id="Fp3">FP</button>
                    <button type="button" class="btn btn-sm btn-dark" name="cargaVal" S id="Hz3">Hz</button>
                </div>
            </div>
            <canvas id="myChart2" height="110hv"></canvas>
        </div>

    </div>
</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="../js/graph.js"></script>
@endsection