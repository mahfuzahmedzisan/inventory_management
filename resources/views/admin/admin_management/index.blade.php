@extends('admin.layouts.master', ['page_slug' => 'admin'])

@section('content')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title">{{__('Admin List')}}</h4>
        <a href="{{route('admin.create')}}" class="btn btn-primary">{{__('Create')}}</a>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>{{__('SL')}}</th>
              <th>{{__('Name')}}</th>
              <th>{{__('Email')}}</th>
              <th>{{__('Created At')}}</th>
              <th>{{__('Updated At')}}</th>
              <th>{{__('Action')}}</th>
            </tr>
          </thead>

          <tbody>
            @foreach ( $admins as $admin)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$admin ->name}}</td>
              <td>{{$admin ->email}}</td>
              <td>{{date('d M, Y', strtotime($admin->created_at))}}</td>
              <td>{{$admin ->created_at != $admin->updated_at ? date('d M, Y', strtotime($admin->updated_at)): "Null"}}</td>
              <td>
                <div class="dropdown">
                  <a class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-options-vertical"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Edit</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



@endsection