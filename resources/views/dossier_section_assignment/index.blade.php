@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                                <table id="example1" class="table table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">

                                    <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Supplier Name: activate to sort column descending">S.N</th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >From</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Subject</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Sent Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Deadline</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" >Document</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Actions</th>                                      </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($section_assigns as $section_assign)
                                        <tr role="row" class="odd">
                                            <td>{{$i++}}</td>
                                            <td tabindex="0" >{{$section_assign->first_name}}</td>
                                            <td>{{$section_assign->assignment_description}} </td>
                                            <td>{{$section_assign->section_sent_date}}</td>
                                            <td>{{$section_assign->section_deadline}}</td>
                                            <td> <a  href="{{ asset($section_assign->path)}}" target="_blank" data-toggle="tooltip" class="btn btn-info btn-sm"
                                                data-placement="top" title="View the file"><i class="fas fa-book-open"></i></a>
                                                <a  href="{{ asset($section_assign->path)}}" target="_blank" data-toggle="tooltip" class="btn btn-success btn-sm"
                                                        data-placement="top" title="Download the file"><i class="fas fa-download"></i></a><br>

                                                </td>
                                            <td>
                                                <a href="{{ route('dossier_section_assign_show',[$section_assign->id])}}" class="btn btn-sm btn-info"><i class="fas fa-list"></i></a>
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
@endsection

