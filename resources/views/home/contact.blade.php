<style>
    .contact {
        background-color: #f8f9fa;
        /* Light beige background */
        padding: 80px 0;
        /* Adjust padding for spacing */
    }

    .titlepage h2 {
        color: #343a40;
        /* Dark text color */
        font-size: 36px;
        /* Adjust font size */
        font-weight: bold;
        /* Ensure heading stands out */
        margin-bottom: 40px;
        /* Space below heading */
        text-align: center;
        /* Center align heading */
    }

    .main_form {
        background-color: #ffffff;
        /* White background for form */
        padding: 30px;
        /* Padding inside form */
        border-radius: 8px;
        /* Rounded corners for form */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    .main_form .contactus {
        width: 100%;
        /* Full width input fields */
        padding: 10px;
        /* Padding inside input fields */
        margin-bottom: 15px;
        /* Space between input fields */
        border: 1px solid #dee2e6;
        /* Light border */
        border-radius: 4px;
        /* Rounded corners for input fields */
    }

    .main_form .textarea {
        width: 100%;
        /* Full width textarea */
        padding: 10px;
        /* Padding inside textarea */
        margin-bottom: 15px;
        /* Space below textarea */
        border: 1px solid #dee2e6;
        /* Light border */
        border-radius: 4px;
        /* Rounded corners for textarea */
        resize: none;
        /* Prevent resizing of textarea */
    }

    .send_btn {
        background-color: #0056b3;
        /* Navy blue button color */
        color: #ffffff;
        /* White text color */
        border: none;
        /* No border */
        padding: 10px 20px;
        /* Padding inside button */
        border-radius: 4px;
        /* Rounded corners for button */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s ease;
        /* Smooth background color transition */
    }

    .send_btn:hover {
        background-color: #004280;
        /* Darker navy blue on hover */
    }

    .map_main {
        border-radius: 8px;
        /* Rounded corners for map section */
        overflow: hidden;
        /* Hide overflow for rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
    }

    .map-responsive {
        overflow: hidden;
        /* Hide overflow for responsiveness */
        padding-bottom: 56.25%;
        /* Aspect ratio for embedded map (16:9) */
        position: relative;
        /* Relative positioning for embedded elements */
        height: 0;
        /* Zero height for responsiveness */
    }

    .map-responsive iframe {
        left: 0;
        /* Position iframe to left */
        top: 0;
        /* Position iframe to top */
        height: 100%;
        /* Full height for responsiveness */
        width: 100%;
        /* Full width for responsiveness */
        position: absolute;
        /* Absolute positioning for embedded elements */
    }
</style>

<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss='alert'>X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="text" name="name"
                                value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="email" name="email"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="tel" name="phone"
                                value="{{ Auth::check() ? Auth::user()->phone : '' }}" required>
                        </div>
                        <input class="contactus" placeholder="Phone Number" type="hidden" name="user_id"
                            value="{{ Auth::check() ? Auth::user()->id : '' }}">
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" name="message" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.610460310747!2d101.6393254744704!3d2.927776854474621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb6e4a9d3b7a1%3A0xd0f74e8ad10f1129!2sMultimedia%20University%20-%20MMU%20Cyberjaya!5e0!3m2!1sen!2smy!4v1720435844633!5m2!1sen!2smy"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" width="600" height="400" frameborder="0"
                            style="border:0; width: 100%;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
