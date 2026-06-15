(function () {
  'use strict';

  const sidebar = document.querySelector('.admin-sidebar');

  function closeSidebar() {
    if (sidebar) sidebar.classList.remove('open');
    const overlay = document.querySelector('.admin-overlay');
    if (overlay) overlay.classList.remove('active');
    const burger = document.querySelector('.burger');
    if (burger) burger.classList.remove('active');
    document.body.style.overflow = '';
  }

  /* Tab switching */
  const tabLinks = document.querySelectorAll('.admin-sidebar__link[data-tab]');
  const tabs = document.querySelectorAll('.admin-tab');

  tabLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const tabId = link.getAttribute('data-tab');

      tabLinks.forEach(function (l) { l.classList.remove('active'); });
      link.classList.add('active');

      tabs.forEach(function (tab) {
        tab.classList.toggle('active', tab.id === 'tab-' + tabId);
      });

      closeSidebar();
    });
  });

  /* Modal */
  const openModalBtn = document.querySelector('.js-open-modal');
  const modal = document.querySelector('.modal-overlay');
  const closeModalBtns = document.querySelectorAll('.js-close-modal');

  function openModal() {
    if (modal) modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    if (modal) modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (openModalBtn) {
    openModalBtn.addEventListener('click', openModal);
  }

  closeModalBtns.forEach(function (btn) {
    btn.addEventListener('click', closeModal);
  });

  if (modal) {
    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeModal();
    });
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });
})();
