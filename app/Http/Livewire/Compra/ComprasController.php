<?php

namespace App\Http\Livewire\Compra;

use Carbon\Carbon;
use App\Models\Compra;
use Livewire\Component;
use App\Models\Comprasfija;
use App\Traits\CarritoTrait;
use Illuminate\Support\Arr;
use App\Traits\GeneralTrait;

class ComprasController extends Component
{
    use GeneralTrait;
    use CarritoTrait;
    public $mostrar = false, $activo = false, $carrito;


    public function mount()
    {
        $this->limpiarCarrito();
    }
    public function render()
    {

        if ($this->fi) {
            $fi = $this->fi;
        } else {
            $fi = Carbon::now();
        }


        if ($fi && isset($this->datos['dias'])) {
            $this->fi = $fi;
            $this->datos['f_final'] = Carbon::create($fi)->addDays($this->datos['dias'])->format(('d/m/Y'));
        }


        $carrito  = $this->obtenerCarrito();


        $this->carrito = $carrito;



        $data = Compra::get();
        return view('livewire.compra.compras-controller', compact('data'));
    }


    public function compra()
    {

        if (isset($this->datos)) {


            if (isset($this->datos['f_inicio'])) {
                if ($this->datos['f_inicio'] == '') {
                    unset($this->datos['f_inicio']);
                } else {
                    $this->datos['f_inicio'] = $this->fi;
                }
            }
            if (isset($this->datos['f_final'])) {
                if ($this->datos['f_final'] == '') {
                    unset($this->datos['f_final']);
                } else {
                    $this->datos['f_final'] = Carbon::createFromFormat('d/m/Y',  $this->datos['f_final'])->format('Y-m-d');
                }
            }
            if (isset($this->datos['tasa_cambio'])) {
                if (!is_numeric($this->datos['tasa_cambio'])) {
                    unset($this->datos['tasa_cambio']);
                }
            }


            dd($this->datos, $this->gastos);
        }
    }


    // public function dehydrate()
    // {
    //     $this->datos;
    //     $this->fi;
    // }


    public function status()
    {
        $activo = $this->activo;

        $compra =  Comprasfija::get();
        if ($activo) {
            foreach ($compra as $key => $value) {
                $this->agregarAlCarrito($value->name);
            }
        } else {

            $this->limpiarCarrito();
        }
    }



    public function detalles($key, $tipo)
    {

        if (isset($this->gastos)) {


            # code...
            foreach ($this->gastos as $key2 => $value) {
                if ($tipo == 'name') {


                    if ($key == $key2) {


                        $valor = $value;
                    }
                }
                $this->agregarAlCarrito($valor, $tipo, $valor, $key);
            }
        }
    }


    public function agregar()
    {
        $this->agregarAlCarrito();
    }
}