@extends('admin.layout.master')
@section('content')

<div class="content-page">
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">List</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">List</li>
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

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Roles List</h5>
                    <a href="/admin/roles/create" class="btn btn-primary mt-3">Create</a>

                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                            <th>S.No</th>
                            <th>Roles</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1
                                @endphp
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Are You Sure You Want To delete This?')">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
