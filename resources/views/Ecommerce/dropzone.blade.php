@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection
@section('css')
    {{-- <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            Upload image Product
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Product Images</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('droppzone.store') }}" method="post" class="dropzone" id = "image-upload">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    {{-- <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    {{-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script> --}}
    {{-- <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script> --}}
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    {{-- <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        };
    </script> --}}
    </script>
@endsection
