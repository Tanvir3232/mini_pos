@extends('users.user_layout')
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