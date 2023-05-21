@extends('core/header')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">General Settings</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
        
        <form method="post" id="commentForm" enctype="multipart/form-data" action="{{url('general-setting')}}">
            @include('notification.notify')
            
            <div class="col-md-12 row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Logo Upload</h5>
                        <p>Recommended image size is 40px x 40px</p>
                    </div>
                    <div class="card-body">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="logo" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Fevicon Upload</h5>
                        <p>Recommended image size is 16px x 16px</p>
                    </div>
                    <div class="card-body">
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="fev_icon" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
               
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Setting</h4>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">School Name <span class="text-danger">*</span></label>
                                        <input type="text" name="school_name" class="form-control" value="<?php echo isset($schoolSettting[0]->school_name) ? $schoolSettting[0]->school_name : '' ?>" data-msg="Please fill School Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Contact Person</label>
                                        <input type="text" name="contact_person" class="form-control" value="{{$schoolSettting[0]->admin_cont_name ?? ''}}" data-msg="Please fill Contact Person" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="address" placeholder="Address" rows="4" data-msg="Please fill Address" required>{{$schoolSettting[0]->school_address ?? ''}}</textarea>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                        <label class="form-label">Country <span class="text-danger">*</span></label>
                                        <select name="contry" class="form-control select" data-msg="Please fill Country" required>
                                            <option @if  ($schoolSettting[0]->admin_cont_name ?? '' =='country') echo 'selected';  @endif value="India">India</option>
                                            <option @if  ($schoolSettting[0]->admin_cont_name ?? '' =='Other') echo 'selected';  @endif value="Other">Other</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                        <label class="form-label">state/Province <span class="text-danger">*</span></label>
                                        <input type="text" name="state" class="form-control" data-msg="Please fill state/Province" required value="{{$schoolSettting[0]->state ?? ''}}">

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="form-control" data-msg="Please fill City" required value="{{$schoolSettting[0]->city ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                            <input type="text" name="postal_code" class="form-control" data-msg="Please fill Postal Code" required  value="{{$schoolSettting[0]->pincode ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" data-msg="Please fill Email" required value="{{$schoolSettting[0]->school_email ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone_no" class="form-control" value="{{$schoolSettting[0]->school_phone ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" name="mobile_no" class="form-control" data-msg="Please fill Mobile Number" required value="{{$schoolSettting[0]->school_mobile ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Fax</label>
                                            <input type="text" name="fax" class="form-control" value="{{$schoolSettting[0]->school_fax ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">School Code</label>
                                            <input type="text" name="insitute_code" class="form-control" value="{{$schoolSettting[0]->insitute_code ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Website Url</label>
                                            <input type="text" name="website_url" class="form-control" value="{{$schoolSettting[0]->website_url ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">School Logo </label><br><br>
                                                <img src="{{url($schoolSettting[0]->logo ?? '')}}" style="height: 100px;width:100px"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">School FevIcon</label><br><br>
                                            <img src="{{url($schoolSettting[0]->favicon ?? '')}}" style="height: 100px;width:100px"/>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="mt-4 text-center m-t-20">
                                        <button type="submit" class="btn btn-primary w-md btn-lg mb-3">Save &amp;
                                            update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @csrf
               
            </div>
            </div>
            </form>
           
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