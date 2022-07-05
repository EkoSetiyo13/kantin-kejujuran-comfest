@extends('layouts.main')
@section('styles')

@endsection
@section('content')
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="register-form">
                    <form method="post" action="{{ route('register.action') }}">
                        @if($errors->any())
                        @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3>Daftar Pengguna Kantin Kejujuran</h3>
                                <h2>SD SEA</h2>
                                <br>
                            </div>
                            <div class="col-md-12">
                                <label><b>Name</b></label>
                                <input class="form-control" name="name" type="text" required>
                                <!-- @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $error)
                                <p style="color:red; font-size: 12px; padding:0px; margin:0px">{{ $error }}</p>
                                @endforeach
                                @endif -->
                            </div>
                            <div class="col-md-12">
                                <label><b>Siswa ID *</b></label>
                                <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="student_id" class="form-control" name="student_id" type="text" placeholder="contoh : 45615" required>
                                <p style="font-size: 12px;">Ketentuan:
                                    <br> <span id="total_digit" style="color: black">* Total digit harus 5 digit</span>
                                    <br> <span id="start_digit" style="color: black">* 3 digit awal bebas</span>
                                    <br> <span id="end_digit" style="color: black">* 2 digit terakhir penjumlahan 3 digit awal</span>
                                </p>
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
                                <label><b>Ulangi Password</b></label>
                                <div class="input-group" id="show_hide_password_confirm">
                                    <input name="password_confirm" type="text" class="form-control" aria-label="Text input with radio button" required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-eye-slash" style="font-size: 0.73em;" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12">
                                <input id="btn_submit" type='submit' class="btn">
                            </div>
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

        $("#show_hide_password_confirm").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password_confirm input').attr("type") == "text") {
                $('#show_hide_password_confirm input').attr('type', 'password');
                $('#show_hide_password_confirm i').addClass("fa-eye-slash");
                $('#show_hide_password_confirm i').removeClass("fa-eye");
            } else if ($('#show_hide_password_confirm input').attr("type") == "password") {
                $('#show_hide_password_confirm input').attr('type', 'text');
                $('#show_hide_password_confirm i').removeClass("fa-eye-slash");
                $('#show_hide_password_confirm i').addClass("fa-eye");
            }

        });


        $('#student_id').keyup(function(e) {
            //dom 
            var spanTotal = document.querySelector("#total_digit").style;
            var spanStart = document.querySelector("#start_digit").style;
            var spanEnd = document.querySelector("#end_digit").style;


            var startdigit = this.value.substr(0, 3);
            var enddigit = this.value.substr(3, 5);
            var valueStart = startdigit.split('').map(Number).reduce(function(prev, curr) {
                return prev + curr;
            });

            var valueEnd = Number(enddigit)
            var key = e.keyCode
            if (key == 8 || key == 46) {
                // spanTotal.color = "black";
            }
            if (this.value.length < 5) {
                spanTotal.color = "black";
                spanEnd.color = "black";
            }

            if (this.value.length >= 5) {
                $("#btn_submit").attr("disabled", true);
                if (valueStart === valueEnd) {
                    spanEnd.color = "blue";
                    $("#btn_submit").attr("disabled", false);
                }
                spanTotal.color = "blue";
            }

            if (this.value.length >= 3) {
                spanStart.color = "blue";
            } else {
                spanStart.color = "black";
            }

        });

        $('#student_id').keypress(function(e) {
            var spanTotal = document.querySelector("#total_digit").style;
            var spanStart = document.querySelector("#start_digit").style;
            var spanEnd = document.querySelector("#end_digit").style;

            if (this.value.length >= 5) {
                return false;
            }

            if (this.value.length >= 3) {
                spanStart.color = "blue";
            } else {
                spanStart.color = "black";
            }
        });

    });
</script>
@endsection