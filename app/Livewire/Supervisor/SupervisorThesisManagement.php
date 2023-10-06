<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use GuzzleHttp\Client;

class SupervisorThesisManagement extends Component
{
    public $teams = [],$err;

    public function render()
    {
        return view('livewire.Supervisor.supervisor-thesis-management')
        ->layout('components.layouts.app',['title'=>'Thesis Management']);
    }

    public function GetTeam(){
        $client = new Client();

        $data = ['supervisor_id'=>session('supervisor')->id];
        $response = $client->get('localhost:8000/api/get_thesis',[
            'json'=> $data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if(count($result->thesis_list)>0) {
            $this->teams = $result->thesis_list;
            $this->dispatch('thesis-fetched');
        }  

        else {
            $this->err = 'No Record Found..';
        }
    }
}

?>