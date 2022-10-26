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
        		<div class="col-md-8">
        		  @if($mode == 'edit')
                     {!! Form::model($product,['route' => ['products.update', $product->id],'method'=>'put']) !!}
                  @else
                     {!! Form::open(['route' => 'products.store','method'=>'post']) !!}
        		  @endif
        		 
            	  
            	  <div class="mb-3  form-group row">
				    <label for="address" class="col-sm-2 col-form-label">User group <span class="text-danger">*</span></label>
				    <div class="col-sm-10">
				    	{{Form::select('category_id', $categories,NULL,['class'=>'form-control', 'id' => 'category_id','placeholder'=>'select category'] )}}
				    </div>
				  </div>
				  <div class="mb-3  form-group row">
				    <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
				    <div class="col-sm-10">
				    	<!-- <input type="text" name="name" id='name' class="form-control" placeholder="user name"> -->
				    	{{Form::text('title',NULL,['class'=>'form-control', 'id' => 'title', 'placeholder'=>'product title'])}}
				    </div>
				  </div>

				  <div class="mb-3  form-group row">
				    <label for="description" class="col-sm-2 col-form-label">product description</label>
				    <div class="col-sm-10">
				    	{{Form::textarea('description',NULL,['class'=>'form-control', 'id' => 'description', 'placeholder'=>'product description'])}}
				    </div>
				  </div>


				  <div class="mb-3  form-group row">
				    <label for="cost_price" class="col-sm-2 col-form-label">Cost price<span class="text-danger">*</span></label>
				    <div class="col-sm-10">
				    	{{Form::text('cost_price',NULL,['class'=>'form-control', 'id' => 'cost_price', 'placeholder'=>'cost price'])}}
				    </div>
				  </div>

				  <div class="mb-3  form-group row">
				    <label for="price" class="col-sm-2 col-form-label">Sale Price</label>
				    <div class="col-sm-10">
				    	{{Form::text('price',NULL,['class'=>'form-control', 'id' => 'price', 'placeholder'=>'Product price'])}}
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