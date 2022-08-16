@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Ecommerce
        @endslot
        @slot('title')
            {{-- Upload {{$request->query('type')}} images --}}
{{$type}}
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
                        <form action="{{ route('droppzone.store') }}" method="post" class="dropzone" id="image-upload">
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
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>


    </script>
@endsection
