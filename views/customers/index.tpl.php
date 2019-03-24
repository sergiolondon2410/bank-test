<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Insert your personal information</h4>
			</div>
			<div class="panel-body">
				<form action="<?= ROOT_DIR ?>/customer/store" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="first_name">First Name:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="first_name" name="first_name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="last_name">Last Name:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="last_name" name="last_name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="phone">Telephone:</label>
							</div>
							<div class="col-md-8">
								<input type="text" id="phone" name="phone" required>
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