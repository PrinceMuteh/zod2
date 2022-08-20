@extends('layouts.master')
@section('title')
    {{-- @lang('translation.Brand') --}}
    Users
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Users
        @endslot
        @slot('title')
            View Users
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
                    <div class="row">
                        <div class="col justify-content-end">
                            <div class="col">
                                <a href="{{ route('create.user') }}" class="btn btn-primary"> Add Account </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('user.single',['id' => $item->id]) }}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->usertype }}</td>

                                        <td>
                                            <a href="{{ route('edit.user', ['id' => $item->id]) }}"
                                                class="btn btn-outline-secondary btn-sm " title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm"
                                                onclick="deleteAccount({{ $item->id }})" title="Delete">
                                                <i class="fas fa-times"></i>
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

    <script>
        function deleteAccount(id) {
            // confirm();
            console.log(id);
        }
    </script>
@endsection
