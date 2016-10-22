
@extends('layout')


@section('pageContent')

<!--<form method="POST" action="/item/add">-->
    
<h1>
    Clients
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
               
                <td><a href="/user/approve/">Approve</a></td>
                
            </tr>
            
             @endforeach
            
            
            
        </table>
      
    
<!--</form>-->




@stop

