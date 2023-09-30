<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="author_id"></label>
                <input wire:model="author_id" type="text" class="form-control" id="author_id" placeholder="Author Id">@error('author_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="category_id"></label>
                <input wire:model="category_id" type="text" class="form-control" id="category_id" placeholder="Category Id">@error('category_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="title"></label>
                <input wire:model="title" type="text" class="form-control" id="title" placeholder="Title">@error('title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="seo_title"></label>
                <input wire:model="seo_title" type="text" class="form-control" id="seo_title" placeholder="Seo Title">@error('seo_title') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="excerpt"></label>
                <input wire:model="excerpt" type="text" class="form-control" id="excerpt" placeholder="Excerpt">@error('excerpt') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="body"></label>
                <input wire:model="body" type="text" class="form-control" id="body" placeholder="Body">@error('body') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="image"></label>
                <input wire:model="image" type="text" class="form-control" id="image" placeholder="Image">@error('image') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="slug"></label>
                <input wire:model="slug" type="text" class="form-control" id="slug" placeholder="Slug">@error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="meta_description"></label>
                <input wire:model="meta_description" type="text" class="form-control" id="meta_description" placeholder="Meta Description">@error('meta_description') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="meta_keywords"></label>
                <input wire:model="meta_keywords" type="text" class="form-control" id="meta_keywords" placeholder="Meta Keywords">@error('meta_keywords') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="featured"></label>
                <input wire:model="featured" type="text" class="form-control" id="featured" placeholder="Featured">@error('featured') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
