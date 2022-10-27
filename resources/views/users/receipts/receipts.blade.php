@extends('users.user_layout')
@section('user_content')
        
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{ $user->name}}</strong> </h6>
    </div>

    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   
                   
                   <th>Admin</th>
                   <th>Date</th>
                   <th>Total</th>
                   <th>Note</th>            
                   <th class="text-right">Actions</th>
                                            
                </tr>
              </thead>

              <tfoot>
                  <tr>
                    
                  
                     <th colspan="2" class="text-right">Total</th>
                     <th>{{ $user->receipts()->sum('amount')}}</th>
                     <th colspan="2"></th>
                                            
                  </tr>
              </tfoot>
              <tbody>
                @foreach($user->receipts as $receipt)
                                             
                                      
                  <tr>
                               
                     
                     
                     <td>{{ optional($receipt->admin)->name }}</td>
                     <td>{{$receipt->date}}</td>
                     <td> {{$receipt->amount}} </td>
                     <td> {{$receipt->note}} </td>
                     <td class="text-right" width="150px">
                         <form method="post" action="{{  route('user.receipts.destroy',['id'=>$user->id,'receipt_id'=>$receipt->id]) }}">

                             

                                    
                                      
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