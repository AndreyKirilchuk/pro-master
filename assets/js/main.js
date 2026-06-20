// Меню в шапке
const burger = document.querySelector('.header .burger');
const nav = document.querySelector('.header__nav');
const headerOverlay = document.querySelector('.header-nav-overlay');

function toggleBurgerMenu() {
  burger.classList.toggle('active');
  nav.classList.toggle('open');
  headerOverlay.classList.toggle('active', nav.classList.contains('open'));
  document.body.classList.toggle('scroll-lock', nav.classList.contains('open'));
}

// Админ-панель
const sidebar = document.querySelector('.admin-sidebar');
const adminOverlay = document.querySelector('.admin-overlay');
const adminBurger = document.querySelector('.admin-burger');

function toggleSidebar() {
  sidebar.classList.toggle('open');
  adminOverlay.classList.toggle('active', sidebar.classList.contains('open'));
  adminBurger.classList.toggle('active');
  document.body.classList.toggle('scroll-lock', sidebar.classList.contains('open'));
}

function openTab(tabId) {
  if (tabId === 'stickers') {
    document.getElementById('tab-stickers').classList.add('active');
    document.getElementById('tab-users').classList.remove('active');
    document.getElementById('link-stickers').classList.add('active');
    document.getElementById('link-users').classList.remove('active');
  } else {
    document.getElementById('tab-stickers').classList.remove('active');
    document.getElementById('tab-users').classList.add('active');
    document.getElementById('link-stickers').classList.remove('active');
    document.getElementById('link-users').classList.add('active');
  }

  toggleSidebar();
}

function openModal(modalId) {
  document.getElementById(modalId).classList.add('active');
  document.body.classList.add('scroll-lock');
}

function closeModals() {
  document.querySelectorAll('.modal-overlay').forEach(function (modal) {
    modal.classList.remove('active');
  });
  document.body.classList.remove('scroll-lock');
}

// FAQ
const faqQuestions = document.querySelectorAll('.faq__question');

faqQuestions.forEach(function (btn) {
  btn.addEventListener('click', function () {
    const item = btn.closest('.faq__item');

    document.querySelectorAll('.faq__item.active').forEach(function (el) {
      el.classList.remove('active');
    });

    item.classList.add('active');
  });
});

// Слайдер наград
const awardsTrack = document.querySelector('.awards__track');

if (awardsTrack) {
  const prevBtn = document.querySelector('.awards__btn--prev');
  const nextBtn = document.querySelector('.awards__btn--next');
  const dots = document.querySelectorAll('.awards__dot');
  let slideIndex = 0;
  const slideCount = awardsTrack.children.length;

  function showSlide(num) {
    if (num < 0) num = slideCount - 1;
    if (num >= slideCount) num = 0;
    slideIndex = num;
    awardsTrack.style.transform = 'translateX(-' + (slideIndex * 100) + '%)';

    dots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === slideIndex);
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      showSlide(slideIndex - 1);
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      showSlide(slideIndex + 1);
    });
  }

  dots.forEach(function (dot, index) {
    dot.addEventListener('click', function () {
      showSlide(index);
    });
  });
}

// Появление блоков при скролле
const observer = new IntersectionObserver(function (entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add('is-visible');
    }
  });
});

document.querySelectorAll('[data-reveal]').forEach(function (el) {
  observer.observe(el);
});
