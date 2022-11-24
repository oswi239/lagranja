<button hidden id="openModal" data-toggle="modal" data-target="#modal-default">

</button>
<div wire:ignore.self class="modal fade" id="modal-default" aria-hidden="true" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog {{ $size_modal }}">
        <div class="modal-content">
            <div class="modal-header {{ $colormodal }}">
                <h4 class="modal-title">{{ $titulo_modal }}</h4>
                <button wire:click='resetear' type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                @isset($accion)

                @if($accion == $accionactiva)

                @include('includes.includesmodal.'.$accion)
                @else
                debes configurar en el general trait el <strong>{{ $accion }} con $accion == $accion</strong>
                @endif
                @endisset


            </div>
            <div class="modal-footer justify-content-between">
                <button wire:click='resetear' type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>


                @if($boton_activo)

                <button type="button" wire:click='{{ $accion }}' class="btn btn-{{ $colorboton }}">{{ $nombreboton }}</button>
                @endif
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@section('scripts')
@include('includes.common.singledaterange')
@endsection
