@extends('layouts.app')

@section('title', 'Creating a new Client')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
					<ol class="breadcrumb panel-heading">
						<li><a href="{{ route('client.index') }}">Clients</a></li>
						<li class="active">Add a new Client</li>
					</ol>
					@if ($errors->any())
    					<div class="alert alert-danger">
        					<ul>
            					@foreach ($errors->all() as $error)
                					<li>{{ $error }}</li>
            					@endforeach
        					</ul>
    					</div>
					@endif
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<form action="{{ route('client.store') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="Iname">Name:</label><input type="text" name="Nname" id="Iname" class="form-control" placeholder="Type your name here!!" required>
						</div>

						<div class="form-group">
							<label for="Iemail">E-mail:</label><input type="email" name="Nemail" id="Iemail" class="form-control" placeholder="example@gmail.com" required>
						</div>

						<div class="form-group">
							<label for="Iaddress">Address:</label><input type="text" name="Naddress" id="Iaddress" class="form-control" placeholder="type your address" maxlength="20" required>
						</div>
						<button type="submit" class="btn btn-success btn-sm btn-block">Add new Client</button>
					</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection