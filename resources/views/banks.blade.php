@extends('layouts.app')



@section('title')

	Banks

@endsection



@section('content')

	@isset($errors)
	<div>
		
		@foreach($errors->all() as $message)
			<div class="alert alert-danger">{{ $message }}</div>
		@endforeach

	</div>
	@endisset



	<div class="row col-md-6">
			
		<h2>Banks:</h2>

		<table class="table">

				<tr>
					<th>Name</th>

					@if($user -> admin)

						<th colspan="2">Actions</th>

					@endif

				</tr>

			@foreach($banks as $bank)

				<tr>
					<td><a href="/banks/{{ $bank->id }}">{{ $bank->name }}</a></td>

					@if ($user -> admin)

						<td>
							<a class="btn btn-sm btn-warning" href="/banks/{{$bank->id}}/edit">Edit</a>
						</td>
						<td>
							<form method="POST" action="/banks/{{$bank->id}}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" value="Delete" class="btn btn-sm btn-danger">
							</form>
						</td>

					@endif
				</tr>

			@endforeach

		</table>

	</div>

	@if ($user->admin)

		<div class="row col-md-5 pull-right">
			
			<h2>@isset($edit) Edit: {{ $edit->name }} @else Create a new bank @endisset</h2>

			<form class="form"
				  action="@isset($edit) /banks/{{ $edit->id }} @else /banks @endisset"
				  method="post" onsubmit="return validateBankCreationForm()">

				<div class="form-group">
					<label for="name">Bank name:</label>
					<input class="form-control" id="name" type="text" name="name" @isset($edit) value="{{$edit->name}}" @endisset >
					<span class="error"></span>
				</div>

				{{ csrf_field() }}

				@isset($edit)

					{{ method_field('PUT') }}
					<input type="submit" value="Update" class="btn btn-warning">

				@else

					<input type="submit" value="Create" class="btn btn-success">

				@endisset

			</form>

		</div>

	@endif

@endsection