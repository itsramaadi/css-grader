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
    <style>body { display: none; }</style>
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">




    <!-- CONTENT
    ================================================== -->
    <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-5 col-xl-4 my-5">
                
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                  Daftar
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                  Halo anggota CSS baru!
                </p>
      
                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <!-- Label -->
                            <label for="name">Nama Kamu</label>
            
                        <!-- Input -->
                        <input id="name" type="text" placeholder="masukkan nama kamu" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>


                    <!-- Email address -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label for="email">Alamat Email</label>
        
                        <!-- Input -->
                        <input id="email" type="email" placeholder="emailmu@contoh.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
        
                    <hr>

                    <!-- Password -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label for="password">Kata Sandi</label>
        
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
        
                        <!-- Input -->
                        <input id="password" placeholder="Masukkan passwordnya!" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
        
                        </div>
                    </div>


                    <!-- Confirm Password -->
                    <div class="form-group">
        
                            <!-- Label -->
                            <label for="password-confirm">Konfirmasi password</label>
            
                            <!-- Input group -->
                            <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <input placeholder="Konfirmasi passwordmu!" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            
                            </div>
                    </div>

                    <hr>

                    <!-- Gender -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label for="gender">Jenis kelamin</label>
            
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <select id="Gender" name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" required>
                                <option value="1">Laki</option>
                                <option value="2">Perempuan</option>
                                <option value="3">Dirahasiakan</option>
                            </select>
                
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="form-group">
                        <!-- Label -->
                            <label for="class">Kelas</label>
                
                        <!-- Input -->
                        <input placeholder="(X/XI/XII)-(MIPA/IPS)-(1-9)" id="class" type="text" class="classin form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" value="{{ old('class') }}" required>
                        
                        @if ($errors->has('class'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class') }}</strong>
                            </span>
                        @endif
    
                    </div>

                     <!-- Nama -->
                     <div class="form-group">
                        <!-- Label -->
                            <label for="class">Absen Kelas</label>
                    
                        <!-- Input -->
                        <input placeholder="Masukkan Absenmu!" id="css_number" type="text" class="form-control{{ $errors->has('css_number') ? ' is-invalid' : '' }}" name="css_number" value="{{ old('css_number') }}" required>
        
                        @if ($errors->has('css_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('css_number') }}</strong>
                            </span>
                        @endif
        
                    </div>
        
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                        Daftar
                    </button>
        
                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                        Sudah punya akun? <a href="{{url('login')}}">Masuk!</a>
                        </small>
                    </div>
                </form>
      
              </div>
            </div> <!-- / .row -->
          </div> <!-- / .container -->





<script src="{{ asset('js/mask.js')}}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script>
$('.classin').mask('XOO-SSSO-9', 
    {'translation': 
        { 'O': {pattern:  /[a-zA-Z]/, optional: true}}
    });
</script>
</body>
</html>
