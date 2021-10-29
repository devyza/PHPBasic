@extends('layouts.app')

@section('title', "Edit Employee")

@section('content')
    <div class="panel panel-form">
        <div class="panel-heading"><h2>Enter Employee Information</h2></div>
        
        <div class="panel-body">
            <form action="{{route('employee.edit.submit', $employee->id)}}" method="POST">

                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jobTitle">Job Title</label>
                        <input class="form-control" type="text" name="jobTitle" value="{{$employee->jobTitle}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="{{$employee->email}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nationality">Nationality</label>
                        <input class="form-control" type="text" name="nationality" value="{{$employee->nationality}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="company">Company</label>
                        <input class="form-control" type="number" name="company_id" value="{{$employee->company_id}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <input class="btn btn-primary" type="submit" value="Update" name="sbtSave"
                        onclick="return confirm('Are you sure you want to update?')">
                </div>
            </form>
        </div>
    </div>
@endsection