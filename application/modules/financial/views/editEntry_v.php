<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- content -->
<div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><?= $title ?></h3>
</div>
<div class="panel-body">
	<!-- form error message -->
	<?php if(@$_message) : ?>
	<div class="<?= $_message['message_type'] ?>">
		<?= $_message['message'] ?>
	</div>
	<?php endif // if(@$_message) ?>

	<?= form_open() ?>
		<div class="col-md-6">
			<div class="form-group">
				<?= lang('email', 'email') ?>
				<?= form_input('email', set_value('email', @$rs->email ? $rs->email : ''), 'class="form-control"') ?>
				<?= form_error('email') ?>
			</div>
			<div class="form-group">
				<?= lang('first_name', 'first_name') ?>
				<?= form_input('first_name', set_value('first_name', @$rs->first_name ? $rs->first_name : ''), 'class="form-control"') ?>
				<?= form_error('first_name') ?>
			</div>
			<div class="form-group">
				<?= lang('last_name', 'last_name') ?>
				<?= form_input('last_name', set_value('first_name', @$rs->last_name ? $rs->last_name : ''), 'class="form-control"') ?>
				<?= form_error('last_name') ?>
			</div>
			<div class="form-group">
				<?= lang('uniqueid', 'uniqueid') ?>
				<?= form_input('uniqueid', set_value('uniqueid', @$rs->uniqueid ? $rs->uniqueid : ''), 'class="form-control"') ?>
				<?= form_error('uniqueid') ?>
			</div>
			<div class="form-group">
				<?= lang('phone', 'phone') ?>
				<?= form_input('phone', set_value('phone', @$rs->phone ? $rs->phone : ''), 'class="form-control"') ?>
				<?= form_error('phone') ?>
			</div>
			<div class="form-group">
				<?= lang('role', 'role') ?>
				<?= form_input('role', set_value('role', @$rs->role ? $rs->role : ''), 'class="form-control"') ?>
				<?= form_error('role') ?>
			</div>
			<div class="form-group">
				<?= lang('companyName', 'companyName') ?>
				<?= form_input('companyName', set_value('companyName', @$rs->companyName ? $rs->companyName : ''), 'class="form-control"') ?>
				<?= form_error('companyName') ?>
			</div>
			<div class="form-group">
				<?= lang('officeLocation', 'officeLocation') ?>
				<?= form_input('officeLocation', set_value('officeLocation', @$rs->officeLocation ? $rs->officeLocation : ''), 'class="form-control"') ?>
				<?= form_error('officeLocation') ?>
			</div>
			<div class="form-group">
				<?= lang('suburb', 'suburb') ?>
				<?= form_input('suburb', set_value('suburb', @$rs->suburb ? $rs->suburb : ''), 'class="form-control"') ?>
				<?= form_error('suburb') ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?= lang('state', 'state') ?>
				<?= form_input('state', set_value('state', @$rs->state ? $rs->state : ''), 'class="form-control"') ?>
				<?= form_error('state') ?>
			</div>
			<div class="form-group">
				<?= lang('postcode', 'postcode') ?>
				<?= form_input('postcode', set_value('postcode', @$rs->postcode ? $rs->postcode : ''), 'class="form-control"') ?>
				<?= form_error('postcode') ?>
			</div>
			<div class="form-group">
				<?= lang('age', 'age') ?>
				<?= form_input('age', set_value('age', @$rs->age ? $rs->age : ''), 'class="form-control"') ?>
				<?= form_error('age') ?>
			</div>
			<div class="form-group">
				<?= lang('gender', 'gender') ?>
				<?= form_input('gender', set_value('gender', @$rs->gender ? $rs->gender : ''), 'class="form-control"') ?>
				<?= form_error('gender') ?>
			</div>
			<div class="form-group">
				<?= lang('yearsadviser', 'yearsadviser') ?>
				<?= form_input('yearsadviser', set_value('yearsadviser', @$rs->yearsadviser ? $rs->yearsadviser : ''), 'class="form-control"') ?>
				<?= form_error('yearsadviser') ?>
			</div>
			<div class="form-group">
				<?= lang('source', 'source') ?>
				<?= form_input('source', set_value('source', @$rs->source ? $rs->source : ''), 'class="form-control"') ?>
				<?= form_error('source') ?>
			</div>
			<div class="form-group">
				<?= lang('softbounce', 'softbounce') ?>
				<?= form_input('softbounce', set_value('softbounce', @$rs->softbounce ? $rs->softbounce : ''), 'class="form-control"') ?>
				<?= form_error('softbounce') ?>
			</div>
			<div class="form-group">
				<?= lang('reason', 'reason') ?>
				<?= form_input('reason', set_value('reason', @$rs->reason ? $rs->reason : ''), 'class="form-control"') ?>
				<?= form_error('reason') ?>
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
