@extends('backend.admin.layouts.layout')
@section('title', 'Edit Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.edit />
@endsection