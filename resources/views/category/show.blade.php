@extends('layout')


@section('pageContent')

<h1> Categories </h1>

@foreach($categories as $category)

<ul>
    <li>
        {{$category}}
    </li>
</ul>


@endforeach

@stop