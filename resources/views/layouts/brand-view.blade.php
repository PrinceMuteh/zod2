@extends('layouts.master')
@section('title')
    {{-- @lang('translation.Category') --}}
    Brand
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Brand
        @endslot
        @slot('title')
            View Brand
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Table Edit</h4> --}}
                    {{-- <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table rows editable.</p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($brand as $item)
                                    <tr data-id="{{ $item->id }}">
                                        {{-- <td data-field="name">{{ $item->category_name }}</td> --}}
                                        {{-- <td data-field="manufacturer">{{ $item->category_description }}</td> --}}
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/table-edits/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/table-editable.int.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
