<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
