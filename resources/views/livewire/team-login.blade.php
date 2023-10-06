<div>
    <nav class="navbar navbar-example navbar-expand-lg navbar-dark bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"><b>Sindh University Online Thesis Submission Portal..</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2"
                aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-ex-2">
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="{{route('supervisors.login')}}" wire:navigate>Supervisor</a>
                    <a class="nav-item nav-link" href="{{route('teams.login')}}" wire:navigate>Team</a>
                </div>

            </div>
        </div>
    </nav>

    <div class="card mb-4">
        <div class="card-body">
            <div class="card">
                <div class="card-body">

                    <center><img src="{{ asset('img/layouts/bg.png') }}" alt="University Logo.."> </center>

                    <span class="text-center text-primary h4">Team Leader Login</span>
                    <br>
                    <span>Please sign-in</span>
                    <span class="text-danger">{{ $err }}</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formAuthentication" class="mb-3" wire:submit.prevent="LoginUser">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Or RollNo: </label>
                            <input type="text" wire:model="email" wire:model="email" class="form-control text-primary" id="email"
                                name="email-username" placeholder="Enter your email or username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" wire:model="password" for="password">Password</label>
                                <a href="#" wire:navigate>
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" wire:model="password" id="password" class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
