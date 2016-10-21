@extends('layout')


@section('pageContent')

<h1> Edit Category </h1>

<form method="POST" action="/category/update/{{$category->id}}">
    
    <div>
        <label>Category Name :</label>
        <input  type="text" name="categoryName" value="{{$category->name}}">
        <input  type="submit" name="edit" value="Edit" class="btn btn-primary" />
    
    </div>
    
    </br></br></br></br>
    <div>
        <label style="font-size:22px;">Subcategories :</label>
        
        <a href="/subcategory/add/{{$category->id}}">Add Subcategory</a>
        </br></br>
        <table class="table">
            
            @foreach($category->subcategories as $subcategory)
            
            
            <tr >
            
                <td   name="subcategoryName[]"  style="margin-right: 30px;font-size: 18px;">{{$subcategory->name}}</td>
                <td><a href="/subcategory/edit/{{$subcategory->id}}" style="margin-right: 30px;margin-left: 30px;">Edit</a></td>
                <td><a href="/subcategory/destroy/{{$subcategory->id}}">Delete</a></td>
                     

                    @endforeach

                    @foreach($category->subcategories as $subcategory)
                    <input  type="hidden"  name="subcategoryId[]" value="{{$subcategory->id}}">
                
                @endforeach
            
            </tr>
            
         
        </table>
    </div>
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

</form>

@stop