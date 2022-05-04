<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span><i class="fa-solid fa-user-plus"></i></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="nameE" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="nameE" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="nameE" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="emailE" class="col-md-4 col-form-label text-md-end">{{ __('Correo')
                            }}</label>

                        <div class="col-md-6">
                            <input id="emailE" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="emailE" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 align-items-end">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <input type="checkbox" value="" id="enableInput">
                            <label for="enableInput">
                                Cambiar contraseña
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="passwordE" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña')
                            }}</label>

                        <div class="col-md-6">
                            <input id="passwordE" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="passwordE" required
                                autocomplete="new-password" disabled>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3" id="confpws">
                        <label for="password-confirmE" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar
                            contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirmE" type="password" class="form-control"
                                name="password_confirmationE" required autocomplete="new-password" disabled>
                            <span id="msgPass" role="alert">
                            </span>
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