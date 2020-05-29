@extends('layout.admin-master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
         <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <form class="" action="{{route('admin.blog.post.create')}}" method="post">
      @include('includes.info-box')
        <div class="form-group">
            <label for="title" class="form-control-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ Request::old('title') }}" {{ $errors->has('title') ? 'class=hass-erro' : ''}} >
        </div>
        <div class="form-group">
            <label for="author" class="form-control-label">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ Request::old('author') }}" {{$errors->has('author') ? 'class=hass-erro' : ''}}>
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
            <textarea class="form-control" id="body" name="body" {{$errors->has('body') ? 'class=hass-erro' : ''}}> {{ Request::old('title') }} </textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Create Post</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
  <!--begin::Modal-->
  <!-- <div class="modal fade" id="kt_blockui_4_2_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{ route('admin.blog.post.create') }}">
                 @include('includes.info-box')
                   <div class="form-group">
                       <label for="title" class="form-control-label">Title</label>
                       <input type="text" name="title" class="form-control" id="title">
                   </div>
                   <div class="form-group">
                       <label for="author" class="form-control-label">Author</label>
                       <input type="text" name="author" class="form-control" id="author">
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
                       <input type="hidden" name="Categories" value="" id="categories">
                   </div>
                   <div class="form-group">
                       <label for="body" class="form-control-label">Body:</label>
                       <textarea class="form-control" id="body" name="body"></textarea>
                   </div>
                   <button type="submit" name="submit" class="btn btn-default">Create Post</button>
                   <input type="hidden" name="_token" value="{{Session::token()}}">
               </form>
           </div>
       </div>
   </div>
  </div> -->
  <!--end::Modal
 </div>
<!-- end:: Content -->
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $token = "{{ Session::token() }}";
  </script>
  <script src="{{URL::to('src/js/posts.js')}}" charset="utf-8"></script>
@endsection
