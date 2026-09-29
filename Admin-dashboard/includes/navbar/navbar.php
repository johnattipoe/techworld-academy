<?php $dashboardLanguage = (string)($_SESSION['dashboard_language_admin'] ?? 'en'); ?>
<header class="admin-topbar">
  <div class="topbar-start">
    <button class="icon-button sidebar-toggle" id="toggleSidebar" type="button" aria-label="Open navigation" aria-controls="adminSidebar" aria-expanded="false">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="topbar-heading"><span class="eyebrow">TECHWORLD ACADEMY</span><span class="topbar-title">Admin workspace</span></div>
  </div>
  <div class="topbar-actions"><div class="dropdown dashboard-language"><button class="icon-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Language"><i class="fa-solid fa-globe"></i><span><?= strtoupper(htmlspecialchars($dashboardLanguage, ENT_QUOTES, 'UTF-8')) ?></span></button><ul class="dropdown-menu dropdown-menu-end shadow border-0"><li><a class="dropdown-item" lang="en" href="<?= htmlspecialchars(dashboard_lang_url('en'), ENT_QUOTES, 'UTF-8') ?>">English</a></li><li><a class="dropdown-item" lang="es" href="<?= htmlspecialchars(dashboard_lang_url('es'), ENT_QUOTES, 'UTF-8') ?>">Español</a></li><li><a class="dropdown-item" lang="fr" href="<?= htmlspecialchars(dashboard_lang_url('fr'), ENT_QUOTES, 'UTF-8') ?>">Français</a></li></ul></div>
    <form class="topbar-search" role="search" action="/Admin-dashboard/user_management/user_management.php" method="get">
      <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
      <input type="search" name="search" placeholder="Search users" aria-label="Search users">
      <kbd>Ctrl K</kbd>
    </form>
    <a class="icon-button notification-button" href="/Admin-dashboard/Messaging/inbox/inbox.php" aria-label="Open inbox"><i class="fa-regular fa-bell"></i><span class="notification-dot"></span></a>
    <div class="dropdown">
      <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="profile-avatar"><?= strtoupper(substr((string)($_SESSION['username'] ?? 'A'), 0, 1)) ?></span>
        <span class="profile-copy"><strong><?= htmlspecialchars((string)($_SESSION['username'] ?? 'Administrator'), ENT_QUOTES, 'UTF-8') ?></strong><small>Administrator</small></span>
        <i class="fa-solid fa-chevron-down profile-chevron"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
        <li><a class="dropdown-item" href="/Admin-dashboard/profile/profile.php"><i class="fa-regular fa-user me-2"></i>My profile</a></li>
        <li><a class="dropdown-item" href="/Admin-dashboard/Settings/settings.php"><i class="fa-solid fa-gear me-2"></i>Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="/authenication/logout/logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Sign out</a></li>
      </ul>
    </div>
  </div>
</header>
<div class="sidebar-backdrop" id="sidebarBackdrop" hidden></div>

