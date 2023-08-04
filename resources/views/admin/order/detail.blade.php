@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            جزئیات سفارش 
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
                </div>
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
                                    <th>جمع کل مبلغ محصول </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
        
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->singleProduct->name ?? '-' }}</td>
                                    <td><span class="line"><img src="{{ asset('admin-assets/post_image/' . $item->singleProduct->image) }}"
                                        style="width: 100px"></span></td>
                                    <td>{{ $item->number }} </td>
                                    <td>{{ priceFormat($item->final_product_price) ?? '-' }}تومان</td> 
                                    <td>{{ priceFormat($item->final_total_price) ?? '-'}} تومان</td>
                                    
                                </tr>
        
                                @endforeach
        
                            </tbody>
                        </table>
                    </section>
        
                </div>
            </div>
        </div>
    </div>
@endsection