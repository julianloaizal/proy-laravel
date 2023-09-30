<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $author_id, $category_id, $title, $seo_title, $excerpt, $body, $image, $slug, $meta_description, $meta_keywords, $status, $featured;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.posts.view', [
            'posts' => Post::latest()
						->orWhere('author_id', 'LIKE', $keyWord)
						->orWhere('category_id', 'LIKE', $keyWord)
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('seo_title', 'LIKE', $keyWord)
						->orWhere('excerpt', 'LIKE', $keyWord)
						->orWhere('body', 'LIKE', $keyWord)
						->orWhere('image', 'LIKE', $keyWord)
						->orWhere('slug', 'LIKE', $keyWord)
						->orWhere('meta_description', 'LIKE', $keyWord)
						->orWhere('meta_keywords', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('featured', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->author_id = null;
		$this->category_id = null;
		$this->title = null;
		$this->seo_title = null;
		$this->excerpt = null;
		$this->body = null;
		$this->image = null;
		$this->slug = null;
		$this->meta_description = null;
		$this->meta_keywords = null;
		$this->status = null;
		$this->featured = null;
    }

    public function store()
    {
        $this->validate([
		'author_id' => 'required',
		'title' => 'required',
		'excerpt' => 'required',
		'body' => 'required',
		'slug' => 'required',
		'meta_description' => 'required',
		'meta_keywords' => 'required',
		'status' => 'required',
		'featured' => 'required',
        ]);

        Post::create([ 
			'author_id' => $this-> author_id,
			'category_id' => $this-> category_id,
			'title' => $this-> title,
			'seo_title' => $this-> seo_title,
			'excerpt' => $this-> excerpt,
			'body' => $this-> body,
			'image' => $this-> image,
			'slug' => $this-> slug,
			'meta_description' => $this-> meta_description,
			'meta_keywords' => $this-> meta_keywords,
			'status' => $this-> status,
			'featured' => $this-> featured
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Post Successfully created.');
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id; 
		$this->author_id = $record-> author_id;
		$this->category_id = $record-> category_id;
		$this->title = $record-> title;
		$this->seo_title = $record-> seo_title;
		$this->excerpt = $record-> excerpt;
		$this->body = $record-> body;
		$this->image = $record-> image;
		$this->slug = $record-> slug;
		$this->meta_description = $record-> meta_description;
		$this->meta_keywords = $record-> meta_keywords;
		$this->status = $record-> status;
		$this->featured = $record-> featured;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'author_id' => 'required',
		'title' => 'required',
		'excerpt' => 'required',
		'body' => 'required',
		'slug' => 'required',
		'meta_description' => 'required',
		'meta_keywords' => 'required',
		'status' => 'required',
		'featured' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Post::find($this->selected_id);
            $record->update([ 
			'author_id' => $this-> author_id,
			'category_id' => $this-> category_id,
			'title' => $this-> title,
			'seo_title' => $this-> seo_title,
			'excerpt' => $this-> excerpt,
			'body' => $this-> body,
			'image' => $this-> image,
			'slug' => $this-> slug,
			'meta_description' => $this-> meta_description,
			'meta_keywords' => $this-> meta_keywords,
			'status' => $this-> status,
			'featured' => $this-> featured
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Post Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Post::where('id', $id);
            $record->delete();
        }
    }
}
