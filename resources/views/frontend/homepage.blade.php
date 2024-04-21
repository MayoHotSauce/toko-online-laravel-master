@extends('frontend.layout')

@section('content')
<style>
  /* Style untuk card */
  .card {
        width: 300px;
        border: 2px solid #e1e1e1; /* Warna border */
        border-radius: 15px;
        overflow: hidden;
        margin: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    /* Style untuk gambar produk */
    .card img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #e1e1e1; /* Garis bawah pada gambar */
    }

    /* Style untuk konten card */
    .card-content {
        padding: 20px;
        flex: 1;
    }

    /* Style untuk nama produk */
    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Style untuk deskripsi produk */
    .product-description {
        margin-bottom: 15px;
    }

    /* Style untuk harga */
    .product-price {
        font-size: 16px;
        font-weight: bold;
        color: #007bff; /* Warna harga */
    }

    /* Style untuk tombol beli */
    .btn-buy,
    .btn-add-cart {
        display: block;
        width: 100%;
        padding: 10px 0;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px; /* Jarak antara tombol dan konten */
    }

    .btn-buy {
        background-color: #007bff; /* Warna tombol beli */
        color: white;
        margin-bottom: 5px; /* Jarak tambahan */
    }

    .btn-add-cart {
        background-color: #28a745; /* Warna tombol tambahkan ke keranjang */
        color: white;
        margin-top: 5px; /* Jarak tambahan */
    }

    /* Style untuk grup tombol */
    .button-group {
        display: flex;
        flex-direction: column; /* Tampilan vertikal */
    }
	.p1{
		margin-left: 900px;
		margin-top: -485px;
	}
</style>
    <!-- slider -->
        <div class="slider-area">
            <div class="slider-active owl-carousel">
                @foreach($slides as $slide)
                    <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url({{ Storage::url($slide->path) }})">
                        <div class="container">
                            <div class="row">
                                <div class="ml-auto col-lg-6">
                                    <div class="furniture-content fadeinup-animated">
                                        <h2 class="animated">{{ $slide->title }}</h2>
                                        <p class="animated">{{ $slide->body }}</p>
                                        <a class="furniture-slider-btn btn-hover animated" href="{{ $slide->url }}">Go</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    <!-- end -->
    <!-- products -->
    @if ($products)
	<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
		<div class="container-fluid">
			<div class="section-title-6 text-center mb-50">
				<h2>Produk Material</h2>
				<p>Bahan Bahan dan Alat bangunan rumah</p>
			</div>
			<div class="card">
        <img src="{{ asset('themes/ezone/assets/img/logo/kayu.jpg') }}" alt="Gambar Produk">
        <div class="card-content">
            <div class="product-name">Nama Produk</div>
            <div class="product-description">Deskripsi singkat produk di sini.</div>
            <div class="product-price">Harga: $99</div>
            <div class="button-group">
                <button class="btn-buy">Beli Sekarang</button>
                <button class="btn-add-cart">Tambahkan ke Keranjang</button>
            </div>
        </div>
    </div>
	<div  style ="margin-left: 450px; margin-top: -490px;"class="p2">
	<div class="card">
        <img src="{{ asset('themes/ezone/assets/img/logo/kayu.jpg') }}" alt="Gambar Produk">
        <div class="card-content">
            <div class="product-name">Nama Produk</div>
            <div class="product-description">Deskripsi singkat produk di sini.</div>
            <div class="product-price">Harga: $99</div>
            <div class="button-group">
                <button class="btn-buy">Beli Sekarang</button>
                <button class="btn-add-cart">Tambahkan ke Keranjang</button>
            </div>
        </div>
    </div>
</div>
	<div class="p1">
	<div class="card">
        <img src="{{ asset('themes/ezone/assets/img/logo/kayu.jpg') }}" alt="Gambar Produk" >
        <div class="card-content">
            <div class="product-name">Nama Produk</div>
            <div class="product-description">Deskripsi singkat produk di sini.</div>
            <div class="product-price">Harga: $99</div>
            <div class="button-group">
                <button class="btn-buy">Beli Sekarang</button>
                <button class="btn-add-cart">Tambahkan ke Keranjang</button>
            </div>
        </div>
</div>

    </div>
        </div>
    </div>
    </div>
    </div>
    </div>
	<br><br><br><br>
			<div class="product-style">
				<div class="popular-product-active owl-carousel">
					@foreach ($products as $product)
						@php
							$product = $product->parent ?: $product;
						@endphp
						<div class="product-wrapper">
							<div class="product-img">
								<a href="{{ url('product/'. $product->slug) }}">
									@if ($product->productImages->first())
										<img src="{{ Storage::url($product->productImages->first()->path) }}" alt="{{ $product->name }}">
									@else
										<img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
									@endif
								</a>
								<div class="product-action">
									<a class="animate-left add-to-fav" title="Wishlist"  product-slug="{{ $product->slug }}" href="">
										<i class="pe-7s-like"></i>
									</a>
									<a class="animate-top add-to-card" title="Add To Cart" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">
										<i class="pe-7s-cart"></i>
									</a>
									<a class="animate-right quick-view" title="Quick View" product-slug="{{ $product->slug }}" href="">
										<i class="pe-7s-look"></i>
									</a>
								</div>
							</div>
							<div class="funiture-product-content text-center">
								<h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
								<span>Rp{{ number_format($product->priceLabel(), 0, ",", ".") }}</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


	<!-- product area end -->
@endif
    <!-- end -->
@endsection
