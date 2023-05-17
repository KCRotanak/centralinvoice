@extends('layouts.userapp')

<style>
    .autocomplete-wrapper {
        background-color: white;
        width: max-content;
        position: relative;
        margin: auto;
    }

    .autocomplete-list {
        background-color: white;
        position: absolute;
        top: 49px;
        left: 0;
        right: 0;
        width: 284px;
        margin: auto;
    }

    .autocomplete-list>div {
        border: 1px solid #ffffff;
        padding: 10px 5px;
        cursor: pointer;
    }

    .autocomplete-list>div:hover {
        background: #e9e9e9;
    }

    .autocomplete-list>div.active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }

    .matching-word {
        background-color: white;

        font-weight: bold;
    }
</style>

@section('content')
    {{-- <div class="bannerweb d-flex justify-content-center align-items-center">    
    <div class="test">
        <p class="fs-1 fw-bolder animated fadeInDown" style="animation-delay: 0.5s; color: rgb(255, 255, 255)">CENTRAL INVOICE</p>
    </div>
</div> --}}
    <div class="module">
        <div class="fs-1 fw-bolder module-inside animated zoomIn">
            CENTRAL INVOICE
        </div>
    </div>

    <div class="container">
        <div class="col-12">
            <div class="search">
                <form action="{{ route('search.invoice') }}" method="GET">
                    @csrf
                    <input class="border-transparent" id="search" type="number" name="search"
                        placeholder="Insert your invoice reference number">
                    <button type="submit"><i class="fa fa-search"></i></button>

                    {{-- <div class="content-wrapper">
                        <div class="autocomplete-wrapper">
                            <input class="border-transparent" id="country" name="inputRef" type="number"
                                placeholder="Insert your invoice reference number">
                            <button type="submit"><i class="fa fa-search"></i></button>
                            <div class="autocomplete-list"></div>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="container" style="padding: 40px">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title pt-5">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class='bx bx-check-double'></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                        <li><i class='bx bx-check-double'></i> Duis aute irure dolor in reprehenderit in voluptate velit
                        </li>
                        <li><i class='bx bx-check-double'></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var countries = {!! json_encode($ref) !!}
        console.log(countries);
        // var countries = ["2057952", "4087601"]
        // console.log(countries);

        function autoComplete(obj, arr) {
            let currentKey;
            obj.on('input', function(e) { // Display matching items
                let val = event.target.value;
                currentKey = -1;
                $('.autocomplete-list').empty();
                let count = 0;
                for (let idx = 0; idx < arr.length; idx++) {
                    if (arr[idx].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        $('.autocomplete-list').append('<div class="autocomplete-item" id="item-' + count +
                            '"><span class="matching-word">' + arr[idx].substr(0, val.length) + '</span>' + arr[
                                idx].substr(val.length) + '</div>');
                        count++;
                    }
                }
            });

            obj.on('keydown', function(e) {
                let wrapper = $('.autocomplete-list');
                let itemLength = $('.autocomplete-list').find('.autocomplete-item').length;
                if (e.keyCode == 40) { //down
                    currentKey++;
                    if (currentKey > itemLength - 1) currentKey = currentKey % itemLength;
                    setActiveItem(currentKey);
                } else if (e.keyCode == 38) { //up
                    currentKey--;
                    if (currentKey < 0) {
                        currentKey = itemLength + currentKey;
                    }
                    setActiveItem(currentKey);
                } else if (e.keyCode == 13) { //enter
                    $('#item-' + currentKey).click();
                }
            });

            $(document).on('click', '.autocomplete-item', function(e) {
                let val = $(this).text();
                $('input').val(val);
                $('.autocomplete-list').empty();
            });

            $(document).on('click', function(e) {
                if ($(e.target).prop('id') !== "country") $('.autocomplete-list').empty();
            });

            function setActiveItem(keycode) {
                $('.autocomplete-list').find('.autocomplete-item').each(function() {
                    if ($(this).prop('id') == "item-" + keycode) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
            }
        }
        autoComplete($('input'), countries);
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
