@extends('layouts.master')
@section('title')
    {{-- @lang('translation.Add_brand') --}}
    Brand
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
            Add Brand
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Brand Information</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                @include('layouts.message')
                @if ($type == 'view')
                    <div class="card-body">
                        <form action="{{ route('brand.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="brandname">Brand Name</label>
                                        <input id="brandname" value="{{ old('brand_name') }}" name="brand_name"
                                            type="text" class="form-control" placeholder="Product Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="branddesc">brand Description</label>
                                        <textarea class="form-control" id="branddesc" name="brand_description" value="{{ old('brand_description') }}"
                                            rows="5" placeholder="brand Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    brand</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{ route('droppzone.store') }}" method="post" class="dropzone" id="image-upload">
                            <input type="hidden" name="type" value="brand">
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
                        <a href="{{ route('brand.index') }}" class="btn btn-primary mt-2 btn-lg"> Done </a>
                    </div>
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
