@extends('layouts.app')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    <?php
    use App\Http\Controllers\UtilsController as Utils;
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">Dossier Reference Number: {{ $dossier->dossier_ref_num }}</h1>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <a href="{{ url()->previous() }}" class="btn btn-success"><i
                                    class="fas fa-arrow-circle-left"></i> Back </a>

                            <br/><br/>


                            <div class="card">
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Dossier life time </h3>--}}
{{--                                </div>--}}
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-md">
                                        <thead>
                                        <tr>
                                            <th>Certified Date</th>
                                            <th>Expiry Date</th>
                                            <th>Dossier Delete Due</th>
                                            <th>Remaining Months</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$certified_applications->certified_date}}</td>
                                            <td>{{$certified_applications->expire_date}}</td>
                                            <td>{{$dossier_delete_due}}</td>
                                            @if($paths == [])
                                                <td><span class='text-danger'> Dossier Not Found or Deleted. </span>
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-danger btn-sm" title="Delete Not Possible"
                                                        disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>

                                            @else  {{--dossier files available, then validate lifetime--}}

                                                @if($remaining_months <= 0)
                                                    <td><span class='text-success'> Delete Allowed </span></td>
                                                @else
                                                    <td>{{$remaining_months}}</td>
                                                @endif
                                                <td>
                                                    @if($remaining_months > 0)
                                                        <button
                                                            class="btn btn-danger btn-sm" title="Delete Not Allowed"
                                                            disabled>
                                                            <i class="fas fa-trash"></i></button>
                                                    @endif
                                                    @if($remaining_months <= 0)
                                                        <button type="button"
                                                            data-toggle="modal"
                                                            data-target="#deleteDossierModal"
                                                            data-action="{{ route('dossier.delete_all', $dossier->id) }}"
                                                            title="Delete all dossier files"
                                                            class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash "></i></button>
                                                    @endif
                                                    @endif
                                                </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>


                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                                       role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="5%">S.N
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="20%">Filename
                                        </th>
                                        {{--<th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="20%">Path
                                        </th>--}}
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="20%">File size
                                        </th>
                                        <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1" width="20%">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($paths as $path)
                                        <tr role="row">
                                            <td>{{$i++}}</td>
                                            <td>{{basename($path)}}</td>
                                            {{--<td>{{$path}}</td>--}}
                                            <td>{{Utils::human_readable_filesize(filesize(storage_path(Config::get('site_vars.dossier_dir').$path)))}}</td>
                                            <td>
                                                <a href="{{asset(Config::get('site_vars.dossier_dir').$path)}}"
                                                   target="_blank"
                                                   class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        </div>
    </section>



    <div class="modal fade" id="deleteDossierModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="deleteDossierModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

            <?php
            if (isset($dossier)) {
                $dossier_id = $dossier->id;
            } else {
                $dossier_id = "";
            }

            ?>

            <form action="{{ route('dossier.delete_all', $dossier_id) }}" method="GET">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">This action is not reversible.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete all dossier files?

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-white" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete All Dossier Files</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true
                , "lengthChange": false
                , "searching": false
                , "ordering": true
                , "info": true
                , "autoWidth": false
                , "responsive": true
                ,
            });
        });


    </script>



@endsection
