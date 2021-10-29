@extends('layouts.app')

@section('title', "Edit Company")

@section('content')
<div class="panel-body">
    <form action="/employee/add" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
                <label for="jobTitle">Job Title</label>
                <input class="form-control" type="text" name="jobTitle" placeholder="Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="nationality">Nationality</label>
                <input class="form-control" type="text" name="nationality" placeholder="Nationality">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="company">Company</label>
                <input class="form-control" type="text" name="company_id" placeholder="Company">
            </div>
        </div>
        <div class="form-row">
            <input class="btn btn-primary" type="submit" value="Save" name="sbtSave">
        </div>
    </form>
</div>
@endsection