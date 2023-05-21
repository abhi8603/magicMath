@extends('core/header')
@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Dashboard</a></li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="btn btn-list">
            <a href="{{url('generate-question')}}" class="btn btn-info"><i class="fe fe-settings mr-1"></i> sync File </a>
            
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-12 col-md-12">
    @include('notification.notify')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Attempt </h3>
            </div>
            <div class="card-body">
            <div class="table-responsive">
										<table class="table card-table table-vcenter text-nowrap table-success">
											<thead class="bg-success text-white">
												<tr>
                                                    <th class="text-white">Sl No</th>
													<th class="text-white">Practice Id</th>
													<th class="text-white">Total Question</th>
													<th class="text-white">Total Attempt</th>
													<th class="text-white">Right Answer</th>
                                                    <th class="text-white">Worng Answer</th>
                                                    <th class="text-white">Not Attempt</th>
                                                    <th class="text-white">Attempt %</th>
                                                    <th class="text-white">Accuracy</th>
                                                    <th class="text-white">Total Marks</th>
                                                    <th class="text-white">Submit Time</th>
                                                    <th class="text-white">Detail View</th>
												</tr>
											</thead>
											<tbody style="text-align:center">
                                                @php $i=0; @endphp
                                            @foreach($practicelist as $key=>$value)
                                            @php $i++; @endphp
												<tr>
													<th scope="row">{{$i}}</th>
                                                    <td>{{$value->prac_id}}</td>
													<td>{{$value->total_quest}}</td>
													<td>{{$value->total_attempt}}</td>
													<td>{{$value->right_answer}}</td>
                                                    <td>{{$value->worng_answer}}</td>
                                                    <td>{{$value->not_attempt}}</td>
                                                    <td>{{$value->att_percentage}}</td>
                                                    <td>{{$value->accuracy}}</td>
                                                     <td>{{$value->total_marks}}</td>
                                                      <td>{{$value->updated_at}}</td>
                                                     <td>
                                                      <form method="post" action="{{url('view/details')}}">
                                                          <input type="hidden" name="prac_id" value= {{$value->prac_id ?? 0}} />
                                                          <input type="submit" class="btn btn-info" value="View"/>
                                                          @csrf
                                                      </form>
                                                
                                                    </td>
                                                    
												</tr>				
												
                                                @endforeach
											
											</tbody>
										</table>
                                        {{$practicelist->links()}}
									</div>
              
            </div>
        </div>


    </div>

</div>

@endsection