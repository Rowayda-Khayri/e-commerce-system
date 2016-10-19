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
        <label>Subcategories :</label>
        @foreach($category->subcategories as $subcategory)
        <input  type="text" name="subcategoryName[]" value="{{$subcategory->name}}">
        @endforeach
    </div>
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

</form>

@stop