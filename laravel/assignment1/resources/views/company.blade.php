@extends('layouts.app')

@section('title', "Company")

@section('content')
    <div>
        @if (count($companyList) > 0)
            <div><h2>Company List</h2></div>
            <div>
                <table>
                    <thead>
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