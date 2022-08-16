@extends('layouts.master')
@section('title')
    Update Account
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Settings
        @endslot
        @slot('title')
            Update Account
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Product Information</h4> --}}
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                @include('layouts.message')

                <div class="card-body">
                    <form action="{{ route('update.user') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name">Account Name</label>
                                    <input name="name" type="text" value="{{ $user->name }}"
                                        class="form-control @error('name') is-invalid @enderror" id="input-username">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email">Account Email</label>
                                    <input id="email" " name="email" type="text" value = " {{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Account Phone Number</label>
                                    <input id="phone" name="phone" type="text" value="{{ $user->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="usertype">Account User Type</label>
                                    <select class="form-control select2" name="usertype" value="{{ $user->usertype }}">
                                        <option>Select</option>
                                        <option value="Supplier"> Supplier </option>
                                        <option value="Logistic"> Logistics </option>
                                        <option value="Admin"> Admin </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="file" name="avatar" id="image" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" id="password" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{$user->avatar}}" alt="" srcset="">
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>

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
