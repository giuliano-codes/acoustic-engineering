<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ["name", "blueprint_path", "blueprint_type"];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }
}
