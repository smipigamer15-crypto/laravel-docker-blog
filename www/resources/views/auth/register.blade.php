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
        }
        .form-group input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #2e2e2e; /* Темний фон для полів вводу */
            font-size: 16px;
            color: #e0e0e0;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            background: #3c3c3c; /* Темніший фон при фокусі */
            outline: none;
            color: white;
            box-shadow: 0 0 5px #4c4cff;
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
    <h2 class="text-center"><b>Реєстрація</b></h2>
    <div class="container-fluid">
        <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" name="name" class="form-control" id="name" :value="old('name')" required autofocus autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" :value="old('email')" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Підтвердження пароля</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                </div>
                <div class="d-grid gap-2">
                    <x-primary-button class="submit-btn">
                        {{ __('Зареєструватись') }}
                    </x-primary-button>
                </div>
                <div class="actions">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            Вже маєте акаунт? Увійти
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
