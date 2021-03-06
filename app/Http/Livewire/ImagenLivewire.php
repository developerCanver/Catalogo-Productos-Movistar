<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
use Livewire\WithFileUploads;


class ImagenLivewire extends Component
{   
    use WithFileUploads;

    public $titulo,$imagen,$imagen_id,$status;
    public $count,$contadorSelect;
    public $eliminarselect =[];

    public function render()
    {
        $consulta = DB::table('imagens')->get();
        return view('livewire.imagen-livewire',[        
            'consultas' => $consulta
        ]);        
    }

    public function store()
    {
         $this->validate([
        'imagen' => 'required', // 1MB Max
        'titulo' => 'required|min:3',
        'status' => 'required',
         ]);
            //dd($this->status);
        $usuario = new Imagen();
        $usuario->titulo=$this->titulo;
        $usuario->status=$this->status;

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
        $this->status=$user->status;

    }
    public function update()
    {
         $this->validate([
        'imagen' => 'required', // 1MB Max
        'titulo' => 'required',
         ]);
         $img= Imagen::find($this->imagen_id); 

         if (is_file($this->imagen)) {
            $file=$this->imagen;
            $nameImagen = time().$file->getClientOriginalName();            
            $img->imagen=$nameImagen;
            $file->storeAs('img/users/', $nameImagen, 'public_uploads');   
         }else{
            $img->imagen=$this->imagen; 
         }
         
        //$img= Imagen::where('id_imagen',$this->imagen_id)->first();
        
        $img->titulo=$this->titulo;  
        $img->status=$this->status;

              
        
        $img->update();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => ''.$this->titulo.', Fue actualizado con Exito! ']);
 
        $this->cancelar();
        
    }


    public function cancelar(){
        $this->titulo = '';
        $this->imagen = '';
        $this->status = '';
        return redirect('/imagenes');
    }
          //Eliminar
          public  function destroy($id){
            Imagen::destroy($id);            
            $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Eliminado con Exito!  🌝']);
            return redirect('/imagenes');
        }

         //contar selecionados
    public function contSelect($count){            
        $this->contadorSelect=$count;          
    
        }


        //eliminar registros selecionados
        public function destroyselect(){
            Imagen::destroy($this->eliminarselect);
            $this->contadorSelect=0;
            

            $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Eliminados con Exito!  🌝']);
            //dd($this->eliminarselect);
            return redirect('/imagenes');
        }

}