@extends('layout.main')
@section('main_content')
   <div class="row clearfix page_header">
        <div class="col-md-4 ">
            <a class="btn btn-dark " href="{{route('products.index')}}"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-8 text-right">
            <a class="btn btn-info " href="{{url('products/create')}}"> <i class="fa fa-plus"></i> New Sale</a>

            <a class="btn btn-info " href="{{url('products/create')}}"> <i class="fa fa-plus"></i> New Purchase</a>

            <a class="btn btn-info " href="{{url('products/create')}}"> <i class="fa fa-plus"></i> New Payment</a>

            <a class="btn btn-info " href="{{url('products/create')}}"> <i class="fa fa-plus"></i> New Receipt</a>
        </div>
    </div> 
     <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $product->title}} information</h6>
        </div>

        <div class="card-body">
              <table class="table table-striped w-100" >
                  <tr>
                      <th >Category : </th>
                      <td>{{ $product->category->title}} </td>
                  </tr>
                  <tr>
                      <th >Title : </th>
                      <td>{{ $product->title}} </td>
                  </tr>
                  <tr>
                      <th >Description : </th>
                      <td>{{ $product->description}} </td>
                  </tr>
                  <tr>
                      <th >Cost Price : </th>
                      <td>{{ $product->cost_price}} </td>
                  </tr>
                  <tr>
                      <th >Sale Price : </th>
                      <td>{{ $product->cost_price}} </td>
                  </tr>
              </table>      
        </div>
    </div>

@stop