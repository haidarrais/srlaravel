<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  <form action="{{route('login')}}" method="post">
    @csrf
    @if (Session::get('fail'))
      <div>
        {{Session::get('fail')}}
      </div>        
    @endif
    <input type="text" name="username" placeholder="usename">
    <span>@error('username')
        {{$message}}
      @enderror
    </span><br>
    <input type="password" name="password" placeholder="password">
    <span>@error('password')
      {{$message}}
      @enderror
    </span><br>
    <button type="submit">Login</button>
  </form>
  
</body>
</html>