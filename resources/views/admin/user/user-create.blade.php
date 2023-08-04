@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            ایجاد کاربر جدید
        @endslot
        @slot('text_breadcrumb')
            کاربران
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ایجاد کاربر جدید</h5>
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
                    <form method="post" action="{{route('admin.user.create-user-store') }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-1 control-label">نام </label>
                            <div class="col-sm-4"><input type="text" name="first_name" class="form-control"
                                    @error('first_name')  style="border: 2px solid red" @enderror value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 control-label">نام خانوادگی </label>
                            <div class="col-sm-4"><input type="text" name="last_name" class="form-control"
                                    @error('last_name')  style="border: 2px solid red" @enderror value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        

                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label"> ایمیل</label>
                            <div class="col-sm-4"><input type="email" name="email" class="form-control"
                                    @error('email')  style="border: 2px solid red" @enderror value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 control-label"> شماره همراه</label>
                            <div class="col-sm-4"><input type="text" name="phone" class="form-control"
                                    @error('phone')  style="border: 2px solid red" @enderror value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                       
                       
                        <div class="form-group">
                            <label class="col-sm-1 control-label"> کلمه عبور </label>
                            <div class="col-sm-4"><input type="password" name="password" class="form-control" 
                                    @error('password')  style="border: 2px solid red" @enderror  value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 control-label"> تکرار کلمه عبور </label>
                            <div class="col-sm-4"><input type="password" name="password_confirmation"   class="form-control"
                                    @error('password_confirmation')  style="border: 2px solid red" @enderror value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-1">
                                <a href="{{ route('admin.user.user-index') }}" class="btn btn-white" type="submit">لغو</a>
                                <button class="btn btn-primary" type="submit">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
@endsection


