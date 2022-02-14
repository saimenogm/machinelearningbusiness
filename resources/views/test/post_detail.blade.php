@extends('layouts.app')
@section('content')

        <div class="page-content--bgf7" style="width:100%;">

		<br/><br/>
            <!-- WELCOME-->
            <section class="welcome p-t-10" style="width:100%;">
                <div class="container" >
                    <div class="row" style="width:100%;">
                        <div class="col-md-8" style="background-color:#fff; padding:15pt;">
                            <h2 class="title-4">{{$post_details->title}}</h2>
                            <hr class="line-seprate">
							<div class="post_body">
							<br/>
							Posted by: Simon Okbagergis Manna <br/>
							Date Posted: {{$post_details->date_posted}} <br/>
							Last Updated: {{$post_details->date_updated}} <br/><br/>
							
							{{$post_details->description}} <br/><br/>
							
<p>
<?php
echo $post_contents[0]->content_details;
?>

</p>

</div>							
</div>							


							 <div class="col-md-4" style="height: 400px;">
                            <h2 class="title-4">Most Popular Posts</h2>
                            <hr class="line-seprate">
						

<div class="col-md-12">

                 @foreach( $posts as $post )

							<div class="card">
                                    <div class="card-body rounded">
									<div  style="float:left;" >
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
