<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створити пост</title>


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

        /* Стиль для кнопки стрілки */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #333; /* Темний фон кнопки */
            color: #fff; /* Білий колір для стрілки */
            font-size: 2rem;
            border: none;
            border-radius: 50%; /* Кругла форма */
            padding: 10px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            opacity: 0.8;
            transition: opacity 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Стиль для прогресбару */
        .progress-ring {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: conic-gradient(#555 0% 0%, #333 0% 100%); /* Темний прогрес */
            z-index: -1;
        }

        /* Приховати кнопку, коли на верху */
        .back-to-top.hidden {
            display: none;
        }

        /* Ефект при наведенні */
        .back-to-top:hover {
            opacity: 1;
            transform: scale(1.1);
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
    </style>





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


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
<button class="back-to-top hidden" id="backToTopBtn">
    <div class="progress-ring"></div>
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
    </svg>
</button>


<script>
    // Отримуємо кнопку
    const backToTopBtn = document.getElementById('backToTopBtn');
    const progressRing = document.querySelector('.progress-ring');

    // Функція для оновлення прогресу
    function updateProgress() {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrollPercentage = (scrollTop / docHeight) * 100;
        const degree = (scrollPercentage * 3.6); // 360 градусів / 100 = 3.6
        progressRing.style.background = `conic-gradient(#555 ${degree}deg, #333 ${degree}deg 100%)`;
    }

    // Показати кнопку, коли прокрутили вниз
    window.onscroll = function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTopBtn.classList.remove('hidden');
        } else {
            backToTopBtn.classList.add('hidden');
        }

        // Оновлення прогресу
        updateProgress();
    };

    // Прокрутка до верху при натисканні на кнопку
    backToTopBtn.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>





<div class="login-form">
<div class="container">

    <h2 class="p1"><b>📝Створити новий пост</b></h2>


<div class="row">
    <div class="col-md-12">
<form  action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <label for="image"><b>🖼Зображення:</b></label>
    <div class="p1">
    <small><b><input type="file" name="image" id="image" accept="image/*"></b></small>
    </div>
    <div class="form-group">
        <div class="p1"></div>
    <label for="title" class="form-label"><b>📌Заголовок</b></label>
        <input type="text" id="title" name="title" class="form-control"  placeholder="Впиши заголовок">
    </div>
    <div class="form-group">
        <div class="p1"></div>
    <label for="content" class="form-label"><b>📃Текст</b></label>
        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
    </div>
    <div class="p1"></div>
    <button type="submit" class="btn btn-primary"><b>Створити пост</b></button>

</form>
    </div>
</div>



</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
