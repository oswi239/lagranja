<div class="row">
    <div class="col-12">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model='datos.name' class="form-control  @error('datos.name') border-danger @enderror" placeholder="Nombre">

            @error('datos.name') @include('includes.common.mensaje') @enderror
        </div>
    </div>

    <div class="col-6">

        <div class="form-group">
            <label for="exampleInputEmail1">Documento</label>
            <input type="text" wire:model='datos.documento' class="form-control  @error('datos.documento') border-danger @enderror" placeholder="Documento">

            @error('datos.documento') @include('includes.common.mensaje') @enderror
        </div>

    </div>
    <div class="col-6">

        <div class="form-group">
            <label for="exampleInputEmail1">Telefono</label>
            <input type="text" wire:model='datos.telefono' class="form-control  @error('datos.telefono') border-danger @enderror" placeholder="Telefono">

            @error('datos.telefono') @include('includes.common.mensaje') @enderror
        </div>

    </div>

</div>


<div class="form-group">
    <label>Direccion</label>
    <input type="text" wire:model='datos.direccion' class="form-control   @error('datos.direccion') border-danger @enderror" placeholder="Direccion">

    @error('datos.direccion')

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
    <label for="exampleFormControlFile1">Selecciona una imagen</label>
    <input wire:model='datos.photo' type="file" class="form-control-file" id="exampleFormControlFile1">
</div>
@endif
@endisset
