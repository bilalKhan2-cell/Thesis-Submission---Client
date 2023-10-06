<?php

namespace App\Livewire\Supervisor;

use Livewire\Component;
use GuzzleHttp\Client;

class ProcessResult extends Component
{
    public $team_id;

    public $project_id,$project_title;

    public $lead_name,$lead_email,$lead_rollno,$members = [];

    public $marks,$is_edit;

    public $error,$success_message;

    protected $rules = [
        'marks'=>'required|numeric'
    ];

    public function render()
    {
        return view('livewire.supervisor.process-result')
                ->layout('components.layouts.app',['title'=>'Process Thesis Result']);
    }

    public function mount($id){
        $this->team_id = $id;
        $this->GetTeamDetailsAndMembersById();
    }

    private function GetTeamDetailsAndMembersById(){
        $client = new Client();

        $data = ['team_id'=>$this->team_id,'supervisor_id'=>session('supervisor')->id];
        $response = $client->get('localhost:8000/api/process_result',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        $this->lead_name = $result->team_data->team->name;
        $this->lead_email = $result->team_data->team->email;
        $this->lead_rollno = $result->team_data->team->rollno;

        $this->project_id = $result->team_data->team->project_id;
        $this->project_title = $result->team_data->project_title;

        $this->members = $result->team_data->team->members;
        $this->is_edit = $result->team_data->is_marks_edit;

        $this->team_id = $result->team_data->team->id;

        $this->marks = $result->team_data->marks;
    }

    public function AssignMarks(){
        $this->validate();

        if($this->marks<=200){
            
            $client = new Client();
            
            $data= ['marks'=>$this->marks,'team_id'=>$this->team_id];
            
            $response = $client->get('localhost:8000/api/assign_marks',[
                'json'=>$data
            ]);
            
            $result = json_decode($response->getBody()->getContents());
            
            if($result->success){
                $this->success_message = "Result Uploaded Successfully..";
                $this->redirectRoute('supervisor.result_manage');
            }
        }

        else {
            $this->error = "Marks More Than 200 Are Not Applicable..";
        }
    }
}

?>