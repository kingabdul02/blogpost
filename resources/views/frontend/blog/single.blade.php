@extends('layout.master')

@section('title')
  Blog Index
@endsection

@section('content')
<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
  <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
  <!--begin::Content-->
  <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
    <!--begin::Head-->
    <div class="kt-login__head">
      <!-- <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp; -->
      <a href="{{route('blog.index')}}" class="kt-link kt-login__signup-link">Blog</a>
      <a href="#" class="kt-link kt-login__signup-link">About</a>
      <a href="#" class="kt-link kt-login__signup-link">Contact Me</a>
    </div>
    <!--end::Head-->

    <!--begin::Body-->
    <div class="kt-portlet">
      <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                  Post By ({{$post->author}})
              </h3>
          </div>
      </div>
      <div class="kt-portlet__body">
          <div class="row">
              <div class="col-xl-1">
              </div>
              <div class="col-xl-10">

                <div class="kt-timeline-v1">
                    <div class="kt-timeline-v1__items">
                        <div class="kt-timeline-v1__marker"></div>
                        <div class="kt-timeline-v1__item kt-timeline-v1__item--left">
                            <div class="kt-timeline-v1__item-circle">
                                <div class="kt-bg-danger"></div>
                            </div>
                            <span class="kt-timeline-v1__item-time kt-font-brand">{{$post->created_at}}<span></span></span>
                            <div class="kt-timeline-v1__item-content">
                                <div class="kt-timeline-v1__item-title">
                                    {{$post->title}}
                                </div>
                                <div class="kt-timeline-v1__item-body kt-padding-t-10 kt-padding-b-10">
                                    <div class="kt-widget4">
                                        <div class="kt-widget4__item">
                                            <p>{{$post->body}}</p>
                                            <div class="kt-widget4__tools">
                                                <a href="#" class="btn btn-clean btn-icon btn-sm">
                                                    <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--icon">
                                                <img src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/media/files/jpg.svg" alt="">
                                            </div>
                                            <a href="#" class="kt-font-bolder kt-widget4__title">{{$post->author}}</a>
                                            <div class="kt-widget4__tools">
                                                <a href="#" class="btn btn-clean btn-icon btn-sm">
                                                    <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-xl-1">
              </div>
          </div>
      </div>
  </div>
    <!--end::Body-->
  </div>
  <!--end::Content-->
</div>
</div>
</div>
<!-- end:: Page -->
@endsection

@section('scripts')
  <script src="{{URL::to('src/js/pages/custom/login/login-1.js')}}" charset="utf-8"></script>
@endsection
