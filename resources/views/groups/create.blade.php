@extends('layout.main')
@section('main_content')
    <h2>Create a New Group</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>

        <div class="card-body ">
            <form method="post" action="{{url('groups')}}">
            	  @csrf
				  <div class="mb-3 justify-content-md-center">
				    <label for="title" class="form-label">Title</label>
				    <input type="text" name="title" id='title' class="form-control" placeholder="Group title">
				    
				  </div>
				 
				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
        </div>
    </div>
@stop