@extends('backend.admin.layouts.layout')
@section('title', 'Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.view />
@endsection
@push('scripts')
    <script>
        window.addEventListener("popstate", function (event) { window.location.reload(); });

        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endpush
