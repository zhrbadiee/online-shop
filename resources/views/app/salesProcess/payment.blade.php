@extends('app.layouts.app')


@section('content')

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>انتخاب نوع پرداخت </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9">
                            {{-- <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            کد تخفیف
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        کد تخفیف خود را در این بخش وارد کنید.
                                    </secrion>
                                </section>

                                <section class="row">
                                    <section class="col-md-5">
                                        <form action="{{ route('customer.sales-process.copan-discount') }}" method="post">
                                            @csrf
                                        <section class="input-group input-group-sm">
                                                <input type="text" name="copan" class="form-control" placeholder="کد تخفیف را وارد کنید">
                                                <button class="btn btn-primary" type="submit">اعمال کد</button>
                                        </section>
                                    </form>

                                    </section>

                                </section>
                            </section> --}}


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نوع پرداخت
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="payment-select">

                                <form action="{{ route('sales-process.payment-submit') }}" method="post" id="payment_submit">
                                    @csrf

                                    {{-- <input type="radio" name="payment_type" value="1" id="d1"/>
                                    <label for="d1" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            پرداخت آنلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            درگاه پرداخت زرین پال
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="2" id="d2"/>
                                    <label for="d2" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-id-card-alt mx-1"></i>
                                            پرداخت آفلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            حداکثر در 2 روز کاری بررسی می شود
                                        </section>
                                    </label> --}}

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="3" id="cash_payment"/>
                                    <label for="cash_payment" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-money-check mx-1"></i>
                                            پرداخت الکی 
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            پرداخت الکی به سایت    
                                        </section>
                                    </label>
                                </form>


                                </section>
                            </section>




                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                @php
                                    $totalProductPrice = 0;
                                    
                                @endphp

                                @foreach ($cartItems as $cartItem)
                                    @php
                                        $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                        
                                    @endphp
                                @endforeach

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها </p>
                                    <p class="text-muted"><span
                                            id="total_product_price">{{ priceFormat($totalProductPrice )}}</span> تومان
                                    </p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted"> هزینه ارسال </p>
                                    <p class="text-muted"><span
                                            id="total_product_price">{{ priceFormat($order->delivery_amount )}}</span> تومان
                                    </p>
                                </section>


                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span
                                            id="total_price">{{ priceFormat($order->order_final_amount + $order->delivery_amount) }}</span>
                                        تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای
                                    ثبت سفارش و تکمیل خرید باید نوع پرداخت انتخاب کرده و سپس پرداخت کنید.
                                </p>



                                <section class="">
                                    <button type="button"
                                        onclick="document.getElementById('payment_submit').submit();"
                                        class="btn btn-danger d-block w-100">پرداخت</button>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->

@endsection


{{-- @section('script')
    <script>
        $(function(){
            $('#cash_payment').click(function(){
                var newDiv = document.createElement('div');
                newDiv.innerHTML = `
                <section class="input-group input-group-sm">
                    <input type="text" name="cash_receiver" class="form-control" form="payment_submit" placeholder="نام و نام خانوادگی دریافت کننده" >
                </section>
                `;
                document.getElementsByClassName('content-wrapper')[1].appendChild(newDiv)
            })
        })
    </script>
@endsection --}}