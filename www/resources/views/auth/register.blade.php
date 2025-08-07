<head>
    <!-- Підключення шрифтів Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>


        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;

        }
        .container {
            display: flex;
            justify-content: space-around;
            gap: 120px;
            align-items: center;
        }
        .recent-logins {
            max-width: 400px;
        }
        .recent-logins h2 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #1c1e21;
        }
        .recent-logins p {
            color: #606770;
            font-size: 18px;
            margin-bottom: 30px;
        }
        .cards {
            display: flex;
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            text-align: center;
            width: 150px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.2s;
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #ddd;
            display: block;
            margin: 0 auto 10px;
        }
        .card.add {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #1877f2;
            font-weight: bold;
            font-size: 16px;
        }
        .card .close {
            position: absolute;
            top: 5px;
            left: 5px;
            background: #ccc;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
        }
        .login-box {
            background: white;
            padding: 40px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .login-box input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 18px;
            transition: 0.3s;
        }
        .login-box input:focus {
            outline: none;
            border-color: #b30000;
            box-shadow: 0 0 5px rgba(179, 0, 0, 0.4);
        }
        .login-box button {
            width: 100%;
            padding: 15px;
            background: #b30000;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        .login-box button:hover {
            background: #ff1a1a;
        }
        .login-box button.green {
            background: #b30000;
            margin-top: 15px;
        }
        .login-box button.green:hover {
            background: #ff1a1a;
        }
        .login-box a {
            display: block;
            text-align: center;
            margin-top: 12px;
            font-size: 16px;
            color: #b30000;
            text-decoration: none;
        }

        /* Стиль для кастомного чекбокса червоного кольору */
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
            font-weight: 500;
            color: #333;
        }

        .custom-checkbox input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox .checkmark {
            width: 20px;
            height: 20px;
            background-color: #eee;
            border-radius: 5px;
            margin-right: 10px;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .custom-checkbox:hover .checkmark {
            background-color: #f8d7da;
        }

        .custom-checkbox input[type="checkbox"]:checked + .checkmark {
            background-color: #dc3545; /* яскраво-червоний */
        }

        .custom-checkbox .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input[type="checkbox"]:checked + .checkmark:after {
            display: block;
            left: 6px;
            top: 2px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        .logo-text {
            font-size: 40px;
            color: red;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="login-box">
        <h2 class="text-center"><b>Registration</b></h2>
        <x-guest-layout>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" :value="old('name')" required autofocus autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" :value="old('email')" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Password confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="green submit-btn">Sign up</button>
                </div>
                <div class="actions" style="margin-top: 10px;">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Already have an account? Log in</a>
                    @endif
                </div>
            </form>
        </x-guest-layout>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
