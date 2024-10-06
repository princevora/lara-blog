<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
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
    public const PREFIX = [
        'meta_image' => 'blog-',
        'thubmnail' => 'thumbnail' 
    ];

    public $meta_image;
    public $thumbnail;

    private const STORAGE_PATH = [
        'meta_image' => '/storage/uploads/blogs/seo/',
        'thumbnail' => '/storage/uploads/blogs/thumbnail',
    ];

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
            'meta_image' => 'required|image|max:40000',
            'thumbnail' => 'required|image|max:40000'
        ]);

        $uploadedMetaImage = null;

        if ($this->meta_image) {
            // Create File Name
            $fileName = self::PREFIX['meta_image'] . date('Y-m-d-s-i') . '-' . Str::random() . '.' . $this->meta_image->getClientOriginalExtension();

            // Save the image.
            $this->meta_image->storeAs('uploads', $fileName, 'public');

            $uploadedMetaImage = self::STORAGE_PATH['meta_image'] . $fileName;
        }

        if ($this->thumbnail) {
            // Create File Name
            $fileName = self::PREFIX['thubmnail'] . date('Y-m-d-s-i') . '-' . Str::random() . '.' . $this->meta_image->getClientOriginalExtension();

            // Save the image.
            $this->meta_image->storeAs('uploads', $fileName, 'public');

            $uploadedMetaImage = self::STORAGE_PATH['thumbnail'] . $fileName;
        }

        // Check if the slug already exists.
        if(Blog::where('slug', $this->slug)->exists()) 
            ValidationException::withMessages(['slug' => 'The slug already exists']);


        // Add to database.
        Blog::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'blog_content' => $this->content,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'meta_image' => $uploadedMetaImage,
            // 'thumbnail' => 
        ]);

        // Send response
        $this->alert(message: "The Blog Has been created successfully");
    }
}
