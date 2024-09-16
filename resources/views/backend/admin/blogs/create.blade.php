@extends('backend.admin.layouts.layout')
@section('title', 'Create Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.create />
@endsection
@section('scripts')
    <script>
        $('#summernote').summernote({
            placeholder: 'Enter Blog Data Here',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
