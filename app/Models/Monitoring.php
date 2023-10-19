<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $fillable = ["timestamp", "nps", "freq_data"];

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    public function measurer()
    {
        return $this->belongsTo(Measurer::class);
    }
}
