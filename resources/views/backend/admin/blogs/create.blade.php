@extends('backend.admin.layouts.layout')
@section('title', 'Create Blog')
@section('parent_page', 'Blogs')
@section('child_page', 'Create')
@section('content')
    <livewire:admin.blogs.create />
@endsection
@section('scripts')
    <script>
        // $('#summernote').summernote({
        //     placeholder: 'Enter Blog Data Here',
        //     tabsize: 2,
        //     height: 120,
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'underline', 'clear']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']]
        //     ]
        // });

        function loadSummernote() {
            console.log(typeof $.fn.summernote === 'undefined');
            
            if (typeof $.fn.summernote === 'undefined') {
                // Load the Summernote JS and CSS files
                var script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js';
                script.onload = function() {
                    initializeSummernote();
                };
                document.head.appendChild(script);

                // Load Summernote CSS
                var link = document.createElement('link');
                link.rel = 'stylesheet';
                link.href = 'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css';
                document.head.appendChild(link);
            } else {
                // If already loaded, initialize Summernote
                initializeSummernote();
            }
        }

        function initializeSummernote() {
            $('#summernote').summernote();
        }


        // document.addEventListener('DOMContentLoaded', function() {
            Livewire.hook('message.processed', () => {
                alert('OK');
            })
            // if (document.querySelector('#summernote')) {
            //     loadSummernote();
            // }
        // });
    </script>
@endsection
