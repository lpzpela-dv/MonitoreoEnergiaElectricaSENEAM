<div class="modal fade" id="AddAreaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span><i class="fa-solid fa-plane-departure"></i></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="aeroForm" action="{{ route('areaRegister') }}">
                    @csrf
                    <input type="hidden" name="aeropuerto_id" value="{{ $_COOKIE['id_aero_selected'] }}">
                    <div class="row mb-3">
                        <label for="areaName" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="areaName" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="areaName" value="{{ old('areaName') }}" required autocomplete="Nombre de área"
                                autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="maxDiesel" class="col-md-4 col-form-label text-md-end">{{ __('Capacidad máxima de
                            diesel')
                            }}</label>

                        <div class="col-md-6">
                            <input id="maxDiesel" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="maxDiesel" value="{{ old('maxDiesel') }}" required autocomplete="Litros">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>