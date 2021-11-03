@extends('layouts.app')

@section('title', "Edit Employee")

@section('content')

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="panel panel-form">
        <div class="panel-heading"><h2>Send Mail</h2></div>
        
        <div class="panel-body">
            <form action="{{ route('employee.mail.submit', $employee->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{$employee->email}}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <label for="text">Subject</label>
                        <select class="form-control" onchange="checkCustom(this)">
                            <option disabled selected>Choose Database Type</option>
                            <option value="interview">Interview</option>
                            <option value="appointment">Appointment</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <input id="txtSubject" class="form-control" name="subject" style="display: none; margin-top: 15px;" >
                    </div>
                </div>
                <div id="frmBody" class="form-row" style="display: none">
                    <div class="form-group col-12">
                        <label for="text">Body</label>
                        <textarea class="form-control" name="body" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <input class="btn btn-primary" type="submit" value="Send">
                </div>
            </form>
        </div>
        <script>
            function checkCustom(box) {

                var body = document.getElementById("frmBody");
                
                if (box.value == 'custom') {
                    txtSubject.style.display = "block";
                    body.style.display = "block";
                    txtSubject.value = null;
                } else {
                    txtSubject.style.display = "none";
                    body.style.display = "none";
                    txtSubject.value = box.value;
                }
            }
        </script>

    </div>
@endsection