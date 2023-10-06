<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use GuzzleHttp\Client;

class SupervisorThesisResult extends Component
{
    public $batch,$teams;

    protected $rules = [
        'batch'=>'required|numeric'
    ];
    public function render()
    {
        return view('livewire.Supervisor.supervisor-thesis-result')
        ->layout('components.layouts.app',['title'=>'Manage Thesis Result']);
    }

    public function GetApprovedThesis(){

        $this->validate();

        $client = new Client();

        $data = ['batch'=>$this->batch,'supervisor_id'=>session('supervisor')->id,'department'=>session('supervisor')->department];

        $response = $client->get('localhost:8000/api/get_approved_thesis',[
            'json'=>$data
        ]);
        
        $result = json_decode($response->getBody()->getContents());

        $this->teams = $result->data;
    }
}

?>