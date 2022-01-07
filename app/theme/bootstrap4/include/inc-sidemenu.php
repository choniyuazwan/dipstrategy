<?php global $site;?> 

<ul class="navbar-nav bg-gradient-success  sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=DOMAIN?>">
    <div class="sidebar-brand-icon">
      <img src="<?=THEMEASSETS;?>img/jalu.png" width="50px" class="rounded" alt="" >
    </div>
    <div class="sidebar-brand-text mx-3"><?=$site['theme']['sitename']?></div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="<?=DOMAIN?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Lobby</span>
    </a>
  </li>
  <hr class="sidebar-divider"/>
  <div class="sidebar-heading">
    My Team
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?=DOMAIN."team"?>">
      <i class="fas fa-fw fa-file"></i>
      <span>Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mt-user" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-users"></i>
      <span>User</span>
    </a>
    <div id="mt-user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=DOMAIN."user-management"?>">Management</a>
        <a class="collapse-item" href="<?=DOMAIN."user-category"?>">Category</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mt-attendance" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-server"></i>
      <span>Attendance</span>
    </a>
    <div id="mt-attendance" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=DOMAIN."attendance-location-category"?>">Location Category</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-location"?>">Location</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-role-category"?>">Role Category</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-role"?>">Role</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-role-item"?>">Role Item</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-report"?>">Report</a>
        <a class="collapse-item" href="<?=DOMAIN."attendance-setting"?>">Setting</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider d-none d-md-block" />
 
</ul>