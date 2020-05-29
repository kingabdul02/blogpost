@extends('layout.master')

@section('title')
  Contact Me
@endsection

@section('content')
@include('includes.info-box')
<div class="kt-login__body">

      <!--begin::Signin-->
      <div class="kt-login__form">
        <div class="kt-login__title">
          <h3>Contact Me</h3>
        </div>

        <!--begin::Form-->
        <form class="kt-form" action="{{route('contact.send')}}" novalidate="novalidate" id="kt_login_form" method="post">
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Your Name" name="name" id="name" autocomplete="off">
          </div>
          <div class="form-group">
            <input class="form-control" type="email" placeholder="Your Email" name="email" id="email" autocomplete="off">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Subject" name="subject" id="subject" autocomplete="off">
          </div>
          <div class="form-group">
            <textarea name="message" rows="4" cols="40" placeholder="Message" id="message"></textarea>
          </div>
          <!--begin::Action-->
          <div class="kt-login__actions">
            <input type="submit" id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary" value="Send">
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </div>
          <!--end::Action-->
        </form>
        <!--end::Form-->

        <!--begin::Divider-->
        <div class="kt-login__divider">
          <div class="kt-divider">
            <span></span>
            <span>OR</span>
            <span></span>
          </div>
        </div>
        <!--end::Divider-->

        <!--begin::Options-->
        <div class="kt-login__options">
          <a href="#" class="btn btn-primary kt-btn">
            <i class="fab fa-facebook-f"></i>
            Facebook
          </a>

          <a href="#" class="btn btn-info kt-btn">
            <i class="fab fa-twitter"></i>
            Twitter
          </a>

          <a href="#" class="btn btn-danger kt-btn">
            <i class="fab fa-google"></i>
            Google
          </a>
        </div>
        <!--end::Options-->
      </div>
      <!--end::Signin-->
    </div>
@endsection
