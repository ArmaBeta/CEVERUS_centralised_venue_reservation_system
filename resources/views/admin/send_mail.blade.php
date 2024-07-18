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
                <h1 style="font-size: 30px; font-weight: bold">Mail send to {{ $data->name }}</h1>

                <form action="{{ url('mail', $data->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label>Greeting</label>
                        <input type="text" name="greeting">
                    </div>
                    <div class="div_deg">
                        <label>Mail Body</label>
                        <input type="text" name="body">
                    </div>
                    <div class="div_deg">
                        <label>Action Text</label>
                        <input type="text" name="action_text">
                    </div>
                    <div class="div_deg">
                        <label>Action Url</label>
                        <input type="text" name="action_url">
                    </div>
                    <div class="div_deg">
                        <label>End Line</label>
                        <input type="text" name="end line">
                    </div>
                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Send Mail">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Body Section End --}}
    {{-- Footer Section --}}
    @include('admin.footer')
    {{-- Footer Section End --}}
</body>

</html>
