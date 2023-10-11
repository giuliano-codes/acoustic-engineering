<?php

namespace App\Http\Controllers;

use App\Models\Measurer;
use Illuminate\Http\Request;

class MeasurerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
        ]);

        $measurer = Measurer::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return $measurer;


    }

    public function addData(Measurer $measurer, Request $request)
    {
        $validated = $request->validate([
            'timestamp' => 'required|date_format:Y-m-d H:i:s',
            'laeq' => 'required|numeric',
            'freq_data.20' => 'required|numeric',
            'freq_data.25' => 'required|numeric',
            'freq_data.31_5' => 'required|numeric',
            'freq_data.40' => 'required|numeric',
            'freq_data.50' => 'required|numeric',
            'freq_data.63' => 'required|numeric',
            'freq_data.80' => 'required|numeric',
            'freq_data.100' => 'required|numeric',
            'freq_data.125' => 'required|numeric',
            'freq_data.160' => 'required|numeric',
            'freq_data.200' => 'required|numeric',
            'freq_data.250' => 'required|numeric',
            'freq_data.315' => 'required|numeric',
            'freq_data.400' => 'required|numeric',
            'freq_data.500' => 'required|numeric',
            'freq_data.630' => 'required|numeric',
            'freq_data.800' => 'required|numeric',
            'freq_data.1000' => 'required|numeric',
            'freq_data.1250' => 'required|numeric',
            'freq_data.1600' => 'required|numeric',
            'freq_data.2000' => 'required|numeric',
            'freq_data.3150' => 'required|numeric',
            'freq_data.4000' => 'required|numeric',
            'freq_data.5000' => 'required|numeric',
            'freq_data.6300' => 'required|numeric',
            'freq_data.8000' => 'required|numeric',
            'freq_data.10000' => 'required|numeric',
            'freq_data.12500' => 'required|numeric',
            'freq_data.16000' => 'required|numeric',
            'freq_data.20000' => 'required|numeric'
        ]);

        $measurer->monitorings()->create([
            'timestamp' => $request->timestamp,
            'laeq' => $request->laeq,
            'freq_data' => json_encode($request->freq_data)
        ]);

        return $measurer->monitorings;
    }
}
