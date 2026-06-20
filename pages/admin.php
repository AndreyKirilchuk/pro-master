<div class="admin-page">

    <div class="admin-overlay" onclick="toggleSidebar()"></div>

    <!-- начало блока "сайдбар"-->
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__header">
                <div class="admin-sidebar__logo">
                    <img src="assets/images/logo-mini.svg" alt="" class="admin-sidebar__logo-img" width="32"
                         height="32">
                    <span class="admin-sidebar__logo-text">ПроМастер</span>
                </div>
            </div>
            <nav class="admin-sidebar__nav">
                <a href="#" id="link-stickers" class="admin-sidebar__link active"
                   onclick="openTab('stickers'); return false;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                        <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor"/>
                        <path d="M21 15l-5-5L5 21"/>
                    </svg>
                    Стикеры
                </a>
                <a href="#" id="link-users" class="admin-sidebar__link" onclick="openTab('users'); return false;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                    Пользователи
                </a>
                <a href="/" class="admin-sidebar__link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    </svg>
                    На сайт
                </a>
            </nav>
            <div class="admin-sidebar__footer">
                <form action="?" method="post">
                    <button name="exit" class="admin-sidebar__link">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/>
                        </svg>
                        Выйти
                    </button>
                </form>
            </div>
        </aside>
        <!-- конец блока "сайдбар"-->

        <!-- начало блока "контент админки"-->
        <div class="admin-main">
            <div class="admin-topbar">
                <button class="burger admin-burger" aria-label="Открыть меню" onclick="toggleSidebar()">
                    <span></span><span></span><span></span></button>
                <span class="admin-topbar__title">Админ-панель</span>
            </div>
            <div class="admin-content">
                <!-- начало блока "вкладка стикеры"-->
                <div class="admin-tab active" id="tab-stickers">
                    <div class="admin-page-header">
                        <h1 class="admin-page-header__title">Стикеры</h1>
                        <button type="button" class="btn btn--admin" onclick="openStickerAdd()">+ Добавить стикер
                        </button>
                    </div>

                    <div class="table-wrapper">
                        <table class="data-table data-table--responsive">
                            <thead>
                            <tr>
                                <th>Превью</th>
                                <th>Название</th>
                                <th>Название этапа</th>
                                <th>Номер этапа</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr data-name="Пропуск в эфир" data-stage="Первый день в компании" data-round="1"
                                data-desc="Награда за «Первый день в компании»: ты познакомился с командой, выбрал направление и создал свой первый слоган.">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/broadcast-pass.png" alt=""
                                                class="admin-sticker-preview" width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Пропуск в эфир</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">Первый день в компании</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">1</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Награда за «Первый день в компании»: ты познакомился с командой, выбрал направление и создал свой первый слоган.</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            <tr data-name="Мастер пикселей" data-stage="Дизайн-Атака" data-round="2"
                                data-desc="Награда за «Дизайн-Атаку»: логотип готов, визуальная концепция кампании собрана — ты настоящий дизайнер!">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/design-attack.png" alt=""
                                                class="admin-sticker-preview" width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Мастер пикселей</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">Дизайн-Атака</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">2</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Награда за «Дизайн-Атаку»: логотип готов, визуальная концепция кампании собрана — ты настоящий дизайнер!</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            <tr data-name="Звезда охватов" data-stage="SMM-Челлендж" data-round="3"
                                data-desc="Награда за «SMM-Челлендж»: контент-план составлен, визуалы подобраны — соцсети клиента в надёжных руках.">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/smm-challenge.png" alt=""
                                                class="admin-sticker-preview" width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Звезда охватов</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">SMM-Челлендж</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">3</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Награда за «SMM-Челлендж»: контент-план составлен, визуалы подобраны — соцсети клиента в надёжных руках.</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            <tr data-name="Кодовый гений" data-stage="IT-Мастер" data-round="4"
                                data-desc="Награда за «IT-Мастер»: landing page свёрстан или интерактив работает — техническая задача выполнена на отлично.">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/it-master.png" alt="" class="admin-sticker-preview"
                                                width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Кодовый гений</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">IT-Мастер</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">4</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Награда за «IT-Мастер»: landing page свёрстан или интерактив работает — техническая задача выполнена на отлично.</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            <tr data-name="Король слова" data-stage="Командная защита" data-round="5"
                                data-desc="Награда за «Командную защиту»: идея представлена заказчику уверенно и убедительно — команда гордится тобой!">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/team-defanse.png" alt=""
                                                class="admin-sticker-preview" width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Король слова</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">Командная защита</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">5</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Награда за «Командную защиту»: идея представлена заказчику уверенно и убедительно — команда гордится тобой!</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            <tr data-name="Легенда агентства" data-stage="Вершина мастерства" data-round="6"
                                data-desc="Главная награда за «Вершину мастерства»: комплексная кампания защищена — ты настоящий профи агентства!">
                                <td><span class="data-table__label">Превью</span><span class="data-table__value"><img
                                                src="assets/rewards/pinnacle-master.png" alt=""
                                                class="admin-sticker-preview" width="64" height="64"></span></td>
                                <td><span class="data-table__label">Название</span><span class="data-table__value">Легенда агентства</span>
                                </td>
                                <td><span class="data-table__label">Название этапа</span><span
                                            class="data-table__value">Вершина мастерства</span></td>
                                <td><span class="data-table__label">Номер этапа</span><span
                                            class="data-table__value">6</span></td>
                                <td class="data-table__cell--desc"><span class="data-table__label">Описание</span><span
                                            class="data-table__value admin-table-desc">Главная награда за «Вершину мастерства»: комплексная кампания защищена — ты настоящий профи агентства!</span>
                                </td>
                                <td><span class="data-table__label">Действия</span><span class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" stroke="currentColor"
                                                                       stroke-width="2"><path
                                      d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- конец блока "вкладка стикеры"-->

                <!-- начало блока "вкладка пользователи"-->
                <div class="admin-tab" id="tab-users">
                    <div class="admin-page-header">
                        <h1 class="admin-page-header__title">Пользователи</h1>
                    </div>

                    <div class="table-wrapper">
                        <table class="data-table data-table--responsive data-table--users">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Роль</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><span class="data-table__label">Имя</span><span class="data-table__value">Алексей Иванов</span>
                                </td>
                                <td><span class="data-table__label">Email</span><span class="data-table__value">alex@mail.ru</span>
                                </td>
                                <td><span class="data-table__label">Роль</span><span class="data-table__value"><span
                                                class="badge badge--green">Ученик</span></span></td>
                            </tr>
                            <tr>
                                <td><span class="data-table__label">Имя</span><span class="data-table__value">Мария Петрова</span>
                                </td>
                                <td><span class="data-table__label">Email</span><span class="data-table__value">maria@mail.ru</span>
                                </td>
                                <td><span class="data-table__label">Роль</span><span class="data-table__value"><span
                                                class="badge badge--green">Ученик</span></span></td>
                            </tr>
                            <tr>
                                <td><span class="data-table__label">Имя</span><span class="data-table__value">Дмитрий Сидоров</span>
                                </td>
                                <td><span class="data-table__label">Email</span><span class="data-table__value">dmitry@mail.ru</span>
                                </td>
                                <td><span class="data-table__label">Роль</span><span class="data-table__value"><span
                                                class="badge badge--green">Ученик</span></span></td>
                            </tr>
                            <tr>
                                <td><span class="data-table__label">Имя</span><span class="data-table__value">Елена Козлова</span>
                                </td>
                                <td><span class="data-table__label">Email</span><span class="data-table__value">elena@mail.ru</span>
                                </td>
                                <td><span class="data-table__label">Роль</span><span class="data-table__value"><span
                                                class="badge badge--purple">Учитель</span></span></td>
                            </tr>
                            <tr>
                                <td><span class="data-table__label">Имя</span><span class="data-table__value">Админ Системы</span>
                                </td>
                                <td><span class="data-table__label">Email</span><span class="data-table__value">admin@promaster.ru</span>
                                </td>
                                <td><span class="data-table__label">Роль</span><span class="data-table__value"><span
                                                class="badge badge--admin">Админ</span></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- конец блока "вкладка пользователи"-->
            </div>
        </div>
        <!-- конец блока "контент админки"-->
    </div>

    <!-- начало блока "модальное окно добавления"-->
    <div class="modal-overlay" id="modal-sticker" onclick="if (event.target === this) closeModals()">
        <div class="modal" role="dialog" aria-labelledby="modal-sticker-title">
            <button type="button" class="modal__close" aria-label="Закрыть" onclick="closeModals()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
            <h2 class="modal__title" id="modal-sticker-title">Добавить стикер</h2>
            <form id="sticker-add-form" novalidate>
                <div class="form-group">
                    <label class="form-label" for="sticker-name">Название</label>
                    <input class="form-input" type="text" id="sticker-name" placeholder="Имя персонажа">
                </div>
                <div class="form-group">
                    <label class="form-label" for="sticker-stage">Название этапа</label>
                    <input class="form-input" type="text" id="sticker-stage" placeholder="Например: Дизайн-Атака">
                </div>
                <div class="form-group">
                    <label class="form-label" for="sticker-round">Номер этапа</label>
                    <input class="form-input" type="text" id="sticker-round" placeholder="1–6">
                </div>
                <div class="form-group">
                    <label class="form-label" for="sticker-desc">Описание стикера</label>
                    <textarea class="form-textarea" id="sticker-desc" rows="4"
                              placeholder="Краткое описание награды за прохождение этапа"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Изображение стикера</label>
                    <label class="file-upload">
                        <input type="file" accept="image/*" hidden>
                        <svg class="file-upload__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="M24 32V16M16 24l8-8 8 8"/>
                            <rect x="6" y="6" width="36" height="36" rx="8"/>
                        </svg>
                        <span class="file-upload__text">Перетащите файл или нажмите для загрузки</span>
                    </label>
                </div>
                <button type="button" class="btn btn--admin" style="width:100%">Сохранить</button>
            </form>
        </div>
    </div>
    <!-- конец блока "модальное окно добавления"-->

    <!-- начало блока "модальное окно редактирования"-->
    <div class="modal-overlay" id="modal-sticker-edit" onclick="if (event.target === this) closeModals()">
        <div class="modal" role="dialog" aria-labelledby="modal-sticker-edit-title">
            <button type="button" class="modal__close" aria-label="Закрыть" onclick="closeModals()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
            <h2 class="modal__title" id="modal-sticker-edit-title">Редактировать стикер</h2>
            <form id="sticker-edit-form" novalidate>
                <div class="form-group">
                    <label class="form-label" for="edit-sticker-name">Название</label>
                    <input class="form-input" type="text" id="edit-sticker-name" placeholder="Имя персонажа">
                </div>
                <div class="form-group">
                    <label class="form-label" for="edit-sticker-stage">Название этапа</label>
                    <input class="form-input" type="text" id="edit-sticker-stage" placeholder="Например: Дизайн-Атака">
                </div>
                <div class="form-group">
                    <label class="form-label" for="edit-sticker-round">Номер этапа</label>
                    <input class="form-input" type="text" id="edit-sticker-round" placeholder="1–6">
                </div>
                <div class="form-group">
                    <label class="form-label" for="edit-sticker-desc">Описание стикера</label>
                    <textarea class="form-textarea" id="edit-sticker-desc" rows="4"
                              placeholder="Краткое описание награды за прохождение этапа"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Изображение стикера</label>
                    <label class="file-upload">
                        <input type="file" accept="image/*" hidden>
                        <svg class="file-upload__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
                             stroke-width="2">
                            <path d="M24 32V16M16 24l8-8 8 8"/>
                            <rect x="6" y="6" width="36" height="36" rx="8"/>
                        </svg>
                        <span class="file-upload__text">Перетащите файл или нажмите для загрузки</span>
                    </label>
                </div>
                <button type="button" class="btn btn--admin" style="width:100%">Сохранить</button>
            </form>
        </div>
    </div>
    <!-- конец блока "модальное окно редактирования"-->

</div>