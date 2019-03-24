<div class="row">
	<div class="col-md-9">
		<?php if($success): ?>
			<div class="alert alert-success" role="alert">The data was saved successfully</div>
			<div class="panel panel-default">
				<div class="panel-heading">Payment Data ID:</div>
				<div class="panel-body">
					<?= $message ?>
				</div>
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert"><?= $message ?></div>
		<?php endif ?>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<a href="<?= ROOT_DIR ?>" class="btn btn-success"><i class="fa fa-home"></i> Go home</a>
	</div>
</div>