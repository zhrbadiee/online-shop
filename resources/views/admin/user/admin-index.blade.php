@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            نمایش ادمین ها
        @endslot
        @slot('text_breadcrumb')
            کاربران
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ادمین ها</h5>
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

                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('admin.user.admin-create') }}" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
                        
                    </section>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام </th>
                                <th>نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>شماره همراه </th>    
                                <th>نقش</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><span class="line">{{ $admin->first_name }}</span></td>
                                    <td><span class="line">{{ $admin->last_name }} </span></td>
                                    <td><span class="line"> {{ $admin->email }}</span></td>
                                    <td><span class="line">{{ $admin->phone }}</span></td>
                                    <td>
                                        @if ($admin->role == 'admin')
                                            <span class="text-success">ادمین</span>
                                        @endif
                                    </td>
                                    <td style="width: 25rem;">
                                        <form action="{{ route('admin.user.admin-destroy', $admin->id) }}" method="POST">
                                            <a role="button" class="btn btn-sm btn-warning text-white" href="{{route('admin.user.admin-change-status', $admin->id)}}">تغییر
                                                وضعیت</a>
                                            {{-- <a role="button" class="btn btn-sm btn-primary text-white"
                                                href="{{ route('admin.user.admin-edit', $admin->id) }}">ویرایش</a> --}}
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button class="btn btn-sm btn-danger text-white" href="">حذف</button> --}}
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
