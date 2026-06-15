(function () {
  'use strict';

  function initSlider(config) {
    const track = document.querySelector(config.track);
    if (!track) return;

    const prevBtn = document.querySelector(config.prev);
    const nextBtn = document.querySelector(config.next);
    const dots = document.querySelectorAll(config.dots);
    let currentSlide = 0;
    const totalSlides = track.children.length;

    function goToSlide(index) {
      if (index < 0) index = totalSlides - 1;
      if (index >= totalSlides) index = 0;
      currentSlide = index;
      track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

      dots.forEach(function (dot, i) {
        dot.classList.toggle('active', i === currentSlide);
      });
    }

    if (prevBtn) prevBtn.addEventListener('click', function () { goToSlide(currentSlide - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goToSlide(currentSlide + 1); });

    dots.forEach(function (dot, i) {
      dot.addEventListener('click', function () { goToSlide(i); });
    });

    if (config.autoplay) {
      setInterval(function () {
        goToSlide(currentSlide + 1);
      }, config.autoplay);
    }
  }

  document.querySelectorAll('.faq__question').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const item = btn.closest('.faq__item');
      const isActive = item.classList.contains('active');

      document.querySelectorAll('.faq__item.active').forEach(function (el) {
        el.classList.remove('active');
      });

      if (!isActive) {
        item.classList.add('active');
      }
    });
  });

  initSlider({
    track: '.awards__track',
    prev: '.awards__btn--prev',
    next: '.awards__btn--next',
    dots: '.awards__dot',
    autoplay: 7000
  });
})();
