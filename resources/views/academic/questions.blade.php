<div class="col-md-12" id='s1'>
    <div id="countdown"></div>
    @foreach($section1 as $key=>$value)
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Question No : {{$pageno}}</h3>

            </div>
            <div class="card-body" style="text-align: -webkit-center;padding-bottom:0px;">
            <div class="row" style="flex-flow: inherit;">
             <div class="col-md-3">
                            <i class="fa fa-arrow-circle-right circle s1_forword" page={{$pageno}} data-toggle="tooltip" title="Next Question" ></i>
                        </div>
                <div class="col-md-6" style="padding: 0px">
              
                    <?php
                    $questions = explode(",", $value->quesion);
                    for ($i = 0; $i < count($questions); $i++) { ?>
                        <div class=" selectgroup-pills">
                            <label class="selectgroup-item" style="width: 100%;">

                                <span style="color: #000;font-size: large;padding: 0px" class="selectgroup-button">{{$questions[$i]}}</span>
                            </label>
                        </div>
                    <?php  }   ?>

                </div>
               <div class="col-md-3">
                        <i class="fa fa-arrow-circle-left circle s1_backword" page={{$pageno}} data-toggle="tooltip" title="Previous Question" ></i>
                </div>
                </div>
                <div style="text-align: center;padding:0px;border-radius: 5px;" class="card-alert alert alert-success mb-0">
                    Select the correct answer
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <input type="hidden" name="pageno" class="pageno_val" value="{{$pageno}}" />
                    <input type="hidden" name="duration_s1" class="duration_s1" value="{{$value->duration}}" />
                     <input type="hidden" name="lastpage_s1" class="lastpage_s1" value="{{$lastpage ?? 0}}" />
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
    @endforeach
    <div class="col-md-12">
    {{$section1->links()}}
    </div>
</div>