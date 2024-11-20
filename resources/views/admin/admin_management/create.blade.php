@extends('admin.layouts.master', ['page_slug' => 'admin'])

@section('content')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title">{{__('Admin List')}}</h4>
        <a href="{{route('admin.index')}}" class="btn btn-primary">{{__('Back')}}</a>
      </div>
      <div class="card-body">
        <form action="{{route('admin.store')}}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="#">{{__('Name')}}</label>
            <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Email')}}</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Password')}}</label>
            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
          </div>
          <div class="form-group mb-3">
            <label for="#">{{__('Confirm Password')}}</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
          </div>
          <div class="form-group mb-3">            
            <input type="submit" class="btn btn-primary" value="Create">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection