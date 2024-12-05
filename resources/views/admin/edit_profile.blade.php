@extends('admin.layout.master')
@section('content')

<div class="usermanagesec">
    <div class="container">
        <div class="row align-items-center">
            <h2 class="sub-head">Profile Edit</h2>
            <div class="form-div1">

                <form method="POST" action="{{ route('edit_profile.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="Label">Full Name</label>
                            <input type="text" class="field1" required name="name" placeholder="Full Name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="Label">Email</label>
                            <input type="email" id="email" class="field1" required name="email" value="{{ $user->email }}"
                                placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <label for="" class="Label">Old Password</label>
                            <input type="password" class="field1" name="oldpass"
                                placeholder="">
                        </div>
                        <div class="col-md-12">
                            <label for="" class="Label">New Password</label>
                            <input type="password" class="field1" name="newpass"
                                placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="Label">Country</label>
                            <input type="text" class="field1" name="country"
                                placeholder="Country">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="Label">City</label>
                            <input type="text" class="field1" name="city"
                                placeholder="City">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="Label">Province</label>
                            <input type="text" class="field1" name="province"
                                placeholder="Province">
                        </div>
                        <div class="col-md-12">
                            <label for="" class="Label">Address</label>
                            <textarea name="address" class="msgfield1" placeholder="Address"></textarea>
                            <input type="submit" class="submitbtn" value="Update Profile">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
