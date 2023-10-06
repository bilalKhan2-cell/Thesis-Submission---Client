<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Thesis Management',
        'pageTitle' => 'Thesis Remarks',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Thesis Management</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover table-striped table-responsive w-100">
                        <thead>
                            <tr>
                                <th>Supervisor ID</th>
                                <th>Supervisor Name</th>
                                <th>Project Title</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$empty)
                                <tr>
                                    <td>{{ $supervisor_id }}</td>
                                    <td>{{ $supervisor_name }}</td>
                                    <td>{{ $thesis_title }}</td>
                                    <td>
                                        @if($thesis_remarks==0)
                                            <span class="text-primary">Reviews Pending From Supervisor..</span>
                                        @elseif($thesis_remarks==1)
                                            <span class="text-warning">Your Thesis is Reverted By The Supervisor..</span>
                                        @else
                                            <span class="text-success">Your Thesis is Approved By The Supervisor..</span>
                                        @endif
                                    </td>
                                </tr>

                            @else 
                                <tr>
                                   <td colspan="4" class="text-danger text-center">{{ $empty }}</td> 
                                </tr>        

                            @endif
                        </tbody>
                    </table>
                    <br>
                    @if($thesis_remarks==1)
                    <label>Comments: </label>
                        <input type="text" wire:model="supervisor_comments" readonly class="form-control">
                        <br />
                        <button wire:click="DownloadThesis('{{$thesis_file}}')" class="btn btn-info">Thesis File</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
