@extends('app.layouts.app')

@section('content')
    <section class="">

        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                @include('app.layouts.partials.profile-sidebar')
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>جزئیات سفارش</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                    <section class="col-lg-12">
                        <div class="ibox float-e-margins">
                            {{-- <div class="ibox-title">
                    <h5> جزئیات سفارش </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                      </div>
                        </div> --}}
                            <div class="ibox-content">
                                <section class="table-responsive">
                                    <table class="table table-striped table-hover h-150px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نام محصول</th>
                                                <th>تصویر محصول</th>
                                                <th>تعداد</th>
                                                <th> قیمت محصول</th>
                                                <th> جمع کل مبلغ محصول</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item->singleProduct->name ?? '-' }}</td>
                                                    <td><span class="line"><img
                                                                src="{{ asset('admin-assets/post_image/' . $item->singleProduct->image) }}"
                                                                style="width: 100px"></span></td>
                                                    <td>{{ $item->number }} </td>
                                                    <td>{{ priceFormat($item->final_product_price) ?? '-' }}تومان</td>
                                                    <td>{{ priceFormat($item->final_total_price) ?? '-' }} تومان</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </section>

                            </div>
                        </div>
                    </section>
                </main>
            </section>
        </section>
    </section>
@endsection
