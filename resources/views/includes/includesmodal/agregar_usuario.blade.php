<div class="form-group">
    <label>Nombre</label>
    <input type="text" wire:model='datos.name' class="form-control  @error('datos.name') border-danger @enderror" placeholder="Nombre">

    @error('datos.name') @include('includes.common.mensaje') @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" wire:model='datos.user' class="form-control  @error('datos.user') border-danger @enderror" placeholder="Usuario">

    @error('datos.user') @include('includes.common.mensaje') @enderror
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" wire:model='datos.password' class="form-control   @error('datos.password') border-danger @enderror" placeholder="Contraseña">

    @error('datos.password')

    @include('includes.common.mensaje')
    @enderror
</div>
<div class="form-check">
    <input wire:model='conimagen' type="checkbox" class="form-check-input">
    <label class="form-check-label" for="exampleCheck1" wire:click="conimagen()">con imagen?</label>
</div>

@isset($conimagen)
@if($conimagen)

<div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input wire:model='datos.photo' type="file" class="form-control-file" id="exampleFormControlFile1">
</div>
@endif
@endisset
