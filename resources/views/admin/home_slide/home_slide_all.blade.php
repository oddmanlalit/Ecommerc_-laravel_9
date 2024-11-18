@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery/3.7.1/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide Page</h4>
                        <form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">
                         @csrf
                        <input type="hidden" name="id" value="{{$homeslide->id}}"> 
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$homeslide->title}}" id="name">
                            </div>
                        </div>
                        <!-- end row -->
                         <div class="row mb-3">
                            <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{$homeslide->short_title}}" id="">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                            <input name="video_url" class="form-control" type="text" value="{{$homeslide->video_url}}" id="video_url">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="home_slide" class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                            <input name="home_slide" class="form-control" type="file" value="" id="home_slide">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{(!empty($homeslide->home_slide)?url($homeslide->home_slide):url('upload/no_image.jpg'))}}" alt="Card image cap" >
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <input type="submit"  class="btn btn-info waves-effect waves-light" value="Update slide">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>  
<script type="text/javascript">
   $(document).ready(function(){
        $('#home_slide').change(function(){
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

@endsection