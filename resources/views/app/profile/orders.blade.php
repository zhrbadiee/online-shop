@extends('app.layouts.app')


@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">


                @include('app.layouts.partials.profile-sidebar')

                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">
                            <a class="btn btn-outline-primary btn-sm mx-1"
                                href="{{ route('profile.orders') }}">همه</a>
                            <a class="btn btn-info btn-sm mx-1"
                                href="{{ route('profile.orders', 'type=0') }}">بررسی نشده</a>
                            <a class="btn btn-warning btn-sm mx-1"
                                href="{{ route('profile.orders', 'type=1') }}">در انتظار تایید</a>
                            {{-- <a class="btn btn-success btn-sm mx-1"
                                href="{{ route('profile.orders', 'type=2') }}">تایید نشده</a> --}}
                            <a class="btn btn-danger btn-sm mx-1"
                                href="{{ route('profile.orders', 'type=3') }}">تایید شده</a>
                            <a class="btn btn-outline-danger btn-sm mx-1"
                                href="{{ route('profile.orders', 'type=4') }}">باطل شده</a>
                        </section>

                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">

                            @forelse ($orders as $order)
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <section>
                                            <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش :
                                                {{ $order->id }}
                                            </section>
                                            <section class="order-item-date"><i class="fa fa-calendar-alt"></i>  تاریخ سفارش:
                                                {{ jalaliDate($order->created_at) }}
                                            </section>
                                            
                                            <section class="order-item-status"><i></i> جمع کل مبلغ محصولات:
                                                {{priceFormat($order->order_final_amount) }} تومان
                                            </section>
                                            <section class="order-item-status"><i></i> هزینه ارسال:
                                                {{priceFormat($order->delivery_amount) }} تومان
                                            </section>
                                            <section class="order-item-status"><i></i>کل مبلغ پرداختی:
                                                {{priceFormat($order->order_final_amount + $order->delivery_amount) }} تومان
                                            </section>
                                            <section class="order-item-status"><i></i> وضعیت ارسال:
                                                @if($order->delivery_status==0)ارسال نشده @elseif ($order->delivery_status==1)در حال ارسال @elseif ($order->delivery_status==2)ارسال شده @else تحویل شده  @endif
                                            </section>
                                            <section class="order-item-status"><i></i> شیوه ارسال:
                                                {{ $order->delivery->name }}
                                            </section>
                                            <section class="order-item-status"><i></i> وضعیت سفارش:
                                                @if($order->order_status==1) در انتظار تایید  @elseif($order->order_status==3) تایید شده @elseif($order->order_status==4) باطل شده  @else بررسی نشده @endif
                                            </section>
                                            {{-- <section class="order-item-products">
                                                <a href="#"><img src="assets/images/products/1.jpg"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/images/products/2.jpg"
                                                        alt=""></a>
                                            </section> --}}
                                        </section>
                                        <section class="order-item-link"><a href="{{ route('profile.order.show.detail', $order->id) }}">جزییات سفارش </a></section>
                                    </section>
                                </section>

                            @empty
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <p>سفارشی یافت نشد</p>
                                    </section>
                                </section>
                            @endforelse



                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->
@endsection