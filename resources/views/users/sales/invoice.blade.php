@extends('users.user_layout')
@section('user_content')
  <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h6>
     </div>

     <div class="card-body">
       <div class="row clearfix justify-content-md-center">

       	  <div class="col-md-6">
       	  	 <p> <strong>Customer :</strong> {{ $user->name }}</p>
       	  	 <p> <strong>Email :</strong> {{ $user->email }}</p>
       	  	 <p> <strong>Phone :</strong> {{ $user->phone }}</p>
       	  </div>
          <div class="col-md-3"></div>
       	  <div class="col-md-3">
       	  	 <p> <strong>Date: </strong>  {{$invoice->date}}</p>
       	  	 <p> <strong>Challan No: </strong>  {{$invoice->challan_no}}</p>
       	  </div>

       </div>  
       <!-- End row --> 
       <div class="invoice_items">
       	  <table class="table  table-borderless">
       	  	  <thead>
                   <th>SL No </th>
                   <th>Product </th>
                   <th>Price </th>
                   <th>Qty</th>
                   <th class="text-right">Total</th>
                   <th class="text-right" width="20"></th> 
              </thead>
              <tbody>
                 @foreach($invoice->items as $key => $item)
                  <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$item->product->title}}</td>
                      <td>{{$item->price}}</td>
                      <td>{{$item->quantity}}</td>
                      <td class="text-right">{{$item->total}}</td>
                      <td class="text-right">
                          <form method="post" action="{{ route('user.sales.invoices.delete_items',['id'=>$user->id,'invoice_id' => $invoice->id, 'item_id' => $item->id]) }}">

                             
                                    
                                      
                              @csrf
                              @method('DELETE')
                              <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                         </form>
                      </td>
                  </tr>
                  
                 @endforeach
              </tbody>

              <tr>
                <th>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newProduct">
                       <i class="fa fa-plus"></i> Add Product
                    </button>
               </th>
                 <th></th>

                 <th colspan="2" class="text-right">Total</th>
                 <th class="text-right">{{ $totalPayable = $invoice->items()->sum('total') }}</th>
              </tr>

              <tr>
                <th>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newReceiptForInvoice">
                       <i class="fa fa-plus"></i> Add Receipt
                    </button>
               </th>
                 <th></th>

                 <th colspan="2" class="text-right">Paid</th>
                 <th class="text-right">{{ $totalPaid = $invoice->receipts()->sum('amount') }}</th>
              </tr>
               <tr>
                  <th colspan="4" class="text-right">Due:</th>
                  <th class="text-right">{{ $totalPayable - $totalPaid}}</th>
               </tr>
       	  </table>
       </div>   
     </div>
                 <!-- End card-body -->
  </div>
             <!-- End Card -->
   
<!-- Modal for add product -->
<div class="modal fade" id="newProduct" tabindex="-1" aria-labelledby="#newProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    {!! Form::open(['route' => ['user.sales.invoices.add_items',['id'=>$user->id,'invoice_id'=>$invoice->id]],'method'=>'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newProductLabel">New Product</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <!--form start --->
          
          <div class="mb-3  form-group row">
            <label for="address" class="col-sm-3 col-form-label">Product <span class="text-danger">*</span></label>
            <div class="col-sm-9">
              {{Form::select('product_id', $products,NULL,['class'=>'form-control', 'id' => 'product_id', 'required','placeholder'=>'select product'] )}}
            </div>
          </div>
          <div class="mb-3  form-group row">
            <label for="price" class="col-sm-3 col-form-label">Unit Price<span class="text-danger">*</span></label>
            <div class="col-sm-9">
              {{Form::text('price',NULL,['class'=>'form-control','required', 'id' => 'price', 'placeholder'=>'Price'])}}
            </div>
          </div>

          <div class="mb-3  form-group row">
            <label for="quantity" class="col-sm-3 col-form-label">Quantity<span class="text-danger">*</span></label>
            <div class="col-sm-9">
              {{Form::text('quantity',NULL,['class'=>'form-control','required', 'id' => 'quantity', 'placeholder'=>'quantity'])}}
            </div>
          </div>
          <div class="mb-3  form-group row">
            <label for="total" class="col-sm-3 col-form-label">Total<span class="text-danger">*</span></label>
            <div class="col-sm-9">
              {{Form::text('total',NULL,['class'=>'form-control','required', 'id' => 'total', 'placeholder'=>'total'])}}
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

<!-- End add product  modal-->


<!-- Modal for ReceiptForInvoice -->
<div class="modal fade" id="newReceiptForInvoice" tabindex="-1" aria-labelledby="#newReceiptForInvoiceLabel" aria-hidden="true">
  <div class="modal-dialog">
    {!! Form::open(['route' => ['user.receipts.store', [$user->id,$invoice->id]],'method'=>'post']) !!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newReceiptForInvoiceLabel">New Receipt for this Invoice</h5>
        
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
@stop