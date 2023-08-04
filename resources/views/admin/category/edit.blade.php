@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            ویرایش دسته بندی
        @endslot
        @slot('text_breadcrumb')
            دسته بندی
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ویرایش دسته بندی </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">گزینه 1</a>
                            </li>
                            <li><a href="#">گزینه 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" action="{{ route('admin.category.edit.update', $category->id) }}"
                        class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-group"><label class="col-sm-2 control-label">نام</label>

                            <div class="col-sm-10"><input type="text" name="name" class="form-control"
                                    value="{{ $category->name }}" @error('name')  style="border: 2px solid red" @enderror>

                                @error('name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-white"
                                        type="submit">لغو</a>
                                    <button class="btn btn-primary" type="submit"
                                        href="{{ route('admin.category.edit.update', $category->id) }}">ذخیره</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
