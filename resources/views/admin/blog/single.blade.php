@extends('layout.admin-master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
         <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
                  <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                      <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <a href="{{route('admin.index')}}" class="kt-subheader__breadcrumbs-link">Home</a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <a href="{{route('admin.blog.index')}}" class="kt-subheader__breadcrumbs-link">Posts</a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
                      <a href="#" class="kt-subheader__breadcrumbs-link">Single Post</a>
                      <span class="kt-subheader__breadcrumbs-separator"></span>
              </div>
           </div>
        </div>
    </div>
    <!-- end:: Subheader -->
  <div class="row">
   <div class="col-xl-6">
       <!--begin::Portlet-->
       <div class="kt-portlet">
           <div class="kt-portlet__head">
               <div class="kt-portlet__head-label">
                   <div class="btn-group">
                     <a href="#" class="btn btn-sm btn-label-info btn-bold" data-toggle="modal" data-target="#kt_blockui_4_3_modal">Edit Post</a>
                     <a class="btn btn-sm btn-label-danger btn-bold" href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}">Delete Post</a>
                   </div>
               </div>
           </div>
           <div class="kt-portlet__body">
               <!--begin::Section-->
               <div class="kt-section">
                 <span class="kt-timeline-v1__item-time kt-font-brand">{{$post->created_at}}<span></span></span>
                   <span class="kt-section__info">
                       {{$post->title}}
                   </span>
                   <div class="kt-section__content">
                       <p style="padding: 20px; margin: 10px 0 30px 0; border: 4px solid #efefef" id="kt_blockui_1_content">
                           {{$post->body}}
                       </p>
                   </div>
                   <span class="kt-section__info">
                       <a href="#" class="kt-font-bolder kt-widget4__title">{{$post->author}}</a>
                   </span>
               </div>
               <!--end::Section-->

               <div class="kt-separator kt-separator--dashed"></div>
           </div>
       </div>
       <!--end::Portlet-->
   </div>
  </div>
 </div>
 <!--begin::Modal-->
 <div class="modal fade" id="kt_blockui_4_3_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('admin.blog.post.update')}}" method="post">
              @include('includes.info-box')
                <div class="form-group">
                    <label for="title" class="form-control-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ Request::old('title') ? Request::old('title') : $post->title }}" {{ $errors->has('title') ? 'class=hass-erro' : ''}} >
                </div>
                <div class="form-group">
                    <label for="author" class="form-control-label">Author</label>
                    <input type="text" name="author" class="form-control" id="author" value="{{ Request::old('author') ? Request::old('author') : $post->author }}" {{$errors->has('author') ? 'class=hass-erro' : ''}}>
                </div>
                <div class="form-group">
                    <label for="category" class="form-control-label">Category</label>
                    <select class="form-control" name="category" id="category">
                      <option value="">Dummy Text</option>
                    </select>
                    <button type="button"class="btn btn-default">Add Category</button>
                    <div class="added-categories">
                      <ul></ul>
                    </div>
                    <input type="hidden" name="categories" value="" id="categories">
                </div>
                <div class="form-group">
                    <label for="body" class="form-control-label">Body:</label>
                    <textarea class="form-control" id="body" name="body" {{$errors->has('body') ? 'class=hass-erro' : ''}}> {{ Request::old('body') ? Request::old('body') : $post->body }} </textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Update Post</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
            </form>
          </div>
      </div>
  </div>
 </div>
 <!--end::Modal-->
<!-- end:: Content -->
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $token = "{{ Session::token() }}";
  </script>
  <script src="{{URL::to('src/js/posts.js')}}" charset="utf-8"></script>
@endsection
