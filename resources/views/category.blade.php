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

                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="categoryname">Category Name</label>
                                    <input id="categoryname" value="{{ old('category_name') }}" name="category_name"
                                        type="text" class="form-control" placeholder="Product Name">
                                </div>
                                <div class="mb-3">
                                    <label for="categorydesc">Category Description</label>
                                    <textarea class="form-control" id="categorydesc" name="category_description" value="{{ old('category_description') }}" rows="5"
                                        placeholder="Category Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Category</button>
                        </div>
                    </form>
                </div>
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
