(function () {
  var reveals = document.querySelectorAll('.reveal');
  if (!reveals.length) return;

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var el = entry.target;
        var siblings = Array.from(el.parentElement.children).filter(function (c) {
          return c.classList.contains('reveal') && !c.classList.contains('visible');
        });
        var index = siblings.indexOf(el);
        el.style.transitionDelay = (index * 100) + 'ms';
        el.classList.add('visible');
        observer.unobserve(el);
      }
    });
  }, { threshold: 0.1 });

  reveals.forEach(function (el) {
    observer.observe(el);
  });
})();
