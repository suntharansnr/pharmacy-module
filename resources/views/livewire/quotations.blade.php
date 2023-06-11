@push('styles')
<!-- Custom styles for this page -->
<link href="{{asset('assets/be/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
<div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quotations</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quotations sent by pharmacy to you</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->id }}</td>
                                    <td>{{ $quotation->total }}</td>
                                    <td>
                                        <a href="{{route('quotation.view',$quotation->id)}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('assets/be/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/be/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/be/js/demo/datatables-demo.js')}}"></script>
@endpush
