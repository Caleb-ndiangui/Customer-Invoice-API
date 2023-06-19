<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

     protected $fillable =[
            'name',
            'type',
            'email',
            'address',
            'city',
            'state',
            'postal_code'
     ];

    public function invoice(){
        return $this -> hasmany(invoice::class);
    }
}
