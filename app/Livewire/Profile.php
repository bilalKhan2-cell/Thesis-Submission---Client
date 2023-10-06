<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class Profile extends Component
{
    public $profile = [];
    public $type = '';

    public $current_password,$new_password,$confirm_password;

    public $error,$success;

    protected $rules = [
        'current_password'=>'required',
        'new_password'=>'required|min:10',
        'confirm_password'=>'required'
    ];

    public function render()
    {
        return view('livewire.profile')->layout('components.layouts.app',['title'=>"User Profile"]);
    }

    public function mount()
    {
        $client = new Client();
        
        if (session()->has('supervisor')) {
            $this->type = "supervisor";
            $response = $client->get('localhost:8000/api/profile', [
                'json' => ['id' => session('supervisor')->id, 'type' => $this->type]
            ]);

        } else if (session()->has('team')) {
            $this->type = 'team';
            $response = $client->get('localhost:8000/api/profile', [
                'json' => ['id' => session('team')->id, 'type' => $this->type]
            ]);
        }
        
        $this->profile = json_decode($response->getBody()->getContents());
    }

    private function CheckUserType(){
        if(session()->has('supervisor')){
            return 1;
        }

        if(session()->has('team')){
            return 2;
        }
    }

    public function ChangePassword(){
       
        $this->validate();

        $client = new Client();

        $data = ['current_password'=>$this->current_password,'type'=>$this->CheckUserType(),'uid'=>$this->profile->data->id];

        $response = $client->get('localhost:8000/api/check_current_password',[
            'json'=>$data
        ]);

        //Asd_1212
        $result = json_decode($response->getBody()->getContents());

        if($result->msg=='1'){
            $this->UpdatePasword();
        }

        else {
            $this->error = "Invalid Current Password.";
        }
    }

    private function UpdatePasword(){

        $this->validate();

        if($this->new_password!=$this->confirm_password){
            $this->error = "Password Mismatch..";
        }

        else {
            $client = new Client();

            $data = ['new_password'=>$this->new_password,'type'=>$this->CheckUserType(),'uid'=>$this->profile->data->id];

            $response = $client->get('localhost:8000/api/update_password',[
                'json'=>$data
            ]);

            $result = json_decode($response->getBody()->getContents());

            if($result->msg=='1'){
                $this->success = "Password Updated Successfully..";
            }
        }
    }
}

?>