@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title"><strong> Locked Dossier Evalution List</strong>
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">


                            <div id="example1_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4 no-footer ">
                                <table id="example1"
                                       class="table table-bordered table-striped dataTable no-footer dtr-inline"
                                       role="grid" aria-describedby="example1_info">

                                    <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Serial Number: activate to sort column descending"
                                            aria-sort="ascending" width="3%">S.N
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Title: activate to sort column ascending"
                                            width="15%" id="received"> Assessor
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Reference Number: activate to sort column descending"
                                            aria-sort="ascending" width="21%"> Drug Name
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Title: activate to sort column ascending"
                                            width="20%" id="subject"> Company
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Title: activate to sort column ascending"
                                            width="13%"> Eval. Start Date
                                        </th>
                                        <th class="sorting" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Title: activate to sort column ascending"
                                            width="13%" id="received"> End Date
                                        </th>


                                        <th rowspan="1" colspan="1" width="20%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($locked_dossier_evaluations as $locked_dossier_evaluation)
                                        <tr role="row" class="odd">
                                            <td>{{$i++}}</td>
                                            <td>{{$locked_dossier_evaluation->first_name}} {{$locked_dossier_evaluation->middle_name}}</td>


                                            <td>Drug Name</td>
                                            <td>Company</td>

                                            <td>{{$locked_dossier_evaluation->start_time}}</td>
                                            <td>{{$locked_dossier_evaluation->end_time}}</td>


                                            <td>


                                                <a href="{{ route('dossier_evaluation_edit',[$locked_dossier_evaluation->id])  }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                                                
                                @if($locked_dossier_evaluation->evaluation_deadline_extended)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                title="Dossier Evalution Deadline Extension Requested"
                                                data-toggle="modal"
                                                data-target="#modalextend_query"
                                                onclick="deadline_modal_query(this)" value="{{ $locked_dossier_evaluation->id }}" >
                                            <i class="fas fa-clock"></i>
                                        </button>
 
                                        @else
                                        <button type="button" class="btn btn-success btn-sm"
                                                title="Extend Dossier Evalution Deadline"
                                                data-toggle="modal"
                                                data-target="#modalextend_query"
                                                onclick="deadline_modal_query(this)" value="{{ $locked_dossier_evaluation->id }}" >
                                            <i class="fas fa-clock"></i>
                                        </button>
                                        @endif



                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {{--  Modal for Extend deadline  --}}
            <div class="modal fade" id="modalextend_query" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-labelledby="modalextend" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">

                    <form action="{{ route('update_deadline') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Extend Deadline.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name='type' value='dossier' hidden/>
                                    <input type="text" name='hidden_dossier_asg_id' id='hidden_dossier_asg_id'
                                           value='' hidden/>

                                </div>
                                <div class="form-group">
                                    <label> Reason for Extension :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="extend_reason">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Extened New Deadline :</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control" name="new_deadline">

                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Extend</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--  end of Modal for extend deadline  --}}

    </section>


@endsection
@section('scripts')
    <script>
      function deadline_modal_query(o) {

document.getElementById('hidden_dossier_asg_id').value = o.value;
}
     
    </script>

@endsection
