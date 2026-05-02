(function () {
  // Apply fade-in on page load
  document.body.style.opacity = '0';
  document.body.style.transition = 'opacity 0.3s ease';
  requestAnimationFrame(function () {
    document.body.style.opacity = '1';
  });

  // Fade-out on link click (for cards and work links)
  var links = document.querySelectorAll('[data-page-transition]');
  links.forEach(function (link) {
    link.addEventListener('click', function (e) {
      var href = link.href || link.querySelector('a');
      if (!href) return;
      e.preventDefault();
      document.body.style.opacity = '0';
      setTimeout(function () {
        window.location.href = link.href || href;
      }, 200);
    });
  });
})();
