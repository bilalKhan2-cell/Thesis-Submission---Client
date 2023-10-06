<?php

namespace App\Livewire\Team;

use Livewire\Component;
use GuzzleHttp\Client;

class ThesisStatus extends Component
{
    public $supervisor_id,$supervisor_name,$thesis_title,$thesis_remarks,$thesis_file,$supervisor_comments;

    public $empty;

    public function mount() {
        $client = new Client();

        $data = [
            'team_id' => session('team')->id
        ];

        $response = $client->get('localhost:8000/api/thesis_remarks',[
            'json'=>$data
        ]);

        $result = json_decode($response->getBody()->getContents());

        if($result!=null){
            $this->supervisor_id = 'SPR-'.$result->data->supervisor->id;
            $this->supervisor_name = $result->data->supervisor->name;
            $this->thesis_title = $result->data->project_title;
            $this->thesis_remarks = $result->data->thesis_status;
            $this->thesis_file = $result->data->thesis_file;

            $this->supervisor_comments = $result->data->comments;
        }

        else {
            $this->empty = 'Please Upload Your Thesis First..';
        }
    }

    public function render()
    {
        return view('livewire.Team.thesis-status')
        ->layout('components.layouts.app',['title'=>'Check Thesis Status']);
    }

    public function DownloadThesis($fileName){
        $filePath = storage_path('app/uploads/' . $fileName);

        return response()->download($filePath);   
    }
}

?>