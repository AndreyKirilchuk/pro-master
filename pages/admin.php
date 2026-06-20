<?php

$errors = [];
$openAddModal = false;

$sql = "SELECT * FROM stickers ORDER BY stage_number + 0";
$stickers = $connect->query($sql)->fetchAll();

$sql = "SELECT * FROM users";
$users = $connect->query($sql)->fetchAll();

if (isset($_POST['delete_sticker'])) {
    $stickerId = $_POST['sticker_id'];

    $sql = "DELETE FROM stickers WHERE id = '$stickerId'";
    $connect->query($sql);
    echo '<script>location.href="?page=admin";</script>';
}

if (isset($_POST['add_sticker'])) {
    $sticker_name = $_POST['sticker_name'] ?? '';
    $stage_name = $_POST['stage_name'] ?? '';
    $stage_number = $_POST['stage_number'] ?? '';
    $description = $_POST['description'] ?? '';
    $file_path = '';

    if (empty($sticker_name)) {
        $errors['sticker_name'] = 'Введите название';
    } elseif (mb_strlen($sticker_name) < 2) {
        $errors['sticker_name'] = 'Не менее 2х символов';
    } elseif (mb_strlen($sticker_name) > 255) {
        $errors['sticker_name'] = 'Не более 255 символов';
    } else {
        $sql = "SELECT * FROM stickers WHERE sticker_name = '$sticker_name'";
        $check = $connect->query($sql)->fetch();
        if (!empty($check)) {
            $errors['sticker_name'] = 'Стикер с таким названием уже существует';
        }
    }

    if (empty($stage_name)) {
        $errors['stage_name'] = 'Введите название этапа';
    } elseif (mb_strlen($stage_name) < 2) {
        $errors['stage_name'] = 'Не менее 2х символов';
    } elseif (mb_strlen($stage_name) > 255) {
        $errors['stage_name'] = 'Не более 255 символов';
    } else {
        $sql = "SELECT * FROM stickers WHERE stage_name = '$stage_name'";
        $check = $connect->query($sql)->fetch();
        if (!empty($check)) {
            $errors['stage_name'] = 'Этап с таким названием уже существует';
        }
    }

    if (empty($stage_number)) {
        $errors['stage_number'] = 'Введите номер этапа';
    } elseif (mb_strlen($stage_number) > 10) {
        $errors['stage_number'] = 'Не более 10 символов';
    } else {
        $sql = "SELECT * FROM stickers WHERE stage_number = '$stage_number'";
        $check = $connect->query($sql)->fetch();
        if (!empty($check)) {
            $errors['stage_number'] = 'Стикер с таким номером этапа уже существует';
        }
    }

    if (empty($description)) {
        $errors['description'] = 'Введите описание';
    } elseif (mb_strlen($description) < 10) {
        $errors['description'] = 'Не менее 10 символов';
    } elseif (mb_strlen($description) > 2000) {
        $errors['description'] = 'Не более 2000 символов';
    }

    if (empty($_FILES['sticker_image']['name'])) {
        $errors['file_path'] = 'Загрузите изображение';
    } elseif (mb_strlen($_FILES['sticker_image']['name']) > 255) {
        $errors['file_path'] = 'Имя файла не более 255 символов';
    } elseif ($_FILES['sticker_image']['size'] > 2097152) {
        $errors['file_path'] = 'Размер файла не более 2 МБ';
    }

    if (empty($errors)) {
        $fileName = $_FILES['sticker_image']['name'];
        $uploadPath = 'assets/rewards/' . $fileName;

        if (!move_uploaded_file($_FILES['sticker_image']['tmp_name'], $uploadPath)) {
            $errors['file_path'] = 'Не удалось загрузить файл';
            $openAddModal = true;
        } else {
            $file_path = $uploadPath;

            $sql = "INSERT INTO stickers (sticker_name, stage_name, stage_number, description, file_path)
            VALUES ('$sticker_name', '$stage_name', '$stage_number', '$description', '$file_path')";
            $connect->query($sql);

            echo '<script>location.href="?page=admin"</script>';
        }
    } else {
        $openAddModal = true;
    }
}
?>

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
                                <?php foreach ($stickers as $sticker): ?>
                                    <tr data-name="<?= $sticker['sticker_name'] ?>"
                                        data-stage="<?= $sticker['stage_name'] ?>"
                                        data-round="<?= $sticker['stage_number'] ?>"
                                        data-desc="<?= $sticker['description'] ?>">
                                        <td><span class="data-table__label">Превью</span><span
                                                    class="data-table__value"><img
                                                        src="<?= $sticker['file_path'] ?>" alt=""
                                                        class="admin-sticker-preview" width="64" height="64"></span>
                                        </td>
                                        <td><span class="data-table__label">Название</span><span
                                                    class="data-table__value"><?= $sticker['sticker_name'] ?></span>
                                        </td>
                                        <td><span class="data-table__label">Название этапа</span><span
                                                    class="data-table__value"><?= $sticker['stage_name'] ?></span></td>
                                        <td><span class="data-table__label">Номер этапа</span><span
                                                    class="data-table__value"><?= $sticker['stage_number'] ?></span></td>
                                        <td class="data-table__cell--desc"><span
                                                    class="data-table__label">Описание</span><span
                                                    class="data-table__value admin-table-desc"><?= $sticker['description'] ?></span>
                                        </td>
                                        <td><span class="data-table__label">Действия</span><span
                                                    class="data-table__value">
                    <div class="admin-table-actions">
                      <button type="button" aria-label="Редактировать" onclick="openStickerEdit(this.closest('tr'))"><svg
                                  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path
                                      d="M18.5 2.5a2.12 2.12 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <form action="?page=admin" method="post">
                          <input type="hidden" name="sticker_id" value="<?= $sticker['id'] ?>">
                          <button name="delete_sticker" class="delete" aria-label="Удалить"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                           fill="none" stroke="currentColor"
                                                                           stroke-width="2"><path
                                          d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                      </form>
                    </div>
                  </span></td>
                                    </tr>
                                <?php endforeach; ?>
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
                                <?php foreach ($users as $item): ?>
                                    <tr>
                                        <td><span class="data-table__label">Имя</span><span
                                                    class="data-table__value"><?= $item['name'] ?></span>
                                        </td>
                                        <td><span class="data-table__label">Email</span><span
                                                    class="data-table__value"><?= $item['email'] ?></span>
                                        </td>
                                        <td><span class="data-table__label">Роль</span><span class="data-table__value">
                                            <?php if ($item['role'] == 'admin'): ?>
                                                <span class="badge badge--admin">Админ</span>
                                            <?php else: ?>
                                                <span class="badge badge--green">Ученик</span>
                                            <?php endif; ?>
                                        </span></td>
                                    </tr>
                                <?php endforeach; ?>
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
                <form id="sticker-add-form" action="?page=admin" method="post" enctype="multipart/form-data" novalidate>
                    <div class="form-group<?= isset($errors['sticker_name']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="sticker-name">Название</label>
                        <input class="form-input" type="text" id="sticker-name" name="sticker_name"
                               placeholder="Имя персонажа"
                               value="<?= $_POST['sticker_name'] ?? '' ?>">
                        <?php if (isset($errors['sticker_name'])): ?>
                            <span class="form-error"><?= $errors['sticker_name'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?= isset($errors['stage_name']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="sticker-stage">Название этапа</label>
                        <input class="form-input" type="text" id="sticker-stage" name="stage_name"
                               placeholder="Например: Дизайн-Атака"
                               value="<?= $_POST['stage_name'] ?? '' ?>">
                        <?php if (isset($errors['stage_name'])): ?>
                            <span class="form-error"><?= $errors['stage_name'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?= isset($errors['stage_number']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="sticker-round">Номер этапа</label>
                        <input class="form-input" type="text" id="sticker-round" name="stage_number" placeholder="1–6"
                               value="<?= $_POST['stage_number'] ?? '' ?>">
                        <?php if (isset($errors['stage_number'])): ?>
                            <span class="form-error"><?= $errors['stage_number'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?= isset($errors['description']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="sticker-desc">Описание стикера</label>
                        <textarea class="form-textarea" id="sticker-desc" name="description" rows="4"
                                  placeholder="Краткое описание награды за прохождение этапа"><?= $_POST['description'] ?? '' ?></textarea>
                        <?php if (isset($errors['description'])): ?>
                            <span class="form-error"><?= $errors['description'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group<?= isset($errors['file_path']) ? ' form-group--error' : '' ?>">
                        <label class="form-label" for="sticker-image">Изображение стикера</label>
                        <label class="file-upload">
                            <input type="file" id="sticker-image" name="sticker_image" accept="image/*" hidden>
                            <svg class="file-upload__icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
                                 stroke-width="2">
                                <path d="M24 32V16M16 24l8-8 8 8"/>
                                <rect x="6" y="6" width="36" height="36" rx="8"/>
                            </svg>
                            <span class="file-upload__text">Перетащите файл или нажмите для загрузки</span>
                        </label>
                        <?php if (isset($errors['file_path'])): ?>
                            <span class="form-error"><?= $errors['file_path'] ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="add_sticker" class="btn btn--admin" style="width:100%">Сохранить
                    </button>
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
                        <input class="form-input" type="text" id="edit-sticker-stage"
                               placeholder="Например: Дизайн-Атака">
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

<?php if ($openAddModal): ?>
    <script>openModal('modal-sticker');</script>
<?php endif; ?>