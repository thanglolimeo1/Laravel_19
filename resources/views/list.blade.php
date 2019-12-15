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
 @foreach ($list as $data)
   <tr>
      <br>
      {{ $data['name'] }}
      <br>
      <td>@if ($data['status'] == 1)
              Đã hoàn thành<br>
          @elseif ($data['status'] == -1)
              Không thực hiện<br>
          @else
                Chưa làm<br>
          @endif
      </td>
    </tr>
@endforeach
</body>
</html>