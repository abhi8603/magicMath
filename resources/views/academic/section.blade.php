@extends('core/header')
@section('style')

@endsection
@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Abacus Test</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-server mr-2 fs-14"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Test</a></li>
        </ol>
    </div>
    <!--<div class="page-rightheader">-->
    <!--    <div class="btn btn-list">-->

    <!--        <a href="{{url('dashboard')}}" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Stop Test </a>-->

    <!--    </div>-->
    <!--</div>-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Test</h3>
            </div>
            <div class="card-body p-6">
                <div class="panel panel-primary" style="margin-top: -25px;">
                    <div class="col-md-12" style="padding:10px;">
                        <b> Total Attempt : <span style="color:red">{{$total_question[0]->total_q ?? ''}} / </span><span style="color:green" id="attp">0</span> </b>
                    </div>
                    <div class=" tab-menu-heading p-0 bg-light">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs" style="flex-flow: inherit">
                                <li id="s1" class=""><a href="#tab5" class="active" data-toggle="tab">Section 1</a></li>
                                <li id="s2" class="disabled" style="pointer-events: none;"><a href="#tab6" data-toggle="tab" class="">Section 2</a></li>
                                <li id="s3" style="pointer-events: none;"><a href="#tab7" data-toggle="tab" class="">Section 3</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active s1" id="tab5">
                                <div style="float: left;display: flex;" class="btn">Time Left :&nbsp;&nbsp; <span class="block"></span></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap" id="s1_t">
                                        <thead style="display: none;">
                                            <tr>
                                                <th>Sl</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $s1_page = 0; ?>
                                            @foreach($section1 as $keys=>$value)

                                            <tr>
                                                <td>
                                                    <div id='s1'>
                                                        <div class="row col-md-12 ">
                                                            <div id="countdown"></div>

                                                            <div class="col-md-12 col-lg-6">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Question No : <?php echo $keys + 1; ?></h3>

                                                                    </div>
                                                                    <div class="card-body" style="text-align: -webkit-center;">
                                                                        <div class="row" style="flex-flow: inherit;">
                                                                            <div class="col-md-3">
                                                                                <i class="fa fa-arrow-circle-left circle s1_backword" page={{$pageno}} data-toggle="tooltip" title="" data-original-title=""></i>
                                                                 
                                                                            </div>
                                                                            <div class="col-md-6">

                                                                                <?php
                                                                                $questions = explode(",", $value->quesion);
                                                                                
                                                                                for ($i = 0; $i < count($questions); $i++) { 
                                                                                $q=($questions[$i]=="") ? null :$questions[$i];
                                                                                  if (isset($q)) {
                                                                                ?>
                                                                                    <div class=" selectgroup-pills">
                                                                                        <label class="selectgroup-item" style="width: 100%;">

                                                                                            <span style="color: #000;font-size: large;padding:0%" class="selectgroup-button">{{$questions[$i]}}</span>
                                                                                        </label>
                                                                                    </div>
                                                                                <?php  } }  ?>

                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <i class="fa fa-arrow-circle-right circle s1_forword" page={{$pageno}} data-toggle="tooltip" title="" data-original-title=""></i>
                                                                 
                                                                            </div>
                                                                        </div>
                                                                        <div style="text-align: center;padding:0px;border-radius: 5px;" class="card-alert alert alert-success mb-0">
                                                                            Select the correct answer
                                                                        </div>
                                                                        <div class="col-md-6" style="padding: 10px">

                                                                            <input type="hidden" name="duration_s1" class="duration_s1" value="{{$value->duration}}" />

                                                                            <input type="hidden" name="prac_id" class="prac_id" value="{{$value->prac_id}}" />
                                                                            <?php
                                                                            $options = explode(",", $value->option);
                                                                            // $options = (array_filter($options));
                                                                            shuffle($options);
                                                                            for ($i = 0; $i < count($options); $i++) {

                                                                                if (trim($options[$i]) != "" || !empty($options[$i])) { ?>
                                                                                    <div class=" selectgroup-pills">
                                                                                        <label class="selectgroup-item" style="width: 100%;border: 1px solid #1b1489;border-radius: 20px;">
                                                                                            <input type="radio" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" name="answer" value="{{$options[$i]}}" class="selectgroup-input answer">
                                                                                            <span style="color: #000;font-size: large;padding: 1px;" class="selectgroup-button">{{$options[$i]}}</span>
                                                                                        </label>
                                                                                    </div>


                                                                            <?php  }
                                                                            }   ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>


                            <div class="tab-pane s2" id="tab6">
                                <div style="float: left;display: flex;" class="btn">Time Left : &nbsp;&nbsp; <span class="block_s2"></span></div>

                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap" id="s2_t">
                                        <thead style="display: none;">
                                            <tr>
                                                <th>Sl</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $s1_page = 0; ?>
                                            @foreach($section2 as $key2=>$value)

                                            <tr>
                                                <td>
                                                    <div id='s2'>
                                                        <div class="row col-md-12 ">
                                                            <div id="countdown"></div>

                                                            <div class="col-md-12 col-lg-6">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Question No : <?php echo $key2 + 1; ?></h3>

                                                                    </div>
                                                                    <div class="card-body" style="text-align: -webkit-center;">
                                                                        <div class="row" style="flex-flow: inherit;">
                                                                            <div class="col-md-3">

                                                                                <i class="fa fa-arrow-circle-left circle s2_backword" page={{$pageno}} data-toggle="tooltip" title="" data-original-title=""></i>


                                                                            </div>
                                                                            <div class="col-md-6">

                                                                                <?php
                                                                                $questions = explode(",", $value->quesion);
                                                                                for ($i = 0; $i < count($questions); $i++) { 
                                                                                $q=($questions[$i]=="") ? null :$questions[$i];
                                                                                if (isset($q)) { ?>
                                                                                
                                                                                    <div class=" selectgroup-pills">
                                                                                        <label class="selectgroup-item" style="width: 100%;">
                                                                                            <span style="color: #000;font-size: large;padding:0%" class="selectgroup-button">{{$questions[$i]}}</span>
                                                                                        </label>
                                                                                    </div>
                                                                                <?php  }  } ?>

                                                                            </div>
                                                                            <div class="col-md-3">

                                                                                <i class="fa fa-arrow-circle-right circle s2_forword" page={{$pageno}} data-toggle="tooltip" title="" data-original-title=""></i>

                                                                            </div>
                                                                        </div>
                                                                        <div style="text-align: center;padding:0px;border-radius: 5px;" class="card-alert alert alert-success mb-0">
                                                                            Select the correct answer
                                                                        </div>
                                                                        <div class="col-md-6" style="padding: 10px">

                                                                            <input type="hidden" name="duration_s2" class="duration_s2" value="{{$value->duration}}" />

                                                                            <input type="hidden" name="prac_id" class="prac_id" value="{{$value->prac_id}}" />
                                                                            <?php
                                                                            $options = explode(",", $value->option);
                                                                            // $options = (array_filter($options));
                                                                            shuffle($options);
                                                                            for ($i = 0; $i < count($options); $i++) {

                                                                                if (trim($options[$i]) != "" || !empty($options[$i])) { ?>
                                                                                    <div class=" selectgroup-pills">
                                                                                        <label class="selectgroup-item" style="width: 100%;border: 1px solid #1b1489;border-radius: 20px;">
                                                                                            <input type="radio" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" name="answer_s2" value="{{$options[$i]}}" class="selectgroup-input answer_s2">
                                                                                            <span style="color: #000;font-size: large;padding: 1px;" class="selectgroup-button">{{$options[$i]}}</span>
                                                                                        </label>
                                                                                    </div>


                                                                            <?php  }
                                                                            }   ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane row s3" id="tab7">
                                <div style="float: left;display: flex;" class="btn">
                                    Time Left : &nbsp;&nbsp; <span class="block_s3"></span>
                                </div>
                                <div class="table-responsive">
                                <div class="col-md-12">
                                    <table class="table table-bordered text-nowrap" id="s3_t">
                                        <thead style="display: none;">
                                            <tr>
                                                <th>Sl</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($section3 as $key3=>$value)
                                            <tr>
                                                <td>
                                                    <div class="row col-md-12" id='s3'>
                                                        <div id="countdown"></div>

                                                        <div class="col-md-12 col-lg-6">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Question No : {{$key3+1}}</h3>

                                                                </div>
                                                                <div class="card-body" style="text-align: -webkit-center;padding-bottom:0px;">
                                                                    <div class="row" style="flex-flow: inherit;">
                                                                        <div class="col-md-3" style="margin-left: -10px;">

                                                                            <i style="margin-bottom: 15px;" class="fa fa-arrow-circle-left circle s3_backword" page={{$pageno}} data-toggle="tooltip" title=""></i>

                                                                        </div>
                                                                        <div class="col-md-6" style="padding: 10px;margin-left: -14px;">

                                                                            <?php
                                                                            $questions = str_replace(",", "", $value->quesion);
                                                                            ?>
                                                                            <div class=" selectgroup-pills">
                                                                                <label class="selectgroup-item" style="width: 100%;">
                                                                                    <span style="color: #000;font-size: large;" class="selectgroup-button">{{$questions}}</span>
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-3" style="margin-left: -12px;">

                                                                            <i style="margin-bottom: 15px;" class="fa fa-arrow-circle-right circle s3_forword" page={{$pageno}} data-toggle="tooltip" title=""></i>

                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center;" class="card-alert alert alert-success mb-0">
                                                                        Select the correct answer
                                                                    </div>
                                                                    <div class="col-md-6" style="padding: 10px">
                                                                        <input type="hidden" name="pageno" class="pageno_val_s3" value="{{$pageno}}" />
                                                                        <input type="hidden" name="lastpage_s3" class="lastpage_s3" value="{{$lastpage ?? 0}}" />
                                                                        <input type="hidden" name="duration_s3" class="duration_s3" value="{{$value->duration}}" />
                                                                        <?php
                                                                        $options = explode(",", $value->option);
                                                                        shuffle($options);
                                                                        for ($i = 0; $i < count($options); $i++) { ?>
                                                                            <div class=" selectgroup-pills">
                                                                                <label class="selectgroup-item" style="width: 100%;border: 1px solid #1b1489;border-radius: 20px;">
                                                                                    <input type="radio" name="answer_s3" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" value="{{$options[$i]}}" class="selectgroup-input answer_s3">
                                                                                    <span style="color: #000;font-size: large;" class="selectgroup-button">{{$options[$i]}}</span>
                                                                                </label>
                                                                            </div>
                                                                        <?php  }   ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
    </div>
    @endsection
    @section('script')

    <script src="{{ URL::asset('assets/timer.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function disableF5(e) {
            if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault();
        };

        $(document).ready(function() {

            var table_s1 = $('#s1_t').DataTable({
                responsive: false,
                pageLength: 1,
                bInfo: false,
                searching: false,
                lengthChange: false,
                ordering: false
            });

            var table_s2 = $('#s2_t').DataTable({
                responsive: false,
                pageLength: 1,
                bInfo: false,
                searching: false,
                lengthChange: false,
                ordering: false
            });

            var table_s3 = $('#s3_t').DataTable({
                responsive: false,
                pageLength: 1,
                bInfo: false,
                searching: false,
                lengthChange: false,
                ordering: false
            });

            $(document).on("keydown", disableF5);
        });
    </script>

    <script>
        var duration = $(".duration_s1").val();

        // alert(duration)
        set_timer($('.block'), [0, 0, parseInt(duration), 0], 's1', function(block) {
            //   alert( $("#s2").attr('style'));
            $("#s2").removeAttr("style");
            $('#s2 a[href="#tab6"]').trigger('click');
        });
    </script>

    <script>
        $('#s2 a[href="#tab6"]').on('click', function() {
            //  $("#s1").attr("pointer-events","none");
            $("#s1").css("pointer-events", "none");
            var durations1 = $(".duration_s2").val();
            set_timer($('.block_s2'), [0, 0, parseInt(durations1), 0], 's2', function(block) {
                //   alert( $("#s2").attr('style'));
                $("#s3").removeAttr("style");
                $('#s3 a[href="#tab7"]').trigger('click');
            })
        })

        $('#s3 a[href="#tab7"]').on("click", function() {
            var durations3 = $(".duration_s3").val();
            $("#s2").css("pointer-events", "none");
            set_timer($('.block_s3'), [0, 0, parseInt(durations3), 0], 's3', function(block) {
                //  $("#s3").attr("style","pointer-events:none");
                $("#s3").css("pointer-events", "none");
                swal({
                    title: "Time's Up",
                    text: "Please Click Ok Button to submit your exam !",
                    icon: "success",
                    button: "Ok",
                }).then((value) => {
                    swal(`Thank You !`);
                    if (value) {
                        updatePractiseSession($(".prac_id").val())
                    } else {
                        updatePractiseSession($(".prac_id").val())
                    }
                });

            });
        });

        function updatePractiseSession(id) {
            $.ajax({
                url: "{{ route('update-practice-session-status') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(data) {
                    var _url = $("#_url").val();
                    window.location.href = _url + "/dashboard";
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            localStorage.removeItem('timer_start_s1');
            localStorage.removeItem('timer_start_s2');
            localStorage.removeItem('timer_start_s3');
        });    

        $(document).on('click', '.s1_backword', function(event) {
            event.preventDefault();
            $("#s1_t_previous").click();
        });

        $(document).on('click', '.s1_forword', function(event) {
            event.preventDefault();
            $("#s1_t_next").click();
        });

        $(document).on('click', '.answer', function() {
            var page = $(".pageno_val").val();
            var data = $(this).attr('data');
            var selectedValue = this.value;
            var lastpage_s1 = $(".lastpage_s1").val();
            let attm = $("#attp").text();
            $("#attp").text(parseInt(attm) + 1)
            if (lastpage_s1 == page) {
                fetch_data_s1((parseInt(lastpage_s1)), data, selectedValue);
            } else {
                fetch_data_s1((parseInt(page) + parseInt(1)), data, selectedValue);
            }
        });

        function fetch_data_s1(page, data = null, selectedValue = null) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('fetch-data') }}",
                method: "POST",
                cache: true,
                data: {
                    page: page,
                    data: data,
                   
                    selectedValue: selectedValue
                },
                success: function(data) {
                  console.log(new Date().toISOString());
                    $('#s1_t_next').click();
                }
            });
        }   


        $(document).on('click', '.s3_backword', function(event) {
            event.preventDefault();
            $("#s3_t_previous").click();
        });

        $(document).on('click', '.s3_forword', function(event) {
            event.preventDefault();
            $("#s3_t_next").click();
        });


        $(document).on('click', '.answer_s3', function() {
            var page = $(".pageno_val_s3").val();
            var data = $(this).attr('data');
            var selectedValue = this.value;
            let attm = $("#attp").text();
            $("#attp").text(parseInt(attm) + 1)
            var lastpage_s3 = $(".lastpage_s3").val();
           
            fetch_data_s3((parseInt(page) + parseInt(1)), data, selectedValue);
        });


        function fetch_data_s3(page, data = null, selectedValue = null) {
            $.ajax({
                url: "{{ route('fetch-data-s3') }}",
                cache: true,
                method: "POST",
                data: {
                    page: page,
                    data: data,
                   
                    selectedValue: selectedValue
                },
                success: function(data) {
                  //  console.log("<?php echo date("Y-m-d H:i:s"); ?>");
                      console.log(new Date().toLocaleString());
                    $('#s3_t_next').click();
                }
            });
        }
     

        $(document).on('click', '.s2_backword', function(event) {
            event.preventDefault();
            $("#s2_t_previous").click();
        });

        $(document).on('click', '.s2_forword', function(event) {
            event.preventDefault();
            $("#s2_t_next").click();
        });


        $(document).on('click', '.answer_s2', function() {
            var page = $(".pageno_val_s2").val();
            var data = $(this).attr('data');
            var selectedValue = this.value;
            let attm = $("#attp").text();
            $("#attp").text(parseInt(attm) + 1)
            var lastpage_s2 = $(".lastpage_s2").val();
            fetch_data_s2((parseInt(page) + parseInt(1)), data, selectedValue);
        });


        function fetch_data_s2(page, data = null, selectedValue = null) {
            $.ajax({
                url: "{{ route('fetch-data-s2') }}",
                method: "POST",
                 cache: true,
                data: {
                    page: page,
                    data: data,
                   
                    selectedValue: selectedValue
                },
                success: function(data) {
                    $('#s2_t_next').click();
                }
            });
        }
    </script>


    @endsection