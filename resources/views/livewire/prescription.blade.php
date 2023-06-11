<div>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Upload prescription</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Prescription</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" wire:submit.prevent="savePrescription()">
                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" class="form-control" wire:model="images" multiple>
                                @include('inc.error', [
                                    'field_name' => 'images.*',
                                ])
                                @include('inc.error', [
                                    'field_name' => 'images',
                                ])
                            </div>
                            @if ($images)
                                <div class="form-group">
                                    <label for="">Image Preview:</label>
                                    <div class="row">
                                        @foreach ($images as $key => $image)
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ $image->temporaryUrl() }}">
                                                <button class="btn btn-danger"
                                                    wire:click.prevent="removeImg({{ $key }})"> <i
                                                        class="fas fa-trash"></i> </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Note</label>
                                <textarea name="" id="" cols="30" rows="4" class="form-control" wire:model="note">Note</textarea>
                                @include('inc.error', [
                                    'field_name' => 'note',
                                ])
                            </div>
                            <div class="form-group">
                                <label for="">Delivery address</label>
                                <input type="text" class="form-control" wire:model="delivery_address">
                                @include('inc.error', [
                                    'field_name' => 'delivery_address',
                                ])
                            </div>
                            <div class="form-group">
                                <label for="">Delivery time</label>
                                <input type="date" name="" id="" class="form-control"
                                    wire:model="delivery_time">
                                @include('inc.error', [
                                    'field_name' => 'delivery_time',
                                ])
                            </div>
                            <div class="form-group">
                                <div class="row mt-2">
                                    @foreach ($slots as $key => $value)
                                        <div class="col-xs-12 col-sm-12 col-md-3">
                                                <div class="card mb-2 text-center">
                                                    <label>
                                                        <input type="checkbox" value="{{$value}}" wire:model="selectedSlots">
                                                        {{ $key }}
                                                    </label><br />
                                                </div>
                                        </div>
                                    @endforeach
                                    @include('inc.error', [
                                        'field_name' => 'selectedSlots',
                                    ])
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" wire:loading.remove
                                    wire:target="savePrescription">Upload</button>
                                <button class="btn btn-primary" type="submit" wire:loading
                                    wire:target="savePrescription">Uploading...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
