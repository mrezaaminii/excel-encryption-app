@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import Excel File</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('import.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose Excel File:</label>
                                <input type="file" class="form-control-file" id="file" name="file" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Import & Encrypt</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Imported Files</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
