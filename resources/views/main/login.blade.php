@extends('layouts.main')
@section('styles')

@endsection
@section('content')
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="login-form">
                    <form method="post" action="{{ route('login.action') }}">
                        @csrf
                        <div class="col-md-12 text-center">
                            <h3>Masuk Pengguna Kantin Kejujuran</h3>
                            <h2>SD SEA</h2>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <label><b>ID Siswa</b></label>
                            <input name="student_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" type="text">
                        </div>
                        <div class="col-md-12">
                            <label><b>Password</b></label>
                            <div class="input-group" id="show_hide_password">
                                <input name="password" type="text" class="form-control" aria-label="Text input with radio button" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-eye-slash" style="font-size: 0.73em;" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <button class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#btn_submit").attr("disabled", true);

        $("#show_hide_password").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    });
</script>
@endsection