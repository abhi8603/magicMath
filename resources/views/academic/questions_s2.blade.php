<div class="col-md-12" id='s2'>
<div id="countdown"></div>
    @foreach($section2 as $key=>$value)
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Question No : {{$pageno}}</h3>
              
            </div>
            <div class="card-body" style=" text-align: -webkit-center;padding-bottom:0px;">
                  <div class="row"  style="flex-flow: inherit;">
                        <div class="col-md-3">
                            <i class="fa fa-arrow-circle-right circle s2_forword" page={{$pageno}} data-toggle="tooltip" title="Next Question" ></i>
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
                        <i class="fa fa-arrow-circle-left circle s2_backword" page={{$pageno}} data-toggle="tooltip" title="Previous Question" ></i>
                </div>
                    </div>
                <div style="text-align: center;padding:0px;border-radius: 5px;" class="card-alert alert alert-success mb-0">
                    Select the correct answer
                </div>
                <div class="col-md-6" style="padding: 10px">
                <input type="hidden" name="pageno" class="pageno_val_s2" value="{{$pageno}}"/>
                    <input type="hidden" name="lastpage_s2" class="lastpage_s2" value="{{$lastpage ?? 0}}" />
                <input type="hidden" name="duration_s2" class="duration_s2" value="{{$value->duration}}"/>
                    <?php
                    $options = explode(",", $value->option);
                    shuffle($options);
                    for ($i = 0; $i < count($options); $i++) { ?>
                        <div class=" selectgroup-pills">
                            <label class="selectgroup-item" style="width: 100%;border: 1px solid #1b1489;border-radius: 20px;">
                                <input type="radio" name="answer_s2" data="<?php echo $value->main_id."|".$value->question_id; ?>" value="{{$options[$i]}}" class="selectgroup-input answer_s2" >
                                <span style="color: #000;font-size: large;padding: 1px;" class="selectgroup-button">{{$options[$i]}}</span>
                            </label>
                        </div>
                    <?php  }   ?>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    {{$section2->links()}}
</div>
