@extends('backend.admin.layouts.layout')
@section('title', 'Create Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.create />
@endsection