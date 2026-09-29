<div class="modal fade" id="instructorConfirmModal" tabindex="-1" aria-labelledby="instructorConfirmTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content border-0 shadow"><div class="modal-body p-4 text-center"><span class="confirm-icon"><i class="fa-solid fa-circle-question"></i></span><h2 class="h5 mt-3" id="instructorConfirmTitle">Confirm action</h2><p class="text-muted mb-0" id="instructorConfirmMessage">Continue with this action?</p></div><div class="modal-footer border-0 pt-0 justify-content-center"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" id="instructorConfirmProceed">Continue</button></div></div></div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script><script src="/instructor-dashboard/js/instructor_dashboard.js"></script><script src="/instructor-dashboard/js/main.js"></script>
<script>
(function () {
  var screen = document.getElementById('dashboardLoadingScreen');
  if (!screen) return;
  var startedAt = Date.now();
  var dismissed = false;
  function dismiss() {
    if (dismissed) return;
    dismissed = true;
    var wait = Math.max(0, 320 - (Date.now() - startedAt));
    window.setTimeout(function () {
      screen.classList.add('is-hidden');
      screen.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('dashboard-loading');
    }, wait);
  }
  window.addEventListener('load', dismiss, { once: true });
  window.addEventListener('pageshow', dismiss, { once: true });
  window.setTimeout(dismiss, 10000);
  if (document.readyState === 'complete') dismiss();
})();
</script>
</body></html>

