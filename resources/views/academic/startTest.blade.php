@extends('core/header')
@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Start Test</a></li>
        </ol>
    </div>
    
</div>
<div class="row">

    <div class="col-lg-12 col-md-12">
    @include('notification.notify')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Welcome {{Auth::user()->name}} !</h3>
            </div>
            <div class="card-body">
            <div class="col-md-12">
                <h4>Important Note</h4>
                <ul style="list-style:initial">
                    <li>There will be total 280 Questions. Divided into 3 sections</li>
                    <li>Each section have time limit</li>
                    <li>Try To Attemp Maximum Questions</li>
                </ul>
                <div class="col-md-12">
                  <h4 style="text-align: center;color:green">  Start Your Test by clicking on <b style="color: red;">Start Test</b> Button</h4>
                    <h5 style="text-align: center">Best of Luck !</h5>
                </div>
                <div class="col-md-12" style="text-align: center">
                <a href="{{route('start')}}" class="st btn btn-primary">Start Test</a>
                </div>
            </div>

              
            </div>
        </div>


    </div>

</div>

@endsection
@section('script')
<script>
$(document).ready(function() {
$(".st").click(function(e){
    $(".st").css("pointer-events", "none");
})
})
</script>
@endsection