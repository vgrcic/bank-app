@extends('layouts.app')

@section('title')

	{{ $u->first_name }} {{ $u->last_name }}

@endsection



@section('content')

	<div class="row">

		<div class="col-md-3">

			<h2>User info:</h2>
			
			<table class="table">
				
				<tr>
					<th>First name:</th>
					<td>{{ $u->first_name }}</td>
				</tr>
				
				<tr>
					<th>Last name:</th>
					<td>{{ $u->last_name }}</td>
				</tr>

				<tr>
					<th>Privileges:</th>
					<td>@if($u->admin)<span class="text-success">Admin</span>@else<span class="text-danger">None</span>@endif</td>
				</tr>

			</table>

		</div>

		<div class="col-md-8 pull-right">

			<h2>Accounts:</h2>
			
			<table class="table">

				<tr>
					<th>Account number</th>
					<th>Bank</th>
					<th>Balance</th>
				</tr>

				@foreach($u->accounts as $account)

				<tr>
					<td>{{ $account->id }}</td>
					<td>{{ $account->bank->name }}</td>
					<td>{{ $account->balance }}</td>
				</tr>
				
				@endforeach

			</table>

		</div>

	</div>

	<div>

		<h2>Transactions:</h2>
		
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
			
			@foreach($u->transactions as $transaction)

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

	</div>

@endsection