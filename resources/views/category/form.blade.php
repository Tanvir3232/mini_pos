@extends('layout.main')
@section('main_content')
    @if($errors->any())
        <div class="alert alert-danger">
        	<ul>
        		@foreach($errors->all() as $error)
                   <li>{{$error}}</li>
        		@endforeach
        	</ul>
        </div>
    @endif
    
    
    <h2>{{ $headline}}</h2>
   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $headline}}</h6>
        </div>
        
        <div class="card-body ">
        	<div class="row justify-content-md-center">
        		<div class="col-md-6">
        		  @if($mode == 'edit')
                     {!! Form::model($category,['route' => ['categories.update', $category->id],'method'=>'put']) !!}
                  @else
                     {!! Form::open(['route' => 'categories.store','method'=>'post']) !!}
        		  @endif
        		 
            	  
            	
				  <div class="mb-3  form-group row">
				    <label for="title" class="col-sm-3 col-form-label">Title</label>
				    <div class="col-sm-9">
				    	{{Form::text('title',NULL,['class'=>'form-control', 'id' => 'title', 'placeholder'=>'category name'])}}
				    </div>
				  </div>
				  
				  <div class="text-right">
				  	  <button type="submit" class="btn btn-primary ">Submit</button>
				  </div>
				  
			{!! Form::close() !!}
        		</div>
        	</div>
           
        </div>
    </div>
@stop