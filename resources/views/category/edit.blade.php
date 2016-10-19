@extends('layout')


@section('pageContent')

<h1> Edit Category </h1>

<form method="POST" action="">
    <label>Category Name :</label>
    <input  type="text" name="categoryName" value="{{$category->name}}">
    <input  type="submit" name="edit" value="Edit" class="btn btn-primary" />


</form>

@stop