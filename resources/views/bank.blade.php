@extends('layouts.app')



@section('title')
	{{ $bank->name }}
@endsection



@section('content')

	<h1>{{ $bank->name }}</h1>

	<h3>Your accounts in this bank:</h3>

	<form method="POST" action="/accounts">
		{{ csrf_field() }}
		<input type="submit" value="New account" class="btn btn-success">
		<input type="hidden" name="bank_id" value="{{ $bank->id }}">
	</form>

	<table class="table">

		<tr>
			<th>Acc #</th><th>Balance</th><th>Actions</th>
		</tr>

	@foreach($accounts as $account)

		<tr>
			<td>{{ $account->id }}</td>
			<td>{{ $account->balance }}</td>
			<td>
				<form method="POST" action="/accounts/{{ $account->id }}">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" value="Delete account" class="btn btn-sm btn-danger">
				</form>
			</td>
		</tr>

	@endforeach

	</table>

@endsection