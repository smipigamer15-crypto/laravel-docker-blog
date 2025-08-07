<head>
    <!-- Підключення шрифтів Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Загальні стилі для всього сайту */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif; /* Використовуємо шрифт Roboto */
            background: linear-gradient(135deg, #121212, #2c2c2c);
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background: linear-gradient(135deg, #1e1e1e, #2b2b2b);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            color: #fff;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #f0f0f0;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #fff; /* Колір тексту для мітки */
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #444;
            border-radius: 8px;
            background: #2e2e2e; /* Темний фон для полів вводу */
            font-size: 16px;
            color: #e0e0e0;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            background: #3c3c3c; /* Темніший фон при фокусі */
            outline: none;
            box-shadow: 0 0 5px #4c4cff;
            border-color: #4c4cff; /* Колір рамки при фокусі */
        }
        .form-group input::placeholder {
            color: #aaa; /* Колір плейсхолдера */
        }
        .submit-btn, .secondary-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #4c4cff, #6c6cff);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            transition: transform 0.2s ease;
            margin-bottom: 10px;
        }
        .submit-btn:hover, .secondary-btn:hover {
            transform: scale(1.05);
        }
        .submit-btn:active, .secondary-btn:active {
            transform: scale(0.98);
        }
        .submit-btn::before, .secondary-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
            transition: left 0.3s ease-in-out;
        }
        .submit-btn:hover::before, .secondary-btn:hover::before {
            left: 100%;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .actions a {
            color: #6c6cff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .actions a:hover {
            color: #4c4cff;
        }
    </style>
</head>

<body>
<div class="login-form">
    <h2 class="text-center"><b>Відновлення пароля</b></h2>
    <div class="container-fluid">
        <x-guest-layout>
            <!-- Опис для користувача -->
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Забули пароль? Не проблема. Просто введіть свою електронну адресу, і ми надішлемо вам посилання для скидання пароля, яке дозволить вибрати новий.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Поле для введення email -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Введіть вашу електронну адресу" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="d-grid gap-2">
                    <x-primary-button class="submit-btn">
                        {{ __('Відновити пароль') }}
                    </x-primary-button>
                </div>
                <div class="actions">
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
        </x-guest-layout>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
