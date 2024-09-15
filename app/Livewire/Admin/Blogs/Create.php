<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Component;

class Create extends Component
{
    /**
     * @var string $title
     */
    public string $title;

    /**
     * @var string
     */
    public string $slug;

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
        $this->title = str_replace(' ', '-', $value);
    }
}
