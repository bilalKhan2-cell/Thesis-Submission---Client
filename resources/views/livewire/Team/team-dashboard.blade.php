<div>
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Team Lead',
        'pageTitle' => 'Welcome '.ucwords(session('team')->name),
    ])

    <div class="card mb-4">

        <h5 class="card-header">Team Data</h5>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 text-primary">

                    <div class="row">
                        <div class="col-sm-3">
                            <span>Project ID:</span>
                        </div>

                        <div class="col-sm-4">
                            {{ session('team')->project_id }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>Name:</span>
                        </div>
                        <div class="col-sm-4">
                            {{ session('team')->name }}
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>RollNo:</span>
                        </div>
                        <div class="col-sm-4">
                            {{ session('team')->rollno }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>Email:</span>
                        </div>
                        <div class="col-sm-6">
                            {{ session('team')->email }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>Contact Info:</span>
                        </div>
                        <div class="col-sm-6">
                            {{ session('team')->contactinfo }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>CNIC No:</span>
                        </div>
                        <div class="col-sm-4">
                            {{ session('team')->cnic }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <span>Department:</span>
                        </div>
                        <div class="col-sm-6">
                            {{ session('team')->departments->name }}
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-striped table-borderless table-responsive w-100">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Team Members</th>
                                    </tr>
                                    <tr>
                                        <th class="text-info">S.No</th>
                                        <th class="text-info">Member Name</th>
                                        <th class="text-info">Member RollNo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('team')->members as $key=>$value)
                                        <tr>
                                            <td class="text-info">{{ $key + 1 }}</td>
                                            <td class="text-info">{{ $value->name }}</td>
                                            <td class="text-info">{{ $value->rollno }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            @if(session()->has('upload-success'))
                <div class="alert alert-success alert-dissmisible">
                        {{ session()->get('upload-success') }}
                    <button class="btn-close float-end">&times;</button>
                </div>
            @endif

        </div>
    </div>
</div>