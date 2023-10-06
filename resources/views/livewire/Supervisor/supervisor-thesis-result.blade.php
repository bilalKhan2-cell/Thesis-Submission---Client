<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'Thesis Result Management',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Thesis Result Management</h5>
        <div class="card-body">
            <form wire:submit.prevent="GetApprovedThesis">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Enter Batch: </label>
                            <input type="number" wire:model="batch" class="form-control" />
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info text-white mt-4">Submit</button>
                    </div>

                    <div class="col-sm-3">
                        @error('batch')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    @if ($teams)
                        <table class="table table-hover table-striped table-responsive w-100">
                            <thead>
                                <tr>
                                    <th>Team ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Project Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $key => $value)
                                    <tr>
                                        <td>TEAM-{{ $value->team_id }}</td>
                                        <td>{{ $value->team->name }}</td>
                                        <td>{{ $value->team->email }}</td>
                                        <td>{{ $value->project_title }}</td>
                                        <td>
                                            <a href="/supervisor/process_result/{{$value->team_id}}" wire:navigate class="btn btn-sm btn-outline-primary rounded-circle">
                                            <i class="bx bx-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="5" class="text-center">No Records Found..</td>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>