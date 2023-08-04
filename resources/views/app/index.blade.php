@extends('app.layouts.app')

@section('content')
    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start slideshow -->
        <section class="container-xxl my-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <section class="row">
                <section class="col-md-14 pe-1">
                    <section id="slideshow" class="owl-carousel owl-theme">
                        <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img
                                    class="w-100 rounded-2 d-block h-auto"
                                    src="{{ asset('app-assets/images/slideshow/1.jpg') }}" alt=""></a></section>
                        <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img
                                    class="w-100 rounded-2 d-block h-auto"
                                    src="{{ asset('app-assets/images/slideshow/2.jpg') }}" alt=""></a></section>
                        <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="#"><img
                                    class="w-100 rounded-2 d-block h-auto"
                                    src="{{ asset('app-assets/images/slideshow/3.jpg') }}" alt=""></a></section>
                    </section>
                </section>
                {{-- <section class="col-md-4 ps-1">
                     <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2" src="{{ asset('app-assets/images/slideshow/12.gi')}}f" alt=""></a></section>
                    <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2" src="{{ asset('app-assets/images/slideshow/11.jpg')}}" alt=""></a></section>
                </section> --}}
            </section>
        </section>
        <!-- end slideshow -->

    </main>



    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <section class="content-wrapper bg-white p-5 rounded-4 mb-4 ">

                    <section class="main-product-wrapper row my-1">
                        @foreach ($posts as $post)
                            <section class="col-md-3 p-3">

                                <section class="product">
                                    {{-- <section class="product-add-to-cart"><a href="" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="افزودن به سبد خرید"><i
                                            class="fa fa-cart-plus"></i></a></section> --}}

                                    <a class="product-link" href="#">
                                        <section class="product-image">
                                            <img class="" src="{{ asset('admin-assets/post_image/' . $post->image) }}"
                                                alt="">
                                        </section>
                                        <section class="product-name">
                                            <a href="{{ route('app.post', $post->id) }}">
                                                <h3>{{ $post->name }}</h3>
                                            </a>
                                        </section>
                                        <section class="product-price-wrapper">
                                            @if ($post->solid_number < $post->marketable_number)
                                                <section class="product-price">{{ priceFormat($post->price) }}تومان
                                                </section>
                                            @else
                                                <span> ناموجود</span>
                                            @endif

                                        </section>
                                    </a>
                                </section>

                            </section>
                        @endforeach


                        {{-- <section class="col-12">
                        <section class="my-4 d-flex justify-content-center">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </section> --}}

                    </section>


                </section>

            </section>
        </section>
    </section>
@endsection
