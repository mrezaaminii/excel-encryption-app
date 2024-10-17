@extends('layouts.master')

@section('title', 'decrypt')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Decrypt Excel File</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('excel.decrypt.process') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose File:</label>
                                <input type="file" class="form-control-file" id="file" name="excel_file">
                            </div>
                            <button type="submit" class="btn btn-primary">Decrypt</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Decrypted Files</div>
                <div class="card-body">
                    <ul>
                        @forelse ($files as $file)
                            <li class="mb-2">
                                <form action="{{ route('excel.decrypt.download') }}" method="POST">
                                    @csrf
                                    <input name="decrypted_file" type="hidden" value="{{ $file->decrypted_path }}">
                                    <button type="submit" class="btn btn-sm btn-primary">{{ $file->name }}</button>
                                </form>
                            </li>
                        @empty
                            <p>nothing to show</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
