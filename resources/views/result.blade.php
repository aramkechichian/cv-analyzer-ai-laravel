@extends('layouts.app')

@section('title', 'Analysis Result')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">CV Compatibility Analysis Result</h1>

    @if(isset($result['error']))
        <div class="alert alert-danger text-center">
            {{ $result['error'] }}
        </div>
    @else
        <div class="card mx-auto" style="max-width: 700px;">
            <div class="card-body">
                <pre style="white-space: pre-wrap; word-wrap: break-word;">{{ $result['raw'] }}</pre>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('upload.form') }}" class="btn btn-secondary">Analyze Another CV</a>
        </div>
    @endif
</div>
@endsection