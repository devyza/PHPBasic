@extends('layouts.app')

@section('title', "Company")

@section('content')
    <div class="panel">
        <div class="panel-heading"><h2>Company List</h2></div>
        <div class="panel-body">
            @if (count($companyList) > 0)
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                    </thead>
                    <tbody>
                        @foreach ($companyList as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->country}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection