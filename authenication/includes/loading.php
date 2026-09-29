<?php
// Lightweight loader for the standalone authentication screens.
?>
<style>
#authPageLoader{position:fixed;inset:0;z-index:30000;display:grid;place-items:center;padding:24px;background:radial-gradient(circle at 18% 20%,rgba(74,116,255,.15),transparent 32%),radial-gradient(circle at 84% 78%,rgba(34,197,173,.14),transparent 34%),#f5f8fc;opacity:1;visibility:visible;transition:opacity .3s ease,visibility .3s ease}
#authPageLoader.is-hidden{opacity:0;visibility:hidden;pointer-events:none}
body.auth-loader-active{overflow:hidden}
.auth-loader-card{display:grid;justify-items:center;gap:12px;min-width:min(300px,88vw);padding:28px 36px;border:1px solid rgba(148,163,184,.22);border-radius:22px;background:rgba(255,255,255,.95);box-shadow:0 24px 70px rgba(26,39,71,.14);color:#17233e;text-align:center}
.auth-loader-brand{display:grid;place-items:center;width:62px;height:62px;border-radius:19px;background:linear-gradient(135deg,#536dfe,#20b8a7);color:white;font-size:27px;box-shadow:0 10px 24px rgba(83,109,254,.24)}
.auth-loader-spinner{width:25px;height:25px;border:3px solid rgba(83,109,254,.18);border-top-color:#536dfe;border-radius:50%;animation:auth-loader-spin .75s linear infinite}
.auth-loader-title{font:700 16px/1.3 system-ui,sans-serif}
.auth-loader-caption{color:#718096;font:400 13px/1.4 system-ui,sans-serif}
@keyframes auth-loader-spin{to{transform:rotate(360deg)}}
@media(prefers-reduced-motion:reduce){#authPageLoader{transition:none}.auth-loader-spinner{animation:none}}
</style>
<div id="authPageLoader" role="status" aria-live="polite" aria-label="Loading account page">
  <div class="auth-loader-card"><span class="auth-loader-brand" aria-hidden="true"><i class="fa-solid fa-graduation-cap"></i></span><span class="auth-loader-spinner" aria-hidden="true"></span><strong class="auth-loader-title">Loading TechWorld Academy</strong><span class="auth-loader-caption">Preparing your account page</span><span class="visually-hidden">Loading page content...</span></div>
</div>
<script>
(function(){
  var loader=document.getElementById('authPageLoader');
  if(!loader)return;
  var started=Date.now(),done=false;
  function hide(){
    if(done)return;
    done=true;
    var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var wait=Math.max(0,(reduce?0:250)-(Date.now()-started));
    window.setTimeout(function(){
      loader.classList.add('is-hidden');
      loader.setAttribute('aria-hidden','true');
      document.body.classList.remove('auth-loader-active');
      window.setTimeout(function(){loader.style.display='none';},reduce?0:350);
    },wait);
  }
  document.body.classList.add('auth-loader-active');
  window.addEventListener('load',hide,{once:true});
  window.addEventListener('pageshow',hide,{once:true});
  window.setTimeout(hide,10000);
  if(document.readyState==='complete')hide();
})();
</script>
