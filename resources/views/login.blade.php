<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{url('/')}}/login" method="post" style="border: 1px solid black; padding: 20px;">
                @csrf
                <h1 class="text-center">Login</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    {{-- <input type="email" name="email" class="form-control" placeholder="Email"> --}}
                    <x-input type="email" name="email" class="form-control" placeholder="Email"/>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <x-input type="password" name="password" class="form-control" placeholder="Password"/>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <a href="/resetPassword">Forget Password</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <div class="form-group">
                    <span>New here? <a href="/register">Click here</a></span>
                </div>
                <div class="form-group">
                    <h3>{{$mess??''}}</h3>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components/footer')

</body>
</html>
