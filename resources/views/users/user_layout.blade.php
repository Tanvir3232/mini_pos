@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-4 ">
            <a class="btn btn-dark " href="{{route('users.index')}}"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    	<div class="col-md-8 text-right">
    		    <a class="btn btn-info " href="{{url('users/create')}}"> <i class="fa fa-plus"></i> New Sale</a>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
               <i class="fa fa-plus"></i> New Purchase
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
               <i class="fa fa-plus"></i> New Payment
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
               <i class="fa fa-plus"></i> New Receipt
            </button>
    	</div>
    </div> 


    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" >
          <a class="nav-link @if($tab_menu == 'user_info')active @endif" href="{{ route('users.show', $user->id)}}" >User Info</a>
          <a class="nav-link @if($tab_menu == 'sales')active @endif" href=" {{ route('user.sales', $user->id)}} ">Sales</a>
          <a class="nav-link @if($tab_menu == 'purchases')active @endif " href="{{ route('user.purchases', $user->id)}}">Purchase</a>
          <a class="nav-link @if($tab_menu == 'payments')active @endif" href="{{ route('user.payments', $user->id)}}">Payments</a>
          <a class="nav-link @if($tab_menu == 'receipts')active @endif" href="{{ route('user.receipts', $user->id)}}">Receipts</a>
        </div>
      </div>
      <div class="col-10">
        
          @yield('user_content')
      </div>
    </div>
    
<!-- Modal for Receipt -->
<div class="modal fade" id="newReceipt" tabindex="-1" aria-labelledby="#newReceiptLabel" aria-hidden="true">
  <div class="modal-dialog">
    {!! Form::open(['route' => ['user.receipts.store', $user->id],'method'=>'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newReceiptLabel">New Receipt</h5>
        
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
              {{Form::textarea('note',null,['class'=>'form-control',  'id' => 'note','rows'=>'3', 'placeholder'=>'Receipt note'])}}
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

<!-- End Receipt modal-->
  
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

<!-- end payment modal-->

     <!-- DataTales Example -->
   

@stop