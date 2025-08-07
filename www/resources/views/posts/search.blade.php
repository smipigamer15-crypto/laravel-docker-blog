
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Posts</title>



    <style>
     .p1 {
         margin-top: 20px;
     }
    .p2 {
        margin-top: 100px;
    }
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e1e1e, #2b2b2b);
            color: #fff;
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

<div class="container">


    <style>
        .der {
            height: 50vh; /* Висота панелі пошуку */
            min-height: 300px; /* Мінімальна висота */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .search-form .form-control {
            border-radius: 1.5rem 0 0 1.5rem; /* Заокруглення лівого краю */
            font-size: 1rem; /* Зменшений розмір тексту */
        }

        .search-form .btn {
            border-radius: 0 1.5rem 1.5rem 0; /* Заокруглення правого краю */
            font-size: 1rem; /* Зменшений розмір тексту */
        }

        .search-suggestions a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .search-panel {
                height: 40vh; /* Менша висота для мобільних */
            }

            .search-form .form-control,
            .search-form .btn {
                font-size: 0.9rem; /* Зменшення шрифту для мобільних */
            }
        }
    </style>

    <div class="p1"></div>

    <!-- Кнопка прогресу -->

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




    <!-- Пошук -->

    <div class="p2"></div>
    <div class="der position-relative text-center text-white">
        <!-- Фонове зображення -->
        <div class="search-bg position-absolute w-100 h-100" style="background-image: url('https://img.goodfon.ru/wallpaper/big/4/1c/temnyy-fon-tekstura-hd.webp'); background-size: cover; background-position: center;"></div>

        <!-- Тінь поверх зображення -->
        <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>

        <!-- Контент пошуку -->
        <div class="container position-relative z-index-1">
            <h1 class="display-4 fw-bold mb-4">Пошук</h1>
            <!-- Поле пошуку -->
            <form action="{{ route('posts.search') }}" method="GET" class="search-form mx-auto" style="max-width: 600px;">
                <div class="input-group">
                    <input type="text" name="query" class="form-control rounded-start" placeholder="Пошук..." aria-label="Пошук" value="{{ request('query') }}">
                    <button type="submit" class="btn btn-dark rounded-end px-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg></button>
                </div>
            </form>
        </div>
    </div>



    <style>


        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        /* Стиль для контейнера поста */
        .post-container {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Стиль для заголовку поста */
        .post-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 15px;
        }

        /* Стиль для тексту поста */
        .post-content {
            font-size: 1rem;
            color: #ddd;
            line-height: 1.6;
        }

        /* Стиль для секції лайків і коментарів */
        .post-footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Стиль для кнопки лайку */
        .like-button {
            color: #ff5f57;
            font-size: 1.3rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .like-button:hover {
            color: #ff2a16;
        }

        /* Стиль для коментарів */
        .comments-section {
            margin-top: 20px;
        }

        .comment {
            background-color: #2d2d2d;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Стиль для кожного коментаря */
        .comment .comment-author {
            font-weight: bold;
            color: #ff5f57;
        }

        .comment .comment-content {
            color: #bbb;
            font-size: 1rem;
        }

        .comment .comment-time {
            font-size: 0.8rem;
            color: #aaa;
        }

        /* Стиль для тексту кнопки коментарів */
        .comment-button {
            background-color: #3e3e3e;
            color: #fff;
            border-radius: 20px;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .comment-button:hover {
            background-color: #ff5f57;
        }
        .comments-section {
            display: none; /* Приховуємо всі розділи коментарів за замовчуванням */
        }

        .toggle-btn {
            background-color: #3e3e3e;
            color: #fff;
            border-radius: 20px;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .toggle-btn:hover{
            background-color: #ff5f57;
        }

    </style>




<div class="p1"></div>



       <div class="row g-5">

         <div class="col-md-12">

             <h2 class="p1">Результати пошуку</h2>



            <!-- Початок постів -->
            @forelse ($posts as $post)
                <div class="post-container">
                    <h5 class="post-title">{{ $post->title }}</h5>
                    <p class=" post-content">{{ $post->content }}</p>

                    <!-- Кнопки для лайка і коментаря -->
                    <div class="d-flex justify-content-start align-items-center">
                        <button class="comment-button" {{ $post->likes->contains('user_id', auth()->id()) ? 'active' : '' }}  id="like-btn-{{ $post->id }}" onclick="toggleLike({{ $post->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-emoji-laughing-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5s-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5m5.331 3a1 1 0 0 1 0 1A5 5 0 0 1 8 13a5 5 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5m-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5s-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235"/>
                            </svg>&ensp;<small>(<span id="like-count-{{ $post->id }}">{{ $post->likes->count() }}</span>)</small></button>
                        &ensp;

                    </div>

                    <!-- Кнопки редагування та видалення поста -->

                    <div class="mt-3 text-end">

                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                            </svg></a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg></button>
                        </form>
                    </div>



                    <!-- Форма для додавання коментаря -->
                    <h6>Коментарі:</h6>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea class="form-control" name="comment" rows="3" placeholder="Напишіть коментар..."></textarea>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Додати коментар</button>
                    </form>

                    <!-- Список коментарів -->
                    @foreach ($post->comments as $comment)
                        <div class="comment mt-2">
                            <p><strong class="comment-author">{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>

                            @if (auth()->id() === $comment->user_id)
                                <!-- Кнопки редагування та видалення коментаря -->
                                <div class="mt-1">

                                    <!-- Форма видалення -->
                                    <div class="mt-3 text-end">
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            @empty
                <p><b class="text-danger">Немає постів...</b></p>
            @endforelse
            <!-- Кінець постів -->




            <!-- JavaScript для лайків і дизлайків -->
            <script>
                let likeCounts = {};
                let dislikeCounts = {};

                document.querySelectorAll("[id^='like-btn']").forEach(button => {
                    button.addEventListener("click", function() {
                        let postId = this.id.split("-")[2];
                        if (!likeCounts[postId]) likeCounts[postId] = 0;
                        likeCounts[postId]++;
                        document.getElementById(`like-count-${postId}`).textContent = likeCounts[postId];

                    });
                });

            </script>
            <script>
                function toggleLike(postId) {
                    fetch(`/posts/${postId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            const likeBtn = document.getElementById(`like-btn-${postId}`);
                            const likeCount = document.getElementById(`like-count-${postId}`);

                            if (data.liked) {
                                likeBtn.classList.add('active');
                                likeCount.textContent = parseInt(likeCount.textContent) + 1;
                            } else {
                                likeBtn.classList.remove('active');
                                likeCount.textContent = parseInt(likeCount.textContent) - 1;
                            }
                        });
                }

            </script>



</div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
