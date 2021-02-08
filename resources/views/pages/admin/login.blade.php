<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('includes.style')
  <link rel="stylesheet" href="{{ url('backend/css/styles.css')}}">
  <title>Login</title>
</head>
<body>
  <div class="d-md-flex align-items-center justify-content-center"  style="height: 100vh">
    <div class="bg" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Login <strong>Admin</strong></h3>
              </div>
              <form action="{{route('login')}}" method="post">
                @csrf
                @if (Session::get('fail'))
                  <div class="text-danger text-center ">
                    {{Session::get('fail')}}
                  </div>        
                @endif
                <div class="form-group first">
                  <input 
                    type="text" 
                    class="form-control" 
                    placeholder="username" 
                    name="username"
                  >
                  <div class=" alert-danger small text-center rounded-bottom">@error('username')
                    {{$message}}
                  @enderror
                  </div>
                </div>
                <div class="form-group last mb-3">
                  <input 
                  type="password" 
                  class="form-control" 
                  placeholder="Password" 
                  name="password"
                  >
                  <div class=" alert-danger  text-center rounded-bottom">@error('password')
                    {{$message}}
                    @enderror
                  </div>
                </div>
                <input type="submit" value="Log In" class="btn btn-block py-2 btn-success">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</body>
</html>