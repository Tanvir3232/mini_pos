@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-4">
    		<h2>Sales Report</h2>
    	</div>
    	<div class="col-md-8 text-right">
    		{!! Form::open(['route' => ['reports.sales'],'method'=>'get']) !!}
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
     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sales Reports From <strong>{{$start_date}}</strong> to <strong>{{$end_date}}</strong></h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        <tr>
	                                        <th>Date</th>
	                                        <th>Products</th>
	                                        <th class="text-right">Quantity</th>
	                                        <th class="text-right">Unit Price</th>
	                                        <th class="text-right">Total</th>                          
                                        </tr>
                                           
                                   
                                    </thead>
                                    
                                    <tbody>
                                    	@foreach($sales as $sale)
                                            
                                        <tr>
                                        	<td>{{$sale->date}}</td>
                                            <td>{{$sale->title}}</td>
                                            <td class="text-right">{{$sale->quantity}}</td>
                                            <td class="text-right"> {{$sale->price}} </td>
                                            <td class="text-right">{{$sale->total}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                        	
	                                        <th colspan="2" class="text-right">Total Items:</th>
	                                        <th class="text-right">{{$sales->sum('quantity')}}</th>
	                                        <th class="text-right">Total</th>
	                                        <th class="text-right">{{$sales->sum('total')}}</th>                         
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

@stop