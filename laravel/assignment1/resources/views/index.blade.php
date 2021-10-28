@extends('layouts.app')

@section('title', "Employee")

@section('content')
    <div>
        <!-- Employee List table-->
        @if (count($employeeList) > 0)
            <div><b>Employee List</b></div>
            <div>
                <table>
                    <thead>
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