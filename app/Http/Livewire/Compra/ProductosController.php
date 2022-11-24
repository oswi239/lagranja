<?php

namespace App\Http\Livewire\Compra;

use App\Models\Producto;
use App\Traits\GeneralTrait;
use Livewire\Component;

class ProductosController extends Component
{
    use GeneralTrait;
    public function render()
    {

        $data = Producto::get();

        return view('livewire.compra.productos-controller', compact('data'));
    }


    public function productos()
    {

        if (isset($this->datos['existencia'])) {
            if ($this->datos['existencia'] == '') {
                unset($this->datos['existencia']);
            }
        }
        if (isset($this->datos['min_existencia'])) {
            if ($this->datos['min_existencia'] == '') {
                unset($this->datos['min_existencia']);
            }
        }


        $id = $this->selected_id;
        $ruta = 'storage/';
        $storeAs = 'public/';
        $rule = [

            'datos.descripcion' => 'required|min:3',
            'datos.existencia' => 'numeric|nullable',
            'datos.min_existencia' => 'numeric|nullable',

            'datos.photo' => 'image|nullable',

        ];

        $message = [];

        $datos = $this->validate($rule, $message)['datos'];

        if (isset($datos['photo'])) {
            $photo = $datos['photo'];
            unset($datos['photo']);
        }


        $producto = Producto::updateOrCreate(['id' => $id], $datos);
        if ($producto) {
            if (!empty($photo)) {
                if ($producto->images->file != null && \file_exists($ruta . $producto->images->file)) {

                    \unlink($ruta . $producto->images->file);
                }
                $producto->images->delete();

                $file =  $producto->descripcion . '_' . \uniqid() . '.' . $photo->extension();
                $photo->storeAs($storeAs, $file);

                $producto->images()->create(

                    [
                        // 'model_id' => $producto->id,
                        'file' => $file,
                        'type_file' => 'imagen producto'
                    ]
                );
            }
        }

        if ($id > 0) {
            $mensaje = 'Editado Correctamente';
        } else {
            $mensaje = 'Creado Correctamente';
        }
        $this->emit('mensaje', [$mensaje, 'success']);
        $this->cerrarModal();
    }
}