
@extends('layout')


@section('pageContent')

<!--<h1> Categories </h1>-->
<form method="POST" action="">
    
    
        <table class="table ">
            <tr>
                <td >
                    <h1>Items</h1>
                </td>
                <td>
                    <input  type="submit" name="add" value="Add New Item" class="btn btn-primary" />
                </td>
          
            </tr>
           
            @foreach($items as $item)
            
        
            <tr>
                <td style="font-size: 20px;margin-right: 100px;" class="col-sm-6">{{$item->name }} </td>
                
                
                
            </tr>
            
            
            @endforeach
            
            
        </table>
    
</form>




@stop
