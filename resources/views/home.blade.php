@extends('layouts.app')
	
@section('title')

	{{$user->first_name}} {{$user->last_name}}

@endsection

@section('content')
    	
    	<div class="row">

    		@if($user->admin)
    			<b>***** You have admin privileges *****</b>
    		@endif
    		
    	</div>

@endsection