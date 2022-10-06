<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }}</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Page</h3></div>
                                    <div class="card-body">
                                        <form action="/login" method="post">
                                            @csrf
                                                @if(session()->has('success'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                @if(session()->has('loginError'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('loginError') }}
                                                </div>
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Enter your Email" autofocus required value="{{ old ('email') }}"/>
                                                <label for="email">Email address</label>
                                            @error('email')
                                                <div class="is-invalid-feedback">
                                                {{ $message }}    
                                                </div> 
                                            @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                                        </form>
                                    </div>
                                    <div class="row">
                                    <div class="card-footer col-md-12 text-center ">
                                        <a class="small text-left text-decoration-none " href="/reset">Forgot Password?</a>
                                        <div class="small">Need an account?<a href="/register" class="text-decoration-none col-md-6"> Sign up</a></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
