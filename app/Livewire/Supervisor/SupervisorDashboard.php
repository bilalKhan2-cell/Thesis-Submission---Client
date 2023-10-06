<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use GuzzleHttp\Client;

class SupervisorDashboard extends Component
{
    public $total;

    public function render()
    {
        return view('livewire.Supervisor.supervisor-dashboard')
        ->layout('components.layouts.app',['title'=>'Supervisor - Dashboard']);
    }

    public function mount(){
        $client = new Client();

        $data = ['supervisor_id'=>session('supervisor')->id];
        $response = $client->get('localhost:8000/api/supervisor',[
            'json' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if($result){
            $this->total = count($result->data);
        }
    }
}

?>