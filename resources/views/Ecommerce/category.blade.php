@extends('layouts.master')
@section('title')
    {{-- @lang('translation.Add_Category') --}}
    Category
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Add Category
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Information</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                @include('layouts.message')
                @if ($type == 'view')
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="categoryname">Category Name</label>
                                        <input id="categoryname" value="{{ old('category_name') }}" name="category"
                                            type="text" class="form-control" placeholder="Product Name">
                                    </div>

                                    <label for="icon">Select Icon</label>
                                    <select class="form-control select2 " name="icon" value="{{ old('icon') }}">
                                        <option>Select</option>
                                        @foreach ($icons as $item)
                                            <option value="{{ $item->icon }}"> {{ $item->icon }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="mb-3 mt-3 ">
                                        <label for="image"> Select Image</label>
                                        <input type="file" name="image" id="" class="form-control ">
                                    </div>

                                    <div class="mb-3 mt-3 ">
                                        <label for="categorydesc">Category Description</label>
                                        <textarea class="form-control" id="categorydesc" name="categoryDescription" value="{{ old('category_description') }}"
                                            rows="5" placeholder="Category Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Category</button>
                            </div>
                        </form>
                    </div>
                    {{-- @else
                    <div class="card-body">
                        <form action="{{ route('droppzone.update') }}" method="post" class="dropzone" id="image-upload">
                            <input type="hidden" name="type" value="Category">
                            <input type="hidden" name="id" value="{{$id}}">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </form>
                        <a href="{{ route('category.index') }}" class="btn btn-primary mt-2 btn-lg"> Done </a>
                    </div> --}}
                @endif

            </div>

        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
