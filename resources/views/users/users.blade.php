@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-6">
    		<h2>Users List</h2>
    	</div>
    	<div class="col-md-6 text-right">
    		<a class="btn btn-info " href="{{url('users/create')}}"> <i class="fa fa-plus"></i> New user</a>
    	</div>
    </div> 
     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Group</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	@foreach($users as $user)
                                             
                                    	
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td> {{$user->group->title}} </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td class="text-right" width="150px">
                                                <form method="post" action="{{ route('users.destroy',['user'=>$user->id]) }}">

                                                	 <a href="{{ route('users.show',['user' => $user->id]) }}" class="btn btn-dark"><i class="fa fa-eye"></i>
                                                	 </a>

                                            	     <a href="{{ route('users.edit',['user' => $user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i>
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