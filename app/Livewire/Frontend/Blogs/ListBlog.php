<?php

namespace App\Livewire\Frontend\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class ListBlog extends Component
{
    public $blogs;

    /**
     * @return void
     */
    public function mount()
    {
        $this->blogs = Blog::all();     
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.frontend.blogs.list-blog');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function placeholder()
    {
        return view('frontend.blogs.skeleton');
    }
}
