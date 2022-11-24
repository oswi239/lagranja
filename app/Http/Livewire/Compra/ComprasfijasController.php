<?php

namespace App\Http\Livewire\Compra;

use Livewire\Component;
use App\Models\Comprasfija;
use App\Traits\GeneralTrait;

class ComprasfijasController extends Component
{
    use GeneralTrait;
    public function render()
    {
        $data = Comprasfija::get();
        return view('livewire.compra.comprasfijas-controller', compact('data'));
    }
    public function compra_fija()
    {
        $id = $this->selected_id;
        $rule = [

            'datos.name' => 'required|min:3',


        ];

        $message = [];

        $datos = $this->validate($rule, $message)['datos'];

        $empresa = Comprasfija::updateOrCreate(['id' => $id], $datos);


        if ($id > 0) {
            $mensaje = 'Editado Correctamente';
        } else {
            $mensaje = 'Creado Correctamente';
        }
        $this->emit('mensaje', [$mensaje, 'success']);
        $this->cerrarModal();
    }
}