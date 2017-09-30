@extends('layout')


@section('pageContent')

<h1> Hello Admin </h1>
<br><br><br><br>

<h3>U R logged in now and this is your JWT:</h3>
<br><br>
<h4> "{{$token}}"</h4>
<br><br>
<h3> But I won't use it for now in your  routes :)  </h3>


    
   
@stop
