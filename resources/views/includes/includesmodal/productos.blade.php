<div class="form-group">
    <label>Descripcion</label>
    <input id="focus" type="text" wire:model='datos.descripcion' class="form-control  @error('datos.descripcion') border-danger @enderror" placeholder="Descripcion">

    @error('datos.descripcion') @include('includes.common.mensaje') @enderror
</div>
@if(auth()->user()->type_user == 1)

<div class="form-group">
    <label>Existencia</label>
    <input id="focus" type="text" wire:model='datos.existencia' class="form-control  @error('datos.existencia') border-danger @enderror" placeholder="Existencia">

    @error('datos.existencia') @include('includes.common.mensaje') @enderror
</div>
<div class="form-group">
    <label>existencia minima</label>
    <input id="focus" type="text" wire:model='datos.min_existencia' class="form-control  @error('datos.min_existencia') border-danger @enderror" placeholder="Nombre">

    @error('datos.min_existencia') @include('includes.common.mensaje') @enderror
</div>
@endif
