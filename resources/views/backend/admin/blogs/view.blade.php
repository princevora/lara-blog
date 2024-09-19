@extends('backend.admin.layouts.layout')
@section('title', 'Create Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.view />
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endsection
