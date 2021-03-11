<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NotificationLivewire extends Component
{
    public function render()
    {
        $consulta = DB::table('user_models')->get();

        return view('livewire.notification-livewire',[        
            'consultas' => $consulta
        ]);
    }
}
