@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-6">
    		<h2>All Categories</h2>
    	</div>
    	<div class="col-md-6 text-right">
    		<a class="btn btn-info " href="{{route('categories.create')}}"> <i class="fa fa-plus"></i> add category</a>
    	</div>
    </div> 
     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                           
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                           
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($categories as $category)
                                             
                                    	
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td> {{$category->title}} </td>
                                            
                                            <td class="text-right" width="150px">
                                                <form method="post" action="{{ route('categories.destroy',['category'=>$category->id]) }}">


                                            	     <a href="{{ route('categories.edit',['category' => $category->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i>
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