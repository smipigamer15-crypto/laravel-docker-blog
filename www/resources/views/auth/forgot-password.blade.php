<head>
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
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 360px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .text-gray-600 {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .submit-btn {
            background-color: #c00;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #a00;
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .links a {
            color: #c00;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container">
    <h2><b>Відновлення пароля</b></h2>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Забули пароль? Не проблема. Просто введіть свою електронну адресу, і ми надішлемо вам посилання для скидання пароля, яке дозволить вибрати новий.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
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
                placeholder="Введіть вашу електронну адресу"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="d-grid gap-2">
            <x-primary-button class="submit-btn">
                {{ __('Відновити пароль') }}
            </x-primary-button>
        </div>

        <!-- Links -->
        <div class="links">
            @if (Route::has('login'))
                <a href="{{ route('login') }}">
                    Повернутися до входу
                </a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Зареєструватися
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
