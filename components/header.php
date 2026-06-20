<!-- начало блока "шапка"-->
<header class="header">
    <div class="container header__inner">
        <a href="/" class="header__logo">
            <img src="../assets/images/logo.svg" alt="ПроМастер" class="header__logo-img" width="172" height="40">
        </a>

        <nav class="header__nav">
            <ul class="header__nav-list">
                <li><a href="#about" class="header__nav-link" onclick="toggleBurgerMenu()">О проекте</a></li>
                <li><a href="#stages" class="header__nav-link" onclick="toggleBurgerMenu()">Этапы</a></li>
                <li><a href="#awards" class="header__nav-link" onclick="toggleBurgerMenu()">Награды</a></li>
                <li><a href="#faq" class="header__nav-link" onclick="toggleBurgerMenu()">FAQ</a></li>
            </ul>
            <div class="header__actions">
                <a href="?page=login" class="btn btn--primary">Войти</a>
            </div>
        </nav>

        <button class="burger" aria-label="Открыть меню" onclick="toggleBurgerMenu()">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<div class="header-nav-overlay" aria-hidden="true" onclick="toggleBurgerMenu()"></div>
<!-- конец блока "шапка"-->