<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- content -->
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?= $title ?></h3>
    </div>
    <div class="panel-body">
    <!-- content -->
    	<script>
            $(function(){
                $.jGrid.newGrid({
                    target: '#target-div-list',
                    searchData : '#form_action',
                    url : '<?= site_url('user/user_c/jgrid_ajax') ?>',
                    columns : {
                        first_name : {
                            name: 'First name',
                            sortable: true,
                        },
                        last_name : {
                            name: 'Last name',
                            sortable: true,
                        },
                        middle_name : {
                            name: 'Middle name',
                            sortable: true,
                        },
                        user_name : {
                            name: 'Username',
                            sortable: true,
                        },
                        user_level : {
                            name: 'User Level',
                            sortable: true,
                        },
                        status : {
                            name: 'Status',
                            sortable: true,
                        },
                        action : {
                            name: 'Action',
                        },
                    },
                    sort: 'first_name',
                    order: 'asc',
                    limit: 10,
                    topBar: false,
                });
            });
        </script>

        <fieldset class="search-controls search-controls-two-column">
            <legend>Search Control</legend>
            <form class="form-inline" id="form_action" method="post">
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" placeholder="Last name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="user_name" placeholder="Username" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <select class="form-control" id="user_status" name="user_status">
                      <option value="active" selected="selected">active</option>
                      <option value="inactive">inactive</option>
                    </select>
                </div> -->
                <div class="form-group btn-control">
                    <button type="submit" data-jGridTarget="#target-div-list" class="btn">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </form>
        </fieldset>
        <br>
        <div id="target-div-list"></div>
    </div>
  </div>
  <a href="<?= site_url('add-user'); ?>" type="button" class="btn btn-primary pull-right">Add User</a>
</div>