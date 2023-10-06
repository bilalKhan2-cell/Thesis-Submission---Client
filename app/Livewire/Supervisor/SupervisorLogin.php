<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use GuzzleHttp\Client;

class SupervisorLogin extends Component
{
    public $email,$password;

    public $err;

    protected $rules = [
        'email'=>'required|email',
        'password'=>'required'
    ];

    public function render()
    {
        return view('livewire.Supervisor.supervisor-login')->layout('components.layouts.login',['title'=>'Login - Supervisor']);
    }

    public function LoginUser(){

        $client = new Client();

        $data = ['email'=>$this->email,'password'=>bcrypt($this->password)];
        $response = $client->get('localhost:8000/api/supervisor/login',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if($result->data=='0'){
            $this->err = "Invalid Login Credentials Provided..";
        }

        else {
            session()->put('supervisor',$result->data);
            session()->put('supervisor_routes',$result->routes);
            redirect()->route('supervisor.dashboard');
        }
    }
}

?>