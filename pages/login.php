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

                <form action="profile.html">
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-input" type="email" id="email" name="email" placeholder="example@mail.ru"
                               required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Пароль</label>
                        <input class="form-input form-input--accent" type="password" id="password" name="password"
                               placeholder="••••••••" required>
                    </div>
                    <label class="form-checkbox">
                        <input type="checkbox" name="remember">
                        Запомнить меня
                    </label>
                    <button type="submit" class="btn btn--primary auth-form__submit">Войти</button>
                </form>

                <p class="auth-form__footer">
                    Нет аккаунта? <a href="register.html">Зарегистрироваться</a>
                </p>
            </div>
        </div>
    </div>
    <!-- конец блока "авторизация"-->
</div>