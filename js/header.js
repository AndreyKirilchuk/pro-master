(function () {
  'use strict';

  /* Theme toggle */
  const themeToggle = document.querySelector('.theme-toggle');
  const savedTheme = localStorage.getItem('promaster-theme');

  if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', function () {
      document.body.classList.toggle('dark-theme');
      const isDark = document.body.classList.contains('dark-theme');
      localStorage.setItem('promaster-theme', isDark ? 'dark' : 'light');
    });
  }

  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.header__nav');
  const isAdminPage = document.body.classList.contains('admin-page');
  const adminSidebar = document.querySelector('.admin-sidebar');
  const adminOverlay = document.querySelector('.admin-overlay');

  function closeAdminSidebar() {
    if (adminSidebar) adminSidebar.classList.remove('open');
    if (adminOverlay) adminOverlay.classList.remove('active');
    if (burger) burger.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (burger) {
    burger.addEventListener('click', function () {
      if (isAdminPage && adminSidebar) {
        adminSidebar.classList.toggle('open');
        if (adminOverlay) adminOverlay.classList.toggle('active');
        burger.classList.toggle('active');
        document.body.style.overflow = adminSidebar.classList.contains('open') ? 'hidden' : '';
        return;
      }

      if (nav) {
        burger.classList.toggle('active');
        nav.classList.toggle('open');
        document.body.style.overflow = nav.classList.contains('open') ? 'hidden' : '';
      }
    });
  }

  if (nav && !isAdminPage) {
    nav.querySelectorAll('.header__nav-link').forEach(function (link) {
      link.addEventListener('click', function () {
        burger.classList.remove('active');
        nav.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  if (adminOverlay) {
    adminOverlay.addEventListener('click', closeAdminSidebar);
  }
})();
