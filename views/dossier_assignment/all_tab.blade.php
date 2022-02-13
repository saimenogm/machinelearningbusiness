<div class="tab-pane fade active show " id="custom-tabs-three-all" role="tabpanel" aria-labelledby="custom-tabs-three-all-tab">
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">All Dossiers</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                <table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid"
                    aria-describedby="example1_info">

                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Supplier Name: activate to sort column descending" aria-sort="ascending"
                                width="5%">S.N</th>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Supplier Name: activate to sort column descending" aria-sort="ascending"
                                width="20%">Dossier Ref. Num</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Address: activate to sort column ascending" width="20%">Product Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" width="15%">Assign. Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" width="15%">Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($all_dossiers as $dossier)
                        <tr role="row" class="odd">
                            <td>{{$i++}}</td>
                            <td tabindex="0" class="dtr-control sorting_1">
                                @if($dossier->assignment_status == 1)
                                <span class='text-danger'> Unassigned </span>
                                @else
                                <span> {{ $dossier->dossier_ref_num }} </span>
                                @endif</td>
                            <td>{{$dossier->description}}</td>

                            <td>
                                @if($dossier->assignment_status == 1)
                                <span class='text-danger'> Unassigned </span>
                                @else
                                <span class='text-success'> Assigned </span>
                                @endif
                            </td>
                            <td>
                                @if(isset($dossier->dossier_assignment_id))
                                <a href="{{ route('dossier_evaluation_edit',[$dossier->dossier_assignment_id])  }}"
                                    class="btn btn-info"><i class="fas fa-list" title="Show Details"></i></a>
                                @else
                                {{-- this a link shows the details of application--}}
                              {{--  <a href="" class="btn btn-info"><i class="fas fa-eye"></i>--}}

                                    <a  class="btn btn-info" href="{{ route('application.checklist_update',$dossier->application_id)  }}" title="Show Details"><i class='fas fa-list'> </i> </a>

                          {{--      </a>--}}

                                @endif
                                @if($dossier->assignment_status == 1)
                                <a href="{{ url('dossier_assignment/assign/'.$dossier->id)}}" class="btn btn-success" title="Assign Dossier"><i
                                        class="fas fa-edit"></i></a>
                                @endif
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
