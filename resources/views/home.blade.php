@extends('layout.master')

@section('title')
Laravel
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('header')
@include('layout.header')
@endsection


@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">

            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

            <!-- New Task Form -->
                <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-6">
                            <input type="text" name="content" id="" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Deadline</label>

                        <div class="col-sm-6">
                            <input type="date" name="deadline" id="task-deadline" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>



                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                        <td class="table-text"><div>{{ $task->name }}</div></td>
                        <!-- Task Show Button -->
                        <td>
                            <a href="{{ route('task.show' , 1) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Detail
                            </a>
                        </td>
                        <!-- Task Complete Button -->
                        <td>
                            <a href="{{ route('task.complete' , 1) }}" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Complete
                            </a>
                        </td>
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy' , $task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layout.footer')
@endsection