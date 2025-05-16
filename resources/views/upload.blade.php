@extends('layouts.app')

@section('title', 'Upload CV')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Upload your CV and Job Description</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('analyze') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
        @csrf

        <div class="mb-3">
            <label for="cv_file" class="form-label">Select CV (PDF or DOCX)</label>
            <input class="form-control" type="file" id="cv_file" name="cv_file" accept=".pdf,.docx" required>
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="6" placeholder="Paste the job description here" required>{{ old('job_description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Analyze Compatibility</button>
    </form>
</div>
@endsection