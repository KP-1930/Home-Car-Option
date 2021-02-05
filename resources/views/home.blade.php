@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success" align="center">
            <p>{{ $message }}</p>
        </div>
 @endif


 <h2 style="text-align:center;">User Grid</h2>
 <!-- <div class="container">
              <form method="get" action="{{route('search')}}">
                     @csrf
              <div class="input-group">
                        <input type="search" name="search" placeholder="Search.."  id = "search" />
                        <span class="input-group-prepend">
                          <button type="submit" class="btn btn-primary">search</button>
                        </span>
              </div>  
</div> -->



@include('search')
 <div class="container">
 <div class="row">
 <div class=" col d-flex justify-content-end">

  <div ><a href="{{ route('create')}}" class="btn btn-success mr-4" >Add</a></div>
  <div ><a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger" >Generate PDF</a></div>
  </div>
  </div>
  </div>



  <div class="table">
  <table class="responsive">
   <thead>
    <tr>
        <th width="280px">Id</th>
        <th width="280px">First Name</th>
        <th width="280px">Last Name</th>
        <th width="280px">Email</th>
        <th width="280px">Role</th>
        <th width="280px">Action</th>
    </tr>
   </thead>
   <tbody>
    <tr>
    	@foreach($data as $k)
		      <td>{{ $k->id }}</td>
		      <td>{{ $k->name }}</td>
		      <td>{{ $k->lastname }}</td>
		      <td>{{ $k->email }}</td>
          <td>{{ $k->roles['name'] }}</td>
              <td><a href="{{route('home.edit',$k->id)}}" class="fa fa-pencil"> </a>&nbsp;&nbsp;                     
            <a href="{{route('home.delete',$k->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="fa fa-trash"></a></td>                                   
    </tr>
  </tbody>
  @endforeach
  </table>



  {{$data->links()}}
  @if(Session::has('no-results'))
  <span style="display:flex; justify-content:center">{{Session::get('no-results')}}</span>
  @endif
  </div>
@endsection


