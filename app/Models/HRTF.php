<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRTF extends Model
{
    use HasFactory;

    protected $table = 'hrtfs';

    protected $fillable = ['name', 'type', 'path', 'extension', 'samplerate', 'duration', 'azimuth', 'elevation_angle'];

}
