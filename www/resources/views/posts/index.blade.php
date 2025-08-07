<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">



    <title>Блог</title>





<style>
    .p1 {
        margin-top: 80px;

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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

    /* Pulsating Play Button
    ------------------------------*/
    .pulsating-play-btn {
        width: 94px;
        height: 94px;
        background: radial-gradient(var(--accent-color) 50%, color-mix(in srgb, var(--accent-color), transparent 75%) 52%);
        border-radius: 50%;
        display: block;
        position: relative;
        overflow: hidden;
    }

    .pulsating-play-btn:before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        animation-delay: 0s;
        animation: pulsate-play-btn 2s;
        animation-direction: forwards;
        animation-iteration-count: infinite;
        animation-timing-function: steps;
        opacity: 1;
        border-radius: 50%;
        border: 5px solid color-mix(in srgb, var(--accent-color), transparent 30%);
        top: -15%;
        left: -15%;
        background: rgba(198, 16, 0, 0);
    }

    .pulsating-play-btn:after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 100;
        transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    .pulsating-play-btn:hover:before {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border: none;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 200;
        animation: none;
        border-radius: 0;
    }

    .pulsating-play-btn:hover:after {
        border-left: 15px solid var(--accent-color);
        transform: scale(20);
    }

    @keyframes pulsate-play-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }

    /* PHP Email Form Messages
    ------------------------------*/
    .php-email-form .error-message {
        display: none;
        background: #df1529;
        color: #ffffff;
        text-align: left;
        padding: 15px;
        margin-bottom: 24px;
        font-weight: 600;
    }

    .php-email-form .sent-message {
        display: none;
        color: #ffffff;
        background: #059652;
        text-align: center;
        padding: 15px;
        margin-bottom: 24px;
        font-weight: 600;
    }

    .php-email-form .loading {
        display: none;
        background: var(--surface-color);
        text-align: center;
        padding: 15px;
        margin-bottom: 24px;
    }

    .php-email-form .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid var(--accent-color);
        border-top-color: var(--surface-color);
        animation: php-email-form-loading 1s linear infinite;
    }

    @keyframes php-email-form-loading {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
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

    /*--------------------------------------------------------------
    # Global Footer
    --------------------------------------------------------------*/
    .footer {
        --heading-font: var(--default-font);
        color: var(--default-color);
        background-color: var(--background-color);
        font-size: 14px;
        padding: 40px 0;
        position: relative;
    }

    .footer .icon {
        color: var(--accent-color);
        margin-right: 15px;
        font-size: 24px;
        line-height: 0;
    }

    .footer h4 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .footer .address p {
        margin-bottom: 0px;
    }

    .footer .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid color-mix(in srgb, var(--default-color), transparent 50%);
        font-size: 16px;
        color: color-mix(in srgb, var(--default-color), transparent 50%);
        margin-right: 10px;
        transition: 0.3s;
    }

    .footer .social-links a:hover {
        color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .footer .copyright {
        padding-top: 20px;
        border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    }

    .footer .copyright p {
        margin-bottom: 0;
    }

    .footer .credits {
        margin-top: 5px;
        font-size: 13px;
    }

    /*--------------------------------------------------------------
    # Preloader
    --------------------------------------------------------------*/
    #preloader {
        position: fixed;
        inset: 0;
        z-index: 9999;
        overflow: hidden;
        background-color: var(--background-color);
        transition: all 0.6s ease-out;
        width: 100%;
        height: 100vh;
    }

    #preloader:before,
    #preloader:after {
        content: "";
        position: absolute;
        border: 4px solid var(--accent-color);
        border-radius: 50%;
        animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }

    #preloader:after {
        animation-delay: -0.5s;
    }

    @keyframes animate-preloader {
        0% {
            width: 10px;
            height: 10px;
            top: calc(50% - 5px);
            left: calc(50% - 5px);
            opacity: 1;
        }

        100% {
            width: 72px;
            height: 72px;
            top: calc(50% - 36px);
            left: calc(50% - 36px);
            opacity: 0;
        }
    }

    /*--------------------------------------------------------------
    # Scroll Top Button
    --------------------------------------------------------------*/
    .scroll-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: -15px;
        z-index: 99999;
        background-color: var(--accent-color);
        width: 44px;
        height: 44px;
        border-radius: 50px;
        transition: all 0.4s;
    }

    .scroll-top i {
        font-size: 24px;
        color: var(--contrast-color);
        line-height: 0;
    }

    .scroll-top:hover {
        background-color: color-mix(in srgb, var(--accent-color), transparent 20%);
        color: var(--contrast-color);
    }

    .scroll-top.active {
        visibility: visible;
        opacity: 1;
        bottom: 15px;
    }

    /*--------------------------------------------------------------
    # Disable aos animation delay on mobile devices
    --------------------------------------------------------------*/
    @media screen and (max-width: 768px) {
        [data-aos-delay] {
            transition-delay: 0 !important;
        }
    }

    /*--------------------------------------------------------------
    # Global Page Titles & Breadcrumbs
    --------------------------------------------------------------*/
    .page-title {
        --background-color: color-mix(in srgb, var(--default-color), transparent 96%);
        color: var(--default-color);
        background-color: var(--background-color);
        padding: 120px 0;
        text-align: center;
        position: relative;
    }

    .page-title h1 {
        font-size: 42px;
        font-weight: 400;
        margin-bottom: 10px;
        font-family: var(--default-font);
    }

    .page-title .breadcrumbs ol {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        justify-content: center;
        padding: 0;
        margin: 0;
        font-size: 16px;
        font-weight: 400;
    }

    .page-title .breadcrumbs ol li+li {
        padding-left: 10px;
    }

    .page-title .breadcrumbs ol li+li::before {
        content: "/";
        display: inline-block;
        padding-right: 10px;
        color: color-mix(in srgb, var(--default-color), transparent 70%);
    }

    /*--------------------------------------------------------------
    # Global Sections
    --------------------------------------------------------------*/
    section,
    .section {
        color: var(--default-color);
        background-color: var(--background-color);
        padding: 60px 0;
        scroll-margin-top: 92px;
        overflow: clip;
    }

    @media (max-width: 1199px) {

        section,
        .section {
            scroll-margin-top: 56px;
        }
    }

    /*--------------------------------------------------------------
    # Global Section Titles
    --------------------------------------------------------------*/
    .section-title {
        text-align: center;
        padding-bottom: 60px;
        position: relative;
    }

    .section-title h2 {
        font-size: 13px;
        letter-spacing: 1px;
        font-weight: 400;
        padding: 0;
        margin: 0;
        color: color-mix(in srgb, var(--default-color), transparent 50%);
        display: inline-block;
        text-transform: uppercase;
        font-family: var(--default-font);
    }

    .section-title p {
        color: var(--heading-color);
        margin: 10px 0 0 0;
        font-size: 48px;
        font-weight: 500;
        font-family: var(--heading-font);
    }

    .section-title p .description-title {
        color: var(--accent-color);
    }

    /*--------------------------------------------------------------
    # Hero Section
    --------------------------------------------------------------*/
    .hero {
        width: 100%;
        min-height: 60vh;
        position: relative;
        padding: 60px 0;
        display: flex;
        align-items: center;
    }

    .hero h1 {
        margin: 0;
        font-size: 64px;
        font-weight: 700;
    }

    .hero p {
        color: color-mix(in srgb, var(--default-color), transparent 30%);
        margin: 5px 0 30px 0;
        font-size: 20px;
        font-weight: 400;
    }

    .hero .btn-get-started {
        color: var(--contrast-color);
        background: var(--accent-color);
        font-weight: 400;
        font-size: 15px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 10px 28px 12px 28px;
        border-radius: 50px;
        transition: 0.5s;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.1);
    }

    .hero .btn-get-started:hover {
        color: var(--contrast-color);
        background: color-mix(in srgb, var(--accent-color), transparent 15%);
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.1);
    }

    .hero .btn-watch-video {
        font-size: 16px;
        transition: 0.5s;
        margin-left: 25px;
        color: var(--default-color);
        font-weight: 500;
    }

    .hero .btn-watch-video i {
        color: var(--accent-color);
        font-size: 32px;
        transition: 0.3s;
        line-height: 0;
        margin-right: 8px;
    }

    .hero .btn-watch-video:hover {
        color: var(--accent-color);
    }

    .hero .btn-watch-video:hover i {
        color: color-mix(in srgb, var(--accent-color), transparent 15%);
    }

    .hero .animated {
        animation: up-down 2s ease-in-out infinite alternate-reverse both;
    }

    @media (max-width: 640px) {
        .hero h1 {
            font-size: 28px;
            line-height: 36px;
        }

        .hero p {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 30px;
        }

        .hero .btn-get-started,
        .hero .btn-watch-video {
            font-size: 13px;
        }
    }

    @keyframes up-down {
        0% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(-10px);
        }
    }

    /*--------------------------------------------------------------
    # About Section
    --------------------------------------------------------------*/
    .about h3 {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 20px;
    }

    .about .book-a-table {
        text-align: center;
        border: 4px solid color-mix(in srgb, var(--default-color), transparent 30%);
        padding: 22px;
    }

    .about .book-a-table h3 {
        font-family: var(--default-font);
        margin: 0 0 0 0;
        font-size: 24px;
    }

    .about .book-a-table p {
        color: var(--accent-color);
        font-weight: 500;
        font-size: 28px;
        margin: 0;
    }

    .about .fst-italic {
        color: color-mix(in srgb, var(--default-color), var(--contrast-color) 50%);
    }

    .about .content ul {
        list-style: none;
        padding: 0;
    }

    .about .content ul li {
        padding: 0 0 10px 30px;
        position: relative;
    }

    .about .content ul i {
        position: absolute;
        font-size: 20px;
        left: 0;
        top: -3px;
        color: var(--accent-color);
    }

    .about .content p:last-child {
        margin-bottom: 0;
    }

    .about .pulsating-play-btn {
        position: absolute;
        left: calc(50% - 47px);
        top: calc(50% - 47px);
    }

    /*--------------------------------------------------------------
    # Why Us Section
    --------------------------------------------------------------*/
    .why-us .why-box {
        color: var(--contrast-color);
        background: var(--accent-color);
        padding: 30px;
    }

    .why-us .why-box h3 {
        color: var(--contrast-color);
        font-family: var(--default-font);
        font-weight: 700;
        font-size: 34px;
        margin-bottom: 30px;
    }

    .why-us .why-box p {
        margin-bottom: 30px;
    }

    .why-us .why-box .more-btn {
        display: inline-block;
        background: color-mix(in srgb, var(--contrast-color), transparent 85%);
        padding: 8px 40px 10px 40px;
        color: var(--contrast-color);
        transition: all ease-in-out 0.4s;
        border-radius: 50px;
    }

    .why-us .why-box .more-btn i {
        font-size: 14px;
    }

    .why-us .why-box .more-btn:hover {
        color: var(--accent-color);
        background: var(--surface-color);
    }

    .why-us .icon-box {
        background-color: var(--surface-color);
        text-align: center;
        padding: 40px 30px;
        width: 100%;
        height: 100%;
        border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    }

    .why-us .icon-box i {
        color: var(--accent-color);
        font-size: 32px;
        margin-bottom: 30px;
        background: color-mix(in srgb, var(--accent-color), transparent 95%);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 72px;
        height: 72px;
        transition: 0.3s;
    }

    .why-us .icon-box h4 {
        font-size: 20px;
        font-weight: 500;
        margin: 0 0 30px 0;
        font-family: var(--default-font);
    }

    .why-us .icon-box p {
        font-size: 15px;
        color: color-mix(in srgb, var(--default-color), transparent 30%);
    }

    .why-us .icon-box:hover i {
        color: var(--contrast-color);
        background: var(--accent-color);
    }

    /*--------------------------------------------------------------
    # Stats Section
    --------------------------------------------------------------*/
    .stats {
        position: relative;
        padding: 120px 0;
    }

    .stats img {
        position: absolute;
        inset: 0;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .stats:before {
        content: "";
        background: color-mix(in srgb, var(--background-color), transparent 40%);
        position: absolute;
        inset: 0;
        z-index: 2;
    }

    .stats .container {
        position: relative;
        z-index: 3;
    }

    .stats .stats-item {
        padding: 30px;
        width: 100%;
    }

    .stats .stats-item span {
        font-size: 48px;
        display: block;
        color: var(--default-color);
        font-weight: 700;
    }

    .stats .stats-item p {
        padding: 0;
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: color-mix(in srgb, var(--default-color), transparent 40%);
    }

    /*--------------------------------------------------------------
    # Menu Section
    --------------------------------------------------------------*/
    .menu .nav-tabs {
        border: 0;
    }

    .menu .nav-link {
        background-color: var(--background-color);
        color: color-mix(in srgb, var(--default-color), transparent 20%);
        margin: 0 15px;
        padding: 10px 5px;
        transition: 0.3s;
        border-radius: 0;
        cursor: pointer;
        height: 100%;
        border: 0;
        border-bottom: 2px solid color-mix(in srgb, var(--default-color), transparent 80%);
    }

    @media (max-width: 575px) {
        .menu .nav-link {
            margin: 0 10px;
            padding: 10px 0;
        }
    }

    .menu .nav-link i {
        padding-right: 15px;
        font-size: 48px;
    }

    .menu .nav-link h4 {
        font-size: 18px;
        font-weight: 400;
        margin: 0;
        font-family: var(--default-font);
    }

    @media (max-width: 575px) {
        .menu .nav-link h4 {
            font-size: 16px;
        }
    }

    .menu .nav-link:hover {
        color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .menu .nav-link.active {
        background-color: var(--background-color);
        color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .menu .tab-content .tab-header {
        padding: 30px 0;
    }

    .menu .tab-content .tab-header p {
        font-size: 14px;
        text-transform: uppercase;
        color: color-mix(in srgb, var(--default-color), transparent 20%);
        margin-bottom: 0;
    }

    .menu .tab-content .tab-header h3 {
        font-size: 48px;
        font-weight: 700;
        color: var(--accent-color);
    }

    .menu .tab-content .menu-item {
        text-align-last: center;
    }

    .menu .tab-content .menu-item .menu-img {
        padding: 0 60px;
        margin-bottom: 15px;
    }

    .menu .tab-content .menu-item h4 {
        font-size: 24px;
        font-weight: 400;
        margin-bottom: 5px;
        font-family: var(--default-font);
    }

    .menu .tab-content .menu-item .ingredients {
        font-family: var(--nav-font);
        color: color-mix(in srgb, var(--default-color), transparent 50%);
        margin-bottom: 5px;
    }

    .menu .tab-content .menu-item .price {
        font-size: 24px;
        font-weight: 700;
        color: var(--accent-color);
    }

    /*--------------------------------------------------------------
    # Testimonials Section
    --------------------------------------------------------------*/
    .testimonials .testimonials-carousel,
    .testimonials .testimonials-slider {
        overflow: hidden;
    }

    .testimonials .testimonial-item .testimonial-content {
        border-left: 3px solid var(--accent-color);
        padding-left: 30px;
    }

    .testimonials .testimonial-item .testimonial-img {
        border-radius: 50%;
        border: 4px solid var(--background-color);
        margin: 0 auto;
    }

    .testimonials .testimonial-item h3 {
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0 5px 0;
    }

    .testimonials .testimonial-item h4 {
        font-size: 14px;
        color: color-mix(in srgb, var(--default-color), transparent 40%);
        margin: 0 0 10px 0;
    }

    .testimonials .testimonial-item .stars i {
        color: #ffc107;
        margin: 0 1px;
    }

    .testimonials .testimonial-item .quote-icon-left,
    .testimonials .testimonial-item .quote-icon-right {
        color: color-mix(in srgb, var(--accent-color), transparent 50%);
        font-size: 26px;
        line-height: 0;
    }

    .testimonials .testimonial-item .quote-icon-left {
        display: inline-block;
        left: -5px;
        position: relative;
    }

    .testimonials .testimonial-item .quote-icon-right {
        display: inline-block;
        right: -5px;
        position: relative;
        top: 10px;
        transform: scale(-1, -1);
    }

    .testimonials .testimonial-item p {
        font-style: italic;
    }

    .testimonials .swiper-wrapper {
        height: auto;
    }

    .testimonials .swiper-pagination {
        margin-top: 30px;
        position: relative;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: color-mix(in srgb, var(--default-color), transparent 85%);
        opacity: 1;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet-active {
        background-color: var(--accent-color);
    }

    /*--------------------------------------------------------------
    # Events Section
    --------------------------------------------------------------*/
    .events .container-fluid {
        padding: 0;
    }

    .events .event-item {
        background-size: cover;
        background-position: cente;
        min-height: 600px;
        padding: 30px;
    }

    @media (max-width: 575px) {
        .events .event-item {
            min-height: 500px;
        }
    }

    .events .event-item:before {
        content: "";
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        inset: 0;
    }

    .events .event-item h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
        color: #ffffff;
        position: relative;
    }

    .events .event-item .price {
        color: #ffffff;
        border-bottom: 2px solid var(--accent-color);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
    }

    .events .event-item .description {
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.8);
        position: relative;
    }

    .events .swiper-wrapper {
        height: auto;
    }

    .events .swiper-pagination {
        margin-top: 20px;
        position: relative;
    }

    .events .swiper-pagination .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: color-mix(in srgb, var(--default-color), transparent 85%);
        opacity: 1;
    }

    .events .swiper-pagination .swiper-pagination-bullet-active {
        background-color: var(--accent-color);
    }

    /*--------------------------------------------------------------
    # Chefs Section
    --------------------------------------------------------------*/
    .chefs .team-member {
        background-color: var(--surface-color);
        box-shadow: 0px 0 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        border-radius: 5px;
        transition: 0.3s;
    }

    .chefs .team-member .member-img {
        position: relative;
        overflow: hidden;
    }

    .chefs .team-member .member-img:after {
        position: absolute;
        content: "";
        left: -1px;
        right: -1px;
        bottom: -1px;
        height: 100%;
        background-color: var(--surface-color);
        -webkit-mask: url("../img/team-shape.svg") no-repeat center bottom;
        mask: url("../img/team-shape.svg") no-repeat center bottom;
        -webkit-mask-size: contain;
        mask-size: contain;
        z-index: 1;
    }

    .chefs .team-member .social {
        position: absolute;
        right: -100%;
        top: 30px;
        opacity: 0;
        border-radius: 4px;
        transition: 0.5s;
        background: color-mix(in srgb, var(--background-color), transparent 60%);
        z-index: 2;
    }

    .chefs .team-member .social a {
        transition: color 0.3s;
        color: color-mix(in srgb, var(--default-color), transparent 50%);
        margin: 15px 12px;
        display: block;
        line-height: 0;
        text-align: center;
    }

    .chefs .team-member .social a:hover {
        color: var(--default-color);
    }

    .chefs .team-member .social i {
        font-size: 18px;
    }

    .chefs .team-member .member-info {
        padding: 10px 15px 20px 15px;
    }

    .chefs .team-member .member-info h4 {
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 20px;
        font-family: var(--default-font);
    }

    .chefs .team-member .member-info span {
        display: block;
        font-size: 14px;
        font-weight: 400;
        color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .chefs .team-member .member-info p {
        font-style: italic;
        font-size: 14px;
        padding-top: 15px;
        line-height: 26px;
        color: color-mix(in srgb, var(--default-color), transparent 30%);
    }

    .chefs .team-member:hover {
        transform: scale(1.08);
        box-shadow: 0px 0 30px rgba(0, 0, 0, 0.1);
    }

    .chefs .team-member:hover .social {
        right: 8px;
        opacity: 1;
    }

    /*--------------------------------------------------------------
    # Book A Table Section
    --------------------------------------------------------------*/
    .book-a-table .reservation-img {
        min-height: 500px;
        background-size: cover;
        background-position: center;
    }

    .book-a-table .reservation-form-bg {
        background: color-mix(in srgb, var(--default-color), transparent 97%);
    }

    .book-a-table .php-email-form {
        padding: 30px;
    }

    @media (max-width: 575px) {
        .book-a-table .php-email-form {
            padding: 20px;
        }
    }

    .book-a-table .php-email-form input[type=text],
    .book-a-table .php-email-form input[type=email],
    .book-a-table .php-email-form input[type=number],
    .book-a-table .php-email-form input[type=date],
    .book-a-table .php-email-form input[type=time],
    .book-a-table .php-email-form textarea {
        font-size: 14px;
        padding: 10px 15px;
        box-shadow: none;
        border-radius: 0;
        color: var(--default-color);
        background-color: color-mix(in srgb, var(--background-color), transparent 20%);
        border-color: color-mix(in srgb, var(--default-color), transparent 80%);
    }

    .book-a-table .php-email-form input[type=text]:focus,
    .book-a-table .php-email-form input[type=email]:focus,
    .book-a-table .php-email-form input[type=number]:focus,
    .book-a-table .php-email-form input[type=date]:focus,
    .book-a-table .php-email-form input[type=time]:focus,
    .book-a-table .php-email-form textarea:focus {
        border-color: var(--accent-color);
    }

    .book-a-table .php-email-form input[type=text]::placeholder,
    .book-a-table .php-email-form input[type=email]::placeholder,
    .book-a-table .php-email-form input[type=number]::placeholder,
    .book-a-table .php-email-form input[type=date]::placeholder,
    .book-a-table .php-email-form input[type=time]::placeholder,
    .book-a-table .php-email-form textarea::placeholder {
        color: color-mix(in srgb, var(--default-color), transparent 70%);
    }

    .book-a-table .php-email-form button[type=submit] {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;
        padding: 14px 60px;
        transition: 0.4s;
        border-radius: 4px;
    }

    .book-a-table .php-email-form button[type=submit]:hover {
        background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    /*--------------------------------------------------------------
    # Gallery Section
    --------------------------------------------------------------*/
    .gallery {
        overflow: hidden;
    }

    .gallery .swiper-wrapper {
        height: auto;
    }

    .gallery .swiper-pagination {
        margin-top: 20px;
        position: relative;
    }

    .gallery .swiper-pagination .swiper-pagination-bullet {
        background-color: color-mix(in srgb, var(--default-color), transparent 85%);
        border: 0;
        width: 12px;
        height: 12px;
        opacity: 1;
    }

    .gallery .swiper-pagination .swiper-pagination-bullet-active {
        background-color: var(--accent-color);
        opacity: 1;
    }

    .gallery .swiper-slide-active {
        text-align: center;
    }

    @media (min-width: 992px) {
        .gallery .swiper-wrapper {
            padding: 40px 0;
        }

        .gallery .swiper-slide-active {
            background: var(--background-color);
            border: 6px solid var(--accent-color);
            padding: 4px;
            z-index: 1;
            transform: scale(1.2);
            transition: none;
        }
    }

    /*--------------------------------------------------------------
    # Contact Section
    --------------------------------------------------------------*/
    .contact .info-item {
        background-color: var(--surface-color);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        padding: 20px 30px;
    }

    .contact .info-item .icon {
        color: var(--contrast-color);
        background-color: var(--accent-color);
        width: 56px;
        height: 56px;
        font-size: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease-in-out;
        border-radius: 50%;
        margin-right: 15px;
    }

    .contact .info-item h3 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 5px 0;
        font-family: var(--default-font);
        color: color-mix(in srgb, var(--default-color), transparent 30%);
    }

    .contact .info-item p {
        padding: 0;
        margin-bottom: 0;
        font-size: 14px;
    }

    .contact .info-item .social-links a {
        font-size: 24px;
        display: inline-block;
        line-height: 1;
        margin: 4px 6px 0 0;
        transition: 0.3s;
        color: color-mix(in srgb, var(--default-color), transparent 50%);
    }

    .contact .info-item .social-links a:hover {
        color: var(--accent-color);
    }

    .contact .php-email-form {
        background-color: var(--surface-color);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
    }

    @media (max-width: 575px) {
        .contact .php-email-form {
            padding: 20px;
        }
    }

    .contact .php-email-form input[type=text],
    .contact .php-email-form input[type=email],
    .contact .php-email-form textarea {
        color: var(--default-color);
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        border-color: color-mix(in srgb, var(--default-color), transparent 80%);
        font-size: 14px;
        padding: 10px 15px;
        box-shadow: none;
        border-radius: 0;
    }

    .contact .php-email-form input[type=text]:focus,
    .contact .php-email-form input[type=email]:focus,
    .contact .php-email-form textarea:focus {
        border-color: var(--accent-color);
    }

    .contact .php-email-form input[type=text]::placeholder,
    .contact .php-email-form input[type=email]::placeholder,
    .contact .php-email-form textarea::placeholder {
        color: color-mix(in srgb, var(--default-color), transparent 70%);
    }

    .contact .php-email-form button[type=submit] {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;
        padding: 10px 30px;
        transition: 0.4s;
        border-radius: 50px;
    }

    .contact .php-email-form button[type=submit]:hover {
        background: color-mix(in srgb, var(--accent-color), transparent 20%);
    }

    /*--------------------------------------------------------------
    # Starter Section Section
    --------------------------------------------------------------*/
    .starter-section {
        /* Add your styles here */
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

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#chefs">Chefs</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li class="dropdown"><span>  {{ Auth::user()->name }} </span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    <ul>
                        <li><a href="#">Profile</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="index.html#book-a-table">Create post</a>

    </div>
</header>








<!-- Панель навігації  -->
{{--<nav class="navbar navbar-expand-lg navbar-dark fixed-top">--}}
{{--    <div class="container">--}}
{{--        <!-- Логотип -->--}}
{{--        <a class="navbar-brand" href="{{ route('posts.index') }}">Loоmio</a>--}}

{{--        <!-- Пошук (Мобільна версія) -->--}}
{{--        <div class="mobile-search-container d-flex d-lg-none">--}}
{{--            <button id="mobileSearchButton" class="btn btn-outline-light me-2">🔍</button>--}}
{{--            <form id="mobileSearchForm" method="GET" action="{{ route('posts.search') }}" class="d-flex">--}}
{{--                <input id="mobileSearchInput" name="query" type="text" class="mobile-search-input" placeholder="Пошук..." aria-label="Search">--}}
{{--            </form>--}}
{{--        </div>--}}

{{--        <!-- Випадаюча кнопка -->--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <!-- Вміст навігації -->--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <!-- Пошук (Десктопна версія) -->--}}
{{--            <div class="search-container d-none d-lg-flex me-auto">--}}
{{--                <form method="GET" action="{{ route('posts.search') }}" class="d-flex" role="search">--}}
{{--                    <input name="query" value="{{ $query ?? '' }}" type="text" class="search-input" placeholder="Пошук...">--}}
{{--                    <button class="search-button">--}}
{{--                        Пошук--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--&ensp;--}}
{{--            <!-- Панель акаунта -->--}}
{{--            <div class="account-dropdown ms-auto">--}}
{{--                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    {{ Auth::user()->name }}--}}
{{--                </button>--}}
{{--                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                    <li><a class="dropdown-item" href="{{ route('posts.create') }}"><b style="color: #4c4cff"> • Створити пост •</b></a></li>--}}
{{--                    <li><hr class="dropdown-divider" style="background-color: white"></li>--}}
{{--                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><b> • Панель •</b></a></li>--}}
{{--                </ul>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}




{{--<!-- Скріпт для кнпки пошуку -->--}}
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        const searchButton = document.getElementById("mobileSearchButton");--}}
{{--        const searchInput = document.getElementById("mobileSearchInput");--}}
{{--        const searchForm = document.getElementById("mobileSearchForm");--}}

{{--        searchButton.addEventListener("click", function () {--}}
{{--            if (searchInput.classList.contains("open")) {--}}
{{--                if (searchInput.value.trim() !== "") {--}}
{{--                    searchForm.submit(); // Виконання пошуку, якщо є текст--}}
{{--                } else {--}}
{{--                    searchInput.classList.remove("open");--}}
{{--                    searchButton.classList.remove("shrink"); // Відновлення розміру кнопки--}}
{{--                }--}}
{{--            } else {--}}
{{--                searchInput.classList.add("open");--}}
{{--                searchButton.classList.add("shrink"); // Зменшення розміру кнопки--}}
{{--                searchInput.focus();--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}





{{--<!-- Кнопка для вертання на початок сторінки -->--}}
{{--<button class="back-to-top hidden" id="backToTopBtn">--}}
{{--    <div class="progress-ring"></div>--}}
{{--    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">--}}
{{--        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>--}}
{{--    </svg>--}}
{{--</button>--}}






{{--<!-- Скріпт Кнопки для вертання на початок сторінки -->--}}

{{--<script>--}}
{{--    // Отримуємо кнопку--}}
{{--    const backToTopBtn = document.getElementById('backToTopBtn');--}}
{{--    const progressRing = document.querySelector('.progress-ring');--}}

{{--    // Функція для оновлення прогресу--}}
{{--    function updateProgress() {--}}
{{--        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;--}}
{{--        const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;--}}
{{--        const scrollPercentage = (scrollTop / docHeight) * 100;--}}
{{--        const degree = (scrollPercentage * 3.6); // 360 градусів / 100 = 3.6--}}
{{--        progressRing.style.background = `conic-gradient(#555 ${degree}deg, #333 ${degree}deg 100%)`;--}}
{{--    }--}}

{{--    // Показати кнопку, коли прокрутили вниз--}}
{{--    window.onscroll = function () {--}}
{{--        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {--}}
{{--            backToTopBtn.classList.remove('hidden');--}}
{{--        } else {--}}
{{--            backToTopBtn.classList.add('hidden');--}}
{{--        }--}}

{{--        // Оновлення прогресу--}}
{{--        updateProgress();--}}
{{--    };--}}

{{--    // Прокрутка до верху при натисканні на кнопку--}}
{{--    backToTopBtn.addEventListener('click', function () {--}}
{{--        window.scrollTo({--}}
{{--            top: 0,--}}
{{--            behavior: 'smooth'--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}




<section id="hero" class="hero section light-background">

    <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h1>
                <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites with Bootstrap</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{ asset('images/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->


<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More</span> <span class="description-title">About Us</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <img src="assets/img/about.jpg" class="img-fluid mb-4" alt="">
                <div class="book-a-table">
                    <h3>Book a Table</h3>
                    <p>+1 5589 55488 55</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                    </p>

                    <div class="position-relative mt-4">
                        <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->



{{--<div class="container">--}}





{{--    <!-- Привітальна Частина -->--}}
{{--    <div class="welcome-section p-4 p-md-5 mb-4 rounded">--}}
{{--        <div class="col-lg-6 px-0">--}}
{{--            <h1 class="display-4 fst-italic"> Ласкаво просимо до Loomio – місця, де кожен зв’язок стає значущим!</h1>--}}
{{--            <p class="lead my-3">Дякуємо, що приєдналися до нашої спільноти! Тут ви знайдете платформу для:--}}
{{--                ✨ Зустрічей із людьми, які поділяють ваші інтереси.--}}
{{--                ✨ Обміну думками, ідеями та натхненням.--}}
{{--                ✨ Побудови справжніх відносин і спільнот.</p>--}}
{{--            <p class="lead mb-0"><a class="fw-bold">Loomio – місце, де розмови переплітаються в історії. Давайте створювати їх разом! 🚀</a></p>--}}
{{--        </div>--}}
{{--    </div>--}}






<div class="container">




    <style>
        .welcome-section {
            background-color: #333; /* Темний фон */
            color: #fff;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            margin-bottom: 40px;
            transition: all 0.5s ease;
        }


        /* Анімація bounce для "scroll down" */
        @keyframes bounce {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        /* Плавний перехід для прокручування */
        html {
            scroll-behavior: smooth;
        }

        .welcome-section .display-4 {
            color: #4c4cff;
            font-weight: bold;
        }

        .welcome-section p {
            color: #e0e0e0;
        }

        .welcome-section a {
            color: #6c6cff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .welcome-section a:hover {
            color: #4c4cff;
        }
    </style>









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





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
