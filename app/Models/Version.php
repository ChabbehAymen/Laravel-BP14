<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->has(Event::class);
    }

    public function sales()
    {
        return $this->has(Salle::class);
    }
}
