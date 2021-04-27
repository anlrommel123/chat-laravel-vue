@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h4>Chats</h4> 
                    </div>
                    <div class="card-body">
                        <chat-messages :messages="messages" />
                    </div>
                    <div class="card-footer text-muted">
                        <chat-form @messagesent="addMessage" :user="{{ Auth::user() }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  