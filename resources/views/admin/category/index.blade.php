@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            نمایش دسته بندی ها
        @endslot
        @slot('text_breadcrumb')
            دسته بندی
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>دسته بندی ها</h5>
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
                                <th>نام</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><span class="line">{{ $category->name }}</span></td>
                                    <td style="width: 25rem;">
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                            <a role="button" class="btn btn-sm btn-primary text-white"
                                                href="{{ route('admin.category.edit', $category->id) }}">ویرایش</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger text-white" href="#">حذف</button>
                                        </form>
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
