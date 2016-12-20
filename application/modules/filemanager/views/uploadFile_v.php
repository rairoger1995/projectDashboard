<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Upload File</div>
		<div class="panel-body">
			
			<!-- form error message -->
			<?php if(@$_message) : ?>
			<div class="<?= $_message['message_type'] ?>">
				<?= $_message['message'] ?>
			</div>
			<?php endif // if(@$_message) ?>

			<form action="upload" method="POST" enctype="multipart/form-data" >
			    Select File To Upload:<br />
			    <input type="file" name="userfile"/>
			    <br/>
			    <input type="submit" name="submit" value="Upload" class="btn btn-success" />
			</form>
		</div>
	</div>
</div>