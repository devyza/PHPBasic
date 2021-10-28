@extends('layouts.app')

@section('title', "Employee")

@section('content')
    <div class="panel">

        <!-- Employee List table-->
        <div class="panel-heading">
            <div><h2>Employee List</h2></div>
        </div>

        <div class="panel-body">
            @if (count($employeeList) > 0)
                <table class="table table-striped">

                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>Company</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </thead>

                    <tbody>
                        @foreach ($employeeList as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->nationality}}</td>
                                <td>{{$employee->company_name}}</td>
                                <td>{{$employee->created_at}}</td>
                                <td>{{$employee->updated_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif