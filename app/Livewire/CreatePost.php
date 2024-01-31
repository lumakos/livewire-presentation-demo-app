<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Builder;

class CreatePost extends Component
{
    #[Validate('required|min:5')]
    public string $title = '';

    #[Validate('required|min:5')]
    public string $body = '';

    public bool $success = false;

    public string $componentTitle;

    public string $searchQuery = '';

    /**
     * Livewire components don't use __construct() because Livewire components are re-constructed
     * on subsequent network requests, and we only want to initialize the component once
     * when it is first created.
     *
     * In Livewire components, you use mount() instead of a class constructor __construct()
     * like you may be used to. NB: mount() is only ever called when the component is first mounted
     * and will not be called again even when the component is refreshed or rerendered.
     *
     * Runs once, immediately after the component is instantiated, but before render() is called.
     * This is only called once on initial page load and never called again, even on component refreshes
     *
     * @return void
     */
    public function mount(string $componentTitle = ''): void
    {
        $this->componentTitle = $componentTitle;
    }

    public function save(): void
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->success = true;

        $this->reset('title', 'body');
    }
    public function render()
    {
        $posts = Post::when($this->searchQuery !== '', fn(Builder $query) =>
        $query->where('title', 'like', '%'. $this->searchQuery .'%'))
            ->paginate(10);

        return view('livewire.create-post')
            ->with(['posts' => $posts]);
    }
}
