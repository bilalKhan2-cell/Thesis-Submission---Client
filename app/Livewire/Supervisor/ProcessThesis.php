<?php

namespace App\Livewire\Supervisor;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use GuzzleHttp\Client;

class ProcessThesis extends Component
{
    public $team_thesis,$team_id,$thesis_action;
    
    public $supervisor_comments,$thesis_status;

    public function render()
    {
        return view('livewire.supervisor.process-thesis')
        ->layout('components.layouts.app',['title'=>'Process Thesis Status']);
    }

    public function setAction($action){
        if($action=='revert'){
            $this->thesis_action = 1;
        }

        else if($action=='approve'){
            $this->thesis_action = 2;
        }
        // $this->thesis_action = $action;
    }

    public function mount($id){
        $this->team_id = $id;
        $client = new Client();

        $data = ['team_id'=>$id];
        $response = $client->get('localhost:8000/api/process_thesis',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if(($result->team_thesis)){
            $this->team_thesis = $result->team_thesis;
        }

        else {
            $this->redirectRoute('supervisor.dashboard');
        }
    }

    public function DownloadThesis($fileName){
        $filePath = storage_path('app/uploads/' . $fileName);

        return response()->download($filePath);   
    }

    public function UpdateThesisStatus(){
        $client = new Client();
        $data = ['team_id'=>$this->team_id,'thesis_status'=>$this->thesis_action,'comments'=>$this->supervisor_comments];

        $response = $client->get('localhost:8000/api/process_thesis_data',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if($result) {
            session()->flash('thesis-status','Thesis Status Successfully Uploaded..');
            $this->redirectRoute('supervisor.dashboard');
        }

    }
}

?>