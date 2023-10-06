<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'Thesis Approval/Revert Panel',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Thesis Approval/Revert Panel</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <span>Team ID:</span>
                </div>

                <div class="col-sm-3">
                    <span>TEAM-{{ $team_thesis->team_id }}</span>
                </div>

                <div class="col-sm-2">
                    <span> Team Leader Name: </span>
                </div>

                <div class="col-sm-3">
                    <span> {{ $team_thesis->team->name }} </span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <span>Roll No:</span>
                </div>

                <div class="col-sm-3">
                    <span>{{ $team_thesis->team->rollno }}</span>
                </div>
            </div>

            <br />
            <div class="row">
                <div class="col-sm-2">
                    <span>Project Title:</span>
                </div>
    
                <div class="col-sm-3">
                    <span>{{ $team_thesis->project_title }}</span>
                </div>
            </div>
    
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <span>Thesis File:</span>
                </div>

                <div class="col-sm-3">
                        <i class="bx bxs-file-doc mb-1"></i>
                        <button class="btn text-primary btn-light border-0" wire:click="DownloadThesis('{{$team_thesis->thesis_file}}')">
                         {{ ucwords('thesis file') }}
                            {{-- Thesis File --}}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Project Description</h5>
        <div class="card-body">
            <span> {{ $team_thesis->project_description }}</span>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header"></h5>
        <div class="card-body">
            <form wire:submit="UpdateThesisStatus">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Enter Comments: </label>
                        <input type="text" wire:model="supervisor_comments" class="form-control" />
                    </div>
                </div>
                @if($team_thesis->thesis_status==0)
                    <div class="col-sm-4 mt-3">
                        <button type="submit" wire:click="setAction('approve')" class="btn btn-success">Approve</button>
                        <button type="submit" wire:click="setAction('revert')" class="btn btn-danger">Revert</button>
                        <a href="{{route('supervisor.dashboard')}}" wire:navigate class="btn btn-secondary">Cancel</a>
                    </div>

                @elseif($team_thesis->thesis_status==1)    
                    <span class="text-primary">You Have Revert This Thesis..</span>

                @elseif($team_thesis->thesis_status==2)
                    <span class="text-success">You Have Approved This Thesis..</span>

                @endif
            </div>
            </form>
        </div>
    </div>

</div>
