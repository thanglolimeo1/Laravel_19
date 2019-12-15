<!-- resources/views/hello2.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hiển thị thông tin cá nhân</title>
    <link rel="stylesheet" href="">
</head>
<body>
<p>Họ và tên : {{ $name}} </p>
<p>Ngày/tháng/năm sinh : {{ $DateOfBirth }}</p>
<p>Trường học: {{ $School }}</p>
<p>Quê quán :{{ $Hometown}}</p>
<p>
Giới thiệu bản thân:
<br>
Tet, or Lunar New Year is viewed as one of the most popular festival in Vietnam.  It is celebrated on the same day as Chinese New Year, taking place from the first day of the first month of the Vietnamese calendar (around late January or early February) until at least the third day. Tet is a special occasion for people gather around their family, express their respect to their ancestors and welcome a happy new year. Tet occupies an important role in Vietnamese culture, so are the preparation for the special days and the customs people always carry out in Tet.</p>
<p>Mục tiêu công việc: {{ $TargetJobs}}</p>
</body>
</html>


@extends('layouts.master')

@section('title')
Profile
@endsection
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style type="text/css">
    #my-table{
      width: 60%;
      position: absolute;
      top:50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  </style>
@endsection

			<!-- <div>
                <a href="{{ route('task.index') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>index
                </a>
                <a href="{{ route('task.create') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>create
                </a>
                <a href="{{ route('task.store') }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>store
                </a>
                <a href="{{ route('task.show' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>show
                </a>
                <a href="{{ route('task.edit' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>edit
                </a>
                <a href="{{ route('task.update' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>update
                </a>
                <a href="{{ route('task.delete' , 1) }}" type="submit" class="btn btn-success">
                    <i class="fa fa-btn fa-check"></i>delete
                </a>
            
            </div> -->



@section('content')
<table class="table table-bordered" id="my-table">
  <tbody>
    <tr>
      <p>Họ và tên : {{ $name}} </p>
    </tr>
    <tr>
     <p>Ngày/tháng/năm sinh : {{ $DateOfBirth }}</p>
    </tr>
    <tr>
      <p>Trường học: {{ $School }}</p>
    </tr>
    <tr>
      <p>Quê quán :{{ $Hometown}}</p>
    </tr>
    <tr>
      <p>
		Giới thiệu bản thân:
		<br>
		Tet, or Lunar New Year is viewed as one of the most popular festival in Vietnam.  It is celebrated on the same day as Chinese New Year, taking place from the first day of the first month of the Vietnamese calendar (around late January or early February) until at least the third day. Tet is a special occasion for people gather around their family, express their respect to their ancestors and welcome a happy new year. Tet occupies an important role in Vietnamese culture, so are the preparation for the special days and the customs people always carry out in Tet.</p>
    </tr>
    <tr>
     <p>Mục tiêu công việc: {{ $TargetJobs}}</p>
    </tr>
  </tbody>
</table>
@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection