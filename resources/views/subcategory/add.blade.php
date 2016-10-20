

@extends('layout')


@section('pageContent')

<h1> Add Subcategory </h1>

<form method="POST" action="/subcategory/store">
    
    <label>Subcategory Name :</label>
    <input  type="text" name="subcategoryName" value="" required>
    <input  type="submit" name="add" value="Add" class="btn btn-primary" />
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!--<button type="submit">ADDDD</button>-->
    
</form>
    
   
@stop
