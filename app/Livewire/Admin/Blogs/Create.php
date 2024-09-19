<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.admin.blogs.create');
    }

    public function updatedTitle(mixed $value)
    {
        // Convert to lowercase
        $value = strtolower($value);

        // Remove all special characters except letters, numbers, and spaces
        $value = preg_replace('/[^a-z0-9\s]/', '', $value);

        // Replace multiple spaces with a single space
        $value = preg_replace('/\s+/', ' ', trim($value));

        // Replace spaces with hyphens
        $this->slug = str_replace(' ', '-', $value);

        $this->slugAvailability = !Blog::where('slug', $value)->exists();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|min:30',
            'slug' => 'required',
            'content' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_image' => 'required|image|max:40000'
        ]);

        // Create File Name
        $fileName = self::PREFIX . date('Y-m-d-s-i') . '-' . Str::random() . '.' . $this->meta_image->getClientOriginalExtension();

        // Check if the slug already exists.
        if(Blog::where('slug', $this->slug)->exists()) 
            ValidationException::withMessages(['slug' => 'The slug already exists']);

        // Add to database.
        Blog::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'blog_content' => $this->content,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description
        ]);

        // Save the image.
        $this->meta_image->storeAs('uploads', $fileName, 'public');
    }
}
