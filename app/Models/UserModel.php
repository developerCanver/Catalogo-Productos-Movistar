<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres', 'apellidos', 'telefono', 'direccion', 'email','imagen_id',      
       ];
       protected $primaryKey = 'id_user';
       
}
