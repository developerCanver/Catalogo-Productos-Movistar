<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\UserModel;

class InicioLivewire extends Component
{

    public $id_imagen;
    public $nombres,$apellidos,$telefono,$direccion,$email;
    public function render()
    {
        $consulta = DB::table('imagens')->get();
        return view('livewire.inicio-livewire',[        
            'consultas' => $consulta
        ]);
    }
    public function edit($id){     
        $this->id_imagen = $id; 
    }

        public function store()
        {
                /*
                nombres
                apellidos
                telefono
                direccion
                email
                */
            $this->validate([
                'nombres' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'telefono' => 'required|min:3',
                'direccion' => 'required|min:3',
                'email' => 'required|min:3|email',
             ]);
    
            $usuario = new UserModel();
            $usuario->nombres=$this->nombres;
            $usuario->apellidos=$this->apellidos;
            $usuario->telefono=$this->telefono;
            $usuario->direccion=$this->direccion;
            $usuario->email=$this->email;
            $usuario->imagen_id=$this->id_imagen;
            $usuario->save();   
            $this->dispatchBrowserEvent('alert',
                ['type' => 'info',  'message' => 'Registro guardado con Exito!  🌝']);
            $this->cancelar();
            
        }
        public function cancelar(){
            $this->nombres = '';
            $this->apellidos = '';
            $this->telefono = '';
            $this->direccion = '';
            $this->email = '';
            $this->id_imagen ='';
            //return redirect('/usuarios');

       }
        
}

