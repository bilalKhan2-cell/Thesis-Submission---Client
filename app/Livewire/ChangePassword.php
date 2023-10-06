<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use GuzzleHttp\Client;

class ChangePassword extends Component
{
    public $err, $user_type, $data;
    public $current_password, $new_password, $confirm_password;
    public function render()
    {
        return view('livewire.change-password')->layout('components.layouts.login', ['title' => "Change Password"]);
    }

    public function mount()
    {
        if (Session::has('team')) {
            $this->user_type = 1;
            $this->data = session()->get('team');
        }

        if (Session::has('supervisor')) {
            $this->user_type = 2;
            $this->data = session()->get('supervisor');
        }
    }

    public function ChangePassword()
    {
        if ($this->new_password != $this->confirm_password) {
            $this->err = "Password Mistmach..";
        } else {
            $client = new Client();
            $data = ['current_password' => $this->current_password, 'new_password' => $this->new_password, 'confirm_password' => $this->confirm_password, 'user_type' => $this->user_type, 'user_id' => $this->data->id];
            $response = $client->get('localhost:8000/api/change_password', [
                'json' => $data
            ]);

            $result = json_decode($response->getBody()->getContents());

            if ($result->comp == '0') {
                $this->err = "Invalid Current Password..";
            } else {
                $this->redirectRoute('teams.login');
            }
        }
    }
}

?>