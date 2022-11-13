@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-4">
    		<h2>Day Report</h2>
    	</div>
    	<div class="col-md-8 text-right">
    		{!! Form::open(['route' => ['reports.days'],'method'=>'get']) !!}
				  <div class="form-row align-items-center">
					    <div class="col-auto">
					      <label class="sr-only"for="inlineFormInputGroup">Start Date</label>
					       {{Form::date('start_date',$start_date,['class'=>'form-control', 'id' => 'start_date'])}}
					    </div>
					    <div class="col-auto">
					      <label class="sr-only" for="inlineFormInputGroup">End Date</label>
					      <div class="input-group mb-2">
					        {{Form::date('end_date',$end_date,['class'=>'form-control', 'id' => 'end_date'])}}
					      </div>
					    </div>
					    
					    <div class="col-auto">
					      <button type="submit" class="btn btn-primary mb-2">Submit</button>
					    </div>
				  </div>
			{!! Form::close() !!}
    	</div>
    </div> 
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
                                   {{ $totalStock=100 }}
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
                                   {{ $totalStock }}
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
     <!-- Sales Reports Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sales Reports From <strong>{{$start_date}}</strong> to <strong>{{$end_date}}</strong></h6>
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

      <!-- Purchase table start -->
           <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Purchases Reports From <strong>{{$start_date}}</strong> to <strong>{{$end_date}}</strong></h6>
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
     

@stop