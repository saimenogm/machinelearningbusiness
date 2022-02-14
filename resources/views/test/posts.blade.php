@extends('layouts.app')
@section('content')


        <div class="page-content--bgf7">

		<br/><br/>
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="title-4">Blog Posts</h2>
                            <hr class="line-seprate">
							

<div class="col-md-12">

                 @foreach( $posts as $post )

							<div class="card">
                                    <div class="card-body rounded">
									<div style="float:left;" class=" col-sm-3 col-md-2 col-lg-2">
									<img src="{{asset('images/user-1.png')}}" alt="John Doe" />
									</div>
									<div  style="float:left;" class=" col-sm-9 col-md-9 col-lg-9">
									<span style="color:#6777ef; margin-bottom:5pt;">{{$post->title}} </span>
                                        <p class="card-text">{{$post->description}}</p>
										<div class="float-left mt-sm-0 mt-0">
                        <a href="{{ route('post_details', ['post_id' => $post->id ]) }}" class="btn btn-primary btn-sm">View Post <i class="fas fa-chevron-right"></i></a>
                      </div>
									</div>
                                    </div>
                                </div>
								
								                  @endforeach

												 <div style="text-align:center;"> {{ $posts->links() }} </div>
                                </div>
								 </div>
							
							
							
							 <div class="col-md-4">
                            <h2 class="title-4">Most Popular Posts</h2>
                            <hr class="line-seprate">
						

<div class="col-md-12">

                 @foreach( $posts as $post )

							<div class="card">
                                    <div class="card-body rounded">
									<div style="float:left;" class=" col-sm-3 col-md-2 col-lg-2">
									<img src="{{asset('images/user-1.png')}}" alt="John Doe" />
									</div>
									<div  style="float:left;" class=" col-sm-9 col-md-9 col-lg-9">
									<span style="color:#6777ef; margin-bottom:5pt;">{{$post->title}} </span>
                                        <p class="card-text">{{$post->description}}</p>
										<div class="float-left mt-sm-0 mt-0">
                        <a href="#" class="btn btn-primary btn-sm">View Post <i class="fas fa-chevron-right"></i></a>
                      </div>
									</div>
                                    </div>
                                </div>
								
								                  @endforeach

                                </div>
								
							
                        </div>
                    </div>
                </div>
				
            </section>
       



  @endsection
