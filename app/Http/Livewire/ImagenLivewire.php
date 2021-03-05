<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
use Livewire\WithFileUploads;


class ImagenLivewire extends Component
{   
    use WithFileUploads;

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
         $this->validate([
        'imagen' => 'required', // 1MB Max
        'titulo' => 'required',
     ]);

        $usuario = new Imagen();
        $usuario->titulo=$this->titulo;

        $file=$this->imagen;
        $name = time().$file->getClientOriginalName();
        $usuario->imagen=$name;
        $file->storeAs('img/users/', $name, 'public_uploads');
        
        $usuario->save();   
        $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Registro guardado con Exito!  🌝']);
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
        return redirect('/imagenes');
    }
}