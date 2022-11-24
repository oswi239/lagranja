<?php

namespace App\Http\Livewire\Empresa;

use App\Models\Empresa;
use App\Traits\GeneralTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmpresaController extends Component
{

    use WithFileUploads;
    use GeneralTrait;


    public function mount()
    {
        $this->datos = Empresa::first()->toArray();
    }
    public function render()
    {

        $data = Empresa::first();

        if ($data) {
            # code...
            $this->selected_id = $data->id;
        } else {
            $this->selected_id = 0;
        }



        return view('livewire.empresa.empresa-controller', compact('data'));
    }

    public function GuardarEmpresa()
    {

        $id = $this->selected_id;
        $ruta = 'storage/';
        $storeAs = 'public/';
        $rule = [

            'datos.name' => 'required|min:3',
            'datos.photo' => 'image|required',

        ];

        $message = [];

        $datos = $this->validate($rule, $message)['datos'];


        if (isset($datos['photo'])) {
            $photo = $datos['photo'];
            unset($datos['photo']);
        }


        $empresa = Empresa::updateOrCreate(['id' => $id], $datos);
        if ($empresa) {
            if (!empty($photo)) {
                if ($empresa->images->file != null && \file_exists($ruta . $empresa->images->file)) {

                    \unlink($ruta . $empresa->images->file);
                }
                $empresa->images->delete();

                $file =  $empresa->name . '_' . \uniqid() . '.' . $photo->extension();
                $photo->storeAs($storeAs, $file);

                $empresa->images()->create(

                    [
                        // 'model_id' => $empresa->id,
                        'file' => $file,
                        'type_file' => 'imagen empresa'
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



        # code...
    }
}