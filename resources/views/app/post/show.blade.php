@extends('app.layouts.app')

@section('content')
    <main id="main-body-one-col" class="main-body">

        @if ($message = session()->get('success'))
            <div class="alert alert-success">
                <center>
                    <h3>
                        {{ $message }}
                    </h3>
                </center>
            </div>
        @endif
        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->

                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span> {{ $post->name }} </span>
                                </h2>
                                <section class="content-header-link"></section>
                            </section>
                        </section>

                        <section class="row mt-4">
                            <!-- start image gallery -->
                            <section class="col-md-4">
                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                    <section class="product-gallery">
                                        <section class="product-gallery-selected-image mb-3">
                                            <img src="{{ asset('admin-assets/post_image/' . $post->image) }}"
                                                alt="{{ $post->name }}">
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- end image gallery -->

                            <!-- start product info -->
                            <section class="col-md-5">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                {{ $post->name }}
                                            </h2>
                                            <section class="content-header-link">
                                            </section>
                                        </section>
                                    </section>
                                    
                                    <section class="product-info">

                                        <form id="add_to_cart" action="{{ route('salesProcess.add-to-cart', $post) }}"
                                            method="post" class="product-info">
                                            @csrf
                                            <p>جنس: {{ $post->type }}</p>
                                            <p>سایز: {{ $post->size }}</p>
                                            <p>دسته بندی: {{ $post->category->name }}</p>
                                            <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span>
                                                    گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                            <p>
                                                @if ( $post->solid_number < $post->marketable_number)
                                                    <i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                    <span>کالا موجود در انبار</span>
                                                @else
                                                    <i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                    <span>کالا ناموجود</span>
                                                @endif
                                            </p>
                                            {{-- <p><a class="btn btn-light  btn-sm text-decoration-none" href="#"><i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی</a></p> --}}
                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-</button>
                                                    <input type="number" id="number" name="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                            </section>
                                            <p class="mb-3 mt-5">
                                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده
                                                است.
                                                برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه
                                                ارسال
                                                را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد
                                                شد.
                                                و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه
                                                ارسال
                                                که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                            </p>
                                    </section>
                                </section>

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالا</p>
                                        <p class="text-muted"><span id="product_price" data-product-original-price={{ $post->price }}>{{priceFormat($post->price) }}</span> <span class="small">تومان</span></p>
                                    </section>

                                    

                                    <section class="border-bottom mb-3"></section>

                                    {{-- <section class="d-flex justify-content-end align-items-center">
                                        <p class="fw-bolder"><span  id="final-price"></span><span class="small">تومان</span></p>
                                    </section> --}}

                                    <section class="">
                                        @if ($post->solid_number < $post->marketable_number)
                                            <button id="next-level" class="btn btn-danger d-block w-100"
                                                onclick="document.getElementById('add_to_cart').submit();">افزودن به سبد
                                                خرید</button>
                                        @else
                                            <button id="next-level" class="btn btn-secondary disabled d-block w-100">محصول ناموجود می باشد</button>
                                        @endif
                                    </section>
                                    </form>

                                </section>
                            </section>

                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->





        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->

                            <!-- start content header -->

                            <section class="py-4">



                                <!-- start vontent header -->
                                <section id="comments" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            دیدگاه ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-comments mb-4">

                                    <section class="comment-add-wrapper">
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن
                                            دیدگاه</button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1"
                                            aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i
                                                                class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        @guest
                                                            <section class="modal-body">
                                                                <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید
                                                                </p>
                                                                <p>لینک
                                                                    <a href="{{ route('register') }}"> ثبت نام<a>
                                                                            <i>/</i>
                                                                            <a href="{{ route('login') }}"> ورود<a>
                                                                                    <i>کلیک کنید</i>
                                                                </p>

                                                            </section>
                                                        @endguest
                                                    </section>
                                                    @auth
                                                        <section class="modal-body">
                                                            <form class="row"
                                                                action="{{ route('app.add-comment', $post->id) }}"
                                                                method="post">
                                                                @csrf

                                                                <section class="col-12 mb-2">
                                                                    <label for="comment" class="form-label mb-1">دیدگاه
                                                                        شما</label>
                                                                    <textarea class="form-control form-control-sm" id="comment" placeholder="دیدگاه شما ..." rows="4"
                                                                        name="body"> </textarea>

                                                                </section>
                                                        </section>
                                                        <section class="modal-footer py-1">
                                                            <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                                دیدگاه</button>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-bs-dismiss="modal">بستن</button>
                                                        </section>
                                                        </form>
                                                    @endauth
                                                </section>
                                            </section>
                                        </section>
                                    </section>



                                    @foreach ($comments as $comment)
                                        <section class="product-comment">
                                            <section class="product-comment-header d-flex justify-content-start">
                                                <section class="product-comment-date">{{jdate($comment->created_at ) }}
                                                </section>
                                                <section class="product-comment-title">
                                                    {{ $comment->user->first_name . ' ' . $comment->user->last_name }}
                                                </section>
                                            </section>
                                            <section class="product-comment-body">
                                                {{ $comment->body }}
                                            </section>
                                        </section>
                                    @endforeach






                                </section>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end description, features and comments -->

    </main>
    <!-- end main one col -->



    <!-- start body -->
    <section class="container-xxl body-container">
        <aside id="sidebar" class="sidebar">

        </aside>
        <main id="main-body" class="main-body">

        </main>
    </section>
    <!-- end body -->
    <!-- end cart -->
@endsection


@section('script')
<script>
    $(document).ready(function(){
      bill();
     //number
     $('.cart-number').click(function(){
        bill();
    })
    })

    function bill() {
        
        var number = 1;
        var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

       
        if($('#number').val() > 0)
        {
            number = parseFloat($('#number').val());
        }

        
        var product_price = product_original_price;
        var final_price = number * product_price;
        $('#product-price').html(toFarsiNumber(product_price));
        $('#final-price').html(toFarsiNumber(final_price));
    }

    function toFarsiNumber(number)
    {
        const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        // add comma
        number = new Intl.NumberFormat().format(number);
        //convert to persian
        return number.toString().replace(/\d/g, x => farsiDigits[x]);
    }

</script>
@endsection