<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">File Manager</div>
		<div class="panel-body">
			<form action="upload" method="POST" enctype="multipart/form-data" >
			    Select File To Upload:<br />
			    <input type="file" name="userfile"/>
			    <br/>
			    <input type="submit" name="submit" value="Upload" class="btn btn-success" />
			</form>
		</div>
	</div>
</div>