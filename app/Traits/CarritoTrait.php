<?php

namespace App\Traits;


use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\ErrorHandler\Collecting;

trait CarritoTrait
{

    protected  $cart;

    public function __construct()
    {

        if (\session()->has('cart')) {

            $this->cart = \session('cart');
        } else {
            $this->cart = [];
        }
    }
    public function obtenerCarrito()
    {


        return $this->cart;
    }

    public function save()
    {

        \session()->put('cart', $this->cart);
        \session()->save();
    }
    public function limpiarCarrito()
    {

        session()->forget('cart');
        $this->cart = [];
        $this->save();
    }

    public function agregarAlCarrito($name = '', $tipo = '', $monto = 0, $key = null)
    {
        if ($key) {
            # code...
            unset($this->cart[$key]);
        }


        $pre = ['name' => $name];


        $this->cart[] = $pre;
        $this->save();
    }
}