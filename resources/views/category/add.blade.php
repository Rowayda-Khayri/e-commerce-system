@extends('layout')


@section('pageContent')

<h1> Add Category </h1>

<form method="POST" action="/category/store">
    
    <label>Category Name :</label>
    <input  type="text" name="categoryName" value="" required>
    <input  type="submit" name="add" value="Add" class="btn btn-primary" />
    
   
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!--<button type="submit">ADDDD</button>-->
    
</form>
    
   
@stop