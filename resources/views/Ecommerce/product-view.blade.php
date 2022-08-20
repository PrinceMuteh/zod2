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
                                @if (count($product) < 1)
                                    <div class="alert alert-warning" role="alert">
                                        <h4 class="alert-heading">Empty</h4>
                                        <p>No Product Found yet</p>
                                        <p class="mb-0"></p>
                                    </div>
                                @else
                                    @foreach ($product as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>
                                                <a href="{{ route('product.single', ['id' => $item->id]) }}">
                                                    <img src="{{ $item->pImage }}" height="80px" alt=""
                                                        srcset="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('product.single', ['id' => $item->id]) }}">
                                                    {{ $item->sku }}
                                                </a>
                                            </td>
                                            <td data-field="name">
                                                <a href="{{ route('product.single', ['id' => $item->id]) }}">
                                                    <b> {{ $item->pTitle }} </b> <br> $ {{ $item->pSellingPrice }}
                                                </a>
                                            </td>
                                            <td data-field="manufacturer">{{ $item->pCategory }}</td>
                                            <td data-field="price"> $ {{ number_format($item->pOldPrice) }}</td>
                                            <td data-field="price">
                                                @if ($item->qty == 0)
                                                    Out Of Stock
                                                @else
                                                    Avialable
                                                @endif
                                                <br>
                                                {{ $item->qty }}
                                            </td>
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
                                @endif

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
