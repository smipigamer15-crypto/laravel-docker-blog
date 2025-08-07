<x-app-layout>

    <div style="margin-top: 20px;"></div>
    <style>
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
    </style>
    <div class="container-fluid">
        <div class="login-form">
        <ul class="nav flex-column " id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">➤ Редагувати інформацію профілю</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">➤ Змінити пароль</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">➤ Видалити акаунт</button>
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
</x-app-layout>
