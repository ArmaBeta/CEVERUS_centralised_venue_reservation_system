<!DOCTYPE html>
<html>

<head>
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

        input {
            width: 500px;
        }

        textarea {
            width: 500px;
            height: 100px;
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
                    <h1 style="font-size: 30px; font-weight:bold;">Add Venue</h1>
                    <form action="{{ url('add_venue') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Venue Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue Address</label>
                            <input type="text" name="address" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue Town</label>
                            <input type="text" name="town" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue Postcode</label>
                            <input type="text" name="postcode" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue City</label>
                            <input type="text" name="city" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue Size (sqft)</label>
                            <input type="number" step="0.01" placeholder="0.00" name="size" required>
                        </div>
                        <div class="div_deg">
                            <label>Venue Availability</label>
                            <textarea name="availability" required></textarea>
                        </div>
                        <div class="div_deg">
                            <label>Venue Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                        <div class="div_deg">
                            <label>Venue Price</label>
                            <input type="number" name="price" required>
                        </div>
                        <div>
                            <input type="hidden" name="venue_status" value="pending">
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Add venue">
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
