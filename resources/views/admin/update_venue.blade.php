<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        .div_deg {
            padding-top: 30px;
        }

        .div_center {

            padding-top: 40px;
        }
    </style>
</head>

<body>
    {{-- Header Section --}}
    @include('admin.header')
    {{-- Header Section End --}}
    {{-- Sidenbar Navigation --}}
    @include('admin.sidebar')
    {{-- Sidebar Navigation End --}}
    {{-- Body Section --}}
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <h1 style="font-size: 30px; font-weight:bold;">Update Venue</h1>
                    <form action="{{ url('edit_venue', $data->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Venue Title</label>
                            <input type="text" name="title" value="{{ $data->venue_title }}">
                        </div>
                        <div class="div_deg">
                            <label>Current Image</label> <img width="200" height="500" style="padding-right: 20px"
                                src="/venue/{{ $data->image }}">
                        </div>
                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="div_deg">
                            <label>Venue Address</label>
                            <input type="text" name="address" value = "{{ $data->venue_address }}">
                        </div>
                        <div class="div_deg">
                            <label>Venue Town</label>
                            <input type="text" name="town" value ="{{ $data->venue_town }}">
                        </div>
                        <div class="div_deg">
                            <label>Venue Postcode</label>
                            <input type="text" name="postcode" value = "{{ $data->venue_postcode }}">
                        </div>
                        <div class="div_deg">
                            <label>Venue City</label>
                            <input type="text" name="city" value ="{{ $data->venue_city }}">
                        </div>
                        <div class="div_deg">
                            <label>Venue Size (sqft)</label>
                            <input type="number" step=0.00 placeholder="0.00" name="size"
                                value = "{{ $data->venue_size }}"">
                        </div>
                        <div class="div_deg">
                            <label>Venue Availability</label>
                            <textarea name="availability">{{ $data->venue_availability }}</textarea>
                        </div>
                        <div class="div_deg">
                            <label>Venue Description</label>
                            <textarea name="description">{{ $data->description }}</textarea>
                        </div>
                        <div class="div_deg">
                            <label>Venue Price</label>
                            <input type="number" name="price" value = "{{ $data->price }}"">
                        </div>

                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Update venue">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    {{-- Body Section End --}}
    {{-- Footer Section --}}
    @include('admin.footer')
    {{-- Footer Section End --}}
</body>

</html>
