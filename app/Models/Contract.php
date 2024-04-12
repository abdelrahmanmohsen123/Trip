<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(client::class);

    }

    public function trips(){
        return $this->hasMany(Trip::class);

    }

}
