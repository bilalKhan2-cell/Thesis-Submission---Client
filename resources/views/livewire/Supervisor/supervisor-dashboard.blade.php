<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Supervisor',
        'pageTitle' => 'Welcome',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Supervisor</h5>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-12">
                    <span class="float-end">Date: {{ date('d-M-y') }}</span>
                </div>

                <div class="col-sm-4">
                    <div class="card bg-success text-white mb-4">
                        <h5 class="card-header text-white">Assigned Teams</h5>
                        <div class="card-body"><i class="bx bx-user-check"></i> Total Teams: {{ ($total) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>