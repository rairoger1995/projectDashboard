<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- style -->
<style>
label {
    width: 100px;
    display: inline-block;
}
</style>
<!-- 
<?= anchor('list-of-users', lang('list_of_users'), 'class="btn btn-primary"') ?>
<?= anchor('Register_user', lang('add_user'), 'class="btn btn-primary"') ?> -->


<!-- content -->
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?= $title ?></h3>
    </div>
    <div class="panel-body">
		<?php if(@$_message) : ?>
			<?php foreach($_message as $msg) : ?>
				<div class="<?= $msg['message_type'] ?> alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?= $msg['message'] ?>
				</div>
			<?php endforeach // foreach($_message as $msg) ?>
		<?php endif // if(@$_message) ?>

		<div class="container">
			<?= lang('first_name', 'first_name') ?>
			<?= @$rs->first_name ? $rs->first_name : '-' ?>
			<br>
			<?= lang('last_name', 'last_name') ?>
			<?= @$rs->last_name ? $rs->last_name : '-' ?>
			<br>
			<?= lang('middle_name', 'middle_name') ?>
			<?= @$rs->middle_name ? $rs->middle_name : '-' ?>
			<br>
			<?= lang('user_level', 'user_level') ?>
			<?= @$rs->user_level ? $rs->user_level : '-' ?>
			<br>
			<?= lang('status', 'status') ?>
			<?= @$rs->status ? $rs->status : '-' ?>
		</div>
		<div class="pull-right">
			<?= anchor('users_manage', lang('list_of_users'), 'class="btn btn-primary"') ?>
			<?php if(@$rs->id) : ?>
				<?= anchor("edit-user/$rs->id", lang('edit_user'), 'class="btn btn-primary"') ?>
			<?php endif // if(@$rs->ID) ?>
		</div>
	</div>
  </div>
</div>