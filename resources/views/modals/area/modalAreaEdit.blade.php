<div class="modal fade" id="editAreaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span><i class="fa-solid fa-plane-departure"></i></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="aeroForm">
                    @csrf
                    <div class="row mb-3">
                        <label for="areaName" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de área')
                            }}</label>

                        <div class="col-md-6">
                            <input id="edareaName" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="areaName" value="{{ old('shortName') }}" required autocomplete="name" autofocus>

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
                            <input id="edmaxDiesel" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="maxDiesel" value="{{ old('email') }}" required autocomplete="email">

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
                <button type="button" id="btnconfirm" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>