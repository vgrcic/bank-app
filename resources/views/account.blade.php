@extends('layouts.app')



@section('title')

	Account

@endsection



@section('content')

	<div class="row">

		<div class="col-md-5">

			<h2>Account info</h2>
			
			<table class="table">
				
				<tr>
					<th>Account number</th>
					<td>{{ $account->id }}</td>
				</tr>
				<tr>
					<th>Account owner</th>
					<td>{{ $account->user->first_name }} {{ $account->user->last_name }}</td>
				</tr>
				<tr>
					<th>Bank name</th>
					<td>{{ $account->bank->name }}</td>
				</tr>
				<tr>
					<th>Balance</th>
					<td>{{ $account->balance }}</td>
				</tr>

			</table>

		</div>


		<div class="col-md-1"></div>



		<div class="col-md-4">

			<h2>Make payment</h2>
			
			<form method="POST" action="/accounts/{{ $account->id }}" class="form">

				<div class="form-group">
					<label for="receiving">Enter the receiving account number:</label>
					<input type="text" name="receiving" id="receiving" class="form-control">
				</div>

				<div class="form-group">
					<label for="ammount">Enter the ammount:</label>
					<input type="text" name="ammount" id="ammount" class="form-control">
				</div>

				{{ csrf_field() }}

				<input type="submit" value="Perform transaction" class="btn btn-success">

			</form>

		</div>

	</div>

	<div class="col-md-8">

		<h2>Transactions</h2>
		
		<table class="table">

			<tr>
				<th></th>
				<th>Account number</th>
				<th>Ammount</th>
				<th>Time</th>
			</tr>
			
			@foreach($account->transactions() as $transaction)

				<tr>
					<td>@if($transaction->paying_id === $account->id) To @else From @endif</td>
					<td>{{ $transaction->receiving_id }}</td>
					<td>{{ $transaction->ammount }}</td>
					<td>{{ $transaction->created_at }}</td>
				</tr>

			@endforeach

		</table>

	</div>

@endsection