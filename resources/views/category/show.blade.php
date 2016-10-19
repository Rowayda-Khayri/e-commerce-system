@extends('layout')


@section('pageContent')

<h1> Categories </h1>
<form method="POST" action="">
    
    
        <table class="table ">
            <tr>
                <td></td>
                <td><input  type="submit" name="add" value="Add New Category" class="btn btn-primary" /> </td>
            </tr> 
    
            @foreach($categories as $category)

        
            <tr>
                <td style="font-size: 20px;margin-right: 100px;" class="col-sm-6">{{$category->name }} </td>
                <td> 
                    <input  type="submit" name="edit{{$category->id}}" value="Edit" class="btn btn-primary"/>
                </td>
                <td>
                    <input  type="submit" name="delete" value="Delete" class="btn btn-primary" />
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                </td>
            </tr>
            
            @endforeach
            
        </table>
    
</form>




@stop