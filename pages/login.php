<?php
$errors = [];

if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$email) {
        $errors['email'] = 'Введите почту';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Неверный формат почты';
    }

    if (!$password) {
        $errors['password'] = 'Введите пароль';
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $check = $connect->query($sql)->fetch();
        if(!$check){
            $errors['email'] = 'Пользователя с такой почтой не существует';
        }elseif(!password_verify($password,$check['password'])){
            $errors['password'] = 'Неверный пароль';
        }

        if (empty($errors)) {
            $_SESSION['uid'] = $check['id'];
            session_write_close();

            if($check['role'] === 'user')
            {
                echo '<script>location.href="?page=profile"</script>';
            }else{
                echo '<script>location.href="?page=admin"</script>';
            }
        }
    }
}
?>

<div class="page-with-header">
    <!-- начало блока "авторизация"-->
    <div class="auth-page">
        <div class="auth-layout">
            <div class="auth-art">
                <h2 class="auth-art__title">С возвращением!</h2>
                <p class="auth-art__text">Продолжай свой путь к мастерству и<br>собирай новые стикеры</p>
                <svg class="auth-art__illustration" viewBox="0 0 200 200" fill="none">
                    <circle cx="100" cy="100" r="80" fill="rgba(255,255,255,0.15)"/>
                    <circle cx="100" cy="80" r="35" fill="rgba(255,255,255,0.3)"/>
                    <rect x="60" y="120" width="80" height="60" rx="30" fill="rgba(255,255,255,0.3)"/>
                </svg>
            </div>

            <div class="auth-form-side">
                <h1 class="auth-form__title">Вход в аккаунт</h1>
                <p class="auth-form__subtitle">Введите данные для входа в профиль</p>

                <form action="?page=login" method="post" novalidate>
                    <div class="form-group<?= isset($errors['email']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-input" type="text" id="email" name="email" placeholder="example@mail.ru"
                               value="<?= $_POST['email'] ?? '' ?>">
                        <?php if (isset($errors['email'])): ?>
                            <span class="form-error"><?= $errors['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?= isset($errors['password']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="password">Пароль</label>
                        <input class="form-input form-input--accent" type="password" id="password" name="password"
                               placeholder="••••••••">
                        <?php if (isset($errors['password'])): ?>
                            <span class="form-error"><?= $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="login" class="btn btn--primary auth-form__submit">Войти</button>
                </form>

                <p class="auth-form__footer">
                    Нет аккаунта? <a href="?page=register">Зарегистрироваться</a>
                </p>
            </div>
        </div>
    </div>
    <!-- конец блока "авторизация"-->
</div>
