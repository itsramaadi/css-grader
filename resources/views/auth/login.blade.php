<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//use.fontawesome.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">



    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
          <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
                
            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                Masuk
            </h1>
            
            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
              Silahkan masuk untuk mengakses fitur CSS X.
            </p>
            
            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <!-- Email address -->
              <div class="form-group">
  
                <!-- Label -->
                <label>Alamat Email</label>
  
                <!-- Input -->
                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="emailkamu@contoh.com">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

              </div>
  
              <!-- Password -->
              <div class="form-group">
  
                <div class="row">
                  <div class="col">
                        
                    <!-- Label -->
                    <label>Kata Sandi</label>
  
                  </div>
                  <div class="col-auto">
                    <!-- Help text -->
                    @if (Route::has('password.request'))
                        <a class="form-text small text-muted" href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    @endif
  
                  </div>
                </div> <!-- / .row -->
  
                <!-- Input group -->
                <div class="input-group input-group-merge">
  
                  <!-- Input -->
                  <input type="password" placeholder="masukkan passwordmu" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
  
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
  
                </div>
              </div>


               <!-- Remember me -->
               <div class="form-group">
  
                    <div class="row">
                      <div class="col">
                                <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="rememberme">Ingat saya</label>
                                </div>
                      </div>
                    </div> <!-- / .row -->
      
                   
                  </div>

  
              <!-- Submit -->
              <button class="btn btn-lg btn-block btn-primary mb-3">
                Masuk
              </button>
  
              <!-- Link -->
              <p class="text-center">
                <small class="text-muted text-center">
                    Belum punya akun? <a href="{{url('register')}}">Daftar!</a>
                </small>
              </p>
              
            </form>
  
          </div>
          <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
            
            <!-- Image -->
            <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url('https://dashkit.goodthemes.co/assets/img/covers/auth-side-cover.jpg');"></div>
  
          </div>
        </div> <!-- / .row -->
      </div>


<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
