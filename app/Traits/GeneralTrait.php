<?php

namespace App\Traits;

use App\Models\Cliente;
use App\Models\Comprasfija;
use App\Models\Producto;
use App\Models\User;

/**
 * 
 */
trait GeneralTrait
{



    public $datos, $gastos, $size_modal, $colormodal, $titulo_modal, $boton_activo, $selected_id, $accionactiva, $colorboton, $accion, $nombreboton, $conimagen = false, $fi, $ff, $vista = 1;


    public function open_modal($id, $accion)
    {
        $nombreboton = 'Guardar';
        $colorboton = 'primary';
        $accionactiva = null;
        $boton_activo = true;
        $titulo_modal = 'no esta configurado en general trait';
        $colormodal = null;
        $size_modal = null;
        if ($accion == 'agregar_usuario') {

            $titulo_modal = 'Agregar Nuevo Usuario';

            $colormodal = 'bg-primary';
            if ($id > 0) {



                $user = User::find($id);
                $titulo_modal = 'Editar ' . $user->name;
                $colorboton = 'success';
                $colormodal = 'bg-success';

                $this->datos = $user->toArray();
            }




            $accionactiva = $accion;
        } elseif ($accion == 'agregar_cliente') {

            $titulo_modal = 'Registrar Cliente';

            $colormodal = 'bg-primary';
            if ($id > 0) {
                $cliente = Cliente::find($id);
                $titulo_modal = 'Editar ' . $cliente->name;
                $colorboton = 'success';
                $colormodal = 'bg-success';

                $this->datos = $cliente->toArray();
            }




            $accionactiva = $accion;
        } elseif ($accion == 'compra_fija') {

            $titulo_modal = 'Registrar Gasto Fijo';
            $colormodal = 'bg-primary';
            if ($id > 0) {
                $cfija = Comprasfija::find($id);
                $titulo_modal = 'Editar ' . $cfija->name;
                $colorboton = 'success';
                $colormodal = 'bg-success';

                $this->datos = $cfija->toArray();
            }
            $accionactiva = $accion;
        } elseif ($accion == 'productos') {

            $titulo_modal = 'Registrar Producto';
            $colormodal = 'bg-primary';
            if ($id > 0) {
                $producto = Producto::find($id);
                $titulo_modal = 'Editar ' . $producto->name;
                $colorboton = 'success';
                $colormodal = 'bg-success';

                $this->datos = $producto->toArray();
            }
            $accionactiva = $accion;
        } elseif ($accion == 'compra') {
            $titulo_modal = 'Registrar Compra';
            $colormodal = 'bg-primary';
            $size_modal = 'modal-lg';
            $accionactiva = $accion;
        } else {
            # code...
        }


        $this->selected_id = $id;
        $this->accion = $accion;
        $this->boton_activo = $boton_activo;
        $this->accionactiva = $accionactiva;
        $this->titulo_modal = $titulo_modal;
        $this->nombreboton = $nombreboton;
        $this->colorboton = $colorboton;
        $this->colormodal = $colormodal;
        $this->size_modal = $size_modal;
        $this->emit('modal', 'show');
    }

    public function resetear()
    {

        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        # code...
    }

    public function cerrarModal()
    {
        $this->emit('modal', 'hide');
    }

    public function conimagen()
    {
        if ($this->conimagen) {
            $this->conimagen = false;
        } else {
            $this->conimagen = true;
        }

        if (isset($this->datos['photo'])) {
            # code...
            unset($this->datos['photo']);
        }
    }
}