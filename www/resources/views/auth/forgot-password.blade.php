<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>

    <!-- Підключення шрифтів Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: "Helvetica Neue", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px; /* щоб на мобільному не прилипало до країв */
        }

        .container {
            background-color: white;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Трохи ширше для великих екранів */
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .text-gray-600 {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
            text-align: center;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
            text-align: left;
        }

        input[type="email"] {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="email"]:focus {
            border-color: #c00;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(204, 0, 0, 0.25);
        }

        .submit-btn {
            background-color: #c00;
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .submit-btn:hover {
            background-color: #a00;
        }

        .links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap; /* щоб на мобільному переносилося */
        }

        .links a {
            color: #c00;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .links a:hover {
            color: #a00;
        }

        /* Мобільна адаптація */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
                max-width: 100%; /* На мобільних займає всю ширину */
            }

            h2 {
                font-size: 24px; /* Трохи більше, ніж 22px */
            }

            .text-gray-600 {
                font-size: 15px; /* Не робимо надто дрібним */
            }

            input[type="email"], .submit-btn {
                font-size: 15px;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
<div class="container">
    <h2><b>Password Recovery</b></h2>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just enter your email address and we will send you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" style="width: 100%;">
        @csrf

        <!-- Email Input -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                placeholder="Enter your email address"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="d-grid gap-2">
            <x-primary-button class="submit-btn">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>

        <!-- Links -->
        <div class="links">
            @if (Route::has('login'))
                <a href="{{ route('login') }}">
                    Back to Login
                </a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Register
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
