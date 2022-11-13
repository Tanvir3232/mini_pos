@extends('users.user_layout')

@section('user_card')
<div class="row">
    <!-- Total Sales (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                           Sales 
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                              $totalSale = 0;
                              foreach ($user->sales as $sale) {
                                  $totalSale += $sale->items()->sum('total');
                              }
                              echo $totalSale;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Sales (Monthly) Card Example -->
    <!-- Total Purchase (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                           Purchase 
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">   <?php 
                              $totalPurchase = 0;
                              foreach ($user->purchases as $purchase) {
                                  $totalPurchase += $purchase->items()->sum('total');
                              }
                              echo $totalPurchase;
                           ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Purchase (Monthly) Card Example -->
    <!-- Total Receipts (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                           Receipts 
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalReceipt = $user->receipts()->sum('amount')}}</div>
                    </div>
                    <div class="col-auto">
                         <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Receipts (Monthly) Card Example -->
    <!-- Total Payments (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                          Payments 
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalPayment = $user->payments()->sum('amount')}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Payments (Monthly) Card Example -->
    <!-- Total Balance (Monthly) Card Example -->
    <?php
        $totalBalance = ( $totalPurchase + $totalReceipt) - ($totalSale + $totalPayment) 
     ?>
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                         Balance
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                           @if($totalBalance>=0)
                              {{$totalBalance}}
                           @else
                               0
                           @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Balance (Monthly) Card Example -->
    <!-- Total Due (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">  
                         Due
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          @if($totalBalance<=0)
                              {{$totalBalance}}
                          @else
                               0
                          @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Total Due (Monthly) Card Example -->
 </div>
 <!--end row-->
@stop
@section('user_content')
 
  <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">{{ $user->name}} information</h6>
     </div>

     <div class="card-body">
        <table class="table table-striped w-75" style="margin-left: 12%">
            <tr>
                <th class="text-right">Group : </th>
                <td>{{ $user->group->title}} </td>
            </tr>

            <tr>
                <th class="text-right">Name : </th>
                <td>{{ $user->name}} </td>
            </tr>

            <tr>
                <th class="text-right">Email : </th>
                <td>{{ $user->email}} </td>
            </tr>

            <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $user->phone}} </td>
            </tr>

            <tr>
                <th class="text-right">Address : </th>
                <td>{{ $user->address}} </td>
            </tr>
        </table>      
     </div>
                 <!-- End card-body -->
  </div>
             <!-- End Card -->
   

@stop