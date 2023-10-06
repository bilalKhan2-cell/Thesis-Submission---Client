<?php

namespace App\Livewire\Team;

use Livewire\Component;
use GuzzleHttp\Client;

class CheckResult extends Component
{
    public $result_data;

    public function render()
    {
        return view('livewire.Team.check-result')
        ->layout('components.layouts.app',['title'=>'Check Thesis Result']);
    }

    public function mount(){
        $client = new Client();

        $response = $client->get('localhost:8000/api/fetch_result',[
            'json'=>['team_id'=>session('team')->id]
        ]);
        
        $this->result_data = json_decode($response->getBody()->getContents());
    }
}
