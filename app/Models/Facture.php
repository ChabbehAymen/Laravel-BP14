<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    public function users(){
        return $this->has(User::class);
    }

    public function versions(){
        return $this->hasOne(Version::class);
    }
}
