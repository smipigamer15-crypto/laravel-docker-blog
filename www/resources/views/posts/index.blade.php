<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts (Google Fonts через CDN — без змін) -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">



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

        .navmenu .dropdown > span {
            padding-left: 20px; /* або margin-left: 10px; */
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


    .php11 {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        margin-bottom: 50px;
    }
    .php12 {
        font-family: 'Arial', sans-serif !important;
    }
    .post1 {

        margin-top: 50px;
    }
    .post1q {
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
        margin-bottom: 10px;
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

    .textarea-red-border:focus {
        border-color: red !important;
        box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25); /* опціонально для "glow" */
    }




    @media (max-width: 575px) {
        .contact .php-email-form {
            padding: 20px;
        }
    }

    .post .php-email-form input[type=text],
    .post .php-email-form input[type=email],
    .post .php-email-form textarea {
        color: var(--default-color);
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        border-color: color-mix(in srgb, var(--default-color), transparent 80%);
        font-size: 14px;
        padding: 10px 15px;
        box-shadow: none;
        border-radius: 0;
    }

    .post .php-email-form input[type=text]:focus,
    .post .php-email-form input[type=email]:focus,
    .post .php-email-form textarea:focus {
        border-color: var(--accent-color);
    }

    .post .php-email-form input[type=text]::placeholder,
    .post .php-email-form input[type=email]::placeholder,
    .post .php-email-form textarea::placeholder {
        color: color-mix(in srgb, var(--default-color), transparent 70%);
    }

    .post .php-email-form button[type=submit] {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;

        transition: 0.4s;
        border-radius: 50px;
    }

    .post .php-email-form button[type=submit]:hover {
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
                <li><a href="#hero">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#post">Story</a></li>
                <li class="dropdown"><span>  {{ Auth::user()->name }} </span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Profile</a></li>
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                        </li>
                    </ul>
                    {{-- Схована форма для POST logout --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('posts.create') }}">Add to story</a>

    </div>
</header>



<section id="hero" class="hero section light-background">

    <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Welcome to Loomio<br>The blog for everyone!</h1>
                <p data-aos="fade-up" data-aos-delay="100">Loomio was created by Maksym Vlasiuk</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('posts.create') }}" class="btn-get-started">+ Add to story</a>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{ asset('images/blog.jpg') }}" class="img-fluid animated" alt="">
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
                <img  src="{{ asset('images/photo2.jpg') }}" class="img-fluid mb-4" alt="">
                <div class="book-a-table">
                    <h3>Support</h3>
                    <p>Support@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Welcome to Loomio — the hub of collective decision-making and open collaboration.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Loomio is dedicated to empowering groups and communities to make decisions together effectively, transparently, and fairly. We provide tools, insights, and stories that help teams of all sizes work better — whether you're a grassroots movement, a nonprofit, or a workplace.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Our mission is to foster a culture where every voice counts and collaboration drives impact. Through our blog, we share practical tips, inspiring case studies, and the latest developments in group facilitation, social innovation, and digital democracy.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Loomio believes that decisions made together lead to stronger, more resilient communities. We invite you to join our growing network, explore new ideas, and contribute to shaping a future where collective intelligence thrives.</span></li>
                    </ul>
                    <p>
                        By embracing open dialogue and shared responsibility, we can transform how people come together — making collaboration accessible and meaningful for all.
                    </p>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->





