<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- content -->
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?= $title ?></h3>
    </div>
    <div class="panel-body">
    <!-- content -->
    	
		<!-- form error message -->
		<?php if(@$_message) : ?>
		<div class="<?= $_message['message_type'] ?>">
			<?= $_message['message'] ?>
		</div>
		<?php endif // if(@$_message) ?>

		<?= form_open() ?>

			<div class="form-group">
				<?= lang('first_name', 'first_name') ?>
				<?= form_input('first_name', set_value('first_name', @$rs->first_name ? $rs->first_name : ''), 'class="form-control"') ?>
				<?= form_error('first_name') ?>
			</div>
			<div class="form-group">
				<?= lang('last_name', 'last_name') ?>
				<?= form_input('last_name', set_value('last_name', @$rs->last_name ? $rs->last_name : ''), 'class="form-control"') ?>
				<?= form_error('last_name') ?>
			</div>
			<div class="form-group">
				<?= lang('middle_name', 'middle_name') ?>
				<?= form_input('middle_name', set_value('middle_name', @$rs->middle_name ? $rs->middle_name : ''), 'class="form-control"') ?>
				<?= form_error('middle_name') ?>
			</div>
			<div class="form-group">
				<?= lang('user_name', 'user_name') ?>
				<?= form_input('user_name', set_value('user_name', @$rs->user_name ? $rs->user_name : ''), 'class="form-control"') ?>
				<?= form_error('user_name') ?>
			</div>
			<div class="form-group">
				<?= lang('password', 'password') ?>
				<?= form_input('password', set_value('password', @$rs->password ? '' : ''), 'class="form-control"') ?>
				<?= form_error('password') ?>
			</div>
			<div class="form-group">
				<?= lang('user_level', 'user_level') ?>
				<?= form_dropdown('user_level', [
					''  => '- Select one -',
					'1' => 'Super Admin',
					'2' => 'Admin',
					'3' => 'User'
				], set_value('user_level', @$rs->user_level ? $rs->user_level : ''), 'class="form-control"') ?>
				<?= form_error('user_level') ?>
			</div>
			<div class="form-group">
				<?= lang('status', 'status') ?>
				<?= form_dropdown('status', [
					''  => '- Select one -',
					'1' => 'Active',
					'2' => 'Inactive'
				], set_value('status', @$rs->status ? $rs->status : ''), 'class="form-control"') ?>
				<?= form_error('status') ?>
			</div>

			<!-- submit -->
			<div class="form-group">
				<?= form_button([
					'content' => lang('submit'),
					'type'    => 'submit',
					'class'	  => 'btn btn-primary pull-right'
				]) ?>

  				<a href="<?= site_url('users_manage'); ?>" type="button" class="btn btn-danger pull-right">Cancel</a>
			</div>
		<?= form_close() ?>
    </div>
  </div>
</div>
