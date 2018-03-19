@extends('layouts.app')

@section('title', 'Creating a new Client')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
					<ol class="breadcrumb panel-heading">
						<li><a href="{{ route('client.index') }}">Clients</a></li>
						<li class="active">Edit Client</li>
					</ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

					<form action="{{ route('client.update', $client->id) }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
							<label for="Iname">Name:</label><input type="text" name="Nname" id="Iname" class="form-control" placeholder="Type your name here!!" value="{{$client->name}}" required>
						</div>

						<div class="form-group">
							<label for="Iemail">E-mail:</label><input type="email" name="Nemail" id="Iemail" class="form-control" placeholder="example@gmail.com" value="{{$client->email}}" required>
						</div>

						<div class="form-group">
							<label for="Iaddress">Address:</label><input type="text" name="Naddress" id="Iaddress" class="form-control" placeholder="type your address" maxlength="20" value="{{ $client->address}}" required>
						</div>
						<button type="submit" class="btn btn-success btn-sm btn-block">Edit Client</button>
					</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection