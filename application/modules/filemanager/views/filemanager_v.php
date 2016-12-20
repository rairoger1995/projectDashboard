<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">File Manager</div>
		<div class="panel-body">
			<ul>
				<?php foreach($rs as $count => $record) : ?>

					<li><?php echo $record['filename'] ?></li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>