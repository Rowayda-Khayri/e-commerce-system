@extends('layout')


@section('pageContent')

<h1> Add Category </h1>

<label>Category Name :</label>
<input  type="text" name="categoryName" value="" required>
<input  type="submit" name="add" value="Add" class="btn btn-primary" />



@stop