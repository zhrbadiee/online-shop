@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            نمایش سفارش ها
        @endslot
        @slot('text_breadcrumb')
            سفارش
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> سفارش ها</h5>
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
                </div>
                <div class="ibox-content">
                    @if ($message = session()->get('success'))
                        <div class="alert alert-success">
                            <center>
                                <h3>
                                    {{ $message }}
                                </h3>
                            </center>
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مجموع مبلغ سفارش</th>
                                <th>وضعیت پرداخت</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><span class="line">{{ $order->id }}</span></td>
                                    <td><span class="line">{{ priceFormat($order->order_final_amount + $order->delivery_amount) }} تومان</span></td>
                                    <td><span class="line">@if($order->payment_status==0)پرداخت نشده @elseif ($order->payment_status==1) پرداخت شده @elseif ($order->payment_status==2) باطل شده @endif </span></td>
                                    <td><span class="line">@if($order->delivery_status==0)ارسال نشده @elseif ($order->delivery_status==1)در حال ارسال @elseif ($order->delivery_status==2)ارسال شده @else تحویل شده  @endif </span></td>
                                    <td><span class="line">{{ $order->delivery->name }}</span></td>
                                    <td><span class="line">@if($order->order_status==1) در انتظار تایید  @elseif($order->order_status==3) تایید شده @elseif($order->order_status==4) باطل شده  @else بررسی نشده @endif</span></td>
                                    
                                    {{-- <td style="width: 25rem;">
                                        
                                            <a role="button" class="btn btn-sm btn-warning text-white"
                                                href="{{ route('admin.order.show', $order->id) }}">
                                                مشاهده فاکتور</a>
                                            <a role="button" class="btn btn-sm btn-primary text-white"
                                                href="{{ route('admin.order.changeOrderStatus', $order->id) }}">تغییر وضعیت سفارش</a>
                                           
                                            <a class="btn btn-sm btn-danger text-white" href="{{route('admin.order.cancelOrder', $order->id)}}">باطل کردن سفارش</a>
                                        
                                    </td> --}}
                                    <td class="width-8-rem text-left">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tools"></i> عملیات
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a href="{{ route('admin.order.show', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                                <a href="{{ route('admin.order.changeSendStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                                <a href="{{ route('admin.order.changeOrderStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                                <a href="{{ route('admin.order.cancelOrder', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
