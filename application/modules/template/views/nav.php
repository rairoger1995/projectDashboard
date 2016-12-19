<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-default no-margin">
<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header fixed-brand">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('home'); ?>">Insert Compnay Name</a>
  </div><!-- navbar-header-->

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <!-- <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li> -->
        <li><a href="<?= site_url('home'); ?>">Home</a></li>
        <?php
        if($_SESSION['user_level'] == '1') : ?>
          <li><a href="<?= site_url('users_manage'); ?>">User Manager</a></li>
        <?php endif;
        ?>
        <li><a href="<?= site_url('file_manager'); ?>">File Manager</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?= $_SESSION['name'] ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= site_url('logout'); ?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- bs-example-navbar-collapse-1 -->
</nav>