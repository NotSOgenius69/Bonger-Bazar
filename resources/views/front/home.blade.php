@extends('front.layouts.parentlayout')


@section('frontcontent')
<main>
    <section class="section-1">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <img src="images/carousel-1.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('images/mistidoi.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('images/mistidoi.jpg') }}" />
                        <img src="{{ asset('images/mistidoi.jpg') }}" alt="" />

                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">বগুরার মিষ্টি দই</h1>
                            <p class="mx-md-5 px-5">
Discover the exquisite delight of Bogurar Misti Doi, a traditional sweet yogurt that embodies the essence of Bogura's rich culinary heritage. </p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    
                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('images/aam.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('images/aam.jpg') }}" />
                        <img src="{{ asset('images/aam.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">রাজশাহীর আম</h1>
                            <p class="mx-md-5 px-5">Discover the unparalleled taste of Rajshahir Aam, the renowned mango variety that hails from the lush orchards of Rajshahi, Bangladesh. </p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="images/carousel-3.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('images/kachgolla.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('images/kachagolla.jpg') }}" />
                        <img src="{{ asset('images/kachagolla.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">নাটোরের কাঁচাগোল্লা
                            </h1>
                            <p class="mx-md-5 px-5">Indulge in the delectable delight of Natore Kachagolla, a traditional sweet treat that originates from the historic city of Natore in Bangladesh.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>                    
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                    </div>                    
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <div class="section-title">
                <h2>Wait</h2>
            </div>           
            
        </div>
    </section>
    <!-- Top Seller Products section -->
    <section class="section-4 pt-5" id="best-sellers-section">
    <div class="container">
        <div class="section-title">
            <h2>Best Sellers</h2>
        </div>
        <div class="row pb-3">
            @foreach ($topproducts as $product)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                        @if($product->productImages->isNotEmpty())
                              <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$product->productImages->first()->image) }}"/>
                        @else
                              <img class="card-img-top img-thumbnail" src="{{ asset('images/default.png') }}"/>
                        @endif
                        </a>

                            <a class="whishlist" href="#"><i class="far fa-heart"></i></a>

                            <div class="product-action">
                            <a class="btn btn-dark" href="{{ route('cart.add',$product->id) }}" >
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="#">{{ $product->title }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>৳{{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><del>৳{{ $product->compare_price }}</del></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- Food Section -->
<section class="section-4 pt-5" id="section-1">
    <div class="container">
        <div class="section-title">
            <h2>Food</h2>
        </div>
        <div class="row pb-3">
            @foreach ($products->where('category_id', 1) as $product)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                           @if($product->productImages->isNotEmpty())
                              <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$product->productImages->first()->image) }}"/>
                            @else
                              <img class="card-img-top img-thumbnail" src="{{ asset('images/default.png') }}"/>
                            @endif
                        </a>
                            <a class="whishlist" href="#"><i class="far fa-heart"></i></a>

                            <div class="product-action">
                            <a class="btn btn-dark" href="{{ route('cart.add',$product->id) }}" >
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="">{{ $product->title }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>৳{{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><s>৳{{ $product->compare_price }}</s></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Clothes Section -->
<section class="section-4 pt-5" id="section-2">
    <div class="container">
        <div class="section-title">
            <h2>Clothes</h2>
        </div>
        <div class="row pb-3">
            @foreach ($products->where('category_id', 2) as $product)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                        @if($product->productImages->isNotEmpty())
                              <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$product->productImages->first()->image) }}"/>
                        @else
                              <img class="card-img-top img-thumbnail" src="{{ asset('images/default.png') }}"/>
                        @endif
                        </a>
                            <a class="whishlist" href="#"><i class="far fa-heart"></i></a>

                            <div class="product-action">
                            <a class="btn btn-dark" href="{{ route('cart.add',$product->id) }}" >
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="">{{ $product->title }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>৳{{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><del>৳{{ $product->compare_price }}</del></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Artforms Section -->
<section class="section-4 pt-5" id="section-3">
    <div class="container">
        <div class="section-title">
            <h2>Artforms</h2>
        </div>
        <div class="row pb-3">
            @foreach ($products->where('category_id', 3) as $product)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                        @if($product->productImages->isNotEmpty())
                              <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$product->productImages->first()->image) }}"/>
                        @else
                              <img class="card-img-top img-thumbnail" src="{{ asset('images/default.png') }}"/>
                        @endif
                        </a>
                            <a class="whishlist" href="#"><i class="far fa-heart"></i></a>

                            <div class="product-action">
                            <a class="btn btn-dark" href="{{ route('cart.add',$product->id) }}" >
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="">{{ $product->title }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>৳{{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><del>৳{{ $product->compare_price }}</del></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Others Section -->
<section class="section-4 pt-5" id="section-4">
    <div class="container">
        <div class="section-title">
            <h2>Others</h2>
        </div>
        <div class="row pb-3">
            @foreach ($products->where('category_id', 4) as $product)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                        @if($product->productImages->isNotEmpty())
                              <img class="card-img-top img-thumbnail" src="{{ asset('uploads/product/'.$product->productImages->first()->image) }}"/>
                        @else
                              <img class="card-img-top img-thumbnail" src="{{ asset('images/default.png') }}"/>
                        @endif
                        </a>
                            <a class="whishlist" href="#"><i class="far fa-heart"></i></a>

                            <div class="product-action">
                            <a class="btn btn-dark" href="{{ route('cart.add',$product->id) }}" >
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="">{{ $product->title }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>৳{{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><s>৳{{ $product->compare_price }}</s></span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
</main>
@endsection

@section('customJs')

@endsection