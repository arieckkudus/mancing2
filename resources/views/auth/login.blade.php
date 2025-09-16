<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex; flex-direction: row;">
        <div style="min-height: 100vh; flex: 2; overflow: hidden;">
            <img src="https://images.pexels.com/photos/3602778/pexels-photo-3602778.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                alt="bg" style="object-fit: fit-content; min-width: 100%; min-height: 100%; opacity: 0.4;">
        </div>
        <div
            style="min-height: 100vh; flex: 1; padding-inline: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div class="w-100" style="margin-bottom: 80px;">
                <span style="font-size: 36px; font-weight: bold;">Mancing</span>
            </div>
            <form method="POST" action="{{ route('login') }}" class="needs-validation w-100 d-flex" novalidate
                autocomplete="off" style="flex-direction: column;">
                @csrf
                <span style="margin-bottom: 10px;">Lorem ipsum dolor sit.</span>

                <div class="form-group mb-2">
                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        autofocus>
                    <div class="invalid-feedback">
                        Email is invalid
                    </div>
                </div>

                <div class="form-group mb-2">
                    <div class="mb-2 w-100">
                        <label class="text-muted" for="password">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                        Password is required
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
