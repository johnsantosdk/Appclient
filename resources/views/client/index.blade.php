@extends('layouts.app')

@section('title', 'Client')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li class="active">Clients</li>
                    </ol>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>
                        <a href="{{ route('client.create') }}"><button type="button" class="btn btn-primary btn-sm btn-block">Add Client</button></a>
                    </p>
                    <table class="table table-dark" id="table">
                        <a href="#" class="create-modal btn btn-success btn-lg pull-right">
                            <span class="">Add</span><!--glyphicon glyphicon-plus-->
                        </a>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action<th>
                            </tr>
                        </thead>
                        <tbody id="clients-list">
                             @foreach ($clients as $client)
                                <tr id="client{{$client->id}}">
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>
                                        <a  href="#"
                                            class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#infoClientModal"
                                            data-id="{{$client->id}}"
                                            data-name="{{$client->name}}"
                                            data-email="{{$client->email}}"
                                            data-address="{{$client->address}}"
                                            id="info">
                                            <span class="">Info</span><!--glyphicon glyphicon-eye-open  -->
                                        </a>
                                        <a  href="#"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#editClientModal"
                                            data-id="{{$client->id}}"
                                            data-name="{{$client->name}}"
                                            data-email="{{$client->email}}"
                                            data-address="{{$client->address}}"
                                            id="edit">
                                            <span class="">Edit</span><!-- glyphicon glyphicon-pencil -->
                                        </a>
                                        <a  href="#"
                                            class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#deleteClientModal"
                                            data-id="{{$client->id}}"
                                            data-name="{{$client->name}}"
                                            data-email="{{$client->email}}"
                                            data-address="{{$client->address}}"
                                            id="del">
                                            <span class="">Delete</span><!-- glyphicon glyphicon-trash -->
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfooter class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action<th>
                            </tr>
                        </tfooter>
                    </table>

                    <div align="center">
                        {!! $clients->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Info --}}
@include('modals.modal-info-client')
{{-- Modal create --}}
@include('modals.modal-create-client')
{{-- Modal delete --}}
@include('modals.modal-delete-client')
{{-- Modal edit --}}
@include('modals.modal-edit-client')
<!--Scripts-->


@endsection