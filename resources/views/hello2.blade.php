<!-- resources/views/hello2.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hello cac ban</title>
    <link rel="stylesheet" href="">
</head>
<body>
		{{-- <p>Tên tôi là: {{ $username}} </p>
		{!! '<b>Hello</b>' !!} --}}
		@if(count($records) ==1)
		 Có 1
		@elseif(count($records) >1)
		Có nhiều
		@else
		Không có
		@endif
		@foreach ($records as $record)
    		{{ $records}} </br>
		@endforeach
</body>
</html>