@extends('core/header')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Student</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Student Admission</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary border-primary text-white-50">
                <h4 class="card-title text-white">Student Admission</h4>
                <a style="margin-top: -34px;float:right;" href="{{url('student/import')}}" class="btn btn-info">Import</a>

            </div>
            <div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Class Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Session Year <span style="color:red;"> *</span></label>
                                    <select class="form-control select2 " style="height: 40px;">
                                        <option>Please Select</option>
                                        @foreach(session_year(true) as $key=>$value)
                                        <option value="{{$value->session}}">{{$value->session}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Roll Number</label>
                                    <input type="text" class="form-control" name="reg_no" id="reg_no" onkeypress="return RestrictSpace()" placeholder="Roll Number" autocomplete="off" required>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="mb-3">
                                    <label>Admission Date <span style="color:red;"> *</span></label>
                                    <input type="text" class="form-control datepicker-basic" >
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="mb-3">
      
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
<script>
    if ($(".custom-file-container").length > 0) {
        var firstUpload = new FileUploadWithPreview("myFirstImage");
        var secondUpload = new FileUploadWithPreview("mySecondImage");
    }
</script>
<script>
    $("#commentForm").validate();
</script>
@endsection