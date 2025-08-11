<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>




<style>


    /**
* Template Name: Yummy
* Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

    /*--------------------------------------------------------------
    # Font & Color Variables
    # Help: https://bootstrapmade.com/color-system/
    --------------------------------------------------------------*/
    /* Fonts */
    :root {
        --default-font: "Roboto",  system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --heading-font: "Amatic SC",  sans-serif;
        --nav-font: "Inter",  sans-serif;
    }

    /* Global Colors - The following color variables are used throughout the website. Updating them here will change the color scheme of the entire website */
    :root {
        --background-color: #ffffff; /* Background color for the entire website, including individual sections */
        --default-color: #212529; /* Default color used for the majority of the text content across the entire website */
        --heading-color: #37373f; /* Color for headings, subheadings and title throughout the website */
        --accent-color: #ce1212; /* Accent color that represents your brand on the website. It's used for buttons, links, and other elements that need to stand out */
        --surface-color: #ffffff; /* The surface color is used as a background of boxed elements within sections, such as cards, icon boxes, or other elements that require a visual separation from the global background. */
        --contrast-color: #ffffff; /* Contrast color for text, ensuring readability against backgrounds of accent, heading, or default colors. */
    }

    /* Nav Menu Colors - The following color variables are used specifically for the navigation menu. They are separate from the global colors to allow for more customization options */
    :root {
        --nav-color: #7f7f90;  /* The default color of the main navmenu links */
        --nav-hover-color: #ce1212; /* Applied to main navmenu links when they are hovered over or active */
        --nav-mobile-background-color: #ffffff; /* Used as the background color for mobile navigation menu */
        --nav-dropdown-background-color: #ffffff; /* Used as the background color for dropdown items that appear when hovering over primary navigation items */
        --nav-dropdown-color: #7f7f90; /* Used for navigation links of the dropdown items in the navigation menu. */
        --nav-dropdown-hover-color: #ce1212; /* Similar to --nav-hover-color, this color is applied to dropdown navigation links when they are hovered over. */
    }

    /* Color Presets - These classes override global colors when applied to any section or element, providing reuse of the sam color scheme. */

    .light-background {
        --background-color: #f2f2f2;
        --surface-color: #ffffff;
    }

    .dark-background {
        --background-color: #1f1f24;
        --default-color: #ffffff;
        --heading-color: #ffffff;
        --surface-color: #37373f;
        --contrast-color: #ffffff;
    }

    /* Smooth scroll */
    :root {
        scroll-behavior: smooth;
    }

    /*--------------------------------------------------------------
    # General Styling & Shared Classes
    --------------------------------------------------------------*/
    body {
        color: var(--default-color);
        background-color: var(--background-color);
        font-family: var(--default-font);
    }

    a {
        color: var(--accent-color);
        text-decoration: none;
        transition: 0.3s;
    }

    a:hover {
        color: color-mix(in srgb, var(--accent-color), transparent 25%);
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--heading-color);
        font-family: var(--heading-font);
    }


    /*--------------------------------------------------------------
    # Global Header
    --------------------------------------------------------------*/
    .header {
        color: var(--default-color);
        background-color: var(--background-color);
        padding: 20px 0;
        transition: all 0.5s;
        z-index: 997;
    }

    .header .logo {
        line-height: 1;
    }

    .header .logo img {
        max-height: 36px;
        margin-right: 8px;
    }

    .header .logo h1 {
        font-size: 30px;
        margin: 0;
        font-weight: 700;
        color: var(--heading-color);
        font-family: var(--default-font);
    }

    .header .logo span {
        color: var(--accent-color);
        font-size: 36px;
    }

    .header .btn-getstarted,
    .header .btn-getstarted:focus {
        color: var(--contrast-color);
        background: var(--accent-color);
        font-size: 14px;
        padding: 8px 26px;
        margin: 0;
        border-radius: 50px;
        transition: 0.3s;
    }

    .header .btn-getstarted:hover,
    .header .btn-getstarted:focus:hover {
        color: var(--contrast-color);
        background: color-mix(in srgb, var(--accent-color), transparent 15%);
    }

    @media (max-width: 1200px) {
        .header .logo {
            order: 1;
        }

        .header .btn-getstarted {
            order: 2;
            margin: 0 15px 0 0;
            padding: 6px 20px;
        }

        .header .navmenu {
            order: 3;
        }
    }

    .scrolled .header {
        box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
    }

    /*--------------------------------------------------------------
    # Navigation Menu
    --------------------------------------------------------------*/
    /* Desktop Navigation */
    @media (min-width: 1200px) {
        .navmenu {
            padding: 0;
        }

        .navmenu ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        .navmenu li {
            position: relative;
        }

        .navmenu>ul>li {
            white-space: nowrap;
            padding: 15px 14px;
        }

        .navmenu>ul>li:last-child {
            padding-right: 0;
        }

        .navmenu a,
        .navmenu a:focus {
            color: var(--nav-color);
            font-size: 15px;
            padding: 0 2px;
            font-family: var(--nav-font);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: space-between;
            white-space: nowrap;
            transition: 0.3s;
            position: relative;
        }

        .navmenu a i,
        .navmenu a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px;
            transition: 0.3s;
        }

        .navmenu>ul>li>a:before {
            content: "";
            position: absolute;
            height: 2px;
            bottom: -6px;
            left: 0;
            background-color: var(--nav-hover-color);
            visibility: hidden;
            width: 0px;
            transition: all 0.3s ease-in-out 0s;
        }

        .navmenu a:hover:before,
        .navmenu li:hover>a:before,
        .navmenu .active:before {
            visibility: visible;
            width: 100%;
        }

        .navmenu li:hover>a,
        .navmenu .active,
        .navmenu .active:focus {
            color: color-mix(in srgb, var(--nav-color) 80%, black 50%);
        }

        .navmenu .dropdown ul {
            margin: 0;
            padding: 10px 0;
            background: var(--nav-dropdown-background-color);
            display: block;
            position: absolute;
            visibility: hidden;
            left: 14px;
            top: 130%;
            opacity: 0;
            transition: 0.3s;
            border-radius: 4px;
            z-index: 99;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
        }

        .navmenu .dropdown ul li {
            min-width: 200px;
        }

        .navmenu .dropdown ul a {
            padding: 10px 20px;
            font-size: 15px;
            text-transform: none;
            color: var(--nav-dropdown-color);
        }

        .navmenu .dropdown ul a i {
            font-size: 12px;
        }

        .navmenu .dropdown ul a:hover,
        .navmenu .dropdown ul .active:hover,
        .navmenu .dropdown ul li:hover>a {
            color: var(--nav-dropdown-hover-color);
        }

        .navmenu .dropdown:hover>ul {
            opacity: 1;
            top: 100%;
            visibility: visible;
        }

        .navmenu .dropdown .dropdown ul {
            top: 0;
            left: -90%;
            visibility: hidden;
        }

        .navmenu .dropdown .dropdown:hover>ul {
            opacity: 1;
            top: 0;
            left: -100%;
            visibility: visible;
        }
    }

    /* Mobile Navigation */
    @media (max-width: 1199px) {
        .mobile-nav-toggle {
            color: var(--nav-color);
            font-size: 28px;
            line-height: 0;
            margin-right: 10px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .navmenu {
            padding: 0;
            z-index: 9997;
        }

        .navmenu ul {
            display: none;
            list-style: none;
            position: absolute;
            inset: 60px 20px 20px 20px;
            padding: 10px 0;
            margin: 0;
            border-radius: 6px;
            background-color: var(--nav-mobile-background-color);
            border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
            box-shadow: none;
            overflow-y: auto;
            transition: 0.3s;
            z-index: 9998;
        }

        .navmenu a,
        .navmenu a:focus {
            color: var(--nav-dropdown-color);
            padding: 10px 20px;
            font-family: var(--nav-font);
            font-size: 17px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: space-between;
            white-space: nowrap;
            transition: 0.3s;
        }

        .navmenu a i,
        .navmenu a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: 0.3s;
            background-color: color-mix(in srgb, var(--accent-color), transparent 90%);
        }

        .navmenu a i:hover,
        .navmenu a:focus i:hover {
            background-color: var(--accent-color);
            color: var(--contrast-color);
        }

        .navmenu a:hover,
        .navmenu .active,
        .navmenu .active:focus {
            color: var(--nav-dropdown-hover-color);
        }

        .navmenu .active i,
        .navmenu .active:focus i {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            transform: rotate(180deg);
        }

        .navmenu .dropdown ul {
            position: static;
            display: none;
            z-index: 99;
            padding: 10px 0;
            margin: 10px 20px;
            background-color: var(--nav-dropdown-background-color);
            transition: all 0.5s ease-in-out;
        }

        .navmenu .dropdown ul ul {
            background-color: rgba(33, 37, 41, 0.1);
        }

        .navmenu .dropdown>.dropdown-active {
            display: block;
            background-color: rgba(33, 37, 41, 0.03);
        }

        .mobile-nav-active {
            overflow: hidden;
        }

        .mobile-nav-active .mobile-nav-toggle {
            color: #fff;
            position: absolute;
            font-size: 32px;
            top: 15px;
            right: 15px;
            margin-right: 0;
            z-index: 9999;
        }

        .mobile-nav-active .navmenu {
            position: fixed;
            overflow: hidden;
            inset: 0;
            background: rgba(33, 37, 41, 0.8);
            transition: 0.3s;
        }

        .mobile-nav-active .navmenu>ul {
            display: block;
        }
    }

    .php11 {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        margin-bottom: 50px;
    }
    .php12 {
        font-family: 'Arial', sans-serif !important;
    }
    .post1 {
        margin-left: 30px;
    }
    .post2 {
        margin-right: 30px;
    }


    .reaction-button {
        display: flex;
        align-items: center;
        gap: 5px;
        background-color: #f1f1f1;
        border: none;
        color: #000;
        padding: 6px 12px;
        font-size: 16px;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .reaction-button:hover {
        background-color: #e2e2e2;
        cursor: pointer;
    }

    .reaction-button.active {
        background-color: #ce1212; /* Жовтуватий колір якщо вже лайкнули */
        color: #000;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 20px;
        border: none;
        color: #fff;
        font-size: 16px;
        transition: background-color 0.2s ease;
        padding: 0;
        margin-bottom: 30px;
    }

    .edit-button {
        background-color: #007bff; /* Синій */
    }

    .edit-button:hover {
        background-color: #0069d9;
    }

    .delete-button {
        background-color: #dc3545; /* Червоний */
        color: var(--contrast-color);
    }


</style>



<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('posts.index') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Loomio</h1>
            <span>.</span>
        </a>


    </div>
</header>




<style>
    .post-form-wrapper {
        max-width: 600px;
        width: 100%;
        margin: 30px auto;
        padding: 40px 20px;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }

    .post-form-wrapper h3 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 24px;
    }

    .form-label {
        margin-top: 15px;
        font-size: 16px;
    }

    .form-control {
        font-size: 16px;
        padding: 12px;
        width: 100%;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .btn-red {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        width: 100%;
        padding: 12px;
        font-weight: bold;
        font-size: 16px;
    }

    .btn-red:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* Мобільна адаптація */
    @media (max-width: 768px) {
        .post-form-wrapper {
            padding: 25px 15px;
            margin: 20px auto;
        }

        .post-form-wrapper h3 {
            font-size: 20px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;
            padding: 10px;
        }

        .btn-red {
            font-size: 14px;
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .post-form-wrapper {
            padding: 20px 10px;
            margin: 15px auto;
        }

        .post-form-wrapper h3 {
            font-size: 18px;
        }

        .form-control {
            font-size: 14px;
        }
    }
</style>




    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
<div class="post-form-wrapper">
<div class="container-fluid">



    <h3 class="p1">Редагувати Блог</h3>

<div class="row">
    <div class="col-md-12">
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="p1"></div>
    <label for="title" class="form-label">Заголовок</label><br>
    <input type="text" id="title" name="title" class="form-control" placeholder="Впиши заголовок"  value="{{ $post->title }}" required>
    <div class="p1"></div>
    <label for="content" class="form-label">Текст</label><br>
    <textarea name="content" class="form-control" id="content" rows="3" required>{{ $post->content }}</textarea><br><br>
    <div class="p3"></div>
    <button type="submit" class="btn btn-red">Створити пост</button>
</form>
</div>
</div>
</div>

</div>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
