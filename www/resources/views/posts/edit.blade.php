<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати пост</title>

    <style>




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


        /* Основна панель навігації */
        .navbar {
            background: linear-gradient(135deg, #1e1e1e, #2b2b2b);
            padding: 15px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            display: inline-block;
            margin-right: 20px;
        }


        .navbar-nav .nav-item {
            margin-left: 20px;
            position: relative;
            text-align: center;
        }

        .navbar-nav .nav-link {
            color: #e0e0e0;
            font-size: 16px;
            padding: 8px 12px;
            text-transform: none;
            transition: all 0.3s;
            display: block;
        }

        /* Підкреслення для Головної */
        .navbar-nav .nav-link.home-link {
            color: #fff;
            position: relative;
            display: inline-block;
        }

        .navbar-nav .nav-link.home-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%; /* Лінія підкреслення (зроблена більшою) */
            height: 2px;
            background-color: #4c4cff;
        }

        .navbar-nav .nav-link:hover {
            color: #4c4cff;
            background-color: #333;
            border-radius: 8px;
        }

        /* Пошук */
        .search-container {
            display: flex;
            align-items: center;
            margin-left: 20px;
            margin-right: 20px; /* Відступ між пошуком та логотипом */
        }

        .search-input {
            width: 150px;
            padding: 8px;
            background-color: #2e2e2e;
            border: 1px solid #444;
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            margin-right: 10px;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 5px #4c4cff;
        }

        .search-button {
            background: linear-gradient(90deg, #4c4cff, #6c6cff);
            color: #fff;
            padding: 8px 15px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .search-button:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #6c6cff, #4c4cff);
        }

        /* Стиль для акаунта */
        .account-dropdown {
            position: relative;
            margin-left: 20px;
        }

        .account-dropdown .dropdown-menu {
            background-color: #2e2e2e;
            border-radius: 8px;
            border: none;
            color: #e0e0e0;
        }

        .account-dropdown .dropdown-item {
            color: #e0e0e0;
            padding: 12px;
            font-size: 16px;
        }

        .account-dropdown .dropdown-item:hover {
            background-color: #333;
            color: #fff;
        }

        .account-dropdown:hover .dropdown-menu {
            display: block;
        }

        .account-dropdown .dropdown-toggle::after {
            display: none;
        }

        /* Адаптивність для мобільних пристроїв */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                text-align: left;
                margin-left: 0;
            }

            .navbar-nav .nav-item {
                margin-left: 0;
                margin-bottom: 15px;
            }

            .navbar-nav .nav-link {
                font-size: 18px;
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }

            .search-input {
                width: 100%;
                margin-right: 0;
                margin-top: 10px;
            }

            .search-container {
                width: 100%;
                margin-top: 10px;
            }

            .account-dropdown {
                margin-left: 0;
                margin-right: 30px;
                width: 100%;
            }

        }
        /* Мобільна версія пошуку */
        .mobile-search-container {
            display: flex;
            align-items: center;
            margin-right: auto;
            position: relative; /* Для утримання елементів на одному рівні */
        }

        .mobile-search-input {
            width: 0;
            height: 38px;
            padding: 0 10px;
            background-color: #2e2e2e;
            border: 1px solid #444;
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            transition: width 0.3s ease-in-out, visibility 0.3s, opacity 0.3s;
            visibility: hidden;
            opacity: 0;
        }

        .mobile-search-input.open {
            width: 150px;
            visibility: visible;
            opacity: 1;
        }

        #mobileSearchButton {
            background: linear-gradient(90deg, #4c4cff, #6c6cff);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 12px; /* Зменшений розмір */
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            margin-right: 10px;
            height: 38px;
        }

        #mobileSearchButton.shrink {
            padding: 4px 10px; /* Менший розмір для кнопки при відкритті форми */
            font-size: 14px;
        }

        #mobileSearchButton:hover {
            background: linear-gradient(90deg, #6c6cff, #4c4cff);
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
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #f0f0f0;
        }
        .form-group input:focus {
            outline: none;
            box-shadow: 0 0 5px #4c4cff;
        }
        .p1 {
            margin-top: 9px;
        }
        .p3 {
            margin-bottom: -30px;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchButton = document.getElementById("mobileSearchButton");
        const searchInput = document.getElementById("mobileSearchInput");
        const searchForm = document.getElementById("mobileSearchForm");

        searchButton.addEventListener("click", function () {
            if (searchInput.classList.contains("open")) {
                if (searchInput.value.trim() !== "") {
                    searchForm.submit(); // Виконання пошуку, якщо є текст
                } else {
                    searchInput.classList.remove("open");
                    searchButton.classList.remove("shrink"); // Відновлення розміру кнопки
                }
            } else {
                searchInput.classList.add("open");
                searchButton.classList.add("shrink"); // Зменшення розміру кнопки
                searchInput.focus();
            }
        });
    });

</script>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <!-- Логотип -->
        <a class="navbar-brand" href="{{ route('posts.index') }}">Loоmio</a>


        <!-- Пошук (Мобільна версія) -->
        <div class="mobile-search-container d-flex d-lg-none">
            <button id="mobileSearchButton" class="btn btn-outline-light me-2">🔍</button>
            <form id="mobileSearchForm" method="GET" action="{{ route('posts.search') }}" class="d-flex">
                <input id="mobileSearchInput" name="query" type="text" class="mobile-search-input" placeholder="Пошук..." aria-label="Search">
            </form>
        </div>

        <!-- Кнопка-гамбургер -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Вміст навігації -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Пошук (Десктопна версія) -->
            <div class="search-container d-none d-lg-flex me-auto">
                <form method="GET" action="{{ route('posts.search') }}" class="d-flex" role="search">
                    <input name="query" value="{{ $query ?? '' }}" type="text" class="search-input" placeholder="Пошук...">
                    <button class="search-button">
                        Пошук
                    </button>
                </form>
            </div>

            &ensp;
            <!-- Панель акаунта -->
            <div class="account-dropdown ms-auto">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('posts.create') }}"><b style="color: #4c4cff"> • Створити пост •</b></a></li>
                    <li><hr class="dropdown-divider" style="background-color: white"></li>
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><b> • Панель •</b></a></li>
                </ul>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="login-form">
<div class="container-fluid">



    <h3 class="p1">✍️Редагувати Блог</h3>

<div class="row">
    <div class="col-md-12">
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="p1"></div>
    <label for="title" class="form-label">➭ Заголовок</label><br>
    <input type="text" id="title" name="title" class="form-control" placeholder="Впиши заголовок"  value="{{ $post->title }}" required>
    <div class="p1"></div>
    <label for="content" class="form-label">➭ Текст</label><br>
    <textarea name="content" class="form-control" id="content" rows="3" required>{{ $post->content }}</textarea><br><br>
    <div class="p3"></div>
    <button type="submit" class="btn btn-primary">Оновити Пост</button>
</form>
</div>
</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
