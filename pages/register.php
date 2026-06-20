<?php
$errors = [];
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($name)) {
        $errors['name'] = 'Введите имя';
    } elseif (mb_strlen($name) < 2) {
        $errors['name'] = 'Не менее 2х символов';
    } elseif (mb_strlen($name) > 20) {
        $errors['name'] = 'Не более 20 символов';
    }

    if (empty($email)) {
        $errors['email'] = 'Введите почту';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Неверный формат почты';
    } elseif (mb_strlen($email) > 255) {
        $errors['email'] = 'Не более 255 символов';
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $check = $connect->query($sql)->fetch();
        if (!empty($check)) {
            $errors['email'] = 'Почта занята';
        }
    }

    if (empty($password)) {
        $errors['password'] = 'Введите пароль';
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = 'Не менее 6 символов';
    } elseif ($password != $password2) {
        $errors['password2'] = 'Пароли не совпадают';
    }

    if (empty($_POST['confirm'])) {
        $errors['confirm'] = 'Примите согласие на обработку персональных данных';
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$hash')";
        $connect->query($sql);

        echo '<script>location.href="?page=login"</script>';
    }
}
?>

<div class="page-with-header">

    <!-- начало блока "регистрация"-->
    <div class="auth-page">
        <div class="auth-layout">
            <div class="auth-art">
                <h2 class="auth-art__title">Начни приключение!</h2>
                <p class="auth-art__text">Создай аккаунт и отправляйся в<br>путешествие по миру профессий</p>
                <svg class="auth-art__illustration" viewBox="0 0 200 200" fill="none" aria-hidden="true">
                    <circle cx="100" cy="100" r="80" fill="rgba(255,255,255,0.15)"/>
                    <rect x="46" y="102" width="28" height="38" rx="6" fill="rgba(255,255,255,0.25)"/>
                    <circle cx="60" cy="86" r="12" fill="rgba(255,255,255,0.3)"/>
                    <rect x="86" y="92" width="28" height="48" rx="6" fill="rgba(255,255,255,0.35)"/>
                    <circle cx="100" cy="72" r="12" fill="rgba(255,255,255,0.4)"/>
                    <rect x="126" y="104" width="28" height="36" rx="6" fill="rgba(255,255,255,0.25)"/>
                    <circle cx="140" cy="88" r="12" fill="rgba(255,255,255,0.3)"/>
                </svg>
            </div>

            <div class="auth-form-side">
                <h1 class="auth-form__title">Регистрация</h1>
                <p class="auth-form__subtitle">Создайте аккаунт, чтобы начать игру</p>

                <form action="profile.html">
                    <div class="form-group">
                        <label class="form-label" for="name">Имя</label>
                        <input class="form-input" type="text" id="name" name="name" placeholder="Как тебя зовут?"
                               required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-input" type="email" id="email" name="email" placeholder="example@mail.ru"
                               required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Пароль</label>
                        <input class="form-input form-input--accent" type="password" id="password" name="password"
                               placeholder="Минимум 6 символов" required minlength="6">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password2">Повторите пароль</label>
                        <input class="form-input" type="password" id="password2" name="password2" placeholder="••••••••"
                               required>
                    </div>
                    <label class="form-checkbox">
                        <input type="checkbox" name="agree" required>
                        Я согласен с условиями использования
                    </label>
                    <button type="submit" class="btn btn--primary auth-form__submit">Зарегистрироваться</button>
                </form>

                <p class="auth-form__footer">
                    Уже есть аккаунт? <a href="login.html">Войти</a>
                </p>
            </div>
        </div>
    </div>
    <!-- конец блока "регистрация"-->

</div>