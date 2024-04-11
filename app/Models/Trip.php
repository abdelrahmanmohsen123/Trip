<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contract(){
        return $this->belongsTo(contract::class);

    }

    public function trips(){
        return $this->hasMany(client::class);

    }

}
