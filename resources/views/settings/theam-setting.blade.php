@extends('core/header')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Theam Setting</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Theam Setting</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Save Theam Settings</h4>             
            </div>
            <div class="card-body p-12">
            <form method="post" action="{{url('theam-setting')}}">
                <div class="row">
                @include('notification.notify')
                  
                    <div class="col-lg-6">
                        <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_mode" id="layout-mode-light" value="light" <?php if(TheamSetting(Auth::user()->school_id,'layout_mode')=="light"){ echo"checked"; }?>>
                            <label class="form-check-label" for="layout-mode-light">Light</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_mode" id="layout-mode-dark" value="dark" <?php if(TheamSetting(Auth::user()->school_id,'layout_mode')=="dark"){ echo"checked"; }?>>
                            <label class="form-check-label" for="layout-mode-dark">Dark</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_width" id="layout-width-fuild" value="fuild" <?php if(TheamSetting(Auth::user()->school_id,'layout_width')=="fuild"){ echo"checked"; }?> onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                            <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_width" id="layout-width-boxed" value="boxed"  <?php if(TheamSetting(Auth::user()->school_id,'layout_width')=="boxed"){ echo"checked"; }?> onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                            <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_position" id="layout-position-fixed" value="fixed" <?php if(TheamSetting(Auth::user()->school_id,'layout_position')=="0"){ echo"checked"; }?> onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                            <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="layout_position" id="layout-position-scrollable" value="scrollable" <?php if(TheamSetting(Auth::user()->school_id,'layout_position')=="1"){ echo"checked"; }?>  onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                            <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topbar_color" id="topbar-color-light" value="light" <?php if(TheamSetting(Auth::user()->school_id,'topbar_color')=='light'){ echo"checked"; }?>  onchange="document.body.setAttribute('data-topbar', 'light')">
                            <label class="form-check-label" for="topbar-color-light">Light</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topbar_color" id="topbar-color-dark" value="dark" <?php if(TheamSetting(Auth::user()->school_id,'topbar_color')=='dark'){ echo"checked"; }?> onchange="document.body.setAttribute('data-topbar', 'dark')">
                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
                        </div>

                        <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar_size" id="sidebar-size-default" value="lg"  <?php if(TheamSetting(Auth::user()->school_id,'sidebar_size')=='lg'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                            <label class="form-check-label" for="sidebar-size-default">Default</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar_size" id="sidebar-size-compact" value="md" <?php if(TheamSetting(Auth::user()->school_id,'sidebar_size')=='md'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                            <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                        </div>
                        <div class="form-check sidebar-setting">
                            <input class="form-check-input" type="radio" name="sidebar_size" id="sidebar-size-small" value="sm" <?php if(TheamSetting(Auth::user()->school_id,'sidebar_size')=='sm'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                            <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                        </div>
                        <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar_color" id="sidebar-color-light" value="light"  <?php if(TheamSetting(Auth::user()->school_id,'sidebar_color')=='light'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar_color" id="sidebar-color-dark" value="dark" <?php if(TheamSetting(Auth::user()->school_id,'sidebar_color')=='dark'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar_color" id="sidebar-color-brand" value="brand" <?php if(TheamSetting(Auth::user()->school_id,'sidebar_color')=='brand'){ echo"checked"; }?> onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>
                    </div>

                    <div class="mt-4 text-center m-t-20">
                                    <button type="submit" class="btn btn-primary w-md btn-lg mb-3">Save &amp;
                                        update</button>
                    </div> 


                </div>
                @csrf
                </form>
            </div>

        </div>
    </div>
</div>
<div class="card-body">


</div>


@endsection