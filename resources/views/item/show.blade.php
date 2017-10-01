
@extends('layout')


@section('pageContent')

<!--<h1> Categories </h1>-->
<form method="POST" action="{{ url('/M$l36opAdmin/item/add')}}">
    
    
        <table class="table ">
            <tr>
                <td >
                    <h1>Items</h1>
                </td>
                <td>
                    <input  type="submit" name="add" value="Add New Item" class="btn btn-primary" />
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             
                </td>
          
            </tr>
            
            <tr>
                <td>Item</td>
                <td>Price</td>
                
                <td>Subcategory</td>
                <td>Category</td>
            </tr>
           
            @foreach($items as $item)
            
        
            <tr>
                <td style="font-size: 20px;" >{{$item->name }} </td>
               
                <td style="font-size: 20px;" >{{$item->price }} </td>
               
                <td style="font-size: 20px;" >{{$item->subcategory_name }} </td>
                
                <td style="font-size: 20px;" >{{$item->category_name }} </td>
                
                <td><a href="{{ url('/M$l36opAdmin/item/edit/'.$item->id)}}">Edit</a></td>
                
                <td><a href="{{ url('/M$l36opAdmin/item/destroy/'.$item->id)}}">Delete</a></td>
                
            </tr>
            
             
            @endforeach
            
            
        </table>
    
</form>




@stop
