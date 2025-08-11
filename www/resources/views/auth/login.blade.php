<head>

    <title>Login</title>
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
        justify-content: center;
        align-items: center;
        height: 100vh;
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



    <div class="login-box" id="auth-container">
        <!-- Форма входу -->
        <div id="login-form">
            <h2 class="text-center"><b>Login</b></h2>
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" :value="old('email')" required autofocus autocomplete="username" placeholder="Email address or phone number">
                        <div id="emailHelp" class="form-text">We will never share your email address with anyone.</div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password" placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-check">
                        <label class="custom-checkbox" for="remember_me">
                            <input type="checkbox" id="remember_me" name="remember">
                            <span class="checkmark"></span>
                            Remember me
                        </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="green submit-btn" onclick="saveLogin()">Sign in</button>
                    </div>
                    <div class="actions" style="margin-top: 10px;">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="margin-left: 15px;">Create an account</a>
                        @endif
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Перевірка, чи є збережений користувач
        window.onload = function () {
            const savedEmail = localStorage.getItem("saved_email");
            if (savedEmail) {
                showRecentLogin(savedEmail);
            }
        };

        // Зберегти логін при вході
        function saveLogin() {
            const emailInput = document.getElementById("email");
            if (emailInput && emailInput.value) {
                localStorage.setItem("saved_email", emailInput.value);
            }
        }

        // Показати блок нещодавнього входу
        function showRecentLogin(email) {
            document.getElementById("login-form").style.display = "none";
            document.getElementById("recent-logins").style.display = "block";

            const cards = document.getElementById("cards-container");
            cards.innerHTML =
                <div class="card" onclick="autoLogin('${email}')" style="background-color: #f0f2f5; padding: 10px; border-radius: 10px; text-align: center; cursor: pointer;">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="" style="width: 60px; height: 60px; margin-bottom: 10px;">
                        <span>${email}</span>
                </div>
            <div class="card add" onclick="clearLogin()" style="color: #1877f2; font-weight: bold; font-size: 16px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <div style="font-size: 30px;">+</div>
                Додати
            </div>
        ;
        }

        function autoLogin(email) {
            // Імітація входу — перенаправлення або виконання автологіну
            alert(Автоматичний вхід як ${email});
            // Тут можна виконати редирект на внутрішню сторінку:
            // window.location.href = '/dashboard';
        }

        function clearLogin() {
            localStorage.removeItem("saved_email");
            location.reload();
        }
    </script>




    {{--<div class="login-form">--}}
    {{--    <h2 class="text-center"><b>Вхід</b></h2>--}}
    {{--    <div class="container-fluid">--}}
    {{--        <x-guest-layout>--}}
    {{--            <!-- Session Status -->--}}
    {{--            <x-auth-session-status class="mb-4" :status="session('status')" />--}}
    {{--            <form method="POST" action="{{ route('login') }}">--}}
    {{--                @csrf--}}
    {{--                <div class="form-group">--}}
    {{--                    <label for="email" class="form-label">Email</label>--}}
    {{--                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" :value="old('email')" required autofocus autocomplete="username">--}}
    {{--                    <div id="emailHelp" class="form-text text-white">Ми ніколи нікому не передамо вашу електронну адресу.</div>--}}
    {{--                </div>--}}
    {{--                <div class="form-group">--}}
    {{--                    <label for="exampleInputPassword1" class="form-label">Password</label>--}}
    {{--                    <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">--}}
    {{--                    <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
    {{--                </div>--}}
    {{--                <div class="form-check">--}}
    {{--                    <input type="checkbox" class="form-check-input" id="remember_me">--}}
    {{--                    <label class="form-check-label" for="remember_me">Запам'ятати мене</label>--}}
    {{--                </div>--}}
    {{--                <div class="flex items-center justify-end mt-4">--}}
    {{--                    <div class="d-grid gap-2">--}}
    {{--                        <x-primary-button class="submit-btn">--}}
    {{--                            {{ __('Війти') }}--}}
    {{--                        </x-primary-button>--}}
    {{--                    </div>--}}
    {{--                    <div class="actions">--}}
    {{--                        @if (Route::has('password.request'))--}}
    {{--                            <a href="{{ route('password.request') }}">--}}
    {{--                                Забув пароль?--}}
    {{--                            </a>--}}
    {{--                        @endif--}}
    {{--                        @if (Route::has('register'))--}}
    {{--                            <a href="{{ route('register') }}">--}}
    {{--                                Зарегіструватись--}}
    {{--                            </a>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </x-guest-layout>--}}
    {{--    </div>--}}
    {{--</div>--}}



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
