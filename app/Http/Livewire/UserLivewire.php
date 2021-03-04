<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Livewire\Component;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;



class UserLivewire extends Component
{
    use WithPagination;
    use WithFileUploads;

    use AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';

    public $nombres,$apellidos,$telefono,$direccion,$email,$user_id;
    public function render()
    {
        $consulta = DB::table('user_models')->get();

        return view('livewire.user-livewire',[        
            'consultas' => $consulta
        ]);
    }

    public function store()
    {
        $usuario = new UserModel();
        
        $usuario->imagen= $this->imagen;
        $usuario->apellidos= $this->apellidos;
        $usuario->telefono= $this->telefono;
        $usuario->direccion= $this->direccion;
        $usuario->email= $this->email;

        dd($this->direccion.$this->email);
    }


        public function edit($id){
            $this->updateMode = true;
             $user= UserModel::where('id_user',$id)->first();
            $this->user_id = $id;
            $this->nombres = $user->nombres;
            $this->apellidos = $user->apellidos;
            $this->telefono = $user->telefono;
            $this->direccion = $user->direccion;
            $this->email = $user->email;

        }

        public  function update(){
            dd('nombre: '.$this->nombres);
        }

}

/**
 *INSERT INTO `user_models`( `email`, `nombres`, `apellidos`, `telefono`, `direccion`, `imagen_id`) VALUES ('canver@gmail.com','Carlos','Ruiz','321654987','Rosaflorida',1)
 * 
 * INSERT INTO `imagens`( `titulo`, `imagen`) VALUES ('Plan','plan.png')
 *  $this->validate([
            'nombres' => 'required|max:255|min:5',
            'apellidos' => 'required|max:255|min:5',
            'telefono' => 'required|integer',
            'direccion' => 'required|min:5',
            'email' => 'required|min:5|email',
        ]);

        $user= UserModel::where('user_id',$id)->first();

        $user->update([
            'nombres' => $user->nombres,
            'apellidos' => $user->apellidos,
            'telefono' => $user->telefono,
            'direccion' => $user->direccion,
            'email' => $user->email,

        ]);

        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => ''.$this->title.', Fue actualizado con Exito! ']);
        $this->default();
        
 */
