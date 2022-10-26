@extends('users.user_layout')
@section('user_content')
        
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $user->name}}</strong> </h6>
    </div>

    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>Challan No</th>
                   <th>Customer</th>
                   <th>Date</th>
                   <th>Total</th>
                               
                   <th class="text-right">Actions</th>
                                            
                </tr>
              </thead>

              <tfoot>
                  <tr>
                     <th>Challan No</th>
                     <th>Customer</th>
                     <th>Date</th>
                     <th>Total</th>
                     <th class="text-right">Actions</th>
                                            
                  </tr>
              </tfoot>
              <tbody>
                @foreach($user->sales as $sale)
                                             
                                      
                  <tr>
                               
                     <td> {{$sale->challan_no}} </td>
                     <td>{{$user->name}}</td>
                     <td>{{$sale->date}}</td>
                     <td>100</td>
                     <td class="text-right" width="150px">
                         <form method="post" action="{{ route('users.destroy',['user'=>$user->id]) }}">

                             <a href="{{ route('users.show',['user' => $user->id]) }}" class="btn btn-dark"><i class="fa fa-eye"></i>
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
              <!-- End card-body -->
     </div>
             <!-- End Card -->
     

@stop