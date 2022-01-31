<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    protected $table = 'thing';

        /**
     * Get the user that owns the thing.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'master');
    }
    public function place(){
        return $this->belongsTo(Place::class);
    }
}
