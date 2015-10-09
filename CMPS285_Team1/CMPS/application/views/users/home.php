<!DOCTYPE html>
<html>
<head>
	<title>SGA Connect</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/css/alertify.css">
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap-tpls.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>

	<div class="container" ng-app="myApp">

		<section>
			<h1>Code igniter + angular.js</h1>
			<br/>
			<form class="form-inline" ng-controller="FormController" ng-submit="submitForm()" role="form" method="post">
				<div class="form-group">
					<label class="sr-only" for="Source Station">Insert Your Name</label>
					<input type="text" class="form-control" placeholder="First Name: " ng-model="first_name"</input>
				</div>
				<div class="form-group">
					<label class="sr-only" for="Source Station">Insert Your City</label>
					<input type="text" class="form-control" placeholder="Last Name: " ng-model="last_name"</input>
				</div>
				<div class="form-group">
					<label class="sr-only" for="Source Station">Insert Your City</label>
					<input type="text" class="form-control" placeholder="Username: " ng-model="username"</input>
				</div>
				<div class="form-group">
					<label class="sr-only" for="Source Station">Insert Your City</label>
					<input type="text" class="form-control" placeholder="Password: " ng-model="password"</input>
				</div>
				<div class="form-group">
					<label class="sr-only" for="Source Station">Insert Your City</label>
					<input type="text" class="form-control" placeholder="E-mail: " ng-model="email"</input>
				</div>

				<button type="submit" class="btn btn-default btn-primary">Submit Record</button>
				<pre style="display:none;">{{ message }}</pre>
			</form>
			
			<br/>
			<br/>
			<br/>

			<div class="table-responsive" ng-controller="TableViewController">
				<table tasty-table class="table" id="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="row in rows">
							<td>{{ row.first_name}}</td>
							<td>{{ row.last_name }}</td>
							<td>{{ row.username }}</td>
							<td>{{ row.password }}</td>
							<td>{{ row.email }}</td>
						</tr>
					</tbody>
				</table>
			</div>

		</section>			
	</div><!-- .container -->


	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

</body>
</html>