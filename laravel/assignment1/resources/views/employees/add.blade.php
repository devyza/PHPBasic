@extends('layouts.app')

@section('title', "Employee")

@section('content')

    <div class="panel panel-form">
        <div class="panel-heading"><h2>Enter Employee Information</h2></div>
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
                        <input class="form-control" type="number" name="company_id" placeholder="Company">
                    </div>
                </div>
                <div class="form-row">
                    <input class="btn btn-primary" type="submit" value="Save" name="sbtSave">
                </div>
            </form>
        </div>
    </div>

    <!-- Employee List table-->
    <div class="panel">
        <div class="panel-heading"><h2>Employee List</h2></div>

        <div class="panel-body">
            @if (count($employeeList) > 0)
                <table class="table table-striped">

                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>Company</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach ($employeeList as $employee)
                            @if ($employee->deleted_at == null)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->jobTitle}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->nationality}}</td>
                                    <td>{{$employee->company_name}}</td>
                                    <td>{{$employee->created_at}}</td>
                                    <td>{{$employee->updated_at}}</td>
                                    <td>
                                        <form action="/employee/edit/{{$employee->id}}" method="GET">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/employee/delete/{{$employee->id}}" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif