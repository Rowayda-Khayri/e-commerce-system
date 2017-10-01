

@extends('layout')


@section('pageContent')

<h1> Add Subcategory </h1>

<form method="POST" action="{{ url('/M$l36opAdmin/subcategory/store/'.$subcategory->category_id)}}">
    
    <label>Subcategory Name :</label>
    <input  type="text" name="subcategoryName" value="" required>
    <input  type="hidden" name="categoryId" value="{{$subcategory->category_id}}" >
    <input  type="submit" name="add" value="Add" class="btn btn-primary" />
    
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!--<button type="submit">ADDDD</button>-->
    
</form>
    
   
@stop
