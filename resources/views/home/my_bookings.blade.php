<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .main-layout {
            padding-top: 20px;
        }

        .table {
            margin: 20px 0;
            border: 1px solid #dee2e6;
            background-color: #ffffff;
        }

        th {
            background-color: #343a40;
            color: #ffffff;
        }

        td {
            font-size: 14px;
        }

        .table img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-container a {
            padding: 5px 10px;
            font-size: 14px;
        }

        .status-approved {
            color: limegreen;
        }

        .status-rejected {
            color: red;
        }

        .status-pending {
            color: rgb(0, 153, 255);
        }

        .status-cancelled {
            color: #C78C06;
        }

        .payment-field {
            display: none;
        }
    </style>
    <script>
        function togglePaymentFields(paymentMethod, id) {
            const bankNameField = document.getElementById(`bank-name-field${id}`);
            const cardNumberField = document.getElementById(`card-number-field${id}`);
            const cardNameField = document.getElementById(`card-name-field${id}`);
            const expiryDateField = document.getElementById(`expiry-date-field${id}`);
            const cvvField = document.getElementById(`cvv-field${id}`);

            bankNameField.style.display = 'none';
            cardNumberField.style.display = 'none';
            cardNameField.style.display = 'none';
            expiryDateField.style.display = 'none';
            cvvField.style.display = 'none';

            if (paymentMethod === 'Online banking') {
                bankNameField.style.display = 'block';
            } else if (paymentMethod === 'Credit Card / Debit Card') {
                bankNameField.style.display = 'block';
                cardNumberField.style.display = 'block';
                cardNameField.style.display = 'block';
                expiryDateField.style.display = 'block';
                cvvField.style.display = 'block';
            }
        }
    </script>
</head>

<body class="main-layout">
    @php
        $data = $data->sortByDesc('created_at');
    @endphp
    <!-- Loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- End Loader -->

    <!-- Header -->
    <header>
        @include('home.header')
    </header>
    <!-- End Header -->

    <div class="container">
        <h2 class="text-center my-4">Your Bookings</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Venue</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Payment</th>
                        <th>Cancel Booking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $booking)
                        @if ($booking->user_id == Auth::user()->id)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}.</th>
                                <td>{{ optional($booking->venue)->venue_title ?? 'N/A' }}</td>
                                <td>{{ optional($booking->venue)->price ?? 'N/A' }}</td>
                                <td>RM {{ $booking->booking_total }}</td>
                                <td>{{ $booking->booking_start_date }}</td>
                                <td>{{ $booking->booking_end_date }}</td>
                                <td>
                                    @if ($booking->booking_status == 'approved')
                                        <span class="status-approved">Approved</span>
                                    @elseif ($booking->booking_status == 'rejected')
                                        <span class="status-rejected">Rejected</span>
                                    @elseif ($booking->booking_status == 'pending')
                                        <span class="status-pending">Pending</span>
                                    @elseif ($booking->booking_status == 'cancelled')
                                        <span class="status-cancelled">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    @if (optional($booking->venue)->image)
                                        <img src="venue/{{ optional($booking->venue)->image }}" alt="Venue Image">
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $payment = App\Models\Payment::where('booking_id', $booking->id)->first();
                                        $currentDate = now()->toDateString();
                                    @endphp
                                    @if ($booking->booking_start_date <= $currentDate && (!$payment || $payment->payment_status != 'paid'))
                                        <span class="btn btn-danger">Late Payment</span>
                                    @elseif ($payment && $payment->payment_status == 'paid')
                                        <span class="btn btn-success">Payment completed</span>
                                    @elseif ($booking->booking_status == 'approved')
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#paymentModal{{ $booking->id }}">
                                            Pay now
                                        </button>
                                    @elseif ($booking->booking_status == 'pending')
                                        <a class="btn btn-primary" style="color: white;">Waiting for approval</a>
                                    @elseif ($booking->booking_status == 'rejected')
                                        <a class="btn btn-danger" style="color: white">Reason</a>
                                        <br />
                                        <span> {{ $booking->booking_reason }}</span>
                                    @elseif ($booking->booking_status == 'cancelled')
                                        <a class="btn btn-warning" style="color: white">Booking Cancelled</a>
                                        <br />
                                    @endif
                                </td>
                                <td>
                                    @if ($booking->booking_status == 'pending' || (!$payment && $booking->booking_status == 'approved'))
                                        <!-- Button to trigger cancellation modal -->
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#cancelModal{{ $booking->id }}">
                                            Cancel Booking
                                        </button>

                                        <!-- Modal for cancellation -->
                                        <div class="modal fade" id="cancelModal{{ $booking->id }}" tabindex="-1"
                                            aria-labelledby="cancelModalLabel{{ $booking->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="cancelModalLabel{{ $booking->id }}">Cancel Booking
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ url('cancel_booking', ['id' => $booking->id]) }}"
                                                            method="GET">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="reason" class="form-label">Reason for
                                                                    Cancellation</label>
                                                                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">Confirm
                                                                Cancellation</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <!-- Payment Modal for Each Booking -->
                            <div class="modal fade" id="paymentModal{{ $booking->id }}" tabindex="-1"
                                aria-labelledby="paymentModalLabel{{ $booking->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="paymentModalLabel{{ $booking->id }}">Payment
                                                Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('add_payment') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                <div class="mb-3">
                                                    <label for="total" class="form-label">Total</label>
                                                    <p>RM {{ $booking->booking_total }}</p>
                                                    <input type="hidden" name="payment_total"
                                                        value="{{ $booking->booking_total }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="payment_method" class="form-label">Payment
                                                        Method</label>
                                                    <select name="payment_method" class="form-control"
                                                        id="payment_method{{ $booking->id }}" required
                                                        onchange="togglePaymentFields(this.value, {{ $booking->id }})">
                                                        <option value="">Select Payment Method</option>
                                                        <option value="Online banking">Online banking</option>
                                                        <option value="Credit Card / Debit Card">Credit Card / Debit
                                                            Card</option>
                                                        <option value="Cash">Cash</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 payment-field"
                                                    id="bank-name-field{{ $booking->id }}">
                                                    <label for="payment_bank_name" class="form-label">Bank
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                        name="payment_bank_name">
                                                </div>
                                                <div class="mb-3 payment-field"
                                                    id="card-number-field{{ $booking->id }}">
                                                    <label for="payment_card_number" class="form-label">Card
                                                        Number</label>
                                                    <input type="text" class="form-control"
                                                        name="payment_card_number">
                                                </div>
                                                <div class="mb-3 payment-field"
                                                    id="card-name-field{{ $booking->id }}">
                                                    <label for="payment_card_name" class="form-label">Cardholder
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                        name="payment_cardholder_name">
                                                </div>
                                                <div class="mb-3 payment-field"
                                                    id="expiry-date-field{{ $booking->id }}">
                                                    <label for="payment_expiry_date" class="form-label">Expiry
                                                        Date</label>
                                                    <input type="text" class="form-control"
                                                        name="payment_expiry_date" placeholder="MM/YY">
                                                </div>
                                                <div class="mb-3 payment-field" id="cvv-field{{ $booking->id }}">
                                                    <label for="payment_cvv" class="form-label">CVV</label>
                                                    <input type="text" class="form-control" name="payment_cvv">
                                                </div>
                                                <input type="hidden" name="payment_status" value="paid">
                                                <button type="submit" class="btn btn-primary">Confirm
                                                    Payment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('home.footer')
    <!-- End Footer -->

</body>

</html>
