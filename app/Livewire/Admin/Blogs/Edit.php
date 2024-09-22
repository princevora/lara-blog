<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    /**
     * @var string $title
     */
    public string $title;

    /**
     * @var string
     */
    public string $slug;

    /**
     * @var ?bool $slugAvailability
     */
    public ?bool $slugAvailability = null;
 
    /**
     * @var mixed $content 
     */
    public mixed $content;

    /**
     * @var string $meta_keywords
     */
    public string $meta_keywords;

    /**
     * @var string $meta_description
     */
    public string $meta_description;

    /**
     * @var string 
     */
    public const PREFIX = 'blog-';

    public $meta_image;

    private const STORAGE_PATH = '/storage/uploads/';

    public function mount(Blog $id)
    {
        $this->title = $id->title;
        $this->slug = $id->slug;
        $this->meta_description = $id->meta_description;
        $this->meta_keywords = $id->meta_keywords;
        $this->meta_image = $id->meta_image;
        $this->content = $id->blog_content;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.admin.blogs.edit');
    }
}
