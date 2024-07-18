<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .payment-details-card {
            border: 3px solid;
            padding: 20px;
            margin: 20px 0;
            font-size: 15px;
            background-color: #343a40;
            color: white;
        }

        .payment-details-card h4 {
            margin-bottom: 20px;
            color: #f8f9fa;
        }

        .payment-details-card p {
            margin: 10px 0;
            color: #ced4da;
        }
    </style>
</head>

<body>
    {{-- Header Section --}}
    @include('admin.header')
    {{-- Header Section End --}}
    {{-- Sidebar Navigation --}}
    @include('admin.sidebar')
    {{-- Sidebar Navigation End --}}
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="block margin-bottom-sm">
                    <h2 class="title mb-0"><strong>Payment Details</strong></h2>
                    <div class="payment-details-card">
                        <h4>Booking Information</h4>
                        <p><strong>Venue Title:</strong> {{ optional($booking->venue)->venue_title ?? 'N/A' }}</p>
                        <p><strong>Booking Price:</strong> {{ optional($booking->venue)->price ?? 'N/A' }}</p>
                        <h4>Payment Information</h4>
                        <p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
                        <p><strong>Payment Total:</strong> RM {{ $booking->booking_total }}</p>
                        @if ($payment->payment_method == 'Online banking')
                            <p><strong>Bank Name:</strong> {{ $payment->payment_bank_name }}</p>
                        @elseif ($payment->payment_method == 'Credit Card / Debit Card')
                            <p><strong>Card Number:</strong> {{ $payment->payment_card_number }}</p>
                            <p><strong>Cardholder Name:</strong> {{ $payment->payment_cardholder_name }}</p>
                            <p><strong>Expiry Date:</strong> {{ $payment->payment_expiry_date }}</p>
                            <p><strong>CVV:</strong> {{ $payment->payment_cvv }}</p>
                        @elseif ($payment->payment_method == 'Cash')
                            <p>No additional details available for cash payments.</p>
                        @endif

                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Footer Section --}}
    @include('admin.footer')
    {{-- Footer Section End --}}

    <!-- Include JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
