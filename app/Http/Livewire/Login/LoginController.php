<?php

namespace App\Http\Livewire\Login;


use Livewire\Component;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Component

{
    use GeneralTrait;

    public function mount()
    {

        if (Auth::check()) {


            return \redirect('home');
        }
    }
    public function render()
    {
        return view('livewire.login.login-controller')->extends('login.login');
    }

    public function destroy()
    {
        Session::invalidate();
        Session::regenerateToken();
    }

    public function login()
    {

        $minimo = 3;

        $rules = [
            'datos.user' =>    'required|min:' . $minimo,
            'datos.password' => 'required|min:' . $minimo,
        ];
        $msj = [
            'datos.user.required' => 'el usuario es requerido',
            'datos.password.required' => 'la contraseña es requerida',
            'datos.user.min' => 'el usuario debe tener minimo ' . $minimo . ' caracteres',
            'datos.password.min' => 'la contrase«Ða debe tener minimo ' . $minimo . ' caracteres',

        ];


        $datos = $this->validate($rules, $msj)['datos'];


        if (Auth::attempt($datos)) {
            $user = auth()->user();
            if ($user->status == 1) {
                # code...
                $this->emit('mensaje', ['Bienvenido: ' . \auth()->user()->name, 'success']);


                return \redirect(\route('home'));
                // if ($user->type_user == 4 || $user->type_user == 5) {

                //     return \redirect(\route('venta', ['0', '0', 'WIN']));
                // } elseif ($user->type_user == 6) {

                //     if ($user->logueado == 0) {
                //         # code...
                //         $user->update(['logueado' => 1]);

                //         return \redirect(\route('videos_show'));
                //     } else {
                //         $this->emit('mensaje', ['Usuario ya esta logueado', 'warning']);
                //         return;
                //     }
                // } else {

                //     return \redirect(\route('home'));
                // }
            } else {
                Auth::logout();
                self::destroy();
                $this->emit('mensaje', ['Usuario Desactivado', 'warning']);
            }
        } else {

            $this->emit('mensaje', ['DATOS INCORRECTOS', 'error']);
        }
    }

    public function logout()
    {

        Auth::logout();

        self::destroy();

        return redirect('/');
    }
}