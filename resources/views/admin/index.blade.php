@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            صفحه اصلی
        @endslot
        @slot('text_breadcrumb')
            پنل ادمبن
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">
            لورم ایپسوم</h3>
        <div class="error-desc">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
            <br />
            <a href="index-2.html" class="btn btn-primary m-t">
                داشبورد</a>
        </div>
    </div>
@endsection
