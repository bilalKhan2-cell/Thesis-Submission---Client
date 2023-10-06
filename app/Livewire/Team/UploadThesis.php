<?php

namespace App\Livewire\Team;

use Livewire\Component;
use GuzzleHttp\Client;
use Livewire\WithFileUploads;

class UploadThesis extends Component
{
    use WithFileUploads;

    public $supervisor_id,$supervisor_name,$supervisor_email,$thesis_exists=[];

    public $thesis_title,$thesis_description,$thesis_file;

    public $is_edit_allowed;

    protected $rules = [
        'thesis_title'=>'required|max:100',
        'thesis_description'=>'required',
        'thesis_file'=>'required|mimes:doc,docx'
    ];

    public function render()
    {
        return view('livewire.Team.upload-thesis')
        ->layout('components.layouts.app',['title'=>'Thesis Submission Portal.']);
    }

    public function mount() {
        $client = new Client();

        $data = ['team_id'=>session('team')->id];
        $response = $client->get('localhost:8000/api/get_supervisor',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        $this->supervisor_id = 'SPR-'.$result->data->supervisor->id;
        $this->supervisor_email = $result->data->supervisor->email;
        $this->supervisor_name = $result->data->supervisor->name;

        $this->thesis_exists = $result->exists;

        if(($result->exists)){
            $this->thesis_title = $result->exists->project_title;
            $this->thesis_description = $result->exists->project_description;
            $this->thesis_file = $result->exists->thesis_file;
        
            if($result->exists->thesis_status==2 || $result->exists->thesis_status==0){
                $this->is_edit_allowed = 0;
            }

            else {
                $this->is_edit_allowed = 1;
            }
        }
        
        else  {
            if(is_null($result->exists)) {
                $this->is_edit_allowed = 0;
            }

            else {
                $this->is_edit_allowed = 1;
            }       
        }
    }

    public function ThesisUpload(){

        $this->validate();

        $fileName = uniqid(str_replace(" ","",session('team')->departments->name)).'_'.'.'.$this->thesis_file->getClientOriginalExtension();
        $this->thesis_file->storeAs('uploads',$fileName);
        
        $client = new Client();

        $data = [
            'team_id'=>session('team')->id,
            'supervisor_id'=>preg_replace("/[^0-9]/", "", $this->supervisor_id),
            'project_title'=>$this->thesis_title,
            'project_description'=>$this->thesis_description,
            'thesis_file'=>$fileName
        ];

        $respone = $client->get('localhost:8000/api/upload_thesis',[
            'json'=>$data
        ]);

        $result = json_decode($respone->getBody()->getContents());

        if($result->data=='1'){
            session()->flash('upload-success','Thesis Uploaded Successfully..');
            redirect()->route('team.dashboard');
        }

    }
}

?>