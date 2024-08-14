@extends('admin.layout.master')
@section('content')
    <!-- Start Content-->
  
            <!-- Start Content-->
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">User Form</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">User Form</li>
                        </ol>
                    </div>
                </div>

                @if (Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <!-- General Form -->

                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Create Form</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" class="" action="{{ route('users.store') }}">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $errors->first() }}</strong>
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input class="form-control my-2" name="name" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                <input class="form-control my-2" type="email" name="email" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Password:</strong>
                                                <input class="form-control my-2" type="password" name="password" required>
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Confirm Password:</strong>
                                                <input class="form-control my-2" type="password" name="confirm-password"
                                                    required>
                                                @error('confirm-password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                {{-- @dd(config('permission.teams')); // This should output `false` --}}

                                                <strong>Role:</strong>
                                                <select name="roles" class="form-control my-2 text-capitalize" required>
                                                    <option>Select role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}" class="text-capitalize">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end card header -->
                        </div>
                    </div>
                </div>

            </div>

@endsection
