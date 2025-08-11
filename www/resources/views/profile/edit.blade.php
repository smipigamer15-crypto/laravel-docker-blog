<x-app-layout>

    <div style="margin-top: 20px;"></div>
    <style>
        .profile-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-content {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .left-column {
            flex: 2;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
        }

        .right-column {
            flex: 1;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
        }

        .post {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .profile-card {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 350px;
        }
        .profile-card h2 {
            font-size: 20px;
            color: #8B0000; /* темно-червоний */
            margin-bottom: 20px;
            text-align: center;
        }
        .profile-card label {
            display: block;
            font-size: 14px;
            color: #990000; /* яскраво-червоний */
            margin-bottom: 5px;
        }
        .profile-card input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cc3333;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .profile-card input:focus {
            outline: none;
            border-color: #cc0000;
            box-shadow: 0 0 3px rgba(204,0,0,0.5);
        }
        .profile-card button {
            width: 100%;
            background-color: #cc0000; /* яскраво-червоний */
            color: white;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .profile-card button:hover {
            background-color: #990000; /* темніший червоний */
        }
        .links {
            text-align: center;
            margin-top: 15px;
        }
        .links a {
            display: block;
            font-size: 14px;
            color: #cc0000;
            text-decoration: none;
            margin: 5px 0;
        }
        .links a:hover {
            text-decoration: underline;
        }

        /* Навігаційні таби */
        .nav-link.link-primary {
            color: #cc0000 !important;
            background-color: #fff !important;
            border: 1px solid #cc0000 !important;
        }
        .nav-link.link-primary:hover,
        .nav-link.link-primary:focus {
            background-color: #f8d7da !important;
            color: #8b0000 !important;
        }
        .nav-link.active {
            background-color: #cc0000 !important;
            color: white !important;
            border-color: #cc0000 !important;
            box-shadow: 0 0 5px rgba(204,0,0,0.5);
        }

    </style>

    <div class="profile-container post">
        <div class="profile-header">
            <!-- Тут залишаєш аватар, ім’я, кнопки і т.п. -->
        </div>

        <div class="profile-content">

            <div class="profile-card">
                <ul class="nav flex-column" id="myTab" role="tablist" style="max-width:300px;">
                    <li class="nav-item mb-2" role="presentation">
                        <a href="#home-tab-pane" class="nav-link link-primary fw-semibold px-3 py-2 rounded shadow-sm bg-white border active"
                           data-bs-toggle="tab" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            ➤ Редагувати інформацію профілю
                        </a>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <a href="#profile-tab-pane" class="nav-link link-primary fw-semibold px-3 py-2 rounded shadow-sm bg-white border"
                           data-bs-toggle="tab" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                            ➤ Змінити пароль
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#contact-tab-pane" class="nav-link link-primary fw-semibold px-3 py-2 rounded shadow-sm bg-white border"
                           data-bs-toggle="tab" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                            ➤ Видалити акаунт
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        <div class="p-4 sm:p-8 ">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                        <div class="p-4 sm:p-8 ">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                        <div class="p-4 sm:p-8">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
