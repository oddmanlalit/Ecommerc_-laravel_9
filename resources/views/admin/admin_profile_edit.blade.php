@extends('admin.admin_master')
@section('admin')
<script src="{{asset('backend/assets/js/jquery/3.7.1/jquery.min.js')}}"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="name">
                            </div>
                        </div>
                        <!-- end row -->
                         <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" value="{{$editData->email}}" id="email">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="{{$editData->username}}" id="username">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                            <input name="profile_image" class="form-control" type="file" value="" id="profile_image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{(!empty($editData->profile_image)?url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg'))}}" alt="Card image cap" >
                            </div>
                        </div>
                        <!-- end row -->
                       
                        <input type="submit"  class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>  
<script type="text/javascript">
   $(document).ready(function(){
        $('#profile_image').change(function(){
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