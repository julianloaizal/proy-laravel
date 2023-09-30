@section('title', __('Posts'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Post Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Posts">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Posts
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.posts.create')
						@include('livewire.posts.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Author Id</th>
								<th>Category Id</th>
								<th>Title</th>
								<th>Seo Title</th>
								<th>Excerpt</th>
								<th>Body</th>
								<th>Image</th>
								<th>Slug</th>
								<th>Meta Description</th>
								<th>Meta Keywords</th>
								<th>Status</th>
								<th>Featured</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->author_id }}</td>
								<td>{{ $row->category_id }}</td>
								<td>{{ $row->title }}</td>
								<td>{{ $row->seo_title }}</td>
								<td>{{ $row->excerpt }}</td>
								<td>{{ $row->body }}</td>
								<td>{{ $row->image }}</td>
								<td>{{ $row->slug }}</td>
								<td>{{ $row->meta_description }}</td>
								<td>{{ $row->meta_keywords }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->featured }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Post id {{$row->id}}? \nDeleted Posts cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $posts->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
