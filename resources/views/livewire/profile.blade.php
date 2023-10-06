<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Profile',
        'pageTitle' => 'User Profile',
    ])

    <div class="card mb-5">
        <h5 class="card-header">{{__("Profile Data")}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <span>{{__("Team ID:")}}</span>
                </div>

                @if(session()->has('team'))
                    <div class="col-sm-6">
                        <span>TEAM-{{ $profile->data->id }}</span>
                    </div>
                @endif

                @if(session()->has('supervisor'))
                    <div class="col-sm-6">
                        <span>SPR-{{$profile->data->id}}</span>
                    </div>
                @endif

                <div class="col-sm-6 mt-3">
                    <span>{{__("Team Leader Name:")}} </span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{ $profile->data->name }}</span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{__("Email Address:")}} </span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{ $profile->data->email }}</span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{__("Contact Info:")}} </span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{ $profile->data->contactinfo }}</span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{__("CNIC No:")}}</span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{ $profile->data->cnic }}</span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{__("Address:")}} </span>
                </div>

                <div class="col-sm-6 mt-3">
                    <span>{{ $profile->data->address }}</span>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('team'))
        <div class="card mb-4">
            <h5 class="card-header">{{ __('Team Members') }}</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Roll No') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profile->data->members as $key => $value)
                                        <tr>
                                            <td>{{ __($key + 1) }}</td>
                                            <td>{{ __($value->name) }}</td>
                                            <td>{{ __($value->rollno) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="card mb-4">
        <h5 class="card-header">{{ __('Change Password') }}</h5>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <form wire:submit.prevent="ChangePassword">
                    @csrf

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>{{__("Current Password:")}} </label>
                            <input type="password" wire:model="current_password" class="form-control" />
                        </div>
                    </div>

                    <br>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>{{__("New Password: ")}}</label>
                            <input type="password" wire:model="new_password" class="form-control" />
                        </div>
                    </div>

                    <br>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>{{__("Confirm Password: ")}}</label>
                            <input type="password" wire:model="confirm_password" class="form-control" />
                        </div>
                    </div>

                    <br>
                    <span class="text-success">{{__($success)}}</span>
                    <span class="text-danger">{{__($error)}}</span>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success text-white">{{__("Save")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
