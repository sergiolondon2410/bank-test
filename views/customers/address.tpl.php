<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Insert your address information</h4>
			</div>
			<div class="panel-body">
				<form action="<?= ROOT_DIR ?>/customer/store-address/<?= $customer ?>" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="street">Street:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="street" name="street" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="house">House Number:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="house" name="house" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="zip_code">Zip Code:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="zip_code" name="zip_code" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="city">City:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="city" name="city" required>
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