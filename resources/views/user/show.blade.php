
@extends('layout')


@section('pageContent')

<!--<form method="POST" action="/item/add">-->
    
<h1>
    Customers
</h1>

<table class="table ">
            <tr>
                <td >
                    <h3>username</h3>
                </td>
                <td>
                    <h3>status</h3>
                </td>
                
                
          
            </tr>
            
            
           
           
            @foreach($users as $user)
        
            <tr>
                <td style="font-size: 20px;" >{{$user->username}} </td>
               
                <td style="font-size: 20px;" > {{$user->status}}</td>
               @if($user->status == 0)
                <td><a href="{{ url('/M$l36opAdmin/user/approve/{{$user->id}}')}}">Approve</a></td>
                @endif
            </tr>
            
             @endforeach
            
            
            
        </table>
      
    
<!--</form>-->




@stop

