<div>

    @livewire('breadcrumbs', [
        'heading' => 'Dashboard',
        'subHeading' => 'Thesis Management',
        'pageTitle' => 'Upload Thesis',
    ])

    <div class="card mb-4">

        <h5 class="card-header">Upload Thesis</h5>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <span>Supervisor ID:</span>
                </div>

                <div class="col-sm-2">
                    {{ $supervisor_id }}
                </div>

                <div class="col-sm-2">
                    <span>Supervisor Name:</span>
                </div>

                <div class="col-sm-2">
                    {{ $supervisor_name }}
                </div>
            </div>
            <br />
            <div class="row">

                <div class="col-sm-2">
                    <span>Supervisor Email:</span>
                </div>

                <div class="col-sm-3">
                    {{ $supervisor_email }}
                </div>
            </div>
            <br>
            <form wire:submit="ThesisUpload" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Enter Project Title: </label>
                    <input type="text" wire:model="thesis_title" class="form-control" />
                    @error('thesis_title') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>

                <br />

                <div class="form-group">
                    <label>Project Description:</label>
                    <textarea wire:model="thesis_description" cols="30" rows="4" style="resize:none;" class="form-control"></textarea>
                    @error('thesis_description') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>

                <br />

                <div class="form-group">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thesis File</label>
                        <input class="form-control" wire:model="thesis_file" type="file" id="formFile" />
                        @error('thesis_file') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                      </div>
                </div>


                <div class="form-group">
                    @if($is_edit_allowed==1)
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <a href="{{route('team.dashboard')}}" wire:navigate class="btn btn-danger">Cancel</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

</div>
