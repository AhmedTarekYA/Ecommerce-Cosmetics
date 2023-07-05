<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Admin.Auth.css')
</head>

<div class="container">
    <main class="signup-container">
        <h1 class="heading-primary">تسجيل الدخول <span class="span-blue">.</span></h1>
        <p class="text-mute">يرجي ادخال بيانات التحقق</p>

        <form class="signup-form" action="{{route('admin.doLogin')}}" method="post" id="LoginForm">
            @csrf
            <label class="inp">
                <input type="email" name="email" class="input-text" placeholder="&nbsp;">
                <span class="label">البريد الالكتروني</span>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
            </label>
            <label class="inp">
                <input type="password" name="password" class="input-text" placeholder="&nbsp;" id="password">
                <span class="label">كلمة المرور</span>
                <span class="input-icon input-icon-password" data-password><i class="fa-solid fa-eye"></i></span>
            </label>
            <button class="btn btn-login" id="loginButton" style="margin-left: 4px;">تسجيل الدخول <i class="bx bx-lock"></i></button>

        </form>
    </main>

    <div class="welcome-container">
        <h3 class="heading-secondary">قم بتسجيل الدخول الان لتتحكم في الموقع 👋</span></h3>
        <img src="{{asset('uploads/log.gif')}}" alt="login">
    </div>
</div>

@include('Admin.Auth.js')
</html>
