@extends('admin.layout.master')
@section('content')
<!-- Start Content-->
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Role Form</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Role Form</li>
                    </ol>
                </div>
            </div>

            @if(Session::has('error'))
            <p class="alert alert-info">{{ Session::get('error') }}</p>
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
                                    <form action="{{ route('roles.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input name="name" placeholder="Name" class="form-control my-4" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                </div><!-- end card header -->
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection
