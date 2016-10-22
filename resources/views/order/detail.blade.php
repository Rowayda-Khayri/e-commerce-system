@extends('layout')


@section('pageContent')


<!--<form method="POST" action="/item/add">-->
    
<h1>
    Order Details
</h1>

<table class="table ">
            <tr>
                <td >
                    <h3>Item</h3>
                </td>
                <td>
                    <h3>Quantity</h3>
                </td>
                <td>
                    <h3>Total Item Price</h3>
                </td>

                
            </tr>
            
            @foreach($orderItems as $orderItem)
        
            <tr>
                <td style="font-size: 20px;" > </td>
               
                <td style="font-size: 20px;" >{{$orderItem->quantity}} </td>
                
                <td style="font-size: 20px;" >{{$orderItem->total_item_price}} </td>
                
               
                
            </tr>
            
             @endforeach
            
            
           
            
        </table>
    
<!--</form>-->

@stop


