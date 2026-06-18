(function () {
  'use strict';

  document.querySelectorAll('.my-sticker__download').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const sticker = btn.closest('.my-sticker');
      if (!sticker || sticker.classList.contains('my-sticker--locked')) return;

      const name = sticker.querySelector('.my-sticker__name').textContent.trim();
      const imageEl = sticker.querySelector('.my-sticker__image');
      const label = imageEl.textContent.trim();
      const color = sticker.getAttribute('data-color') || '#4ECC0A';
      const textColor = color === '#1A1A1A' ? '#FFFFFF' : '#FFFFFF';

      const canvas = document.createElement('canvas');
      const size = 400;
      canvas.width = size;
      canvas.height = size;
      const ctx = canvas.getContext('2d');

      ctx.fillStyle = color;
      ctx.fillRect(40, 40, 320, 320);

      ctx.fillStyle = textColor;
      ctx.font = '700 120px Onest, Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(label, size / 2, size / 2);

      const link = document.createElement('a');
      link.download = name.replace(/\s+/g, '-').toLowerCase() + '.png';
      link.href = canvas.toDataURL('image/png');
      link.click();
    });
  });
})();
