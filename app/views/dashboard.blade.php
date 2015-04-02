@extends('layouts.default')

@section('content')
	@include('includes.alert')
	{{Auth::user()->id}}
	{{Auth::user()->role_id}}
	{{Auth::user()->type}}
	{{Auth::user()->parent_id}}
	{{Session::get('role_title')}}
	
@stop