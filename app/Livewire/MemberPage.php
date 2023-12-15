<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class MemberPage extends Component
{
    public $roll_no,$info = [],$show = true;
    protected $rules = [
        'roll_no' => "required"
    ];

    protected $messages = [
        'roll_no.required' => "Please Enter Your Roll No."
    ];

    public function render()
    {
        return view('livewire.member-page')->layout('components.layouts.login',['title' => "Team Members"]);
    }

    public function get_info(){

        $this->validate();

        $client = new Client();

        $data = ['roll_no' => $this->roll_no];
        $response = $client->get('localhost:8000/api/member/info',[
            'json' => $data
        ]);

        $rec = json_decode($response->getBody()->getContents());
        array_push($this->info,$rec);
    }
}
