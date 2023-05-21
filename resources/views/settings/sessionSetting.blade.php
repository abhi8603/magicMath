@extends('core/header')

@push('css')

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Session Setting</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Session Setting</li>
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
                <h4 class="card-title">Add Session</h4>
            </div>
            <div class="card-body">
                <form  method="POST" action="{{url('session-setting')}}">
                    <input type="hidden" />
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Session</label>
                        <input required data-pristine-required-message="Please Enter a username" class="form-control" type="text" id="session" name="session" placeholder="Acadmic Session" require>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        <i class="bx bx-save font-size-16 align-middle me-2"></i> Save
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Session List</h4>
            </div>
            <div class="card-body">
                <form>
                    <table class="table">
                        <thead>
                            <tr>

                                <th>Session</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allsessions as $key=>$value)
                            <tr>
                                <td>{{$value->session}}</td>
                                <td>{{$value->status}}</td>
                                <td>
                                    @if($value->status=="Active")
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
                    {{$allsessions->links()}}

                </form>
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