<div class="row">


    <div class="col-md-2">
        <div class="form-group">
            <label>Fecha Compra</label>
            <input type="text" name="" id="fechainicio" class="form-control"></div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>dias</label>
            <input wire:model="datos.dias" type="number" name="" class="form-control" pattern="[0-9]+"></div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label>tasa cambio</label>
            <input type="text" wire:model='datos.tasa_cambio' name="" class="form-control"></div>
    </div>

    <div class="col-md-2 ">
        <div class="form-group text-center">
            <label>compras fijas</label>
            <div class="custom-control custom-switch">
                <input wire:change='status()' wire:model.prevent="activo" type="checkbox" class="custom-control-input" id="status">
                <label class="custom-control-label" for="status"></label>
            </div>
        </div>
    </div>
    <div class="col-md-2 ">

        @isset($datos['dias'])

        @if($fi != null&& $datos['dias'] !=null)
        <div class="form-group">
            <label>fecha final</label>
            <input wire:model="datos.f_final" type="text" name="" readonly class="form-control-plaintext border-0"></div>

        @endif
        @endisset
    </div>
    <div class="col-md-2 ">
        <button wire:click.prevent="agregar" class="btn btn-primary mt-2">Agregar </button>
    </div>
    <div class="col-md-12">

        <table>
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Nombre
                        </th>
                        <th style="width:1%">
                            Unidad
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            total
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @isset($carrito)

                    @if (count($carrito)>0)
                    @foreach($carrito as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>

                            <input value="  {{ $value['name']}}" type="text" class="form-control" wire:change="detalles({{ $key }},'name')" wire:model="gastos.{{ $key }}">

                        </td>
                        <td>
                            <input type="text" class="form-control" wire:keyup=''>
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            125

                        </td>
                    </tr>
                    @endforeach
                    @endif

                    @endisset
                </tbody>
            </table>
    </div>
