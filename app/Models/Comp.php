<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comp extends Model
{

    public $table = "comps";
    
    public function employee() {
        return $this->hasMany('App\Models\Employee');
    }

    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'logo', 'website','alamat',
    ];

   
}
