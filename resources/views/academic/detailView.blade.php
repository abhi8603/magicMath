@extends('core/header')
@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Detail View</a></li>
        </ol>
    </div>

</div>

<div class="row">

    <div class="col-lg-12 col-md-12">
        @include('notification.notify')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail View For Practice Id : {{$prac_id}} </h3>
            </div>
            <div class="card-body">
                <div class=" tab-menu-heading p-0 bg-light">
                    <div class="tabs-menu1 ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs" style="flex-flow: inherit">
                            <li class=""><a href="#tab5" class="active" data-toggle="tab">Section 1</a></li>
                            <li><a href="#tab6" data-toggle="tab" class="">Section 2</a></li>
                            <li><a href="#tab7" data-toggle="tab" class="">Section 3</a></li>

                        </ul>
                    </div>
                </div>

                <div class="panel-body tabs-menu-body">
                    <div class="tab-content">
                        <div class="tab-pane active s1" id="tab5">
                             <div class="table-responsive">
                            <table class="table table-bordered text-nowrap" id="s1_t" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Q. No</th>
                                        <th>Question</th>
                                        <th>Option</th>
                                        <th>Right Answer</th>
                                        <th>Opted Answer</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: -webkit-center;">
                                    @foreach($section1 as $key1=>$value)
                                    <tr style="<?php if($value->answer!=$value->user_answer) {echo "background:#b1423a";} ?>">
                                        <td>{{$key1+1}}</td>
                                        <td>
                                            <div class="col-md-6">

                                                <?php
                                                $questions = explode(",", $value->quesion);
                                                for ($i = 0; $i < count($questions); $i++) { 
                                                 $q=($questions[$i]=="") ? null :$questions[$i];
                                                 if (isset($q)) { ?>
                                                    <div class=" selectgroup-pills"  data="{{$q}}">
                                                        <label class="selectgroup-item" style="width: 100%;">

                                                            <span style="color: #000;font-size: large;padding:0%" class="selectgroup-button">{{$questions[$i]}}</span>
                                                        </label>
                                                    </div>
                                                <?php  } }  ?>

                                            </div>
                                        </td>
                                        <td>
                                            

                                                <?php
                                                $options = explode(",", $value->option);
                                                // $options = (array_filter($options));

                                                for ($i = 0; $i < count($options); $i++) {

                                                    if (trim($options[$i]) != "" || !empty($options[$i]) || trim($options[$i]) != " ") { ?>
                                                        <div class=" selectgroup-pills" data="{{$options[$i]}}">
                                                            <label class="selectgroup-item" style="width: 100%;">
                                                                <input type="radio" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" name="answer" value="{{$options[$i]}}" class="selectgroup-input">
                                                                <span style="color: #000;font-size: large;padding: 1px;" class="selectgroup-button">{{isset($options[$i]) ? $options[$i] : 0 }}</span>
                                                            </label>
                                                        </div>


                                                <?php  }
                                                }   ?>
                                           
                                        </td>
                                        <td>{{$value->answer}}</td>
                                        <td>{{$value->user_answer}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="tab6">
                             <div class="table-responsive">
                            <table class="table table-bordered text-nowrap" id="s1_t" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Q. No</th>
                                        <th>Question</th>
                                        <th>Option</th>
                                        <th>Right Answer</th>
                                        <th>Opted Answer</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: -webkit-center;">
                                    @foreach($section2 as $key1=>$value)
                                    <tr style="<?php if($value->answer!=$value->user_answer) {echo "background:#b1423a";} ?>">
                                        <td>{{$key1+1}}</td>
                                        <td>
                                            <div class="col-md-6">

                                                <?php
                                                $questions = explode(",", $value->quesion);
                                                for ($i = 0; $i < count($questions); $i++) { 
                                                
                                                ?>
                                                    <div class=" selectgroup-pills">
                                                        <label class="selectgroup-item" style="width: 100%;">

                                                            <span style="color: #000;font-size: large;padding:0%" class="selectgroup-button">{{$questions[$i]}}</span>
                                                        </label>
                                                    </div>
                                                <?php  }   ?>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-6" style="padding: 10px">

                                                <?php
                                                $options = explode(",", $value->option);
                                                // $options = (array_filter($options));

                                                for ($i = 0; $i < count($options); $i++) {

                                                    if (trim($options[$i]) != "" || !empty($options[$i])) { ?>
                                                        <div class=" selectgroup-pills">
                                                            <label class="selectgroup-item" style="width: 100%;">
                                                                <input type="radio" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" name="answer" value="{{$options[$i]}}" class="selectgroup-input">
                                                                <span style="color: #000;font-size: large;padding: 1px;" class="selectgroup-button">{{$options[$i]}}</span>
                                                            </label>
                                                        </div>


                                                <?php  }
                                                }   ?>
                                            </div>
                                        </td>
                                        <td>{{$value->answer}}</td>
                                        <td>{{$value->user_answer}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane " id="tab7">
                             <div class="table-responsive">
                            <table class="table table-bordered text-nowrap" id="s1_t" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Q. No</th>
                                        <th>Question</th>
                                        <th>Option</th>
                                        <th>Right Answer</th>
                                        <th>Opted Answer</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: -webkit-center;">
                                    @foreach($section3 as $key1=>$value)
                                    <tr style="<?php if($value->answer!=$value->user_answer) {echo "background:#b1423a";} ?>">
                                        <td>{{$key1+1}}</td>
                                        <td>
                                            <div class="col-md-6">

                                                <?php
                                                $questions = explode(",", $value->quesion);
                                                for ($i = 0; $i < count($questions); $i++) { ?>
                                                    <div class=" selectgroup-pills">
                                                        <label class="selectgroup-item" style="width: 100%;">

                                                            <span style="color: #000;font-size: large;padding:0%" class="selectgroup-button">{{$questions[$i]}}</span>
                                                        </label>
                                                    </div>
                                                <?php  }   ?>

                                            </div>
                                        </td>
                                        <td>
                                             <div class="col-md-6" style="padding: 10px">
                                                                     
                                                                        <?php
                                                                        $options = explode(",", $value->option);
                                                                        shuffle($options);
                                                                        for ($i = 0; $i < count($options); $i++) { ?>
                                                                            <div class=" selectgroup-pills">
                                                                                <label class="selectgroup-item" style="width: 100%">
                                                                                    <input type="radio" name="answer_s3" data="<?php echo $value->main_id . "|" . $value->question_id; ?>" value="{{$options[$i]}}" class="selectgroup-input answer_s3">
                                                                                    <span style="color: #000;font-size: large;" class="selectgroup-button">{{$options[$i]}}</span>
                                                                                </label>
                                                                            </div>
                                                                        <?php  }   ?>
                                                                    </div>
                                        </td>
                                        <td>{{$value->answer}}</td>
                                        <td>{{$value->user_answer}}</td>
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



@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.table').DataTable({
          //  responsive:true
        });
    });
</script>
@endsection