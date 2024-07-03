<div class="our_room py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <div class="titlepage">
                    <h2>Our Venue</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($venue as $venue)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div id="serv_hover" class="room border rounded shadow-sm">
                        <div class="room_img">
                            <figure class="text-center">
                                <img src="venue/{{ $venue->image }}" alt="#" class="img-fluid" />
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h3 class="text-center">{{ $venue->venue_title }}</h3>
                            <p>RM {{ $venue->price }} / day</p>
                            <p>{{ $venue->venue_town }}</p>
                            <p>{{ $venue->venue_city }}</p>
                            <div class="btn-container">
                                <a class="btn btn-primary" href="{{ url('venue_details', $venue->id) }}">Venue
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
