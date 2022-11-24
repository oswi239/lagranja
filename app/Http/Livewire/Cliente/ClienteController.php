<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use App\Traits\GeneralTrait;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Component
{
    use GeneralTrait;
    use WithFileUploads;
    public function render()
    {

        $data = Cliente::get();
        return view('livewire.cliente.cliente-controller', compact('data'));
    }

    public function agregar_cliente()
    {
        $id = $this->selected_id;
        $ruta = 'storage/';
        $storeAs = 'public/';
        $rule = [

            'datos.name' => 'required|min:3',
            'datos.documento' => 'required|min:3|unique:clientes,documento,' . $id,
            'datos.telefono' => 'nullable|min:3|unique:clientes,documento,' . $id,
            'datos.direccion' => 'nullable',
            'datos.photo' => 'image|nullable',

        ];

        $message = [];

        $datos = $this->validate($rule, $message)['datos'];

        $datos['type_user'] = 2;
        if (isset($datos['photo'])) {
            $photo = $datos['photo'];
            unset($datos['photo']);
        }

        if (isset($datos['password'])) {
            $datos['password_view'] = $datos['password'];
            $datos['password'] = Hash::make($datos['password']);
        }
        $cliente = Cliente::updateOrCreate(['id' => $id], $datos);
        if ($cliente) {
            if (!empty($photo)) {
                if ($cliente->images->file != null && \file_exists($ruta . $cliente->images->file)) {

                    \unlink($ruta . $cliente->images->file);
                }
                $cliente->images->delete();

                $file =  $cliente->name . '_' . $cliente->documento . '_' . \uniqid() . '.' . $photo->extension();
                $photo->storeAs($storeAs, $file);

                $cliente->images()->create(

                    [
                        // 'model_id' => $cliente->id,
                        'file' => $file,
                        'type_file' => 'imagen cliente'
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