<div class="tab-pane fade" id="custom-tabs-three-overview"
     role="tabpanel" aria-labelledby="custom-tabs-three-overview-tab">
    <!-- this is overview tab -->


    <!-- Main content -->
    <section class="content" id="data">

        <!-- Default box -->
        <div class="card" >
            <div class="card-header">
                <h3 class="card-title">Dossier Reference Number:
                    <b>{{ $dossier_evaluation_details->dossier_ref_num }}</b></h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8 ">
                        <div class="row">  {{--the three status boxes--}}
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Evaluation Status</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $main_task->task_status }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Elapsed Days</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                           {{$evaluation_document_progress->day_count}}

                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Evaluation Mode </span>
                                        <span class="info-box-number text-center text-muted mb-0">

                                                @if($dossier_evaluation_details->application_type==2)
                                                Fast Track
                                            @else
                                                Standard
                                            @endif

                                            </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{---------------------------------------------------------------------------------------------}}
                                <h4>General Info</h4>
                                <div class="post">
                                    <p>Assessor</p>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                            <a href="#">{{ $dossier_evaluation_details->first_name }} {{ $dossier_evaluation_details->middle_name }}</a>
                                            </span>
                                        <span class="description">Unit: PERU</span>
                                    </div>
                                    <!-- /.user-block -->

                                    <table class="table table-sm table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td width="25%">Assigned Date</td>
                                            <td class="text-left">
                                                <b>{{ $dossier_evaluation_details->assigned_datetime }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Supervisor</td>
                                            <td class="text-left">
                                                <b>{{ $dossier_evaluation_details->name }} {{ $dossier_evaluation_details->m_name }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product</td>
                                            <td class="text-left">
                                                <b>{{ $dossier_evaluation_details->product_trade_name }}</b></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                {{---------------------------------------------------------------------------------------------}}
                                <h4>Company Info</h4>
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="../../dist/img/user7-128x128.jpg" alt="Company Logo Image">
                                        <span class="username">

                          <a href="#">{{ $company->trade_name }}</a>
                        </span>
                                        <span class="description"> {{$company->city}}, {{$company->state }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <table class="table table-sm table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td width="25%">Website</td>
                                            <td class="text-left">
                                                <b>{{ $company->webiste_url }} </b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Phone</td>
                                            <td class="text-left">
                                                <b>{{ $company->telephone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td class="text-left">
                                                <b>{{ $company->email }}</b></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                {{---------------------------------------------------------------------------------------------}}

                                <h4>Agent Info</h4>
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="../../dist/img/user7-128x128.jpg" alt="Agent Image">
                                        <span class="username">

                          <a href="#">{{ $agent->trade_name }}</a>
                        </span>
                                        <span class="description"> {{$agent->city}}, {{$agent->state}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <table class="table table-sm table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td width="25%">Contact Person</td>
                                            <td class="text-left">
                                                <b>{{ $agent->user->first_name }} {{ $agent->user->middle_name }}</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Contact Person Phone</td>
                                            <td class="text-left">
                                                <b>{{ $agent->user->telephone }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Person Email</td>
                                            <td class="text-left">
                                                <b>{{ $agent->user->email }}</b></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                {{---------------------------------------------------------------------------------------------}}
                                <h4>Drug Info</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                             src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                          <a href="#">{{ $application->medicinal_product->medicine->product_name}}</a>
                        </span>
                                        <span
                                            class="description">{{ $application->medicinal_product->product_trade_name }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <table class="table table-sm table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td width="25%">Dosage Form</td>
                                            <td class="text-left">
                                                <b>{{ $dossier_evaluation_details->dosage_name }}</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Strength</td>
                                            <td class="text-left">
                                                <b>{{ $application->medicinal_product->strength_amount_strength_unit}}</b>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                {{---------------------------------------------------------------------------------------------}}


                            </div>
                        </div> {{--the Info paragraphes--}}
                    </div>
                    {{------------------------- PROGRESS ------------------------------}}
                    <div class="col-12 col-md-8 col-lg-4 text-muted">
                        <h4 class="text-primary"><i class="fas fa-project-diagram"></i> Progress</h4>
                        <br>
                        <div class="post">
                        <div class="progress">
                            @if($main_task->task_status=='pause')

                                <div
                                    class="progress-bar bg-gradient-warning progress-bar-striped"
                                    role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{  $dossier_evaluation_details->progress_percentage }}%">
                                    <span>{{  $dossier_evaluation_details->progress_percentage }}% Complete </span>
                                </div>
                            @else
                                <div
                                    class="progress-bar bg-gradient-green progress-bar-striped"
                                    role="progressbar" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{  $dossier_evaluation_details->progress_percentage }}%">
                                    <span>{{  $dossier_evaluation_details->progress_percentage }}% Complete </span>
                                </div>
                            @endif
                        </div>

                        <br>
                            <table class="table table-sm table-borderless table-condensed">
                                <tbody>
                                <tr>
                                    <td width="40%">Date Started</td>
                                    <td>{{$main_task->start_time}}</td>
                                </tr>
                                <tr>
                                    <td>Date Due</td>
                                    <td>{{$main_task->end_time}}</td>
                                </tr>
                                <tr>
                                    <td >Progress Status</td>
                                    <td class="text-left text-sm">
                                        @if($main_task->task_status=='pause')
                                            <span class="badge bg-warning">{{ $main_task->task_status }}</span>
                                            {{-- <label style="color: red">{{ $main_task->task_status }}</label>--}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pause Reason</td>
                                    <td class="text-left text-sm">
                                        <label>{{ $main_task->stopping_reason }} </label>
                                        @elseif($main_task->task_status=='inprogress')
                                            <span class="badge bg-primary">{{ $main_task->task_status }}</span>
                                        @elseif($main_task->task_status=='Locked')
                                            <span class="badge bg-danger">{{ $main_task->task_status }}</span>

                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>Dosage Form</td>
                                    <td class="text-left text-sm">
                                        <b>{{ $dossier_evaluation_details->dosage_name }}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Strength</td>
                                    <td class="text-left text-sm">
                                        <b>{{ $application->medicinal_product->strength_amount_strength_unit}}</b></td>
                                </tr>

                                </tbody>
                            </table>

                        </div> {{--end class post / will create horiz. line--}}

                        <br><br><br>

                            <h4>Evaluation Documents</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="" class="btn-link text-primary"><i class="far fa-fw fa-file-pdf"></i>
                                        Query_issued_1_Sept202021.pdf</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-primary"><i class="far fa-fw fa-file-pdf"></i>
                                        Letter-to-Inspection-Dec272021.pdf</a>
                                </li>
                                <li>
                                    <a href="" class="btn-link text-primary"><i class="far fa-fw fa-file-word"></i>
                                        Assessment_report_1_Jan202021.docx</a>
                                </li>
                            </ul>
                            <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary" onclick="print_tab_overview()" id="print_overview_btn"><i class="fas fa-print "></i>
                                    Print Overview</a>
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->


</div>
