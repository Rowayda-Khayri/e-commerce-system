@extends('layout')


@section('pageContent')


<form method="POST" action="{{ url('/M$l36opAdmin/order/sent/'.$orderItems[0]->order_id)}}">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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
                <td style="font-size: 20px;" >{{$orderItem->item_name}} </td>
               
                <td style="font-size: 20px;" >{{$orderItem->quantity}} </td>
                
                <td style="font-size: 20px;" >{{$orderItem->total_item_price}} </td>
                
               
                
            </tr>
            
             @endforeach
            
             <tr>
                 <td>
                     <input  type="submit" name="sent" value="Order is reviewed and shipped" class="btn btn-primary" />
                 </td>
             </tr>
           
            
        </table>
    
</form>

@stop


