@extends('users.user_layout')
@section('user_content')
        
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{ $user->name}}</strong> </h6>
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
                     <th>{{ $user->payments()->sum('amount')}}</th>
                     <th colspan="2"></th>
                                            
                  </tr>
              </tfoot>
              <tbody>
                @foreach($user->payments as $payment)
                                             
                                      
                  <tr>
                               
                     
                     <td>{{ optional($payment->admin)->name }}</td>
                     <td>{{$payment->date}}</td>
                     <td>{{$payment->amount}}</td>
                     <td>{{$payment->note}}</td>
                     <td class="text-right" width="150px">
                         <form method="post" action="{{ route('user.payments.destroy',['id'=>$user->id,'payment_id'=>$payment->id]) }}">

                                    
                                      
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