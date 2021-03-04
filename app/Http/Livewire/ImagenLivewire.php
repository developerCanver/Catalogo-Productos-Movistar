<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
class ImagenLivewire extends Component
{   

    public $titulo,$imagen;

    public function render()
    {
        $consulta = DB::table('imagens')->get();

        return view('livewire.imagen-livewire',[        
            'consultas' => $consulta
        ]);
        
    }
/*id_imagen   titulo imagen*/
    public function store()
    {
        $usuario = new Imagen();
        $usuario->name=$this->titulo;
        $usuario->imagen= $this->imagen;
       
        dd($this->imagen.$this->titulo);

        $this->cancelar();
    }

    public function edit($id){
        $this->updateMode = true;
         $user= Imagen::where('id_imagen',$id)->first();
        $this->imagen_id = $id;
        $this->titulo = $user->titulo;
        $this->imagen = $user->imagen;
        
       
    }
    public function cancelar(){
        $this->titulo = '';
        $this->imagen = '';
    }
}
