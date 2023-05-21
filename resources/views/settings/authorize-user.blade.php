@extends('core/header')

@push('css')

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Authorize User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Authorize User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    @include('notification.notify')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Authorize User</h4>
            </div>
            <div class="card-body">
                <form  method="POST" action="{{url('authorize-user')}}">
                    <input type="hidden" />
                    <div class="mb-4">
                        <label class="form-label" for="default-input">User</label>
                        <select class="select2 form-control" name="user_id">
                            <option value="">Please Select</option>
                            @foreach($users as $key=>$value)
                            <option value="{{$value->id}}">{{$value->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
               </div>
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Auth Types</label>
                        <select class="select2 form-control" name="auth_type">
                            <option value="">Please Select</option>
                            @foreach($auth_types as $key=>$value)
                            <option value="{{$value->type}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-save font-size-16 align-middle me-2"></i> Authorize
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Authorization  List</h4>
            </div>
            <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                        <thead>
                            <tr>
                                <th>Auth Name</th>
                                <th>Authorize User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_auth_types as $key=>$value)
                            <tr>
                                <td>{{$value->auth_name}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @if($value->status=="1")
                                    <a  id="{{$value->id}}" class="inactive btn btn-danger waves-effect waves-light">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @else
                                    <a id="{{$value->id}}" class="active btn btn-primary waves-effect waves-light">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{$user_auth_types->links()}}
            </div>
        </div>
    </div>

</div>

@endsection


@section('script')
<script>
        $(document).ready(function () {
            /*For Delete Application Info*/
            $(".active").click(function (e) {
                e.preventDefault();
                var id = this.id;
                //alert(id);
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/exam/delete/" + id;
                    }
                });
            });

        });
    </script>
@endsection