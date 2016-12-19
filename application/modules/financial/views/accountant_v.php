<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- content -->
<div class="col-sm-10 col-md-10">
    <a class="btn btn-info">Add Entry</a>
    
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?= $title ?></h3>
		</div>
		<fieldset class="search-controls search-controls-two-column">
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
                <div class="form-group">
                    <select class="form-control" id="user_status" name="user_status">
                      <option value="active" selected="selected">active</option>
                      <option value="inactive">inactive</option>
                    </select>
                </div>
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
