@extends('users.user_layout')
@section('user_content')
<div class="row">
        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                       <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total sales
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{ $sales->sum('total')}}
                                </div>
                            </div>
                            <div class="col-auto">
                                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                       <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Purchase
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{ $purchases->sum('total')}}
                                </div>
                            </div>
                            <div class="col-auto">
                                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                       <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Receipts
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{ $user->receipts()->sum('amount') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                       <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Payments
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{ $user->payments()->sum('amount') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div>    
 <!-- start Sales Reports Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sales Reports </h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-sm" cellspacing="0" >
                                    <thead>
                                       
                                        <tr >
                                       
                                          <th>Products</th>
                                          <th class="text-right">Quantity</th>
                                          <th class="text-right">Unit Price</th>
                                          <th class="text-right">Total</th>                          
                                        </tr>
                                           
                                   
                                    </thead>
                                    
                                    <tbody>
                                      @foreach($sales as $sale)
                                            
                                        <tr>
                                          
                                            <td>{{$sale->title}}</td>
                                            <td class="text-right">{{$sale->quantity}}</td>
                                            <td class="text-right"> {{number_format($sale->price,2)}} </td>
                                            <td class="text-right">{{number_format($sale->total,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                          
                                          <th colspan="1" class="text-right">Total Items:</th>
                                          <th class="text-right">{{$sales->sum('quantity')}}</th>
                                          <th class="text-right">Total</th>
                                          <th class="text-right">{{$sales->sum('total')}}</th>                         
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
     
      <!-- End Sales Reports-->
    <!-- Purchase table start -->
           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Purchases Reports </h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-sm" >
                                    <thead>
                                       
                                        <tr>
                                          
                                            <th>Products</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Price</th>
                                            <th class="text-right">Total</th>                          
                                        </tr>
                                           
                                   
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($purchases as $purchase)
                                            
                                        <tr width="100%">
                                          
                                            <td >{{$purchase->title}}</td>
                                            <td class="text-right">{{$purchase->quantity}}</td>
                                            <td class="text-right"> {{number_format($purchase->price,2)}} </td>
                                            <td class="text-right">{{number_format($purchase->total,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            
                                            <th colspan="1" class="text-right">Total Items:</th>
                                            <th class="text-right">{{$purchases->sum('quantity')}}</th>
                                            <th class="text-right">Total</th>
                                            <th class="text-right">{{$purchases->sum('total')}}</th>                         
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

     <!-- End Purchase reports-->
      <!-- Start Receipt reports-->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Receipts Reports </h6>
    </div>

    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-borderless table-striped table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                   
                   
                  
                   <th>Date</th>
                   
                           
                   <th class="text-right">Total</th>
                                            
                </tr>
              </thead>

              <tfoot>
                  <tr>
                    
                  
                     <th  >Total</th>
                     <th class="text-right">{{ $user->receipts()->sum('amount')}}</th>
                     
                                            
                  </tr>
              </tfoot>
              <tbody>
                @foreach($receipts as $receipt)
                                             
                                      
                  <tr>
                               
                     
                     
                    
                     <td>{{$receipt->date}}</td>
                     
                     
                     <td class="text-right"> {{$receipt->amount}} </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
              <!-- End card-body -->
     </div>
             <!-- End Receipt reports -->
    <!-- Start Payments reports-->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Payments Reports </h6>
    </div>

    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-borderless table-striped table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                   
                   
                  
                   <th>Date</th>
                   
                           
                   <th class="text-right">Total</th>
                                            
                </tr>
              </thead>

              <tfoot>
                  <tr>
                    
                  
                     <th  >Total</th>
                     <th class="text-right">{{ $user->payments()->sum('amount')}}</th>
                     
                                            
                  </tr>
              </tfoot>
              <tbody>
                @foreach($payments as $payment)
                                             
                                      
                  <tr>
                               
                     
                     
                    
                     <td>{{$payment->date}}</td>
                     
                     
                     <td class="text-right"> {{$payment->amount}} </td>
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