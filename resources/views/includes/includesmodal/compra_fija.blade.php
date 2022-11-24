<div class="form-group">
    <label>Nombre</label>
    <input id="focus" type="text" wire:model='datos.name' class="form-control  @error('datos.name') border-danger @enderror" placeholder="Nombre">

    @error('datos.name') @include('includes.common.mensaje') @enderror
</div>
