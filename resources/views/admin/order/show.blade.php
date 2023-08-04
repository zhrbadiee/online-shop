@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            مشاهده فاکتور
        @endslot
        @slot('text_breadcrumb')
            سفارشات
        @endslot
    @endcomponent
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> فاکتور </h5>
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
                    <section class="table-responsive">
                        <table class="table table-striped table-hover h-150px" id="printable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="table-primary">
                                    <th>{{ $order->id }}</th>
                                    <td class="width-8-rem text-left">
                                        <a href="" class="btn btn-dark btn-sm text-white" id="print">
                                            <i class="fa fa-print"></i>
                                            چاپ
                                        </a>
                                        <a href="{{ route('admin.order.show.detail', $order->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-book"></i>
                                            جزئیات
                                        </a>
                                    </td>
                                </tr>

                                <tr class="border-bottom">
                                    <th>نام مشتری</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->user->first_name ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>نام خانوادگی مشتری</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->user->last_name ?? '-'  }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>آدرس</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->address ?? '-' }}
                                    </td>
                                </tr>
                                
                                <tr class="border-bottom">
                                    <th>کد پستی</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->postal_code ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>پلاک</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->no ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>واحد</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->unit ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>نام گیرنده</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->recipient_first_name ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>نام خانوادگی گیرنده</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->recipient_last_name ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>موبایل</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->address->phone ?? '-' }}
                                    </td>
                                </tr>
                            
                                <tr class="border-bottom">
                                    <th>وضعیت پرداخت</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->payment_status_value }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>مبلغ ارسال</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ priceFormat($order->delivery_amount) ?? '-' }} تومان
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>وضعیت ارسال</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->delivery_status_value }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>تاریخ ارسال</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ jalaliDate($order->delivery_date) ?? '-' }}
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th>مجموع مبلغ محصولات </th>
                                    <td class="text-left font-weight-bolder">
                                        {{ priceFormat($order->order_final_amount) ?? '-' }} تومان
                                    </td>
                                </tr>
                                 <tr class="border-bottom">
                                    <th>مبلغ نهایی پرداخت(هزینه محصولات +هزینه ارسال)</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ priceFormat($order->order_final_amount + $order->delivery_amount) }}تومان
                                    </td>
                                </tr>
                               
                             
                                <tr class="border-bottom">
                                    <th>وضعیت سفارش</th>
                                    <td class="text-left font-weight-bolder">
                                        {{ $order->order_status_value }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script>

var printBtn = document.getElementById('print');
printBtn.addEventListener('click', function(){
    printContent('printable');
})


function printContent(el){

    var restorePage = $('body').html();
    var printContent = $('#' + el).clone();
    $('body').empty().html(printContent);
    window.print();
    $('body').html(restorePage);
}


</script>

@endsection