<style>

    .php12 {
        font-family: 'Arial', sans-serif !important;
    }



    body {
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        color: var(--contrast-color);
        font-family: Arial, sans-serif;
    }
    /* Стиль для контейнера поста */
    .post-container {
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        box-shadow: 0 10px 30px rgba(12, 12, 12, 0.3);
    }

    /* Стиль для заголовку поста */
    .post-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: black;
        margin-bottom: 15px;
    }

    /* Стиль для тексту поста */
    .post-content {
        font-size: 1rem;
        color: black;
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
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        color: black;
    }

    /* Стиль для кожного коментаря */
    .comment .comment-author {
        font-weight: bold;
        color: #ff5f57;
    }

    .comment .comment-content {
        color: black;
        font-size: 1rem;
    }

    .comment .comment-time {
        font-size: 0.8rem;
        color: black;
    }


    .comment-box {
        background-color: #f1f2f5;
        border-radius: 1rem;
        padding: 0.75rem 1rem;
    }

    .comment-textarea {
        border: none;
        background-color: transparent;
        resize: none;         /* Забороняє ручне розтягування */
        overflow: hidden;     /* Прибирає scroll */
        outline: none;
        width: 100%;
        min-height: 40px;     /* Базова висота */
        font-size: 16px;
    }

    .comment-icons svg {
        width: 20px;
        height: 20px;
        margin-right: 0.5rem;
        cursor: pointer;
        fill: #6c757d;
    }

    .comment-icons svg:hover {
        fill: #000;
    }

    .send-button {
        background: none;
        border: none;
        padding: 0;
    }

    .send-button svg {
        width: 20px;
        height: 20px;
        fill: #6c757d;
    }

    .send-button:hover svg {
        fill: #000;
    }

    .post-card {
        max-width: 550px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
    }


    /* Стиль для тексту кнопки коментарів */
    .comment-button {
        background-color: color-mix(in srgb, var(--surface-color), transparent 50%);
        color: black;
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

    .post-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
        padding: 4px;
    }

    .action-icon {
        background: none;
        border: none;
        padding: 4px;
        font-size: 14px;
        color: #6c757d; /* Схоже на той колір із коментарної панелі */
        cursor: pointer;
        transition: color 0.2s;
    }

    .action-icon:hover {
        color: #000;
    }



</style>

<section id="post" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Posts<br></h2>
        <p><span>Write and read</span> <span class="description-title"> other people's posts</span></p>
    </div><!-- End Section Title -->

