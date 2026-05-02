(function () {
  var toggle = document.getElementById('menu-toggle');
  var nav = document.getElementById('mobile-nav');
  var overlay = document.getElementById('mobile-overlay');

  if (!toggle || !nav || !overlay) return;

  function openMenu() {
    nav.classList.add('active');
    overlay.classList.add('active');
  }

  function closeMenu() {
    nav.classList.remove('active');
    overlay.classList.remove('active');
  }

  toggle.addEventListener('click', function () {
    if (nav.classList.contains('active')) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  overlay.addEventListener('click', closeMenu);

  document.querySelectorAll('.mobile-nav-link').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });
})();
