<div>
    <div class="card mb-4">
        <h5 class="card-header">Team Information Page</h5>
        <div class="card-body">
            <form wire:submit="get_info" method="POST">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Enter Roll No:</label>
                            <input type="text" name="roll_no" id="txtRollNo" wire:model="roll_no"
                                class="form-control" />
                            @error('roll_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('teams.login') }}" wire:navigate class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @if (isset($info[0]))
        <div class="card mb-4">
            <div class="container">
                <h4 class="card-header">Details</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            TEAM ID
                        </div>

                        <div class="col-sm-3">
                            TEAM-{{ $info[0][0]->id }}
                        </div>

                        <div class="col-sm-2">
                            Name
                        </div>

                        <div class="col-sm-4">
                            {{ $info[0][0]->name }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            Email Address
                        </div>

                        <div class="col-sm-3">
                            {{ $info[0][0]->email }}
                        </div>

                        <div class="col-sm-2">
                            Department
                        </div>

                        <div class="col-sm-4">
                            {{ $info[0][3]->name }}
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        @if (is_null($info[0][1]))
                            <hr>
                            <div class="col-sm-">
                                <h4 class="text-danger">No Any Supervisor Assigned Yet</h4>
                            </div>
                            <hr>
                        @else
                            <div class="col-sm-3">
                                Supervisor ID
                            </div>

                            <div class="col-sm-3">
                                SPR-{{ $info[0][1]->id }}
                            </div>

                            <div class="col-sm-2">
                                Supervisor
                            </div>

                            <div class="col-sm-4">
                                {{ $info[0][1]->name }}
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            Supervisor Email Address
                        </div>

                        <div class="col-sm-3">
                            {{ $info[0][1]->email }}
                        </div>
    @endif
</div>
<br>
<div class="row">
    @if (is_null($info[0][2]))
        <hr>
        <div class="col-sm-12">
            <h5 class="text-danger">Your Team Leader Haven't Uploaded The Thesis Yet</h5>
        </div>
        <hr>
    @else
        <div class="col-sm-3">
            Thesis Title
        </div>

        <div class="col-sm-3">
            <span class="text-info">
                <b>
                    {{ $info[0][2]->project_title }}
                </b>
            </span>
        </div>

        <div class="col-sm-2">
            Thesis Status
        </div>

        <div class="col-sm-4">
            <b>
                @if ($info[0][2]->thesis_status == 0)
                    <span class="text-warning">Your Thesis Reviews Are Pending By Your Concern
                        Supervisor</span>
                @elseif($info[0][2]->thesis_status == 1)
                    <span class="text-danger">Thesis Is Reverted By Your Concern Supervisor</span>
                @elseif($info[0][2]->thesis_status == 2)
                    <span class="text-success">Your Thesis is Approved By Your Concern Supervisor</span>
                @endif
            </b>
        </div>
</div>
<br>
<div class="row">

    <div class="col-sm-3">
        Marks
    </div>

    <div class="col-sm-3">
        @if ($info[0][2]->thesis_status != 2)
            <span class="text-warning">Your Thesis Approval Is Still In Process</span>
        @else
            <span class="text-primary"><b>{{ $info[0][2]->marks }} out of 200 </b></span>
        @endif
    </div>

    <div class="col-sm-2">
        Supervisor Comments
    </div>

    <div class="col-sm-4">
        {{ $info[0][2]->comments }}
    </div>
    @endif
</div>
</div>
</div>
</div>
@endif
</div>
