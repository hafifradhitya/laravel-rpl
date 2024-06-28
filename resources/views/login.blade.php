<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <title>Login</title>
</head>
<body class="px-4 py-5 px-md-5 text-center justify-content-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    {{-- <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Section: Design Block -->
<section class="">
    <!-- Jumbotron -->
    <div class="">
      <div class="container">
        <div class="row gx-lg-5 align-items-center justify-content-center py-5">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              Selamat Datang<br />
              <span class="text-black">di</span>
              <span class="text-primary">Aplikasiku</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
              quibusdam tempora at cupiditate quis eum maiores libero
              veritatis? Dicta facilis sint aliquid ipsum atque?
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                    @if(session()->has('message'))
                        {{ session('message') }}
                    @endif
                <form action="{{ url('proses-login') }} " method="post">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                    @csrf
                  <!-- Input Email -->
                  <h4 class="fw-normal mb-3 pb-3"><center>Silahkan Login</center></h4>
                  <div class="form-outline mb-4">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="email ..." required />
                  </div>

                  <!-- Input Password -->
                  <div class="form-outline mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password ..." required/>
                  </div>

                  <!-- Checkbox -->
                  {{-- <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                    <label class="form-check-label" for="form2Example33">
                      Subscribe to our newsletter
                    </label>
                  </div> --}}

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Masuk
                  </button>

                  <!-- Register buttons -->
                  {{-- <div class="text-center">
                    <p>or sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-github"></i>
                    </button>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
