<?php

namespace App\Livewire\Team;

use Hash;
use Livewire\Component;
use GuzzleHttp\Client;

class TeamLogin extends Component
{
    public $err,$email,$password;

    protected $rules = [
        'email'=>'required|email',
        'password'=>'required'
    ];

    public function LoginUser(){

        $this->validate();

        $client = new Client();
        $data = ['email'=>$this->email,'pasword'=>($this->password)];
        
        $request = $client->get('localhost:8000/api/team/login',[
            'json'=>$data
        ]);

        $result = json_decode($request->getBody()->getContents());

        if($result->data=='0'){
            $this->err = "Invalid Login Credentials Provided..";
        }
        
        else {
            session()->put('team',$result->data);
            session()->put('team_routes',$result->routes);
            redirect()->route('team.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.Team.team-login')->layout('components.layouts.login',['title'=>'Login - Team Lead']);
    }
}

?>