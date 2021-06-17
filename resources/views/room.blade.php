@extends('layouts.main')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')
    <style>
        .list-group-item {
            padding-left: 3rem;
        }

        #user_list {

        }

        #chat_bar {
            position: sticky;
            top: 100vh;
            background-color: #c6c6c6;
        }

        #chat_box {
            height: 60vh;
            /* border: 1px dashed red; */
        }

        .bubble-chat-left {
            border-radius: 2rem 2rem 2rem 0;
        }

        .bubble-chat-right {
            border-radius: 2rem 2rem 0 2rem;
            background-color: #c6deff;
        }

    </style>
@endsection

{{-- TITLE --}}
@section('title', 'Room')

{{-- CONTENT --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-body p-0 overflow-hidden rounded-0" style="height: 70vh;">
                    <div class="row">

                        {{-- User List --}}
                        <div class="col-3 bg-white p-0 overflow-auto" style="height: 70vh;">
                            <ul id="user_list" class="list-group rounded-0">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                        <div class="col small mt-1">
                                            Getting room users...
                                        </div>
                                    </div>
                                </li>
                                {{-- @for ($i = 0; $i < 50; $i++)
                                    <li class="list-group-item">User #{{ $i+1 }}</li>
                                @endfor --}}
                            </ul>
                        </div>

                        {{-- Chat --}}
                        <div class="col-9 bg-light">
                            <div id="chat_box" class="overflow-auto p-3">
                                <div class="row justify-content-start">
                                    <div class="col-auto pr-0">
                                        <img src="https://i.pravatar.cc/40?u=agung" alt="profile pic" class="profil-pic rounded-circle">
                                    </div>
                                    <div class="col-5 pl-0">
                                        <div class="card bubble-chat-left">
                                            <div class="card-body">
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente illum molestiae est libero quibusdam aliquid, voluptates deleniti consectetur quos dolorem voluptas exercitationem quas. Numquam laudantium facilis autem explicabo consequatur aut!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-5 pr-0">
                                        <div class="card bubble-chat-right">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0">
                                        <img src="https://i.pravatar.cc/40?u=agung" alt="profile pic" class="profil-pic rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div id="chat_bar" class="row p-2 shadow-sm">
                                <div class="col">
                                    <input type="text" name="message" id="message" class="form-control rounded-pill" placeholder="Enter your message...">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary rounded-pill">
                                        <i class="fas fa-paper-plane"></i> Send
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- MODAL --}}
@section('modal')

@endsection

{{-- JS --}}
@section('js')
    <script>

        function loading_user_list() {
            let html  = '<li class="list-group-item">';
                html += '    <div class="row">';
                html += '        <div class="col-auto">';
                html += '            <div class="spinner-border text-primary" role="status">';
                html += '                <span class="visually-hidden">Loading...</span>';
                html += '            </div>';
                html += '        </div>';
                html += '        <div class="col small mt-1">';
                html += '            Getting room users...';
                html += '        </div>';
                html += '    </div>';
                html += '</li>';
            return html;
        }

    </script>

@endsection
