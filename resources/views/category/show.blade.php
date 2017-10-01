@extends('layout')


@section('pageContent')

<!--<h1> Categories </h1>-->
<form method="POST" action="M$l36opAdmin/category/add">
    
    
        <table class="table ">
            <tr>
                <td >
                    <h1>Categories</h1>
                </td>
                <td class="col-sm-6">
                    <h1>Subcategories</h1>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <input  type="submit" name="add" value="Add New Category" class="btn btn-primary" /> 
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                </td>
            </tr> 
    
            @foreach($categories as $category)
            
        
            <tr>
                <td style="font-size: 20px;margin-right: 100px;" class="col-sm-6">{{$category->name }} </td>
                
                
                
                <td style="font-size: 20px;margin-right: 100px;" class="col-sm-6">
                    @foreach($category->subcategories as $subcategory)
                        {{$subcategory->name }},
                    @endforeach
                </td>
                
                
                
                <td> 
                    <a href="M$l36opAdmin/category/edit/{{$category->id}}">Edit</a>
                    <!--<input  type="submit" name="edit{{$category->id}}" value="Edit" class="btn btn-primary"/>-->
                </td>
                
                <td>
                    <a href="M$l36opAdmin/category/destroy/{{$category->id}}">Delete</a>
                    <!--<input  type="submit" name="delete" value="Delete" class="btn btn-primary" />-->
                    
                </td>
            </tr>
            
            
            @endforeach
            
        </table>
    
</form>




@stop