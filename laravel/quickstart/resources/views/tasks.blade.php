@extends('layouts.app')

@section('content')

    <div class="panel-body">

        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            
            {{-- CSRF Protection --}}
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>

        @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Current Tasks</h2>
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Task Created Date -->
                                <td class="table-text">
                                    <div>{{ $task->created_at }}</div>
                                </td>
                                
                                <!-- Task Updated Date -->
                                <td class="table-text">
                                    <div>{{ $task->updated_at }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-primary">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
@endsection