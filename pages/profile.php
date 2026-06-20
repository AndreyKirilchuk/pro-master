<div class="page-with-header">

    <!-- начало блока "профиль"-->
    <main class="profile-main">
        <!-- начало блока "карточка профиля"-->
        <section class="profile-section profile-section--info">
            <div class="container">
                <h2 class="profile-section__title">Мой профиль</h2>
                <div class="profile-card">
                    <div class="profile-card__main">
                        <div class="profile-card__initial" aria-hidden="true">А</div>
                        <div class="profile-card__body">
                            <p class="profile-card__greeting">Здравствуйте, <span
                                        class="profile-card__name">Алексей</span>!</p>
                            <div class="profile-card__progress">
                                <div class="profile-card__progress-head">
                                    <span class="profile-card__progress-text">Пройдено 4/6 этапов</span>
                                    <span class="profile-card__progress-value">4 из 6</span>
                                </div>
                                <div class="profile-card__progress-bar" role="progressbar" aria-valuenow="4"
                                     aria-valuemin="0" aria-valuemax="6" aria-label="Пройдено этапов">
                                    <div class="profile-card__progress-fill" style="width: 66.67%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/#stages" class="btn btn--primary profile-card__btn">Продолжить обучение</a>
                </div>
            </div>
        </section>
        <!-- конец блока "карточка профиля"-->

        <!-- начало блока "мои стикеры"-->
        <section class="profile-section">
            <div class="container">
                <div class="profile-section__header">
                    <h2 class="profile-section__title">Мои стикеры</h2>
                    <div class="profile-tabs">
                        <button class="profile-tab active" data-filter="all">Все</button>
                        <button class="profile-tab" data-filter="unlocked">Открытые</button>
                        <button class="profile-tab" data-filter="locked">Заблокированные</button>
                    </div>
                </div>

                <div class="stickers-grid">
                    <article class="my-sticker" data-color="#4ECC0A"
                             data-sticker-src="assets/rewards/broadcast-pass.png" style="--i:0">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/broadcast-pass.png" alt="Пропуск в эфир" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <h3 class="my-sticker__name">Пропуск в эфир</h3>
                        <p class="my-sticker__stage">Этап 1</p>
                        <a href="assets/rewards/broadcast-pass.png" class="my-sticker__download" download>
                            <svg class="my-sticker__download-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" aria-hidden="true">
                                <path d="M12 3v12M7 10l5 5 5-5"/>
                                <path d="M5 21h14"/>
                            </svg>
                            Скачать
                        </a>
                    </article>

                    <article class="my-sticker" data-color="#38A808" data-sticker-src="assets/rewards/design-attack.png"
                             style="--i:1">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/design-attack.png" alt="Мастер пикселей" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <h3 class="my-sticker__name">Мастер пикселей</h3>
                        <p class="my-sticker__stage">Этап 2</p>
                        <a href="assets/rewards/design-attack.png" class="my-sticker__download" download>
                            <svg class="my-sticker__download-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" aria-hidden="true">
                                <path d="M12 3v12M7 10l5 5 5-5"/>
                                <path d="M5 21h14"/>
                            </svg>
                            Скачать
                        </a>
                    </article>

                    <article class="my-sticker" data-color="#1A1A1A" data-sticker-src="assets/rewards/smm-challenge.png"
                             style="--i:2">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/smm-challenge.png" alt="Звезда охватов" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <h3 class="my-sticker__name">Звезда охватов</h3>
                        <p class="my-sticker__stage">Этап 3</p>
                        <a href="assets/rewards/smm-challenge.png" class="my-sticker__download" download>
                            <svg class="my-sticker__download-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" aria-hidden="true">
                                <path d="M12 3v12M7 10l5 5 5-5"/>
                                <path d="M5 21h14"/>
                            </svg>
                            Скачать
                        </a>
                    </article>

                    <article class="my-sticker" data-color="#2D8A06" data-sticker-src="assets/rewards/it-master.png"
                             style="--i:3">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/it-master.png" alt="Кодовый гений" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <h3 class="my-sticker__name">Кодовый гений</h3>
                        <p class="my-sticker__stage">Этап 4</p>
                        <a href="assets/rewards/it-master.png" class="my-sticker__download" download>
                            <svg class="my-sticker__download-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" aria-hidden="true">
                                <path d="M12 3v12M7 10l5 5 5-5"/>
                                <path d="M5 21h14"/>
                            </svg>
                            Скачать
                        </a>
                    </article>

                    <article class="my-sticker my-sticker--locked" data-color="#4ECC0A"
                             data-sticker-src="assets/rewards/team-defanse.png" style="--i:4">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/team-defanse.png" alt="Король слова" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <div class="my-sticker__lock" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="5" y="11" width="14" height="10" rx="2"/>
                                <path d="M8 11V7a4 4 0 018 0v4"/>
                            </svg>
                        </div>
                        <h3 class="my-sticker__name">Король слова</h3>
                        <p class="my-sticker__stage">Этап 5</p>
                    </article>

                    <article class="my-sticker my-sticker--locked" data-color="#4ECC0A"
                             data-sticker-src="assets/rewards/pinnacle-master.png" style="--i:5">
                        <div class="my-sticker__image">
                            <img src="assets/rewards/pinnacle-master.png" alt="Легенда агентства" width="96" height="96"
                                 loading="lazy">
                        </div>
                        <div class="my-sticker__lock" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="5" y="11" width="14" height="10" rx="2"/>
                                <path d="M8 11V7a4 4 0 018 0v4"/>
                            </svg>
                        </div>
                        <h3 class="my-sticker__name">Легенда агентства</h3>
                        <p class="my-sticker__stage">Этап 6</p>
                    </article>
                </div>
            </div>
        </section>
        <!-- конец блока "мои стикеры"-->
    </main>
    <!-- конец блока "профиль"-->

</div>