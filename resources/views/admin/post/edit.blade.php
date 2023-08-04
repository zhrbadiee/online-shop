@extends('admin.layouts.app')

@section('breadcrumb')
    @component('admin.layouts.partials.breadcrumb')
        @slot('title_breadcrumb')
            ویرایش پست
        @endslot
        @slot('text_breadcrumb')
            پست
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ویرایش پست </h5>
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
                    <form method="post" action="{{ route('admin.post.edit.update', $post->id) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group"><label class="col-sm-2 control-label">نام </label>
                            <div class="col-sm-10"><input type="text" name="name" value="{{ $post->name }}"
                                    class="form-control" @error('name')  style="border: 2px solid red" @enderror
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">تصویر</label>
                            <div class="col-sm-10"><input type="file" name="image" value="{{ $post->image }}"
                                    class="form-control" @error('image')  style="border: 2px solid red" @enderror
                                    value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label"> جنس</label>
                            <div class="col-sm-10"><input type="text" name="type" value="{{ $post->type }}"
                                    class="form-control" @error('type')  style="border: 2px solid red" @enderror
                                    value="{{ old('type') }}">
                                @error('type')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label"> قیمت</label>
                            <div class="col-sm-10"><input type="text" name="price" value="{{ $post->price}}"
                                    class="form-control" @error('price')  style="border: 2px solid red" @enderror
                                    value="{{ old('price') }}">
                                @error('price')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">سایز </label>
                            <div class="col-sm-10">
                                @php
                                    $sizes = [];
                                    for ($i = 36; $i <= 50; $i += 2) {
                                        $sizes[] = $i;
                                    }
                                @endphp
                                <select class="form-control m-b" name="size"
                                    @error('size')  style="border: 2px solid red" @enderror>
                                    @error('size')
                                        <span class="invalid-feedback" style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($sizes as $size)
                                        <option> {{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">دسته بندی</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="category_id" value="{{ $post->category->name }}"
                                    @error('category_id')  style="border: 2px solid red" @enderror>
                                    @error('category_id')
                                        <span class="invalid-feedback" style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($categories as $category)
                                        <option @if ($post->category_id == $category->id) selected @endif
                                            value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label"> تعداد قابل فروش</label>
                            <div class="col-sm-10"><input type="text" name="marketable_number"
                                    value="{{ $post->marketable_number }}" class="form-control"
                                    @error('marketable_number')  style="border: 2px solid red" @enderror>
                                @error('marketable_number')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group"><label class="col-sm-2 control-label">توضیحات</label>
                            <div class="col-sm-10">
                                <textarea name="detail" id="detail" value="" cols="30" rows="10"
                                    @error('detail')  style="border: 2px solid red" @enderror>{{ $post->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="{{ route('admin.post.index') }}" class="btn btn-white" type="submit">لغو</a>
                                <button href="{{ route('admin.post.edit.update', $post->id) }}" class="btn btn-primary"
                                    type="submit">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-script')
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('detail')
        })
    </script>
@endpush
