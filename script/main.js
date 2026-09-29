/* Public site preloader */
(function () {
  const preloader = document.getElementById('preloader');
  if (!preloader) return;
  const startedAt = performance.now();
  let dismissed = false;

  function dismissPreloader() {
    if (dismissed) return;
    dismissed = true;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const wait = Math.max(0, (reducedMotion ? 0 : 300) - (performance.now() - startedAt));
    window.setTimeout(function () {
      preloader.classList.add('fade-out');
      document.body.classList.remove('preloader-active');
      window.setTimeout(function () {
        preloader.style.display = 'none';
        preloader.setAttribute('aria-hidden', 'true');
      }, reducedMotion ? 0 : 400);
    }, wait);
  }

  document.body.classList.add('preloader-active');
  window.addEventListener('load', dismissPreloader, { once: true });
  window.addEventListener('pageshow', dismissPreloader, { once: true });
  window.setTimeout(dismissPreloader, 10000);
  if (document.readyState === 'complete') dismissPreloader();
})();