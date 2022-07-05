@extends('layouts.main')
@section('styles')

@endsection
@section('content')
<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="product-search">
                                        <input type="email" value="Search">
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="product-short">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Filter Berdasarkan Nama</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="?filter=name&value=asc" class="dropdown-item">A - Z</a>
                                                <a href="?filter=name&value=desc" class="dropdown-item">Z - A</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="product-price-range">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Filter Berdasarkan Waktu Buat</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="?filter=created_at&value=asc" class="dropdown-item">Dari paling Awal</a>
                                                <a href="?filter=created_at&value=desc" class="dropdown-item">Dari Paling Akhir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                                <h3 style="color: white;">{{$product->name}}</h3>
                                <!-- <p style="color: white; padding: 0px; margin:0px">{{$product->description}}</p> -->
                                <p style="color: white; padding: 0px; margin:0px">dibuat : {{$product->created_at->format('H:m:i d-m-Y')}}</p>
                            </div>
                            <div class="product-image">
                                <center>
                                    <img src="{{StringHelper::ImagePath($product->path)}}" alt="Product Image" style="height: 200px; width: auto">
                                </center>
                                <div class="product-action">

                                    <a href="{{ route('product.detail', $product->slug )}}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>Rp</span>{{$product->price}}</h3>
                                <a class="btn" href="{{ route('product.detail', $product->slug )}}"><i class="fa fa-shopping-cart"></i>Beli</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination Start -->
                <!-- <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
                <!-- Pagination Start -->
            </div>

        </div>
    </div>
</div>
<!-- Product List End --> @endsection
@section('script')

@endsection