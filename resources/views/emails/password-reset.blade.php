<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #ffffff">
    <p style="color: #000000"> Hey {{ $user->first_name . ' ' . $user->last_name}}
    <a href="{{ route('password.reset', ['token'=>$token])}}" style="color: #000000; text-decoration: none;">
        <i class="fa fa-sign-in-alt"></i> Reset Account Password
      </a>
    </p>
</body>
</html>