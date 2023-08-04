@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            ویرایش روش ارسال
        @endslot
        @slot('text_breadcrumb')
            روش های ارسال
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ویرایش روش ارسال جدید</h5>
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
                    <form method="post" action="{{ route('admin.delivery.update' , $delivery->id ) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">نام روش ارسال </label>
                            <div class="col-sm-4"><input type="text" name="name" class="form-control"
                                    @error('name')  style="border: 2px solid red" @enderror value="{{ old('name' , $delivery->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"> هزینه روش ارسال </label>
                            <div class="col-sm-4"><input type="text" name="amount" class="form-control"
                                    @error('amount')  style="border: 2px solid red" @enderror value="{{ old('amount', $delivery->amount) }}">
                                @error('amount')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"> زمان ارسال</label>
                            <div class="col-sm-4"><input type="text" name="delivery_time" class="form-control"
                                    @error('email')  style="border: 2px solid red" @enderror
                                    value="{{ old('delivery_time', $delivery->delivery_time) }}">
                                @error('delivery_time')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">واحد زمان ارسال</label>
                            <div class="col-sm-4"><input type="text" name="delivery_time_unit" class="form-control"
                                    @error('delivery_time_unit')  style="border: 2px solid red" @enderror
                                    value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}">
                                @error('delivery_time_unit')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-1">
                                <a href="{{ route('admin.delivery.index') }}" class="btn btn-white" type="submit">لغو</a>
                                <button class="btn btn-primary" type="submit">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
