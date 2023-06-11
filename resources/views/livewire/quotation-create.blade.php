<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-1">
                    @if($currentImage == '' && $prescription->medias)
                    <img src="{{ asset($prescription->medias[0]->image_path) }}" class="img-fluid">
                    @else
                    <img src="{{ $currentImage }}" class="img-fluid">
                    @endif
                </div>
                <div class="row">
                    @foreach ($prescription->medias as $key => $image)
                        <div class="col-3 card me-1 mb-1" wire:click="$set('currentImage','{{ asset($image->image_path) }}')">
                            <img src="{{ asset($image->image_path) }}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Drug</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['price'] }} * {{ $row['quantity'] }}</td>
                                <td>{{ number_format($row['amount'], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>{{ number_format($total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <tbody>
                        <tr>
                            <td style="border:none" width="33.33%"></td>
                            <td style="border:none" width="33.33%">Drug</td>
                            <td style="border:none" width="33.33%">
                                <select id="" class="form-control" wire:model="drug">
                                    <option value="" disabled selected>Please select drug</option>
                                    @foreach ($drugs as $key => $drug)
                                        <option value="{{ $drug }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                                @include('inc.error', [
                                    'field_name' => 'drug',
                                ])
                            </td>
                        </tr>
                        <tr>
                            <td style="border:none"></td>
                            <td style="border:none">Quantity</td>
                            <td style="border:none">
                                <input type="text" class="form-control" wire:model="quantity" required>
                                @include('inc.error', [
                                    'field_name' => 'quantity',
                                ])
                            </td>
                        </tr>
                        <tr>
                            <td style="border:none"></td>
                            <td style="border:none"></td>
                            <td style="border:none">
                                <button class="btn btn-primary btn-block"
                                    wire:click.prevent="addDrug({{ $i }})">Add</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="border:none" width="33.33%"></td>
                            <td style="border:none" width="33.33%"></td>
                            <td style="border:none" width="33.33%">
                                <button class="btn btn-primary btn-block" {{ $total == 0 ? 'disabled' : '' }} type="submit" wire:loading.remove
                                    wire:target="sendQuotation" wire:click.prevent="sendQuotation()">Send Quotation</button>
                                <button class="btn btn-primary btn-block" disabled wire:loading
                                    wire:target="sendQuotation">Sending...</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
