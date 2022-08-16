@if (session()->has('success'))
    <div class=" ontainer alert alert-success alert-dismissible fade show" role="alert">
        <strong>success !</strong>
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    {{-- <div class="alert alert-success">
        <strong>{{ session()->get('success') }}</strong>
    </div> --}}
    <!-- Modal -->
@endif

@if (session()->has('Emessage'))
    <div class="alert alert-danger text-capitalize">
        {{ session()->get('Emessage') }}
    </div>
@endif


@if (session('status'))
    <div class="alert alert-warning text-capitalize">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Whoops !</strong>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
