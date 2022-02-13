@extends('layouts.app')
@section('content')




    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dossier Evaluation</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                                <table id="example1"
                                       class="table table-bordered table-striped dataTable no-footer dtr-inline"
                                       role="grid"
                                       aria-describedby="example1_info">

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
                                            aria-sort="ascending" width="17%">Dossier
                                            Ref Num
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="24%">Dossier
                                            Assignment Date
                                        </th>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1"
                                            aria-label="Supplier Name: activate to sort column descending"
                                            aria-sort="ascending" width="16%">Days
                                            Remaining
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Country: activate to sort column ascending"
                                            width="20%">Progress Percentage
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Country: activate to sort column ascending"
                                            width="10%">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            width="13%">Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($evaluations as $evaluation)
                                        <tr role="row" class="odd">
                                            <td>{{$i++}}</td>
                                            <td>{{$evaluation->dossier_ref_num}}</td>
                                            <td tabindex="0">{{$evaluation->assigned_datetime}}</td>
                                            <td tabindex="0">{{$evaluation->task_duration_days_plan -$evaluation->day_count}}
                                                days
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    @if($evaluation->task_status=='pause')
                                                        <div
                                                            class="progress-bar bg-gradient-warning progress-bar-striped"
                                                            role="progressbar" aria-valuenow="40"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            style="width: {{  $evaluation->progress_percentage }}%">
                                                            <span>{{ $evaluation->progress_percentage }}% Complete </span>
                                                        </div>
                                                    @elseif($evaluation->task_status=='Inprogress')
                                                        <div
                                                            class="progress-bar bg-gradient-primary progress-bar-striped"
                                                            role="progressbar"
                                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: {{  $evaluation->progress_percentage }}%">
                                                            <span>{{ $evaluation->progress_percentage }}% Complete </span>
                                                        </div>
                                                    @elseif($evaluation->task_status=='Locked')
                                                        <div
                                                            class="progress-bar bg-gradient-danger progress-bar-striped"
                                                            role="progressbar"
                                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: {{  $evaluation->progress_percentage }}%">
                                                            <span>{{ $evaluation->progress_percentage }}% Complete </span>
                                                        </div>



                                                    @endif
                                                </div>
                                            </td>
                                            @if($evaluation->task_status=='pause')
                                                <td tabindex="0">
                                                    <span class="badge bg-warning">{{$evaluation->task_status}}</span>
                                                </td>
                                            @elseif($evaluation->task_status=='Inprogress')
                                                <td tabindex="0">
                                                    <span class="badge bg-primary">{{$evaluation->task_status}}</span>
                                                </td>
                                            @elseif($evaluation->task_status=='Locked')
                                                <td tabindex="0">
                                                    <span class="badge bg-danger">{{$evaluation->task_status}}</span>
                                                </td>
                                            @endif
                                            <td>
<div >
                      <a href="{{ route('dossier_evaluation_edit',[$evaluation->id])  }}" class="btn btn-info btn-sm" title="Show Evaluation Options"><i class="fas fa-list"></i></a>
                     @if($evaluation->task_status=='Locked')
                     @if(!$evaluation->evaluation_deadline_extended)
                     <button type="button" class="btn btn-success btn-sm" title="Request for Deadline Extension"
                                        data-toggle="modal" data-target="#dedline_extension" onclick="extend_deadline({{$evaluation->id}})" value="">
                                        <i class='fas fa-clock'></i>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary btn-sm" title="Request for Deadline Extension Already Sent."
                                        data-toggle="modal" data-target="#dedline_extension" disabled>
                                        <i class='fas fa-clock'></i>
                                    </button>
                                    @endif

                     @endif

                    </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
        {{-- MODAL for deadline extension Request--}}

<div class="modal fade" id="dedline_extension" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="deleteRecordModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">

        <form action="{{ route('dossier_evaluation_deadline_extension')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request For Deadline
                        Extension</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Reason For Extension</label><input type="text" class="form-control" name='extension_reason'><br>
                    <label>Required Deadline</label><input type="date" class="form-control" name='extended_deadline'><br>


                </div>

                <input type="hidden"  id="dossier_assign_id" name="dossier_assign_id" />
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-white" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Send
                        Request</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- End of modal deadline extension Request--}}
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
<script>
function extend_deadline(dossier_ass_id)
{
  document.getElementById('dossier_assign_id').value=dossier_ass_id;
}
</script>
