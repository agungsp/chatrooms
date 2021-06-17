@extends('layouts.main')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- TITLE --}}
@section('title', 'Welcome')

{{-- CONTENT --}}
@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-5 card">
            <div class="card-body">
                <form id="form_create_room" method="POST">
                    <div class="form-group">
                        <label for="nickname" class="form-label">Set your nickname</label>
                        <input type="text" name="nickname" id="nickname" class="form-control" autofocus>
                        <span id="nickname_error" class="small text-danger"></span>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="room_name" class="form-label">Make your room</label>
                        <input type="text" name="room_name" id="room_name" class="form-control" placeholder="example: BTS Army Indonesia, .etc">
                        <span id="room_name_error" class="small text-danger"></span>
                    </div>
                    <button type="submit" class="btn btn-primary float-end mt-3">
                        <i class="fas fa-plus-square"></i> Create Room
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-5 card">
            <div class="card-body overflow-auto" style="height: 47vh;">
                <h4>Available rooms</h4>
                <div id="room_list" class="list-group overflow-auto">
                    @for ($i = 0; $i < 50; $i++)
                        <a href="#" class="list-group-item list-group-item-action">
                            Room #{{ $i+1 }}
                        </a>
                    @endfor
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
        const form_fields = [
            'nickname', 'room_name'
        ];

        $('#form_create_room').submit(function (e) {
            e.preventDefault();

            unsetErrors(form_fields);
            let formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('room.create') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('room.index') }}";
                    }
                },
                error: function(response) {
                    if (response.status) {
                        setErrors(response.responseJSON.errors);
                    }
                }
            })
        });

        function setErrors(errors) {
            for (const error in errors) {
                $(`#${error}`).addClass('is-invalid');
                $('#'+error+'_error').html(errors[error][0]);
            }
        }

        function unsetErrors(errors) {
            for (let i = 0; i < errors.length; i++) {
                $(`#${errors[i]}`).removeClass('is-invalid');
                $('#'+errors[i]+'_error').html('');
            }
        }

    </script>
@endsection
