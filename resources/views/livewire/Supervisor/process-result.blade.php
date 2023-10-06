<div>
    
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'Manage Thesis Result',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Process Result</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Roll No: {{ ucwords($lead_rollno) }}</label>
                </div>
                <div class="col-sm-3">
                    <label>Lead Name: {{ ucwords($lead_name) }}</label>
                </div>
                <div class="col-sm-5">
                    <span>Email Address: {{ $lead_email }}</span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <span>Project ID: {{$project_id}}</span>
                </div>
                <div class="col-sm-3">
                    <span>Project Title: {{$project_title}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header">Team Members</h5>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Roll No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $key=>$value)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->rollno}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="text-primary fw-bold float-end mt-2">Total Members: {{ count($members) }}</span>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form wire:submit.prevent="AssignMarks">
                <div class="form-group">
                    <label>Enter Marks: </label>
                    <input type="number" wire:model="marks" class="form-control" />
                    @error('marks') <span class="text-danger">{{$message}}</span> @enderror
                    <span class="text-danger">{{ $error }}</span>
                    <span class="text-success fw-bold">{{ $success_message }}</span>
                </div>
                @if(($is_edit!=2))
                    <button type="submit" class="btn mt-2 btn-success">Submit</button>
                @endif
            </form>
        </div>
    </div>

</div>
