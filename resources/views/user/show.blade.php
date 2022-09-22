@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Rol Id:</strong>
                            {{ $user->rol_id }}
                        </div>
                        <div class="form-group">
                            <strong>Document Type Id:</strong>
                            {{ $user->document_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Document Number:</strong>
                            {{ $user->document_number }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $user->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Date Birth:</strong>
                            {{ $user->date_birth }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $user->address }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $user->status }}
                        </div>
                        <div class="form-group">
                            <strong>User Creator:</strong>
                            {{ $user->user_creator }}
                        </div>
                        <div class="form-group">
                            <strong>User Last Update:</strong>
                            {{ $user->user_last_update }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
