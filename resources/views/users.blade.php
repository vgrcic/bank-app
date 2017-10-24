@extends('layouts.app')



@section('title')

	Users

@endsection



@section('content')

	<h1>All users</h1>

	<div class="col-md-10">

		<table class="table">
			
			<tr>
				<th>Name</th>
				<th>Privileges</th>
				<th>Actions</th>
			</tr>

			@foreach($users as $user)

			<tr>
				<td><a href="/users/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
				<td>@if($user->admin) <span class="text-success">Admin</span> @else <span class="text-danger">none</span> @endif </td>
				<td><form action="/users/{{$user->id}}/privileges" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<input type="submit"
							@if($user->admin) value="Revoke privileges" class="btn btn-sm btn-warning"
							@else value="Grant privileges" class="btn btn-sm btn-success"
							@endif >
					</form></td>
				<td>
					<form action="/users/{{$user->id}}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="Delete" class="btn btn-sm btn-danger">
					</form>
				</td>
			</tr>

			@endforeach

		</table>

	</div>

@endsection