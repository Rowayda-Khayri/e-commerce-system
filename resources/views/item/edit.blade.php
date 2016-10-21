@extends('layout')


@section('pageContent')



<form method="POST" action="">
    
    <table>
        @foreach($item as $it)
        <tr>
            <td>
                <h1> Edit Item </h1>
            </td>
            
            <td>
                    <input  type="submit" name="edit" value="Edit" class="btn btn-primary" />

            </td>
        </tr>
        
        <tr>
            <td>
                 Name :
            </td>
            
            <td>
                <input  type="text" name="itemName" value="{{$it->name}}"/>
            </td>
        </tr>
        
         <tr>
            <td>
                 Price :
            </td>
            
            <td>
                <input  type="text" name="itemPrice" value="{{$it->price}}"/>
            </td>
        </tr>
         <tr>
            <td>
                 Subcategory :
            </td>
            
            <td>
               <select name="itemSubcategory">
                    <option  selected>{{$it->subcategory_name}}</option>
                    
                    @foreach($subcategories as $subcategory)
                    
                    <option  >{{$subcategory->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        @endforeach
    </table>
    
    
        
        
        
 
    
 
    
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

</form>

@stop
