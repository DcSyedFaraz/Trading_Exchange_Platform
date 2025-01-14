@extends('admin.layout.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Ad</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('ad.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $ad->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
        <div class="form-group">
            <strong>description:</strong>
            {{ $ad->description }}
        </div>
    </div>

@endsection
