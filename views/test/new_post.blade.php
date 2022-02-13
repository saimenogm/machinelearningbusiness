@extends('layouts.app')
@section('content')


<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>without bootstrap</title>
    <script src="{{asset('sm/jquery-3.4.1.slim.min.js')}}"></script>
    <link href="{{asset('sm/summernote-lite.min.css')}}" rel="stylesheet">
    <script src="{{asset('sm/summernote-lite.min.js')}}"></script>
  </head>
  <body>
    <div></div>
    
  </body>
</html>



        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">

		<br/><br/>
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="title-4">New Blog</h2>
                            <hr class="line-seprate">

							<form action="{{route('register_post')}}" method="post">
							@csrf  
							Title: <input type="text" id="title" name="title" placeholder="Title" class="form-control">
							<div class="row">
							<div class="col-md-5 col-lg-5">Date Posted: <input type="date" id="date_posted" name="date_posted" placeholder="Enter Date" class="form-control"></div>
							<div class="col-md-5 col-lg-5">Date Updated: <input type="date" id="date_updated" name="date_updated" placeholder="Enter Date Updated" class="form-control"></div>							
							</div>
							Content: <textarea class="form-control"  id="summernote" name="blog_content" placeholder="Enter Blog Contents here"></textarea>
							Posted By: <input type="text" id="posted_by" name="posted_by" placeholder="Posted By" class="form-control">
						    Tags: <input type="text" id="tags" name="tags" placeholder="tags" class="form-control">
						    Category: <input type="text" id="category_name" name="category_name" placeholder="category_name" class="form-control">
							Description: <textarea class="form-control" name="description" placeholder="Blog Description"></textarea>
			            <button type='Submit' role='button' class='btn btn-primary'> <i class='fa fa-fw fa-save'></i> Save </button>
        </form>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

			
    <script>
      $('#summernote').summernote({
        placeholder: 'Put the contents here',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>


  @endsection
