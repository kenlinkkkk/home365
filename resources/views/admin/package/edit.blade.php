@extends('admin.layout')

@section('title')
    <title>Chỉnh sửa gói</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Chỉnh sửa gói</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item">Gói</li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.package.update', [$package->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="name" required value="{{ $package->name }}">
                        </div>
                        <div class="form-group">
                            <label>Short tag</label>
                            <input type="text" class="form-control" name="slug" value="{{ $package->slug }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Ảnh nền <span class="text-danger">(*)</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="picture">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Mã gói <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="package_code" value="{{ $package->package_code }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Giá (VNĐ) <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="price" value="{{ $package->price }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Thời hạn (ngày) <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="duration" value="{{ $package->duration }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label>Gói lẻ <span class="text-danger">(*)</span></label>
                                <div class="custom-file">
                                    <select name="fa_package" class="custom-select">
                                        <option value="0" {{ $package->fa_package == 0 ? 'selected' : '' }}>Không</option>
                                        @if(count($packages) > 0)
                                            @foreach($packages as $item)
                                                <option value="{{ $item->id }}" {{ $package->fa_package == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label>Nội dung <span class="text-danger">(*)</span></label>
                        <textarea id="elm1" class="form-control" name="description" required>{!! $package->description !!}</textarea>
                        <p class="text-danger">Trường (*) là bắt buộc</p>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" name="submit" class=" m-2 btn btn-sm btn-success">Thêm mới</button>
                            <a href="{{ route('admin.package.index') }}" class="m-2 btn btn-sm btn-warning">Trở về</a>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/admin/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/form-element.init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/form-editor.init.js') }}"></script>
    <script>
        bsCustomFileInput.init();
    </script>
@endsection
