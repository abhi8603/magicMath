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
                                <div id="table_data">

                                    @include('academic.questions')
                                </div>


                            </div>
                            <div class="tab-pane s2" id="tab6">
                                <div style="float: left;display: flex;" class="btn">Time Left : &nbsp;&nbsp; <span class="block_s2"></span></div>

                                <div id="table_data_s2">
                                    @include('academic.questions_s2')
                                </div>
                            </div>
                            <div class="tab-pane s3" id="tab7">
                                <div style="float: left;display: flex;" class="btn">Time Left : &nbsp;&nbsp; <span class="block_s3"></span></div>

                                <div id="table_data_s3">
                                    @include('academic.questions_s3')
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
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
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
        set_timer($('.block_s3'), [0, 0,parseInt(durations3), 0], 's3', function(block) {
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
                }else{
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

    $(document).on('click', '#s1 .page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data_s1(page);
    });
    
     $(document).on('click', '.s1_backword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
          var lastpage_s1 =$(".lastpage_s1").val();
       if(page==1){
            page=1;
        }
        if(lastpage_s1 == page){
            page = lastpage_s1
        }
        fetch_data_s1(parseInt(page)-1);
      
    });
    
       $(document).on('click', '.s1_forword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
       var lastpage_s1 =$(".lastpage_s1").val();
        if(page==1){
            page=1+1;
        }else if(lastpage_s1 == page){
            page = parseInt(lastpage_s1);
        }else{
            page=parseInt(page)+1;
        }
        fetch_data_s1(parseInt(page));
    });

    $(document).on('click', '.answer', function() {
        var page = $(".pageno_val").val();
        var data = $(this).attr('data');
        var selectedValue = this.value;
        var lastpage_s1 =$(".lastpage_s1").val();
        let attm = $("#attp").text();
        $("#attp").text(parseInt(attm) + 1)
       if(lastpage_s1 == page){
        fetch_data_s1((parseInt(lastpage_s1)), data, selectedValue);
        }else{
            fetch_data_s1((parseInt(page) + parseInt(1)), data, selectedValue);
        }
    });

    function fetch_data_s1(page, data = null, selectedValue = null) {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "{{ route('fetch-data') }}",
            method: "POST",
            data: {
                page: page,
                data: data,
                cache:true,
                selectedValue: selectedValue
            },
            success: function(data) {
                $('#table_data').html(data);
            }
        });
    }

    $(document).on('click', '#s3 .page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data_s3(page);
    });
    
    
  $(document).on('click', '.s3_backword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
       var lastpage_s3 =$(".lastpage_s3").val();
       // alert(page);
        if(page==1){
            page=1;
        }
        if(lastpage_s3 == page){
            page = lastpage_s3
        }
        fetch_data_s3(parseInt(page)-1);
    });

    $(document).on('click', '.s3_forword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
       var lastpage_s3 =$(".lastpage_s3").val();
        if(page==1){
            page=1+1;
        }else if(lastpage_s3 == page){
            page = parseInt(lastpage_s3);
        }else{
            page=parseInt(page)+1;
        }
        fetch_data_s3(parseInt(page));
    });


    $(document).on('click', '.answer_s3', function() {
        var page = $(".pageno_val_s3").val();
        var data = $(this).attr('data');
        var selectedValue = this.value;
        let attm = $("#attp").text();
        $("#attp").text(parseInt(attm) + 1)
        var lastpage_s3 =$(".lastpage_s3").val();
        if(lastpage_s3 == page){
            fetch_data_s3((parseInt(lastpage_s3)), data, selectedValue);
        }else{
            fetch_data_s3((parseInt(page) + parseInt(1)), data, selectedValue);
        }
    });


    function fetch_data_s3(page, data = null, selectedValue = null) {
        $.ajax({
            url: "{{ route('fetch-data-s3') }}",
            method: "POST",
            data: {
                page: page,
                data: data,
                cache:true,
                selectedValue: selectedValue
            },
            success: function(data) {
                $('#table_data_s3').html(data);
            }
        });
    }


    $(document).on('click', '#s2 .page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data_s2(page);
    });

  $(document).on('click', '.s2_backword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
      var lastpage_s2 =$(".lastpage_s2").val();
      //  alert(page);
        if(page==1){
            page=1;
        }
        if(lastpage_s2 == page){
            page = lastpage_s2
        }
        fetch_data_s2(parseInt(page)-1);
    });

    $(document).on('click', '.s2_forword', function(event) {
        event.preventDefault();
        var page = $(this).attr('page');
       var lastpage_s2 =$(".lastpage_s2").val();
        if(page==1){
            page=1+1;
        }else if(lastpage_s2 == page){
            page = parseInt(lastpage_s2);
        }else{
            page=parseInt(page)+1;
        }
        fetch_data_s2(parseInt(page));
    });


    $(document).on('click', '.answer_s2', function() {
        var page = $(".pageno_val_s2").val();
        var data = $(this).attr('data');
        var selectedValue = this.value;
        let attm = $("#attp").text();
        $("#attp").text(parseInt(attm) + 1)
         var lastpage_s2 =$(".lastpage_s2").val();
    //    fetch_data_s2((parseInt(page) + parseInt(1)), data, selectedValue);
        if(lastpage_s2 == page){
            fetch_data_s2((parseInt(lastpage_s2)), data, selectedValue);
        }else{
            fetch_data_s2((parseInt(page) + parseInt(1)), data, selectedValue);
        }
    });


    function fetch_data_s2(page, data = null, selectedValue = null) {
        $.ajax({
            url: "{{ route('fetch-data-s2') }}",
            method: "POST",
            data: {
                page: page,
                data: data,
                cache:true,
                selectedValue: selectedValue
            },
            success: function(data) {
                $('#table_data_s2').html(data);
            }
        });
    }
</script>


@endsection