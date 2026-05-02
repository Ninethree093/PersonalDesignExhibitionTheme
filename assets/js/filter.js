(function () {
  // === Category Filter ===
  var bar = document.getElementById('filter-bar');
  if (!bar) return;

  var buttons = bar.querySelectorAll('.filter-btn');
  var cards = document.querySelectorAll('.work-card');

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var category = btn.getAttribute('data-category');

      buttons.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');

      cards.forEach(function (card) {
        var cardCategory = card.getAttribute('data-category');
        if (category === 'all' || cardCategory === category) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // === Touch: tap-to-reveal on cards ===
  if ('ontouchstart' in window) {
    document.querySelectorAll('.card-link').forEach(function (link) {
      link.addEventListener('click', function (e) {
        if (!link.classList.contains('tapped')) {
          e.preventDefault();
          // Remove .tapped from other cards
          document.querySelectorAll('.card-link.tapped').forEach(function (l) {
            if (l !== link) l.classList.remove('tapped');
          });
          link.classList.add('tapped');
        }
        // Second tap: follow the link normally
      });
    });
  }
})();
