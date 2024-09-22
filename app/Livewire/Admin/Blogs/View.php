<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class View extends Component
{
    use LivewireAlert;

    public $blogs;

    public function mount()
    {
        $this->blogs = Blog::all();
    }

    public function render()
    {
        return view('livewire.admin.blogs.view');
    }
}
