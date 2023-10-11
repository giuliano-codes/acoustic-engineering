<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurer extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "location"];

    public function monitorings()
    {
        return $this->hasMany(Monitoring::class);
    }
}
