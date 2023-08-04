@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            نمایش روش های ارسال
        @endslot
        @slot('text_breadcrumb')
            روش های ارسال
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
                                <th>نام روش ارسال</th>
                                <th>هزینه ارسال</th>
                                <th>زمان ارسال</th>
                                <th>وضعیت</th>
                                <th>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $num = 1;
                            @endphp
                            @foreach ($delivery_methods as $delivery_method)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><span class="line">{{ $delivery_method->name }}</span></td>
                                    <td><span class="line">{{ priceFormat($delivery_method->amount) }} تومان </span></td>
                                    <td><span class="line">
                                            {{ $delivery_method->delivery_time . ' ' . $delivery_method->delivery_time_unit }}</span>
                                    </td>
                                    <td>
                                        <label>
                                            <input id="{{ $delivery_method->id }}" onchange="changeStatus({{ $delivery_method->id }})" data-url="{{ route('admin.delivery.status', $delivery_method->id) }}" type="checkbox" @if ($delivery_method->status === 1)
                                            checked
                                            @endif>
                                        </label>
                                    </td>
                                    <td style="width: 25rem;">
                                        <form action="{{ route('admin.delivery.destroy', $delivery_method->id) }}" method="POST">
                                            {{-- <a role="button" class="btn btn-sm btn-warning text-white"
                                                href="{{ route('admin.post.change-status', $post->id) }}">تغییر
                                                وضعیت</a> --}}
                                            <a role="button" class="btn btn-sm btn-primary text-white"
                                                href="{{ route('admin.delivery.edit', $delivery_method->id) }}">ویرایش</a>
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

@section('script')

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                        '<strong class="ml-auto">' + message + '</strong>\n' +
                        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                            '</button>\n' +
                            '</section>\n' +
                            '</section>';

                            $('.toast-wrapper').append(successToastTag);
                            $('.toast').toast('show').delay(5500).queue(function() {
                                $(this).remove();
                            })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                        '<strong class="ml-auto">' + message + '</strong>\n' +
                        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                            '</button>\n' +
                            '</section>\n' +
                            '</section>';

                            $('.toast-wrapper').append(errorToastTag);
                            $('.toast').toast('show').delay(5500).queue(function() {
                                $(this).remove();
                            })
            }
        }
    </script>
 @endsection
