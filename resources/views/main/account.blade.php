@extends('layouts.main')
@section('styles')

@endsection
@section('content')

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Data diri</a>
                    <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Dompet</a>
                    <a class="nav-link" id="add-product-nav" data-toggle="pill" href="#add-product-tab" role="tab"><i class="fa fa-plus-circle"></i>Tambah Produk</a>
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-list-alt"></i>Daftar Produk Ku</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Riwayat Pembelian</a>
                    <a class="nav-link" id="sales-nav" data-toggle="pill" href="#sales-tab" role="tab"><i class="fa fa-inbox"></i>Riwayat Penjualan</a>
                    <a class="nav-link" href="{{route('logout.action')}}"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    @include('main.account.tab-history-sales')
                    @include('main.account.tab-history-order')
                    @include('main.account.tab-payment')
                    @include('main.account.tab-list-product')
                    @include('main.account.tab-add-product')
                </div>
                @include('main.account.tab-account')
            </div>
        </div>
    </div>
</div>
</div>
<!-- My Account End -->
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(e) {


        $('#image').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
@endsection