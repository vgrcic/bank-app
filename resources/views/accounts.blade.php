@extends('layouts.app')

@section('title') Accounts @endsection

@section('content')

	<div class="col-md-6">

		<h1>Your accounts:</h1>

		<table class="table">

			<tr>
				<th>Acc #</th>
				<th>Bank</th>
				<th>Balance</th>
				<th>Actions</th>
			</tr>

		@foreach($accounts as $account)

			<tr>
				<td><a href="/accounts/{{ $account->id }}">{{ $account->id }}</a></td>
				<td><a href="/banks/{{ $account->bank_id }}">{{ $account->bank->name }}</a></td>
				<td>{{ $account->balance }}</td>
				<td>
					<form method="POST" action="/accounts/{{ $account->id }}">
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