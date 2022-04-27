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
                        <select id="selectAero" class="form-select">

                            @foreach ($aeropuertos as $aeropuerto)
                            <option value="{{ $aeropuerto['id'] }}" selected>{{ $aeropuerto['shortName'] }} -
                                {{
                                $aeropuerto['description'] }}</option>
                            @endforeach

                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAero" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>