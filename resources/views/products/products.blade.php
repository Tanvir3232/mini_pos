@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-6">
    		<h2>products List</h2>
    	</div>
    	<div class="col-md-6 text-right">
    		<a class="btn btn-info " href="{{route('products.create')}}"> <i class="fa fa-plus"></i> New product</a>
    	</div>
    </div> 
     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All products</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Cost price</th>
                                            <th>Sale price</th>
                                            <th>Has Stock</th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                             <th>Category</th>
                                            <th>Title</th>
                                            <th>Cost price</th>
                                            <th>Sale price</th>
                                            <th>Has Stock</th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($products as $product)
                                             
                                    	
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td> {{ $product->category->title}} </td>
                                            <td> {{ $product->title}}</td>
                                            <td> {{ $product->cost_price}}</td>
                                            <td> {{ $product->price}}</td>
                                            <td> {{ ($product->has_stock == 1)? 'Yes':'No'}}</td>
                                            <td class="text-right" width="150px">
                                                <form method="post" action="{{ route('products.destroy',['product'=>$product->id]) }}">

                                                	 <a href="{{ route('products.show',['product' => $product->id]) }}" class="btn btn-dark"><i class="fa fa-eye"></i>
                                                	 </a>

                                            	     <a href="{{ route('products.edit',['product' => $product->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i>
                                            	     </a>
                                      
                                                     @csrf
                                                     @method('DELETE')
                                                     <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            	</form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@stop