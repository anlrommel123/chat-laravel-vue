@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-3">
                <chat-contacts :messages="messages" :selected="selectedIds" @selectedcontact="getMessages" :id="{{ Auth::id() }}" />
            </div>
            <div v-if="selectedIds.to_user_id" class="col-md-9">
                <div class="card">
                    <div class="card-header">
                       <h6><img class="rounded" src="images/avatar-5.png" alt="" width="30">&nbsp; @{{ selectedIds.to_user_name }}</h6> 
                    </div>
                    <div class="card-body">
                        <chat-messages :messages="messages" :id="{{ Auth::id() }}" />
                    </div>
                    <div class="card-footer text-muted">
                        <chat-form @messagesent="addMessage" :user="{{ Auth::user() }}" />
                    </div>
                </div>
            </div>
            <div v-else class="col-md-9 d-flex">
                <h4 class="text-center m-auto">Start conversation</h4>
            </div>
        </div>
    </div>
@endsection  

