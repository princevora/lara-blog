<?php

namespace App\Livewire\Frontend\Blogs;

use App\Models\Blog;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class ListBlog extends Component
{
    /**
     * @var mixed
     */
    public $blogs;

    public function loadMore()
    {
        $this->blogs = Blog::take(10)
            ->whereNotIn('id', $this->blogs->pluck('id')) ?? [];
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
        $this->blogs = Blog::take(10)
                        ->get(); 
                        
        return view('frontend.blogs.skeleton');
    }
}
