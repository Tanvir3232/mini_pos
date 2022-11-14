@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
    	<div class="col-md-6">
            <div class="dropdown mr-3">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By Group
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{ route('users.index')}} ">all users</a>
                  @foreach($groups as $group)
                     <a class="dropdown-item" href="{{ route('users.index')}}?group={{$group->id}} ">{{$group->title}}</a>
                  @endforeach
                        
                       
                </div>
            </div>
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
                            <div class="table-responsive table-striped table-borderless table-sm">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>Name</th>
                                            <th>Group</th>
                                           
                                            <th>Phone</th>
                                            <th class="text-right">Sales</th>
                                            <th class="text-right">Purchase</th>
                                            <th class="text-right">Receipt</th>
                                            <th class="text-right">Payment</th>
                                            <th class="text-right">Balance</th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                           $totalSale = 0;
                                           $totalPurchase = 0;
                                           $totalReceipt = 0;
                                           $totalPayment = 0;
                                           $totalBalance = 0;
                                        ?>
                                    	@foreach($users as $user)
                                             
                                    	
                                        <tr>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->group->title}} </td>
                                            
                                            <td>{{ $user->phone}}</td>
                                            <td class="text-right">
                                            <?php 
                                              echo  $sale = $user->saleItems()->sum('total');
                                             $totalSale += $sale;
                                             ?></td>
                                            <td class="text-right">
                                            <?php 
                                             echo  $purchase = $user->purchaseItems()->sum('total');
                                             $totalPurchase += $purchase;
                                             ?>
                                                 
                                            </td>
                                            <td class="text-right">
                                             <?php  
                                                echo  $receipt = $user->receipts()->sum('amount');
                                                 $totalReceipt += $receipt;
                                             ?>
                                            </td>
                                            <td class="text-right">
                                              <?php  
                                                echo $payment = $user->payments()->sum('amount');
                                                $totalPayment += $payment;
                                              ?> </td>
                                            <td class="text-right">
                                            <?php
                                                   echo $balance = ($purchase + $receipt) - ($sale+$payment);
                                                   $totalBalance += $balance;
                                             ?></td>
                                            
                                            <td class="text-right" width="100px">
                                                <form method="post" action="{{ route('users.destroy',['user'=>$user->id]) }}">

                                                	 <a href="{{ route('users.show',['user' => $user->id]) }}" class="btn btn-dark"><i class="fa fa-eye"></i>
                                                	 </a>

                                            	     <a href="{{ route('users.edit',['user' => $user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i>
                                            	     </a>
                                                    @if(
                                                        $user->sales()->count() == 0
                                                        &&  $user->purchases()->count() == 0
                                                        &&  $user->receipts()->count() == 0
                                                        &&  $user->payments()->count() == 0

                                                       )
                                                     @csrf
                                                     @method('DELETE')
                                                     <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    @endif
                                            	</form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                     <tfoot>
                                        <tr>
                                            
                                            <th colspan="3">Total</th>
                                            <th class="text-right"> {{ $totalSale }} </th>
                                            <th class="text-right"> {{ $totalPurchase }} </th>
                                            <th class="text-right"> {{ $totalReceipt }} </th>
                                            <th class="text-right"> {{ $totalPayment }} </th>
                                            <th class="text-right"> {{ $totalBalance }} </th>
                                            <th class="text-right">Actions</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

@stop