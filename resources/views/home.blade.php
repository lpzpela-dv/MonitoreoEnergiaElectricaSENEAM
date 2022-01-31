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
</style>
@endsection
@section('content')
<div id="padd" class="container-fluid">
    <input type="hidden" id="lastValueVolt">
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
                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" id="fontstext1">Última Lectura Voltaje</span>
                    <span class="info-box-number" id="LastVoltvalue">220v</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fas fa-bolt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" id="fontstext">Última Lectura Amperaje</span>
                    <span class="info-box-number" id="LastAmpvalue">40Amp</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div id="btn">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-sm btn-dark active">Linea</button>
                    <button type="button" class="btn btn-sm btn-dark">Barras</button>
                </div>
            </div>
            <canvas id="myChart" height="110hv"></canvas>
        </div>
        <div class="col-md-6">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-sm btn-dark active">Linea</button>
                <button type="button" class="btn btn-sm btn-dark">Barras</button>
            </div>
            <canvas id="myChart1" height="110hv"></canvas>
        </div>
        {{-- <div class="col-md-6">
            <canvas id="myChart2" height="110hv"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="myChart3" height="110hv"></canvas>
        </div> --}}
    </div>
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="js/graph.js"></script>
@endsection