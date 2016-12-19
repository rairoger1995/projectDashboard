<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="wrapper">
  <!-- Sidebar -->
  <div id="sidebar-wrapper">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

          <li class="active">
              <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                 <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="#">link1</a></li>
                  <li><a href="#">link2</a></li>
              </ul>
          </li>
          <li>
              <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> CONSUMER</a>
              <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                <li><a href="<?= site_url('generalconsumer') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>General</a></li>
                <li><a href="<?= site_url('hnwi') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>HNWI</a></li>
              </ul>
          </li>
          <li>
              <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> FINANCIAL PROFESSIONALS</a>
              <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                <li><a href="<?= site_url('generalconsumer') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>General</a></li>
                <li><a href="<?= site_url('hnwi') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Accountants DB</a></li>
                <li><a href="<?= site_url('generalconsumer') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Financial Planners DB</a></li>
                <li><a href="<?= site_url('hnwi') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Mortgage Brokers DB</a></li>
              </ul>
          </li>
          <li>
              <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> PROFESSIONALS</a>
              <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                <li><a href="<?= site_url('healthcare') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Healthcare Providers</a></li>
                <li><a href="<?= site_url('childcare') ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Childcare Providers</a></li>
              </ul>
          </li>
      </ul>
  </div><!-- /#sidebar-wrapper -->
  <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">