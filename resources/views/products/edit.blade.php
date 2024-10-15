@extends('admin.layout.master')

<style>
    .list-unstyled.row li {
        margin-bottom: 20px;
        position: relative;
    }

    .list-unstyled.row img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .delete-image {
        margin-right: 10px;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .delete-image:hover {
        color: #ff0000;
    }
</style>

@section('content')
    <div class="container-fluid py-4">
        <h1 class="h2 mb-4">{{ isset($product) ? 'Edit' : 'Create' }} Product</h1>



        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <!-- Hidden Input for Category -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $product->name ?? '') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Select a category
                            </option>

                            <!-- AUTOMOBILES -->
                            <optgroup label="AUTOMOBILES">
                                <option value="automobiles_cars"
                                    {{ isset($product) && $product->category === 'automobiles_cars' ? 'selected' : '' }}>
                                    Cars</option>
                                <option value="automobiles_trucks"
                                    {{ isset($product) && $product->category === 'automobiles_trucks' ? 'selected' : '' }}>
                                    Trucks</option>
                                <option value="automobiles_rvs"
                                    {{ isset($product) && $product->category === 'automobiles_rvs' ? 'selected' : '' }}>
                                    RVs</option>
                                <option value="automobiles_atvs_mcs"
                                    {{ isset($product) && $product->category === 'automobiles_atvs_mcs' ? 'selected' : '' }}>
                                    ATVs and MCs</option>
                            </optgroup>

                            <!-- BOATS -->
                            <optgroup label="BOATS">
                                <option value="boats_sailboats"
                                    {{ isset($product) && $product->category === 'boats_sailboats' ? 'selected' : '' }}>
                                    Sailboats</option>
                                <option value="boats_speedboats"
                                    {{ isset($product) && $product->category === 'boats_speedboats' ? 'selected' : '' }}>
                                    Speedboats</option>
                                <option value="boats_yachts_other_watercrafts"
                                    {{ isset($product) && $product->category === 'boats_yachts_other_watercrafts' ? 'selected' : '' }}>
                                    Yachts Other Watercrafts</option>
                            </optgroup>

                            <!-- BUSINESS AND INDUSTRIAL -->
                            <optgroup label="BUSINESS AND INDUSTRIAL">
                                <option value="business_and_industrial_machinery"
                                    {{ isset($product) && $product->category === 'business_and_industrial_machinery' ? 'selected' : '' }}>
                                    Machinery</option>
                                <option value="business_and_industrial_manufacturing"
                                    {{ isset($product) && $product->category === 'business_and_industrial_manufacturing' ? 'selected' : '' }}>
                                    Manufacturing</option>
                                <option value="business_and_industrial_r_d"
                                    {{ isset($product) && $product->category === 'business_and_industrial_r_d' ? 'selected' : '' }}>
                                    R&D</option>
                                <option value="business_and_industrial_medical"
                                    {{ isset($product) && $product->category === 'business_and_industrial_medical' ? 'selected' : '' }}>
                                    Medical</option>
                            </optgroup>

                            <!-- COLLECTIBLES -->
                            <optgroup label="COLLECTIBLES">
                                <option value="collectibles_art"
                                    {{ isset($product) && $product->category === 'collectibles_art' ? 'selected' : '' }}>
                                    Art</option>
                                <option value="collectibles_baseball_cards"
                                    {{ isset($product) && $product->category === 'collectibles_baseball_cards' ? 'selected' : '' }}>
                                    Baseball Cards</option>
                                <option value="collectibles_coins"
                                    {{ isset($product) && $product->category === 'collectibles_coins' ? 'selected' : '' }}>
                                    Coins</option>
                            </optgroup>

                            <!-- EPHEMERA -->
                            <optgroup label="EPHEMERA">
                                <option value="ephemera_historical_documents"
                                    {{ isset($product) && $product->category === 'ephemera_historical_documents' ? 'selected' : '' }}>
                                    Historical Documents</option>
                                <option value="ephemera_autographs"
                                    {{ isset($product) && $product->category === 'ephemera_autographs' ? 'selected' : '' }}>
                                    Autographs</option>
                                <option value="ephemera_maps"
                                    {{ isset($product) && $product->category === 'ephemera_maps' ? 'selected' : '' }}>
                                    Maps</option>
                            </optgroup>

                            <!-- FIREARMS -->
                            <optgroup label="FIREARMS">
                                <option value="firearms_antique_relic"
                                    {{ isset($product) && $product->category === 'firearms_antique_relic' ? 'selected' : '' }}>
                                    Antique / Relic</option>
                                <option value="firearms_sporting"
                                    {{ isset($product) && $product->category === 'firearms_sporting' ? 'selected' : '' }}>
                                    Sporting</option>
                            </optgroup>

                            <!-- JEWELLERY and WATCHES -->
                            <option value="jewelry_and_watches"
                                {{ isset($product) && $product->category === 'jewelry_and_watches' ? 'selected' : '' }}>
                                JEWELLERY and WATCHES</option>

                            <!-- GOODS & SERVICES -->
                            <option value="goods_and_services"
                                {{ isset($product) && $product->category === 'goods_and_services' ? 'selected' : '' }}>
                                GOODS & SERVICES</option>

                            <!-- MILITARIA -->
                            <option value="militaria"
                                {{ isset($product) && $product->category === 'militaria' ? 'selected' : '' }}>MILITARIA
                            </option>

                            <!-- NUMISMATICS -->
                            <optgroup label="NUMISMATICS">
                                <option value="numismatics_rare_coins"
                                    {{ isset($product) && $product->category === 'numismatics_rare_coins' ? 'selected' : '' }}>
                                    Rare Coins</option>
                                <option value="numismatics_bullion"
                                    {{ isset($product) && $product->category === 'numismatics_bullion' ? 'selected' : '' }}>
                                    Bullion</option>
                                <option value="numismatics_paper_currency"
                                    {{ isset($product) && $product->category === 'numismatics_paper_currency' ? 'selected' : '' }}>
                                    Paper Currency</option>
                            </optgroup>

                            <!-- PHILATELICS -->
                            <optgroup label="PHILATELICS">
                                <option value="philately_rare_stamps"
                                    {{ isset($product) && $product->category === 'philately_rare_stamps' ? 'selected' : '' }}>
                                    Rare Stamps</option>
                            </optgroup>

                            <!-- REAL ESTATE -->
                            <optgroup label="REAL ESTATE">
                                <option value="real_estate_land"
                                    {{ isset($product) && $product->category === 'real_estate_land' ? 'selected' : '' }}>
                                    Land</option>
                                <option value="real_estate_sfh"
                                    {{ isset($product) && $product->category === 'real_estate_sfh' ? 'selected' : '' }}>
                                    SFH</option>
                                <option value="real_estate_condos"
                                    {{ isset($product) && $product->category === 'real_estate_condos' ? 'selected' : '' }}>
                                    Condos</option>
                                <option value="real_estate_vacation_homes"
                                    {{ isset($product) && $product->category === 'real_estate_vacation_homes' ? 'selected' : '' }}>
                                    Vacation Homes</option>
                                <option value="real_estate_commercial"
                                    {{ isset($product) && $product->category === 'real_estate_commercial' ? 'selected' : '' }}>
                                    Commercial</option>
                            </optgroup>

                            <!-- UNIQUE/ ODD/ INVALUABLES -->
                            <optgroup label="UNIQUE/ ODD/ INVALUABLES">
                                <option value="unique_odds_invaluables_anything_under_the_sun"
                                    {{ isset($product) && $product->category === 'unique_odds_invaluables_anything_under_the_sun' ? 'selected' : '' }}>
                                    Anything Under the Sun. Priceless</option>
                            </optgroup>

                            <!-- SPORTING COLLECTIBLES -->
                            <option value="sporting_collectibles"
                                {{ isset($product) && $product->category === 'sporting_collectibles' ? 'selected' : '' }}>
                                SPORTING COLLECTIBLES</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Auction Toggle -->
                    <div class="form-group mb-3">
                        <label for="auction" class="form-label">Auction:</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="auction" name="auction" value="1"
                                {{ isset($product) && $product->auction ? 'checked' : '' }}>
                            <label class="form-check-label" for="auction">Enable Auction</label>
                        </div>
                    </div>
                    <!-- Images Upload -->
                    <div class="form-group mb-3">
                        <label for="images" class="form-label">Images:</label>
                        <input type="file" name="images[]" accept="image/*" id="images" class="form-control" multiple>
                    </div>
                </div>
            </div>

            <!-- Display Uploaded Images for Edit -->
            @if (isset($product) && $product->images)
                <h2 class="h4 mb-3">Uploaded Images</h2>
                <ul class="list-unstyled row">
                    @foreach ($product->images as $image)
                        <li class="col-md-3 mb-3 position-relative">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}"
                                class="img-fluid">
                            @if (count($product->images) > 1)
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Delete this image" class="delete-image"
                                    data-image-id="{{ $image->id }}">
                                    <i data-feather="x-circle" class="text-danger" style="font-size: 24px;"></i>
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

            <button type="submit" class="btn btn-success">{{ isset($product) ? 'Update' : 'Create' }} Product</button>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-image').click(function(e) {
                e.preventDefault();
                var imageId = $(this).data('image-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('images.destroy', '') }}' + '/' + imageId,
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': 'DELETE'
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
