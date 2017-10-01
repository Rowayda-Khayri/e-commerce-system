@extends('layout')


@section('pageContent')


<!--<form method="POST" action="/item/add">-->
    
<h1>
    Orders
</h1>

<table class="table ">
            <tr>
                <td >
                    <h3>Order ID</h3>
                </td>
                <td>
                    <h3>Client</h3>
                </td>
                <td>
                    <h3>Total Order Price</h3>
                </td>

                
            </tr>
            
             @foreach($orders as $order)
        
            <tr>
                <td style="font-size: 20px;" >{{$order->id}} </td>
               
                <td style="font-size: 20px;" >{{$order->client_name}} </td>
                
                <td style="font-size: 20px;" >{{$order->total_order_price}} </td>
                
               
                <td><a href="M$l36opAdmin/order/detail/{{$order->id}}">Order Details</a></td>
                
            </tr>
            
             @endforeach
            
            
            
           
           
            
            
            
        </table>
    
<!--</form>-->

@stop

