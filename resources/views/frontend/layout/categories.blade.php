<a href="{{ route('marketplace') }}" class="market-c">Marketplace</a>

<div class="market-div">
    <ul class="mdn-accordion indigo-accordion-theme">
        <!-- AUTOMOBILES -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-1" id="group-1">
            <label class="accordion-title" for="group-1"> AUTOMOBILES </label>
            <ul>
                <li><a href="{{ route('category.products', 'automobiles_cars') }}">Cars</a></li>
                <li><a href="{{ route('category.products', 'automobiles_trucks') }}">Trucks</a></li>
                <li><a href="{{ route('category.products', 'automobiles_rvs') }}">RVs</a></li>
                <li><a href="{{ route('category.products', 'automobiles_atvs_mcs') }}">ATVs and MCs</a>
                </li>
            </ul>
        </li>

        <!-- BOATS -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-2" id="group-2">
            <label class="accordion-title" for="group-2"> BOATS </label>
            <ul>
                <li><a href="{{ route('category.products', 'boats_sailboats') }}">Sailboats</a></li>
                <li><a href="{{ route('category.products', 'boats_speedboats') }}">Speedboats</a></li>
                <li><a href="{{ route('category.products', 'boats_yachts_other_watercrafts') }}">Yachts
                        Other Watercrafts</a></li>
            </ul>
        </li>

        <!-- BUSINESS AND INDUSTRIAL -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-3" id="group-3">
            <label class="accordion-title" for="group-3"> BUSINESS AND INDUSTRIAL </label>
            <ul>
                <li><a href="{{ route('category.products', 'business_and_industrial_machinery') }}">Machinery</a>
                </li>
                <li><a
                        href="{{ route('category.products', 'business_and_industrial_manufacturing') }}">Manufacturing</a>
                </li>
                <li><a href="{{ route('category.products', 'business_and_industrial_r_d') }}">R&D</a>
                </li>
                <li><a href="{{ route('category.products', 'business_and_industrial_medical') }}">Medical</a>
                </li>
            </ul>
        </li>

        <!-- COLLECTIBLES -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-4" id="group-4">
            <label class="accordion-title" for="group-4"> COLLECTIBLES </label>
            <ul>
                <li><a href="{{ route('category.products', 'collectibles_art') }}">Art</a></li>
                <li><a href="{{ route('category.products', 'collectibles_baseball_cards') }}">Baseball
                        Cards</a></li>
                <li><a href="{{ route('category.products', 'collectibles_coins') }}">Coins</a></li>
            </ul>
        </li>

        <!-- EPHEMERA -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-5" id="group-5">
            <label class="accordion-title" for="group-5"> EPHEMERA </label>
            <ul>
                <li><a href="{{ route('category.products', 'ephemera_historical_documents') }}">Historical
                        Documents</a></li>
                <li><a href="{{ route('category.products', 'ephemera_autographs') }}">Autographs</a>
                </li>
                <li><a href="{{ route('category.products', 'ephemera_maps') }}">Maps</a></li>
            </ul>
        </li>

        <!-- FIREARMS -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-6" id="group-6">
            <label class="accordion-title" for="group-6"> FIREARMS </label>
            <ul>
                <li><a href="{{ route('category.products', 'firearms_antique_relic') }}">Antique /
                        Relic</a></li>
                <li><a href="{{ route('category.products', 'firearms_sporting') }}">Sporting</a></li>
            </ul>
        </li>

        <!-- JEWELLERY and WATCHES -->
        <li class="sub-level">
            <a class="linked" href="{{ route('category.products', 'jewelry_and_watches') }}" name="group-7"
                id="group-7">
                JEWELLERY and WATCHES
            </a>
        </li>

        <!-- GOODS & SERVICES -->
        <li class="sub-level">
            <a class="linked" href="{{ route('category.products', 'goods_and_services') }}" name="group-8"
                id="group-8">
                GOODS & SERVICES
            </a>
        </li>

        <!-- MILITARIA -->
        <li class="sub-level">
            <a class="linked" href="{{ route('category.products', 'militaria') }}" name="group-9" id="group-9">
                MILITARIA
            </a>
        </li>

        <!-- NUMISMATICS -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-10" id="group-10">
            <label class="accordion-title" for="group-10"> NUMISMATICS </label>
            <ul>
                <li><a href="{{ route('category.products', 'numismatics_rare_coins') }}">Rare
                        Coins</a></li>
                <li><a href="{{ route('category.products', 'numismatics_bullion') }}">Bullion</a></li>
                <li><a href="{{ route('category.products', 'numismatics_paper_currency') }}">Paper
                        Currency</a></li>
            </ul>
        </li>

        <!-- PHILATELICS -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-11" id="group-11">
            <label class="accordion-title" for="group-11"> PHILATELICS </label>
            <ul>
                <li><a href="{{ route('category.products', 'philately_rare_stamps') }}">Rare
                        Stamps</a></li>
            </ul>
        </li>

        <!-- REAL ESTATE -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-12" id="group-12">
            <label class="accordion-title" for="group-12"> REAL ESTATE </label>
            <ul>
                <li><a href="{{ route('category.products', 'real_estate_land') }}">Land</a></li>
                <li><a href="{{ route('category.products', 'real_estate_sfh') }}">SFH</a></li>
                <li><a href="{{ route('category.products', 'real_estate_condos') }}">Condos</a></li>
                <li><a href="{{ route('category.products', 'real_estate_vacation_homes') }}">Vacation
                        Homes</a></li>
                <li><a href="{{ route('category.products', 'real_estate_commercial') }}">Commercial</a>
                </li>
            </ul>
        </li>

        <!-- UNIQUE/ ODD/ INVALUABLES -->
        <li class="sub-level">
            <input class="accordion-toggle" type="checkbox" name="group-13" id="group-13">
            <label class="accordion-title" for="group-13"> UNIQUE/ ODD/ INVALUABLES </label>
            <ul>
                <li><a href="{{ route('category.products', 'unique_odds_invaluables_anything_under_the_sun') }}">
                        Anything Under the Sun. Priceless
                    </a></li>
            </ul>
        </li>

        <!-- SPORTING COLLECTIBLES -->
        <li class="sub-level">
            <a class="linked" href="{{ route('category.products', 'sporting_collectibles') }}" name="group-14"
                id="group-14">
                SPORTING COLLECTIBLES
            </a>
        </li>
    </ul>

    <!-- mdn-accordion -->
</div>

