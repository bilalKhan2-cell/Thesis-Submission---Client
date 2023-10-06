<div>
    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Result',
        'pageTitle' => 'Thesis Result',
    ])

    <div class="card mb-4">
        <h5 class="card-header">Check Your Result</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless w-100">
                            <thead>
                                <tr>
                                    <th>Supervisor ID</th>
                                    <th>Supervisor</th>
                                    <th>Project Title</th>
                                    <th>Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($result_data->records->thesis_status != 2)
                                    <tr>
                                        <td class="text-center" colspan="4">Your Thesis is Still Not Approved.</td>
                                    </tr>

                                @elseif($result_data->records->thesis_status==2 && $result_data->records->marks==null)    
                                    <tr>
                                        <td class="text-primary">SPR-{{ $result_data->records->supervisor->id }}</td>
                                        <td class="text-primary">{{ $result_data->records->supervisor->name }}</td>
                                        <td class="text-primary">{{ $result_data->records->project_title }}</td>
                                        <td><span class="text-info">STILL IN PROCESS</span></td>                                        
                                    </tr>

                                @else
                                    <tr>
                                        <td class="text-primary">SPR-{{ $result_data->records->supervisor->id }}</td>
                                        <td class="text-primary">{{ $result_data->records->supervisor->name }}</td>
                                        <td class="text-primary">{{ $result_data->records->project_title }}</td>
                                        <td class="text-success"><i class="bx bx-check-circle"></i> {{ $result_data->records->marks }} out of 200</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <span><strong>Notice: </strong> Your Supervisor Reserves The Right To Update The Result Just Once. If You Have Any Concern According To The Result. Consult and Discuss With Your Supervisor. <br /> <br /> Thank You. <br /> <br /> Regards <br /> Admin Officer</span>
        </div>
    </div>

</div>