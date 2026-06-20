<?php

$sql = "SELECT * FROM stickers ORDER BY stage_number";
$stickers = $connect->query($sql)->fetchAll();

$userStickerIds = [];
if ($user['role'] == 'user') {
    $sql = "SELECT sticker_id FROM user_stickers WHERE user_id = {$user['id']}";
    $userStickers = $connect->query($sql)->fetchAll();
    foreach ($userStickers as $userSticker) {
        $userStickerIds[] = $userSticker['sticker_id'];
    }
}

?>


<!-- начало блока "главный экран"-->
<section class="hero">
    <div class="hero__bg" aria-hidden="true">
        <span class="hero__glow hero__glow--1"></span>
        <span class="hero__glow hero__glow--2"></span>
        <span class="hero__grid"></span>
    </div>
    <div class="container hero__inner">
        <div class="hero__content">
        <span class="hero__label animate-fade-in-up">
          <span class="hero__label-dot"></span>
          Образование через игру
        </span>
            <h1 class="hero__title animate-fade-in-up animate-delay-1">
                Стань настоящим
                <span class="hero__title-accent">
            ПроМастером!
            <svg class="hero__underline" viewBox="0 0 320 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                 aria-hidden="true" preserveAspectRatio="none">
              <path d="M5 15.5C72 6 158 4.5 230 9.5c30 2.1 60 5.5 85 11" stroke="url(#heroLine)" stroke-width="7"
                    stroke-linecap="round"/>
              <defs>
                <linearGradient id="heroLine" x1="5" y1="12" x2="315" y2="12" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#5BDD12"/>
                  <stop offset="1" stop-color="#2D8A06"/>
                </linearGradient>
              </defs>
            </svg>
          </span>
            </h1>
            <p class="hero__subtitle animate-fade-in-up animate-delay-2">Пройди 6 этапов рекламного агентства, выполняй
                задания в команде и собирай коллекцию наград-стикеров.</p>
            <div class="hero__cta animate-fade-in-up animate-delay-3">
                <a href="?page=register" class="btn btn--primary btn--lg btn--shine">
                    Начать путь к мастерству
                    <svg class="btn__arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </a>
                <a href="#about" class="btn btn--outline-dark btn--lg">Узнать больше</a>
            </div>
            <div class="hero__trust animate-fade-in-up animate-delay-4">
                <div class="hero__avatars">
                    <span class="hero__avatar" style="--i:0">М</span>
                    <span class="hero__avatar" style="--i:1">А</span>
                    <span class="hero__avatar" style="--i:2">К</span>
                    <span class="hero__avatar" style="--i:3">+</span>
                </div>
                <p class="hero__trust-text"><strong>2 000+</strong> юных мастеров уже играют</p>
            </div>
        </div>

        <div class="hero__visual animate-fade-in-up animate-delay-3">
            <div class="hero-showcase" aria-hidden="true">
                <div class="hero-showcase__frame">
                    <div class="hero-showcase__head">
                        <span class="hero-showcase__label">Коллекция наград</span>
                        <span class="hero-showcase__meta"><?= count($stickers) ?> этапов</span>
                    </div>

                    <div class="hero-showcase__path">
                        <span class="hero-showcase__step">1</span>
                        <span class="hero-showcase__step">2</span>
                        <span class="hero-showcase__step">3</span>
                        <span class="hero-showcase__step">4</span>
                        <span class="hero-showcase__step">5</span>
                        <span class="hero-showcase__step hero-showcase__step--final">6</span>
                    </div>

                    <div class="hero-showcase__grid">
                        <?php foreach ($stickers as $index => $sticker): ?>
                            <div class="hero-showcase__item<?= $index + 1 == count($stickers) ? ' hero-showcase__item--featured' : '' ?>"
                                 style="--i:<?= $index ?>">
                                <img src="<?= $sticker['file_path'] ?>" alt="<?= $sticker['sticker_name'] ?>" width="72"
                                     height="72">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- конец блока "главный экран"-->

<!-- начало блока "о проекте"-->
<section class="section about" id="about">
    <div class="container about__inner">
        <div class="section__header section__header--center about__header">
        <span class="eyebrow" data-reveal>
          <span class="eyebrow__dot"></span>
          О проекте
        </span>
            <h2 class="about__title" data-reveal>Что такое <span class="text-accent">ПроМастер</span>?</h2>
            <p class="about__text" data-reveal>ПроМастер — интерактивная игровая платформа для детей 8–14 лет. Ты
                попадаешь в рекламное агентство и проходишь путь от новичка до настоящего профи. Каждый этап — новые
                навыки, командные задачи и уникальная награда в коллекцию.</p>
        </div>
        <div class="about__stats">
            <div class="about__stat" data-reveal>
                <span class="about__stat-value">50+</span>
                <span class="about__stat-label">заданий</span>
            </div>
            <div class="about__stat" data-reveal style="--d:1">
                <span class="about__stat-value">6</span>
                <span class="about__stat-label">наград</span>
            </div>
            <div class="about__stat" data-reveal style="--d:2">
                <span class="about__stat-value">8–14</span>
                <span class="about__stat-label">лет</span>
            </div>
            <div class="about__stat" data-reveal style="--d:3">
                <span class="about__stat-value">100%</span>
                <span class="about__stat-label">игра</span>
            </div>
        </div>
    </div>
</section>
<!-- конец блока "о проекте"-->

