<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'Thesis Management',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Thesis Management</h5>
        <div class="card-body">
            <form wire:submit.prevent="GetTeam">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Enter Batch: </label>
                            <input type="number" class="form-control" wire:model="team_batch"
                                placeholder="Enter Batch of the Team.." />
                        </div>
                    </div>

                    <div class="col-sm-1 mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <table class="table table-hover table-striped table-responsive w-100">
                <thead>
                    <tr>
                        <th>Team ID</th>
                        <th>Leader Name</th>
                        <th>Roll No</th>
                        <th>Email</th>
                        <th>Project Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($teams)
                        @foreach ($teams as $key => $value)
                            <tr>
                                <td>TEAM-{{ $value->team->id }}</td>
                                <td>{{ $value->team->name }}</td>
                                <td>{{ $value->team->rollno }}</td>
                                <td>{{ $value->team->email }}</td>
                                <td>{{ $value->project_title }}</td>
                                <td>
                                    <a href="/supervisor/process_thesis/{{ $value->team->id }}" wire:navigate
                                        class="btn btn-info">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
