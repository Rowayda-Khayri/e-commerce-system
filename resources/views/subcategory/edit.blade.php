
@extends('layout')


@section('pageContent')

<h1> Edit Subcategory </h1>

<form method="POST" action="{{ url('/M$l36opAdmin/subcategory/update/'.$subcategory->id)}}">
    
    <label>Subcategory Name :</label>
    <input  type="text" name="subcategoryName" value="{{$subcategory->name}}" required>
    <input  type="hidden" name="subcategoryId" value="{{$subcategory->id}}" >
    <input  type="submit" name="edit" value="Edit" class="btn btn-primary" />
    
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!--<button type="submit">ADDDD</button>-->
    
</form>
    
   
@stop
