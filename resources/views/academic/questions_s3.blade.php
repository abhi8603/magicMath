<div class="col-md-12" id='s3'>
    <div id="countdown"></div>
    @foreach($section3 as $key=>$value)
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Question No : {{$pageno}}</h3>

            </div>
            <div class="card-body" style="text-align: -webkit-center;padding-bottom:0px;">
                <div class="row" style="flex-flow: inherit;">
                    <div class="col-md-3" style="margin-left: -10px;">
                        <i style="margin-bottom: 15px;" class="fa fa-arrow-circle-right circle s3_forword" page={{$pageno}} data-toggle="tooltip" title="Next Question" ></i>
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
                 <div class="col-md-3"  style="margin-left: -12px;">
                        <i style="margin-bottom: 15px;" class="fa fa-arrow-circle-left circle s3_backword" page={{$pageno}} data-toggle="tooltip" title="Previous Question" ></i>
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
    @endforeach
    {{$section3->links()}}
</div>