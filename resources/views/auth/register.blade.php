@extends('layouts.app')



@section('title')

	Register

@endsection



@section('content')
	
	<div class="container">

		<div class="row">

			<h1>Registration form</h1>

			<div class="col-md-4">

				<form class="form" action="register" method="post" onsubmit="return validateRegistrationForm()">

					<div class="form-group">
						<label for="first_name">First name:</label>
						<input id="first_name" class="form-control" type="text" name="first_name">
						<span class="error"></span>
					</div>

					<div class="form-group">
						<label for="last_name">Last name:</label>
						<input id="last_name" class="form-control" type="text" name="last_name">
						<span class="error"></span>
					</div>

					<div class="form-group">
						<label for="email">E-mail:</label>
						<input id="email" class="form-control" type="text" name="email">
						<span class="error"></span>
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input id="password" class="form-control" type="password" name="password">
						<span class="error"></span>
					</div>

					<div class="form-group">
						<label for="password_confirmation">Repeat password:</label>
						<input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
						<span class="error"></span>
					</div>

					{{ csrf_field() }}

					<input type="submit" value="Register" class="btn btn-success">

				</form>

			</div>
			
		</div>

	</div>

@endsection