<div class="container">
    <div class="post-card">
        <div class="row g-5">
            <div class="col-md-12">



        <!-- Початок постів -->
        @forelse ($posts as $post)
            <div class="post-container">
                <div class="position-relative">
                   <small style="color: gray; flex: 1;
    margin-right: 10px;"> <p class="position-absolute top-0 end-0 m-2">
                        {{ $post->created_at->diffForHumans() }}
                       </p> </small>
                    <!-- Тут може бути вміст посту -->
                </div>
                @if($post->image)
                    <img src="{{ asset('images/' . $post->image) }}" alt="Фото поста" style="max-width: 100%; height: auto;">
                @endif
                <h5 class="post-title php12">{{ $post->title }}</h5>
                <p class=" post-content php12">{{ $post->content }}</p>

                <!-- Кнопки для лайка і коментаря -->




                <h6><span class="likes-count">      <svg width="16" height="16" fill="currentColor" class="me-1" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
            2 5.42 4.42 3 7.5 3c1.74 0
            3.41.81 4.5 2.09C13.09 3.81
            14.76 3 16.5 3 19.58 3 22 5.42
            22 8.5c0 3.78-3.4 6.86-8.55
            11.54L12 21.35z"/>
                        </svg> {{ $post->likes->count() }}</span></h6>

                <div class="d-flex justify-content-around border-top pt-3 mb-2">
                    <button class="btn btn-light {{ $post->likes->contains('user_id', auth()->id()) ? 'active' : '' }}"
                            id="like-btn-{{ $post->id }}"
                            onclick="event.preventDefault(); toggleLike({{ $post->id }})">
                        <svg width="20" height="20" fill="currentColor" class="me-1" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
            2 5.42 4.42 3 7.5 3c1.74 0
            3.41.81 4.5 2.09C13.09 3.81
            14.76 3 16.5 3 19.58 3 22 5.42
            22 8.5c0 3.78-3.4 6.86-8.55
            11.54L12 21.35z"/>
                        </svg>
                        Like
                    </button>

                    <button class="btn btn-light" onclick="toggleComments({{ $post->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                            <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        </svg>
                       Comment
                    </button>



                    <button class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-90deg-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.854 4.854a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 4H3.5A2.5 2.5 0 0 0 1 6.5v8a.5.5 0 0 0 1 0v-8A1.5 1.5 0 0 1 3.5 5h9.793l-3.147 3.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                     Share
                    </button>

                </div>

                <!-- Схований блок коментарів -->
                <div id="comments-section-{{ $post->id }}" style="display: none;">
                    <!-- Коментарі та форма коментування -->
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="comment-box d-flex flex-column">
                            <textarea class="comment-textarea" name="comment" rows="1" placeholder="Write a comment..."></textarea>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="comment-icons d-flex align-items-center">
                                    <!-- Emoji face -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18c-4.41 0-8-3.59-8-8s3.59-8
                   8-8 8 3.59 8 8-3.59 8-8 8zm-4-7a1 1 0 100-2 1 1 0 000 2zm8
                   0a1 1 0 100-2 1 1 0 000 2zm-8.31 2.9a.996.996 0 00.9
                   1.6h6.82c.79 0 1.26-.88.9-1.6A5.993 5.993 0 0012
                   13a5.993 5.993 0 00-4.31 2.9z"/>
                                    </svg>

                                    <!-- Laughing face -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10
                   10 10 10-4.48 10-10S17.52 2 12 2zm0
                   18c-4.41 0-8-3.59-8-8s3.59-8
                   8-8 8 3.59 8 8-3.59 8-8
                   8zm4.5-6h-9c0 2 2.01 3.5 4.5
                   3.5S16.5 16 16.5 14zM9 9.5C9 10.33 8.33
                   11 7.5 11S6 10.33 6 9.5 6.67 8
                   7.5 8 9 8.67 9 9.5zm9 0c0
                   .83-.67 1.5-1.5 1.5S15 10.33 15
                   9.5 15.67 8 16.5 8 18 8.67 18 9.5z"/>
                                    </svg>

                                    <!-- GIF icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M2 4v16h20V4H2zm18 14H4V6h16v12zM9
                   13H7v-2h2V9H5v6h4v-2zm2-4h1.5v6H11V9zm6
                   0h-3v6h1.5v-2H17v-1.5h-1.5V10H17V9z"/>
                                    </svg>

                                    <!-- Sticky note -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M21 3H3c-1.1 0-2 .9-2
                   2v14c0 1.1.9 2 2 2h14l5-5V5c0-1.1-.9-2-2-2zm-6
                   16H4V5h16v10h-5v4z"/>
                                    </svg>
                                </div>
                                <button class="send-button" type="submit">
                                    <!-- Send (paper plane) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15
                   2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

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
                                            <button class="action-icon delete btn-sm">
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







                <div class="post-actions">
                    <button class="action-icon edit btn-sm" title="Edit">
                        <a href="{{ route('posts.edit', $post) }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                            </svg></a>
                    </button>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="action-icon delete btn-sm" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>


        @empty
            <p><b class="text-danger">There are no posts....</b></p>
        @endforelse
        <!-- Кінець постів -->




                <script>
                    function toggleComments(postId) {
                        const section = document.getElementById(`comments-section-${postId}`);
                        if (section.style.display === 'none') {
                            section.style.display = 'block';
                        } else {
                            section.style.display = 'none';
                        }
                    }
                </script>





        <script>
            const textarea = document.getElementById('autoTextarea');

            const autoResize = (el) => {
                el.style.height = 'auto';                  // скинути висоту
                el.style.height = el.scrollHeight + '10px';  // встановити нову
            };

            textarea.addEventListener('input', () => autoResize(textarea));
            window.addEventListener('load', () => autoResize(textarea));
        </script>

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
</div>
</section>



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





    <footer id="footer" class="footer dark-background">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Address</h4>
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p></p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Contact</h4>
                        <p>
                            <strong>Phone:</strong> <span>+9 9999 9999 99</span><br>
                            <strong>Email:</strong> <span>Support@gmail.com</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
                            <strong>Sunday</strong>: <span>Closed</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                            </svg></i></a>
                        <a href="#" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg></a>
                        <a href="#" class="instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg></a>
                        <a href="#" class="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                            </svg></a>
                    </div>
                </div>

            </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
        </div>
    </footer>


