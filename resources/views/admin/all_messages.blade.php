<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
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
            </div>
            <table class="table table-striped" style="border: 3px solid;text-align: center; width:100%;">
                <tr style="border: 3px solid">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send Email</th>
                </tr>

                @foreach ($data as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}.</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->message }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('send_mail', $data->id) }}">Send Email</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    </div>
    {{-- Body Section End --}}
    {{-- Footer Section --}}
    @include('admin.footer')
    {{-- Footer Section End --}}
</body>

</html>
