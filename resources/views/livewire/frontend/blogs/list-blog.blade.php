<div class="grid md:grid-cols-4 grid-cols-2 max-w-screen-xl mt-4">
    @foreach ($blogs as $blog)
        <article class="max-w-xs mx-2 mt-4">
            <a href="#">
                <img src="{{ asset($blog->meta_image) }}"
                    class="mb-5 rounded-lg" alt="Image 1">
            </a>
            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                <a href="#">{{ Str::limit($blog->title, 30, '...') }}</a>
            </h2>
            <p class="mb-4 text-gray-500 dark:text-gray-400">
                {{ Str::limit($blog->meta_description, 40, '...') }}
            </p>
            <a href="#"
                class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                Read More
            </a>
        </article>
    @endforeach
</div>
