<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'place';

    const REPAIR = ['ремонт', 'мойка'];

    public function things(){
        return $this->hasMany(Thing::class);
    }
}
