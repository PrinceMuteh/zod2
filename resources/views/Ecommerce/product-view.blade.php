@extends('layouts.master')
@section('title')
    @lang('translation.Editable_Table')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Products
        @endslot
        @slot('title')
            View Products
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Products</h4>
                    {{-- <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table rows editable.</p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <table class="table table-editable table-nowrap align-middle table-edits"> --}}
                        <table class="table  table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Sku</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                    <th>quantity</th>
                                    <th>Label</th>
                                    <th>Status</th>
                                    <th>TodayDeal</th>
                                    <th>Featured</th>
                                    <th>Publish</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td data-field="price">
                                            <img src="{{ $item->pImage }}" height="100px" alt="" srcset="">
                                        </td>
                                        <td>{{ $item->sku }}</td>
                                        <td data-field="name">{{ $item->pTitle }}</td>
                                        <td data-field="manufacturer">{{ $item->pCategory }}</td>
                                        <td data-field="price">{{ $item->pOldPrice }}</td>
                                        <td data-field="price">{{ $item->pSellingPrice }}</td>
                                        <td data-field="price">{{ $item->qty }}</td>
                                        <td data-field="price">{{ $item->label }}</td>
                                        <td>
                                            @if ($item->status == 'Approved')
                                                <div class="text-success">{{ $item->status }}</div>
                                            @else
                                                <div class="text-warning">{{ $item->status }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->todayDeal == 'Yes')
                                                <input type="checkbox" name="todayDeal" id="" checked>
                                            @else
                                                <input type="checkbox" name="todayDeal" id="">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->featured == 'Yes')
                                                <input type="checkbox" name="todayDeal" id="" checked>
                                            @else
                                                <input type="checkbox" name="todayDeal" id="">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->publish == 'Yes')
                                                <input type="checkbox" name="todayDeal" id="" checked>
                                            @else
                                                <input type="checkbox" name="todayDeal" id="">
                                            @endif
                                        </td>

                                        {{-- <td data-field="gender"></td> --}}
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm "
                                                onclick="delete({{ $item->id }})">
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
        $("table tr td").editable({
            save: function(values) {
                var id = $(this).data('id-field');
                //   var id = $(this).children();

                console.log(id);
                //   $.post('/api/object/' + id, values);
            }
        });
    </script>
@endsection
