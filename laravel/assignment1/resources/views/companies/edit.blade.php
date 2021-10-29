@extends('layouts.app')

@section('title', "Edit Company")

@section('content')

<div class="panel">
    <div class="panel-heading panel-form"><h2>Update Company Information</h2></div>
    <div class="panel panel-default panel-form">
        <form action="{{route('company.edit', $company->id)}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Enter Company Name:</label>
                <input class="form-control" type="text" name="name" value="{{$company->name}}" required>
            </div>

            <div class="form-group">
                <label for="country">Enter Country:</label>
                <input class="form-control" type="text" name="country" value="{{$company->country}}" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Update"
            onclick="return confirm('Are you sure you want to update?')">
        </form>
    </div>
</div>
@endsection