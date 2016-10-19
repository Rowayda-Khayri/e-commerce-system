@extends('layout')


@section('pageContent')

<h1> Categories </h1>

@foreach($categories as $category)

<ul >
    
        <table class="table ">
            <tr>
                <td class="col-sm-6"><li style="font-size: 20px;margin-right: 100px;">{{$category->name }} </li></td>
                <td> 
                    <input  type="submit" name="edit" value="Edit" class="btn btn-primary"/>
                </td>
                <td>
                    <input  type="submit" name="delete" value="Delete" class="btn btn-primary" />
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                </td>
            </tr>
        </table>
            
    
</ul>


@endforeach

@stop