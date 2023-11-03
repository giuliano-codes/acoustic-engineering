<?php

namespace App\Livewire\Measurer;

use App\Models\Measurer;
use App\Models\Monitoring;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On; 

class Show extends Component
{
    public $name;
    public $location;
    public $id;
    public $query = array(
        'start_date' => '',
        'end_date' => ''
    );
    public $freq_data;
    public $time_data;
    public $count = array();

    public function mount($id)
    {
        $this->query['start_date'] = Carbon::now()->format('Y-m-d');
        $this->query['end_date'] = Carbon::now()->format('Y-m-d');
        $this->id = $id;
        $measurer = Measurer::find($id);

        $this->name = $measurer['name'];
        $this->location = $measurer['location'];

        $this->updateData();

    }

    #[On('updateData')]
    public function updateData()
    {
        $sum_log_data = function($carry, $item)
        {
            if (is_null($carry)) {
                $carry = json_decode($item['freq_data'], true);

                foreach ($carry as $key => $data) {
                    $carry[$key] = 10**($data/10);
                };

                return $carry;
            } else {
                $new_data = json_decode($item['freq_data'], true);

                foreach ($carry as $key => $data) {
                    $carry[$key] += 10**($new_data[$key]/10);
                };

                return $carry;
            }
        };

        $monitorings = Monitoring::where('measurer_id', $this->id)->whereBetween('timestamp', [$this->query['start_date']." 00:00:00", $this->query['end_date']." 23:59:59"])->orderBy('timestamp')->get()->toArray();
        $this->count = count($monitorings);

        $this->time_data['datas'] = array();

        foreach ($monitorings as $monitoring) {
            $this->time_data['datas'][] = array('x' => $monitoring['timestamp'], 'y' => $monitoring['nps']);
        }

        $count_data = count($monitorings);
        $log_sum = array_reduce($monitorings, $sum_log_data);
        $freq_data = array();

        if (is_array($log_sum)) {
            foreach ($log_sum as $key => $data) {
                $freq_data[$key] = 10*log10($data/$count_data);
            }

            $this->freq_data = array(
                $freq_data['20'],
                $freq_data['25'],
                $freq_data['31_5'],
                $freq_data['40'],
                $freq_data['50'],
                $freq_data['63'],
                $freq_data['80'],
                $freq_data['100'],
                $freq_data['125'],
                $freq_data['160'],
                $freq_data['200'],
                $freq_data['250'],
                $freq_data['315'],
                $freq_data['400'],
                $freq_data['500'],
                $freq_data['630'],
                $freq_data['800'],
                $freq_data['1000'],
                $freq_data['1250'],
                $freq_data['1600'],
                $freq_data['2000'],
                $freq_data['2500'],
                $freq_data['3150'],
                $freq_data['4000'],
                $freq_data['5000'],
                $freq_data['6300'],
                $freq_data['8000'],
                $freq_data['10000'],
                $freq_data['12500'],
                $freq_data['16000'],
                $freq_data['20000']
            );
    
            $this->dispatch('create-chart', data: $this->freq_data, time_data: $this->time_data);
        }
    }

    public function render()
    {
        return view('livewire.measurer.show')->layout('layouts.guest');
    }
}
