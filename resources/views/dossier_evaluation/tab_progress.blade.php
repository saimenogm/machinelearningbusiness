{{--------------------START progress tab ------------------}}
<div class="tab-pane fade " id="custom-tabs-three-progress" role="tabpanel"
     aria-labelledby="custom-tabs-three-progress-tab">

    <div class="col-md-8 offset-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Evaluation Check List</h3>
            </div>


            <div class="row">
                @include('dossier_evaluation.progress_status')
            </div>

        </div>
    </div>
</div>

<script>


    function update_QOS_status(o)
     {
        let id = o.value;
        
        // alert(document.getElementById("qos_status").checked)

        // if checkbox is checked, update status in db
        // todo if uncheck (after being checked) -- reset status in db or what ??
        if (o.checked) {

            $.ajax({

                type: 'GET',
                url: "{{ route('update_qos_status') }}",
                data: {id: id},

                success: function (data) {


                   o.checked = true;
                    o.disabled = true;

                },
                error: function (data) {
                    console.log(data);

                }
            });
        }
        /*else {  // unchecked
            //document.getElementById('qos_status').checked = false;
            //document.getElementById('qos_status').disabled = false;
        }*/

    }

</script>
