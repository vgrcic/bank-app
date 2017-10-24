@extends('layouts.app')

@section('title') Transactions @endsection

@section('content')

	<h1>Your transactions:</h1>

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
		
		@foreach($user->transactions as $transaction)

			{{-- Transactions are received as Database collections, NOT Eloquent --}}

			<tr>
				
				<td>{{ $transaction->paying_account_id }}</td>
				<td>{{ $transaction->paying_first }} {{ $transaction->paying_last }} </td>
				<td>{{ $transaction->paying_bank_name }}</td>

				<td>{{ $transaction->receiving_account_id }}</td>
				<td>{{ $transaction->receiving_first }} {{ $transaction->receiving_last }} </td>
				<td>{{ $transaction->receiving_bank_name }}</td>

				<td>{{ $transaction->ammount }}</td>
				<td>{{ $transaction->created_at }}</td>
				

			</tr>
		
		@endforeach

	</table>

@endsection