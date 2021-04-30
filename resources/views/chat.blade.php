@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <chat-contacts @selectedcontact="getMessages" :contacts="contacts" :id="{{ Auth::id() }}" />
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h4>Chats</h4> 
                    </div>
                    <div class="card-body">
                        <chat-messages :messages="messages" :id="{{ Auth::id() }}" />
                    </div>
                    <div class="card-footer text-muted">
                        <chat-form @messagesent="addMessage" :user="{{ Auth::user() }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  