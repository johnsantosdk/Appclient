@extends('layouts.app')

@section('title', 'Creating a new Client')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
					<ol class="breadcrumb panel-heading">
						<li><a href="{{ route('client.index') }}">Clients</a></li>
						<li class="active">Show Client</li>
					</ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<div>
						
						
					</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection