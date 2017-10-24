@extends('layouts.app')

@section('title') Transactions @endsection

@section('content')

	<h1>All transactions:</h1>

	<table class="table">

		<tr>
			<th colspan="3">From</th>
			<th colspan="3">To</th>
			<th rowspan="2">Ammount</th>
			<th rowspan="2">Time</th>
		</tr>
		<tr>
			<th>Acc</th>
			<th>User</th>
			<th>Bank</th>
			<th>Acc</th>
			<th>User</th>
			<th>Bank</th>
		</tr>
		
		@foreach($transactions as $transaction)

			<tr>

				<td>{{ $transaction->paying_id }}</td>
				<td>{{ $transaction->paying->user->first_name }} {{ $transaction->paying->user->last_name }} </td>
				<td>{{ $transaction->paying->bank->name }}</td>

				<td>{{ $transaction->receiving_id }}</td>
				<td>{{ $transaction->receiving->user->first_name }} {{ $transaction->receiving->user->last_name }} </td>
				<td>{{ $transaction->receiving->bank->name }}</td>

				<td>{{ $transaction->ammount }}</td>
				<td>{{ $transaction->created_at }}</td>				

			</tr>
		
		@endforeach

	</table>



@endsection