<script>
    /**
     * Template Name: Yummy
     * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
     * Updated: Aug 07 2024 with Bootstrap v5.3.3
     * Author: BootstrapMade.com
     * License: https://bootstrapmade.com/license/
     */

    (function() {
        "use strict";

        /**
         * Apply .scrolled class to the body as the page is scrolled down
         */
        function toggleScrolled() {
            const selectBody = document.querySelector('body');
            const selectHeader = document.querySelector('#header');
            if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
            window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
        }

        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);

        /**
         * Mobile nav toggle
         */
        const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

        function mobileNavToogle() {
            document.querySelector('body').classList.toggle('mobile-nav-active');
            mobileNavToggleBtn.classList.toggle('bi-list');
            mobileNavToggleBtn.classList.toggle('bi-x');
        }
        mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

        /**
         * Hide mobile nav on same-page/hash links
         */
        document.querySelectorAll('#navmenu a').forEach(navmenu => {
            navmenu.addEventListener('click', () => {
                if (document.querySelector('.mobile-nav-active')) {
                    mobileNavToogle();
                }
            });

        });

        /**
         * Toggle mobile nav dropdowns
         */
        document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
            navmenu.addEventListener('click', function(e) {
                e.preventDefault();
                this.parentNode.classList.toggle('active');
                const dropdownMenu = this.parentNode.querySelector('ul');
                if (dropdownMenu) {
                    dropdownMenu.classList.toggle('dropdown-active');
                }
                e.stopImmediatePropagation();
            });
        });

        /**
         * Preloader
         */
        const preloader = document.querySelector('#preloader');
        if (preloader) {
            window.addEventListener('load', () => {
                preloader.remove();
            });
        }

        /**
         * Scroll top button
         */
        let scrollTop = document.querySelector('.scroll-top');

        function toggleScrollTop() {
            if (scrollTop) {
                window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
            }
        }
        scrollTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        window.addEventListener('load', toggleScrollTop);
        document.addEventListener('scroll', toggleScrollTop);

        /**
         * Animation on scroll function and init
         */
        function aosInit() {
            AOS.init({
                duration: 600,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
        window.addEventListener('load', aosInit);

        /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });

        /**
         * Initiate Pure Counter
         */
        new PureCounter();

        /**
         * Init swiper sliders
         */
        function initSwiper() {
            document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
                let config = JSON.parse(
                    swiperElement.querySelector(".swiper-config").innerHTML.trim()
                );

                if (swiperElement.classList.contains("swiper-tab")) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
        }

        window.addEventListener("load", initSwiper);

        /**
         * Correct scrolling position upon page load for URLs containing hash links.
         */
        window.addEventListener('load', function(e) {
            if (window.location.hash) {
                if (document.querySelector(window.location.hash)) {
                    setTimeout(() => {
                        let section = document.querySelector(window.location.hash);
                        let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
                        window.scrollTo({
                            top: section.offsetTop - parseInt(scrollMarginTop),
                            behavior: 'smooth'
                        });
                    }, 100);
                }
            }
        });

        /**
         * Navmenu Scrollspy
         */
        let navmenulinks = document.querySelectorAll('.navmenu a');

        function navmenuScrollspy() {
            navmenulinks.forEach(navmenulink => {
                if (!navmenulink.hash) return;
                let section = document.querySelector(navmenulink.hash);
                if (!section) return;
                let position = window.scrollY + 200;
                if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                    document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
                    navmenulink.classList.add('active');
                } else {
                    navmenulink.classList.remove('active');
                }
            })
        }
        window.addEventListener('load', navmenuScrollspy);
        document.addEventListener('scroll', navmenuScrollspy);

    })();
</script>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
