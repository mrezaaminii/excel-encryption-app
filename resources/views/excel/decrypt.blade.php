@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Decrypt Excel File</div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="file">Choose File:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Decrypt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
