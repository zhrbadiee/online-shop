@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            ویرایش کاربر
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
                    <h5>ویرایش کاربر</h5>
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
                    <form method="post" action="{{route('admin.user.edit-user-update',$user->id) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-1 control-label">نام </label>
                            <div class="col-sm-4"><input type="text" name="first_name" class="form-control"
                                    @error('first_name')  style="border: 2px solid red" @enderror value="{{ $user->first_name }}">
                                @error('first_name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 control-label">نام خانوادگی </label>
                            <div class="col-sm-4"><input type="text" name="last_name" class="form-control"
                                    @error('last_name')  style="border: 2px solid red" @enderror value="{{ $user->last_name}}">
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
                                    @error('email')  style="border: 2px solid red" @enderror value="{{ $user->email }}">
                                @error('email')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-sm-2 control-label"> شماره همراه</label>
                            <div class="col-sm-4"><input type="text" name="phone" class="form-control"
                                    @error('phone')  style="border: 2px solid red" @enderror value="{{ $user->phone }}">
                                @error('phone')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                       

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-1">
                                <a href="{{ route('admin.user.admin-index') }}" class="btn btn-white" type="submit">لغو</a>
                                <button class="btn btn-primary" type="submit">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
@endsection


