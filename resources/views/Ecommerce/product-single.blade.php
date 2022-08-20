@extends('layouts.master')
@section('title')
    {{-- @lang('translation.Add_Product')
     --}}
     update Product
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
            Update Product
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                    @if ($type == 'view')
                        <p class="card-title-desc">Fill all information below</p>
                    @else
                        <p class="card-title-desc">Image</p>
                    @endif
                </div>
                @include('layouts.message')
                @if ($type == 'view')
                    <div class="card-body">

                        <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="alert alert-primary"> {{ $product->type ?? 'Product' }} </div>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pTitle">Product Name</label>
                                        <input id="pTitle" value="{{ $product->pTitle }}" name="pTitle" type="text"
                                            class="form-control" placeholder="Product Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="manufacturername">Manufacturer Name</label>
                                        <input id="manu_name" value="{{ $product->manu_name }}" name="manu_name"
                                            type="text" class="form-control" placeholder="Manufacturer Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="manu_brand">Manufacturer Brand</label>
                                        <input id="manu_brand" value="{{ $product->manu_brans }}" name="manu_brand"
                                            type="text" class="form-control" placeholder="Manufacturer Brand">
                                    </div>
                                    <img src="{{ $product->pImage }}" alt="" height="100px">
                                    <div class="mb-3">
                                        <label for="manu_brand">Default Image</label>
                                        <input id="image" name="image" type="file" class="form-control"
                                            placeholder="Manufacturer Brand" >
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="price">Old Price</label>
                                                <input id="price" name="pOldPrice" value="{{ $product->pOldPrice }}"
                                                    type="text" class="form-control" placeholder="Old Price">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="price">Selling Price</label>
                                                <input id="price" name="pSellingPrice"
                                                    value="{{ $product->pSellingPrice }} " type="text"
                                                    class="form-control" placeholder="SellingPrice" required>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Category</label>
                                                <select class="form-control select2" name="pCategory" required>
                                                    <option value="{{ $product->pCategory }}"> {{ $product->pCategory }}
                                                    </option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->category }}"> {{ $item->category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Sub Category</label>
                                                <input type="text" class="form-control" name="pSubCategory"
                                                    id="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="qty">Quantity</label>
                                                <input id="qty" name="qty" value="{{ $product->qty }}"
                                                    type="number" class="form-control" placeholder="Quntity" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Label</label>
                                                <select class="form-control select2" name="label" required>
                                                    <option value="{{ $product->label }}">{{ $product->label }}</option>
                                                    <option value="Top">Top Deals </option>
                                                    <option value="Trending">Trending </option>
                                                    <option value="New">New </option>

                                                    {{-- @foreach ($category as $item)
                                                    <option value="{{ $item->category }}"> {{ $item->category_name }}
                                                    </option>
                                                @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                        <label class="control-label">Feature</label>
                                        <select class="select2 form-control select2-multiple" name="featured[]"
                                            multiple="multiple" data-placeholder="Choose ..." required>
                                            <option value="WI">Wireless</option>
                                            <option value="BE">Battery life</option>
                                            <option value="BA">Bass</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Color</label>
                                        <select class="select2 form-control select2-multiple" name="color[]"
                                            multiple="multiple" data-placeholder="Choose ..." required>
                                            <option value="Black">Black</option>
                                            <option value="White">White</option>
                                            <option value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Green">Green</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label">Size</label>
                                        <select class="select2 form-control select2-multiple" name="size[]"
                                            multiple="multiple" data-placeholder="Choose ..." required>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productdesc">Short Description</label>
                                        <textarea class="form-control" id="shortDescription" name="shortDescription" rows="5"
                                            placeholder="Short Description">{{ $product->shortDescription }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Product</button>
                                {{-- <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button> --}}
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{ route('droppzone.pstore') }}" method="post" class="dropzone"
                            id="image-upload">
                            <input type="hidden" name="sku" value="{{ $sku }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="type" value="Product">
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
                        <a href="{{ route('product.view') }}" class="btn btn-primary mt-2 btn-lg"> Done </a>
                    </div>
                @endif
            </div>

            {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Product Images</h4>
                </div>
                <div class="card-body">
                    <form action="/" method="post" class="dropzone">
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
                </div>

            </div> --}}

            <!-- end card-->

            {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Meta Data</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                <div class="card-body">

                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="metatitle">Meta title</label>
                                    <input id="metatitle" name="productname" type="text" class="form-control"
                                        placeholder="Metatitle">
                                </div>
                                <div class="mb-3">
                                    <label for="metakeywords">Meta Keywords</label>
                                    <input id="metakeywords" name="manufacturername" type="text" class="form-control"
                                        placeholder="Meta Keywords">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="metadescription">Meta Description</label>
                                    <textarea class="form-control" id="metadescription" rows="5" placeholder="Meta Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                        </div>
                    </form>

                </div>
            </div> --}}
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
