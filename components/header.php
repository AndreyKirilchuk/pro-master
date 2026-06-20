<!-- начало блока "шапка"-->
<header class="header">
    <div class="container header__inner">
        <a href="/" class="header__logo">
            <img src="../assets/images/logo.svg" alt="ПроМастер" class="header__logo-img" width="172" height="40">
        </a>

        <nav class="header__nav">
            <ul class="header__nav-list">
                <li><a href="/#about" class="header__nav-link" onclick="closeBurgerMenu()">О проекте</a></li>
                <li><a href="/#stages" class="header__nav-link" onclick="closeBurgerMenu()">Этапы</a></li>
                <li><a href="/#awards" class="header__nav-link" onclick="closeBurgerMenu()">Награды</a></li>
                <li><a href="/#faq" class="header__nav-link" onclick="closeBurgerMenu()">FAQ</a></li>
            </ul>

            <?php if ($user['role'] == 'guest'): ?>

                <div class="header__actions">
                    <a href="?page=login" class="btn btn--primary" onclick="closeBurgerMenu()">Войти</a>
                </div>

            <?php else : ?>

                <div class="header__actions">
                    <a href="<?php if ($user['role'] == 'user') echo '?page=profile'; else echo '?page=admin' ?>"
                       class="header__profile active" aria-current="page"
                       onclick="closeBurgerMenu()">
                        <span class="header__profile-avatar"><?= mb_substr($user['name'], 0, 1) ?></span>
                        <span class="header__profile-name"><?= $user['name'] ?></span>
                    </a>
                    <?php if ($user['role'] == 'user'): ?>
                        <a href="?page=profile" class="btn btn--primary header__profile-btn" aria-current="page"
                           onclick="closeBurgerMenu()">Профиль</a>
                    <?php else : ?>
                        <a href="?page=admin" class="btn btn--primary header__profile-btn" aria-current="page"
                           onclick="closeBurgerMenu()">Админ панель</a>
                    <?php endif; ?>

                    <form action="?" method="post">
                        <button name="exit" class="btn btn--outline btn--sm">Выйти</button>
                    </form>
                </div>

            <?php endif; ?>
        </nav>

        <button class="burger" type="button" aria-label="Открыть меню" onclick="toggleBurgerMenu()">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<!-- конец блока "шапка"-->