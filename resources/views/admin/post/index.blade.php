@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            نمایش پست ها
        @endslot
        @slot('text_breadcrumb')
            پست
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> پست ها</h5>
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
                                <th>نام </th>
                                <th>تصویر</th>
                                <th>قیمت</th>
                                <th>دسته </th>
                                <th>نویسنده </th>
                                {{-- <th>چکیده توضیحات</th> --}}
                                <th>وضعیت</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><span class="line">{{ $post->name }}</span></td>
                                    <td><span class="line"><img src="{{ asset('admin-assets/post_image/' . $post->image) }}"
                                                style="width: 100px"></span></td>
                                    <td><span class="line">{{ priceFormat($post->price) }} تومان  </span></td>
                                    <td><span class="line"> {{ $post->category->name }}</span></td>
                                    <td><span class="line">
                                            {{ $post->user->first_name .' '.$post->user->last_name }}</span></td>
                                    
                                    {{-- <td><span class="line">@php echo Str::of($post->detail)->limit(100);  @endphp</span></td> --}}
                                    <td>
                                        @if ($post->status == 'enable')
                                            <span class="text-success">enable</span>
                                        @endif
                                        @if ($post->status == 'disable')
                                            <span class="text-danger">disable</span>
                                        @endif
                                    </td>
                                    <td style="width: 25rem;">
                                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                            <a role="button" class="btn btn-sm btn-warning text-white" href="{{route('admin.post.change-status', $post->id)}}">تغییر
                                                وضعیت</a>
                                            <a role="button" class="btn btn-sm btn-primary text-white"
                                                href="{{ route('admin.post.edit', $post->id) }}">ویرایش</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger text-white" href="">حذف</button>
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
