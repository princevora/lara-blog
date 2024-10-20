<?php

namespace App\Livewire\Admin\Blogs;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Illuminate\Filesystem\join_paths;

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

    public Blog $blog;

    /**
     * @var string 
     */
    public const PREFIX = 'thumbnail-';

    public $meta_image;

    private const STORAGE_PATH = 'uploads/blogs/thumbnail/';

    public function mount(Request $request)
    {
        // Get Blog id from the request.
        $id = $request->id;

        // Find The blog or fail the request.
        $this->blog = Blog::findOrFail($id);

        // Retrive data
        $this->title = $this->blog->title;
        $this->slug = $this->blog->slug;
        $this->meta_description = $this->blog->meta_description;
        $this->meta_keywords = $this->blog->meta_keywords;
        $this->meta_image = $this->blog->meta_image;
        $this->content = $this->blog->blog_content;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.admin.blogs.edit');
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function updatedTitle(mixed $value)
    {
        if($value !== $this->blog->slug) {
            // Update slug
            $this->slug = Str::slug($value);
    
            // Check availability
            $this->slugAvailability = !Blog::where('slug', $value)->exists();
        }
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function updatedSlug(mixed $value)
    {
        if($value !== $this->blog->slug) {
            $this->slugAvailability = !Blog::where('slug', $value)->exists();
        }
    }

    /**
     * @return void
     */
    public function update()
    {
        $this->validate([
            'title' => 'required|min:30',
            'slug' => 'required',
            'content' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_image' => 'max:40000'
        ]);
        
        $this->alert(message: 'Blog has been updated');

        $fileName = $uploadedMetaImage = null;

        if (
            $this->meta_image && gettype($this->meta_image) == 'object'
            && $this->meta_image !== $this->blog->meta_image
        ) {
            // Create File Name
            $fileName = self::PREFIX . date('Y-m-d-s-i') . '-' . Str::random() . '.' . $this->meta_image->getClientOriginalExtension();

            // Save the image.
            $this
                ->meta_image
                ->storeAs(
                    self::STORAGE_PATH, 
                    $fileName, 
                    'public'
                );

            $uploadedMetaImage = join_paths('storage', self::STORAGE_PATH . $fileName);
        }

        // Check if the slug already exists.
        if (Blog::where('slug', $this->slug)->exists() && $this->slug !== $this->blog->slug)
            ValidationException::withMessages(['slug' => 'The slug already exists']);
        
        $this->blog->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'blog_content' => $this->content,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'meta_image' => $uploadedMetaImage
        ]);

        $this->alert(message: 'Blog has been updated');

        return $this->redirect(route('admin.blogs.edit', ['id' => $this->blog->id]), true);
    }
}
