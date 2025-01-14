@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="ad-image">
                        <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}"
                            style="width: 100%; max-width: 600px;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ad-details">
                        <h1>{{ $ad->title }}</h1>
                        <p>{{ $ad->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
