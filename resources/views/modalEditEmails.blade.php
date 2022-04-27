<div class="modal fade" id="EditEmails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span><i class="fa-solid fa-envelope"></i></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('emailsRegister') }}">
                    @csrf
                    <input type="hidden" id="hdnotify" name="notifyID">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">{{ __('Correos a notificar')
                            }}</label>
                        <textarea class="form-control" id="txtemails" name="emails" rows="3"></textarea>
                    </div>
                    <div class="badge bg-info text-wrap" style="width: 50%;">
                        Separa cada correo utilizando ";"
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