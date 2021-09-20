<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-3">
        <div class="content" id="register">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
            @endif

            <form action="{{url('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nameId">Name</label>
                    <input type="text" name='name' class="form-control" id="nameId" aria-describedby="nameHelp" placeholder="Enter name">
                    <small id="nameHelp" class="form-text text-muted">please enter your full name.</small>
                </div>

                <div class="form-group">
                    <label for="emailId">Email address</label>
                    <input type="email" name="email" class="form-control" id="emailId" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="postcodeId">Postcode</label>
                    <input type="text" name="postcode" class="form-control" id="postcodeId" aria-describedby="postcodeHelp" placeholder="Enter postcode">
                    <small id="postcodeHelp" class="form-text text-muted">please enter valid postcode.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>

</html>
