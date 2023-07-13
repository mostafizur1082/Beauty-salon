@extends('layouts.frontend.main')

@section('content')
	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@foreach($blog_details as $blog)
					<div class="news-details">
						<div class="post-thumb">
							<img src="{{ asset('storage/blog/'.$blog->image) }}" alt="">
						</div>
						<ul class="post-meta list-inline">
							<li class="list-inline-item"><a href="#"><i class="fa fa-user"></i> {{ $blog->user->name }}</a></li>
							<li class="list-inline-item"><i class="fa fa-calendar"></i>{{ $blog->created_at->diffForHumans() }}</li>
							
						</ul>
						<h3>{{ $blog->title }}</h3>
						
						<div class="content-block">
							<p>{{ $blog->body }}</p>
						</div>
						
						<div class="comment-title">
                            <h3>Comments ({{ $blog->comments()->count() }})</h3>
                        </div>
						<ol class="comment-list">
							<!-- comment-list    -->
							@if($blog->comments->count() > 0)
							@foreach($blog->comments as $comment)
							<li class="comment">
								<div class="comment-info">
									<div class="author-avatar">
										<img alt="alt" src="{{ asset('storage/profile/'.$comment->user->image) }}" height="80" width="80">
									</div>
									<div class="author-desc">
										<div class="author-title">
											<strong>{{ $comment->user->name }}</strong>
										</div>
										<p>{{ $comment->comment }}</p>
										<ul class="list-inline">
											<li class="list-inline-item">{{ $comment->created_at->diffForHumans()}}</li>
											
										</ul>
									</div>
								</div>
							</li>
							@endforeach
							@else
							<p>No Comment yet. Be the first</p>
							@endif
							<!-- comment -->
							
							
						</ol>
						
						<div class="comment-title">
                            <h3>Leave Your Comments</h3>
                        </div>
						
						<div class="comment-form">
							<form method="POST" action="{{ route('comment.store',$blog->id) }}">
							@csrf
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea placeholder="Your comments" cols="20" rows="8" class="form-control" name="comment"></textarea>
										</div>
									</div>
								</div>

								<input type="submit" value="Submit" class="btn btn-primary">
							
							</form>
						</div><!--end comment-form-->
					</div>
					@endforeach
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="sidebar-item">
							<form method="post" action="#">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Enter keyword..." name="search">
									<span class="input-group-addon"><button type="submit"><i class="fa fa-search"></i></button></span>
								</div>
							</form>
						</div>
						<!--end sidebar-item-->	
						
						<div class="sidebar-item sidebar-widget">
							<h3>Categories</h3>
							<ul class="category-list">
								@foreach($blog->categories as $category)
                                 
                                    <li><a href="">{{ $category->name }}</a></li>
                                @endforeach
								
							</ul>
						</div>
						<!--end sidebar-item-->	
							
							
						
						<div class="sidebar-item sidebar-widget">
							<h3>Tag Cloudes</h3>
							<ul class="tag-list">
								@foreach($blog->tags as $tag)
                                 
                                    <li><a href="">{{ $tag->name }}</a></li>
                                @endforeach
								
								
							</ul>
						</div><!--end sidebar-item-->		
						
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection