<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ["name", "type", "path", "extension", "samplerate", "duration"];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