<!-- начало блока "этапы"-->
<section class="section" id="stages">
    <div class="container">
        <div class="section__header section__header--center">
        <span class="eyebrow" data-reveal>
          <span class="eyebrow__dot"></span>
          Путь игрока
        </span>
            <h2 class="section__title" data-reveal>Шесть этапов до мастера</h2>
            <p class="section__subtitle" data-reveal>От первого дня в агентстве до финальной защиты проекта — каждый
                этап открывает новый навык и награду</p>
        </div>

        <div class="stages__grid">
            <?php foreach ($stickers as $sticker): ?>
                <article class="stage-card" data-reveal style="--d:0">
                    <div class="stage-card__head">
                        <span class="stage-card__number"><?= $sticker['stage_number'] ?></span>
                        <h3 class="stage-card__title"><?= $sticker['stage_name'] ?></h3>
                    </div>
                    <p class="stage-card__text"><?= $sticker['description'] ?></p>
                    <span class="stage-card__reward">+ <?= $sticker['sticker_name'] ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- конец блока "этапы"-->

<!-- начало блока "слайдер наград"-->
<section class="section awards" id="awards">
    <div class="container">
        <div class="section__header section__header--center">
        <span class="eyebrow" data-reveal>
          <span class="eyebrow__dot"></span>
          Коллекция
        </span>
            <h2 class="section__title" data-reveal>Награды за каждый этап</h2>
            <p class="section__subtitle" data-reveal>За каждый пройденный этап ты получаешь уникальный стикер-награду в
                свою коллекцию</p>
        </div>

        <div class="awards__frame">
            <div class="awards__slider">
                <div class="awards__track">
                    <?php foreach ($stickers as $sticker):
                        $hasSticker = in_array($sticker['id'], $userStickerIds);
                        ?>
                        <div class="award-slide<?= !$hasSticker ? ' award-slide--locked' : '' ?>">
                            <div class="award-slide__sticker">
                                <img src="<?= $sticker['file_path'] ?>" alt="<?= $sticker['sticker_name'] ?>"
                                     class="award-slide__image"
                                     width="160" height="160">
                                <?php if (!$hasSticker): ?>
                                    <div class="award-slide__lock" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="5" y="11" width="14" height="10" rx="2"/>
                                            <path d="M8 11V7a4 4 0 018 0v4"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="award-slide__content">
                                <span class="award-slide__label">Этап <?= $sticker['stage_number'] ?></span>
                                <h3 class="award-slide__title"><?= $sticker['sticker_name'] ?></h3>
                                <p class="award-slide__desc"><?= $sticker['description'] ?></p>
                                <?php if ($hasSticker): ?>
                                    <a href="<?= $sticker['file_path'] ?>" class="award-slide__download" download>
                                        <svg class="award-slide__download-icon" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M12 3v12M7 10l5 5 5-5"/>
                                            <path d="M5 21h14"/>
                                        </svg>
                                        Скачать
                                    </a>
                                <?php else: ?>
                                    <p class="award-slide__locked-text">Пройди этап, чтобы открыть награду</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="awards__controls">
                <button class="awards__btn awards__btn--prev" aria-label="Предыдущая награда">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
                <div class="awards__dots">
                    <?php foreach ($stickers as $index => $sticker): ?>
                        <button class="awards__dot<?= $index === 0 ? ' active' : '' ?>"
                                aria-label="Награда <?= $index + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>
                <button class="awards__btn awards__btn--next" aria-label="Следующая награда">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- конец блока "слайдер наград"-->

<!-- начало блока "FAQ"-->
<section class="section" id="faq">
    <div class="container">
        <div class="section__header section__header--center">
        <span class="eyebrow" data-reveal>
          <span class="eyebrow__dot"></span>
          FAQ
        </span>
            <h2 class="section__title" data-reveal>Частые вопросы</h2>
            <p class="section__subtitle" data-reveal>Ответы на популярные вопросы о платформе</p>
        </div>
        <div class="faq__list">
            <div class="faq__item">
                <button class="faq__question">
                    Для какого возраста подходит платформа?
                    <svg class="faq__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div class="faq__answer">
                    <div class="faq__answer-inner">ПроМастер разработан для детей от 8 до 14 лет. Задания адаптированы
                        под разный уровень сложности.
                    </div>
                </div>
            </div>
            <div class="faq__item">
                <button class="faq__question">
                    Нужно ли платить за использование?
                    <svg class="faq__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div class="faq__answer">
                    <div class="faq__answer-inner">Базовый доступ бесплатный — все 6 этапов и награды доступны без
                        оплаты. Дополнительные материалы могут быть платными.
                    </div>
                </div>
            </div>
            <div class="faq__item">
                <button class="faq__question">
                    Можно ли играть с друзьями?
                    <svg class="faq__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div class="faq__answer">
                    <div class="faq__answer-inner">Да! Вы можете соревноваться с друзьями, сравнивать коллекции наград и
                        проходить этапы вместе.
                    </div>
                </div>
            </div>
            <div class="faq__item">
                <button class="faq__question">
                    Как получить все награды?
                    <svg class="faq__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div class="faq__answer">
                    <div class="faq__answer-inner">Пройдите все 6 этапов и выполните финальное задание. За каждый этап
                        вы получаете уникальную награду-стикер.
                    </div>
                </div>
            </div>
            <div class="faq__item">
                <button class="faq__question">
                    Безопасна ли платформа для детей?
                    <svg class="faq__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <div class="faq__answer">
                    <div class="faq__answer-inner">Абсолютно. Мы не собираем лишних данных, весь контент проверен
                        педагогами, а общение модерируется.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- конец блока "FAQ"-->