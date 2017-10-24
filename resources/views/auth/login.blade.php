@extends('layouts.app')


@section('title')

	Log in

@endsection



@section('content')
	
	<div class="container">

		<div class="row">

			<h1>Login form</h1>

			<div class="col-md-4">

				<form class="form" action="login" method="post" onsubmit="return validateLoginForm()">

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

					{{ csrf_field() }}

					<input type="submit" value="Log in" class="btn btn-success">
					<a class="btn btn-primary pull-right" href="/register">Register</a>

				</form>

			</div>
			
		</div>

	</div>

@endsection