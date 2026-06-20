<?php

$sql = "SELECT * FROM stickers ORDER BY stage_number + 0";
$stickers = $connect->query($sql)->fetchAll();

$userStickerIds = [];
if ($user['role'] == 'user') {
    $sql = "SELECT sticker_id FROM user_stickers WHERE user_id = {$user['id']}";
    $userStickers = $connect->query($sql)->fetchAll();
    foreach ($userStickers as $userSticker) {
        $userStickerIds[] = $userSticker['sticker_id'];
    }
}

$passedStages = count($userStickerIds);
$totalStages = count($stickers);
$progressPercent = $totalStages > 0 ? round(($passedStages / $totalStages) * 100, 2) : 0;

if(isset($_GET['filter_open']))
{
    foreach ($stickers as $key => $sticker) {
        if(!in_array($sticker['id'], $userStickerIds)){
            unset($stickers[$key]);
        }
    }
}

if(isset($_GET['filter_closed']))
{
    foreach ($stickers as $key => $sticker) {
        if(in_array($sticker['id'], $userStickerIds)){
            unset($stickers[$key]);
        }
    }
}

?>

<div class="page-with-header">

    <!-- начало блока "профиль"-->
    <main class="profile-main">
        <!-- начало блока "карточка профиля"-->
        <section class="profile-section profile-section--info">
            <div class="container">
                <h2 class="profile-section__title">Мой профиль</h2>
                <div class="profile-card">
                    <div class="profile-card__main">
                        <div class="profile-card__initial" aria-hidden="true"><?= mb_substr($user['name'], 0, 1) ?></div>
                        <div class="profile-card__body">
                            <p class="profile-card__greeting">Здравствуйте, <span
                                        class="profile-card__name"><?= $user['name'] ?></span>!</p>
                            <div class="profile-card__progress">
                                <div class="profile-card__progress-head">
                                    <span class="profile-card__progress-text">Пройдено <?= $passedStages ?>/<?= $totalStages ?> этапов</span>
                                    <span class="profile-card__progress-value"><?= $passedStages ?> из <?= $totalStages ?></span>
                                </div>
                                <div class="profile-card__progress-bar" role="progressbar" aria-valuenow="<?= $passedStages ?>"
                                     aria-valuemin="0" aria-valuemax="<?= $totalStages ?>" aria-label="Пройдено этапов">
                                    <div class="profile-card__progress-fill" style="width: <?= $progressPercent ?>%"></div>
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
                        <a href="?page=profile" class="profile-tab<?= !isset($_GET['filter_open']) && !isset($_GET['filter_closed']) ? ' active' : '' ?>">Все</a>
                        <a href="?page=profile&filter_open" class="profile-tab<?= isset($_GET['filter_open']) ? ' active' : '' ?>">Открытые</a>
                        <a href="?page=profile&filter_closed" class="profile-tab<?= isset($_GET['filter_closed']) ? ' active' : '' ?>">Заблокированные</a>
                    </div>
                </div>

                <div class="stickers-grid">
                    <?php foreach ($stickers as $index => $sticker):
                        $hasSticker = in_array($sticker['id'], $userStickerIds);
                        ?>
                        <article class="my-sticker<?= !$hasSticker ? ' my-sticker--locked' : '' ?>"
                                 style="--i:<?= $index ?>">
                            <div class="my-sticker__image">
                                <img src="<?= $sticker['file_path'] ?>" alt="<?= $sticker['sticker_name'] ?>" width="96"
                                     height="96" loading="lazy">
                            </div>
                            <?php if (!$hasSticker): ?>
                                <div class="my-sticker__lock" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="5" y="11" width="14" height="10" rx="2"/>
                                        <path d="M8 11V7a4 4 0 018 0v4"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <h3 class="my-sticker__name"><?= $sticker['sticker_name'] ?></h3>
                            <p class="my-sticker__stage">Этап <?= $sticker['stage_number'] ?></p>
                            <?php if ($hasSticker): ?>
                                <a href="<?= $sticker['file_path'] ?>" class="my-sticker__download" download>
                                    <svg class="my-sticker__download-icon" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M12 3v12M7 10l5 5 5-5"/>
                                        <path d="M5 21h14"/>
                                    </svg>
                                    Скачать
                                </a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- конец блока "мои стикеры"-->
    </main>
    <!-- конец блока "профиль"-->

</div>
