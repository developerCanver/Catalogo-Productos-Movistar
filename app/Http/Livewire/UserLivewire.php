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

    public $contadorSelect,$count;
    public $eliminarselect =[];
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
/*
nombres
apellidos
telefono
direccion
email
*/

        public  function update(){
            $this->validate([
            'nombres' => 'required|min:3', 
            'apellidos' => 'required|min:3', 
            'telefono' => 'required|min:3', 
            'direccion' => 'required|min:3', 
            'email' => 'required|min:3', 
         ]);
        $user = UserModel::find($this->user_id);
        $user->update([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'email' => $this->email,
        ]);
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => ''.$this->nombres.', Fue actualizado con Exito! ']);
        $this->cancel();

        }

        public function cancel(){
             $this->nombres = '';
             $this->apellidos = '';
             $this->telefono = '';
             $this->direccion = '';
             $this->email = '';
             return redirect('/usuarios');

        }

      

        //Eliminar
        public  function destroy($id){
            UserModel::destroy($id);            
            $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Eliminado con Exito!  🌝']);
            return redirect('/usuarios');
        }

         //contar selecionados
    public function contSelect($count){            
        $this->contadorSelect=$count;          
    
        }


        //eliminar registros selecionados
        public function destroyselect(){
            UserModel::destroy($this->eliminarselect);
            $this->contadorSelect=0;
            

            $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Eliminados con Exito!  🌝']);
            //dd($this->eliminarselect);
            return redirect('/usuarios');
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
