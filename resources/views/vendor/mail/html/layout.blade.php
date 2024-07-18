<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('CEVERUS') }}</title>
    <style>
        /* Reset styles */
        body, td {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        /* General styles */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f9f9f9;
        }

        .content {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .body {
            padding: 30px;
        }

        .inner-body {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .content-cell {
            padding: 30px;
            text-align: left;
        }

        .footer {
            width: 100%;
            clear: both;
            color: #666666;
            font-size: 14px;
            text-align: center;
            padding: 20px 0;
        }

        .footer a {
            color: #666666;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: none;">
                        <table class="inner-body" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                                    {{ $subcopy ?? '' }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Email Footer -->
                <tr>
                    <td class="footer" width="100%" cellpadding="0" cellspacing="0">
                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td align="center">
                                    <p>&copy; {{ date('Y') }} {{ config('CEVERUS') }}. All rights reserved.</p>
                                    <p>Designed with <span style="color: #e25555;">&#10084;</span> by CEVERUS Team</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
