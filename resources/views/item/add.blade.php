@extends('layout')


@section('pageContent')

<h1> Add Item </h1>

<form method="POST" action="/item/store">
    
    <table>
        <tr>
            <td>    
                <label>Name :</label>
            </td>
            <td>
                <input  type="text" name="itemName" value="" required></br></br>
            </td>
        </tr>
        
        <tr>
            <td>    
                <label>Price :</label>
            </td>
            <td>
                <input  type="text" name="itemPrice" value="" required></br></br>
            </td>
        </tr>
        
        <tr>
            <td>    
                <label>Subcategory :</label>
            </td>
            <td>
                <!--<input  type="text" name="itemSubcategory" value="" required></br></br>-->
                
                <select name="itemSubcategory">
                    <option  selected>Choose Subcategory</option>
                    
                    @foreach($subcategories as $subcategory)
                    
                    <option  >{{$subcategory->name}}</option>
                    @endforeach
                </select>
                
                
            </td>
        </tr>
        
        
    </table>
    
    
    
    
    
    
    <input  type="submit" name="add" value="Add" class="btn btn-primary" />
    
   
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!--<button type="submit">ADDDD</button>-->
    
</form>
    
   
@stop
