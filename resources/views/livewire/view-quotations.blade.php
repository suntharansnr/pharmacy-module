<div>
    <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Drug</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        @foreach ($quotation->drugs as $key => $row)
                        <tr>
                            <td>{{$row['name']}}</td>
                            <td>{{$row['pivot']['quantity']}} * {{$row['price']}}</td>
                            <td>{{$row['pivot']['amount']}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>{{$quotation->total}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Status</td>
                            <td>
                                @if($quotation->status == 0)
                                <span class="badge badge-info">Pending</span>
                                @elseif($quotation->status == 1)
                                <span class="badge badge-info">Accepted</span>
                                @else
                                <span class="badge badge-info">Rejected</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="border:none" width="33.33%"></td>
                            <td  style="border:none" width="33.33%"></td>
                            <td  style="border:none" width="33.33%">
                                @if($quotation->status == 0)
                                <div wire:loading.remove wire:target="updateStatus">
                                    <button class="btn btn-success btn-block" wire:click.prevent="updateStatus(1)">Accept</button>
                                    <button class="btn btn-danger btn-block" wire:click.prevent="updateStatus(2)">Reject</button>
                                </div>
                                <div wire:loading wire:target="updateStatus">
                                    <button class="btn btn-danger btn-block" disabled>Updating...</button>
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>
