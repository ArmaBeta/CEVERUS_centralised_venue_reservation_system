<section class="banner_main">
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
        <ol class="carousel-indicators">
            @if (isset($venue) && $venue->count() > 0)
                @foreach ($venue as $index => $item)
                    <li data-target="#myCarousel" data-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if (isset($venue) && $venue->count() > 0)
                @foreach ($venue->take(3) as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="d-block mx-auto" style="max-height: 600px; width: 100%;"
                            src="venue/{{ $item->image }}" alt="Slide {{ $index + 1 }}">
                        <div class="container">
                        </div>
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img class="d-block mx-auto" style="max-height: 400px; width: auto;" src="images/default.jpg"
                        alt="Default slide">
                    <div class="container">
                    </div>
                </div>
            @endif
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="booking_ocline">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="book_room">
                        <h1>CEVERUS</h1>
                        <h6>Centralised Venue Reservation System</h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
