<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "Employee";
    
    protected $fillable = [
        'nama','comp_id','email','jk','alamat'
    ];

    public function company() {
        return $this->belongsTo('App\Models\Comp', 'comp_id');
    }
}
