<?php

namespace App\Http\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class UsuarioController extends Component
{
    use GeneralTrait;
    use WithFileUploads;
    public function render()
    {


        $data = User::whereTypeUser(2)->get();


        return view('livewire.usuario.usuario-controller', compact('data'));
    }

    public function updatedPhoto()
    {
        $this->validate([
            'datos.photo' => 'image|max:1024',
        ]);
    }

    public function agregar_usuario()
    {
        $id = $this->selected_id;
        $ruta = 'storage/';
        $storeAs = 'public/';
        $rule = [

            'datos.name' => 'required|min:3',
            'datos.user' => 'required|min:3|unique:users,user,' . $id,
            'datos.password' => $id > 0 ? 'nullable' : 'required' . '|min:3',
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
        $usuario = User::updateOrCreate(['id' => $id], $datos);
        if ($usuario) {
            if (!empty($photo)) {
                if ($usuario->images->file != null && \file_exists($ruta . $usuario->images->file)) {

                    \unlink($ruta . $usuario->images->file);
                }
                $usuario->images->delete();

                $file =  $usuario->user . '_' . \uniqid() . '.' . $photo->extension();
                $photo->storeAs($storeAs, $file);

                $usuario->images()->create(

                    [

                        'file' => $file,
                        'type_file' => 'imagen usuario'
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




    public function status(User $user)
    {



        if ($user->status) {
            $user->update(['status' => false]);
        } else {
            $user->update(['status' => true]);
        }
    }
}