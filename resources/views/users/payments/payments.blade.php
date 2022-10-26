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
                   
                   <th>Customer</th>
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
                               
                     
                     <td>{{$user->name}}</td>
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
  
   <!-- Modal for add new payment  -->
  
  <!-- Button trigger modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newPayment" tabindex="-1" aria-labelledby="#newPaymentLabel" aria-hidden="true">
  <div class="modal-dialog">
    {!! Form::open(['route' => ['user.payments.store', $user->id],'method'=>'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentLabel">New Payment</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <!--form start --->
          <div class="mb-3  form-group row">
            <label for="date" class="col-sm-3 col-form-label">Date<span class="text-danger">*</span></label>
            <div class="col-sm-9">
              <!-- <input type="text" date="date" id='date' class="form-control" placeholder="user date"> -->
              {{Form::date('date',NULL,['class'=>'form-control','required', 'id' => 'date', 'placeholder'=>'user date'])}}
            </div>
          </div>

          <div class="mb-3  form-group row">
            <label for="amount" class="col-sm-3 col-form-label">Amount<span class="text-danger">*</span></label>
            <div class="col-sm-9">
              {{Form::text('amount',NULL,['class'=>'form-control','required', 'id' => 'amount', 'placeholder'=>'Amount'])}}
            </div>
          </div>

           <div class="mb-3  form-group row">
            <label for="note" class="col-sm-3 col-form-label">Note</label>
            <div class="col-sm-9">
              {{Form::textarea('note',null,['class'=>'form-control',  'id' => 'note','rows'=>'3', 'placeholder'=>'payment note'])}}
            </div>
          </div>
          
 
          
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
    </div>
      {!! Form::close() !!}
  </div>

</div>

@stop