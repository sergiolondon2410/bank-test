<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Insert payment information</h4>
			</div>
			<div class="panel-body">
				<form action="<?= ROOT_DIR ?>/payment/store/<?= $customer ?>" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="account_owner">Account Owner:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="account_owner" name="account_owner" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="iban">IBAN:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="iban" name="iban" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Next <i class="fa fa-angle-double-right"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<a href="<?= ROOT_DIR ?>" class="btn btn-danger"><i class="fa fa-times"></i> Continue later</a>
	</div>
</div>