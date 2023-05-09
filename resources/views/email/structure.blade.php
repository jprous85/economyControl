<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">

        .mt-4 {
            margin-top: 40px;
        }

        .mb-4 {
            margin-bottom: 40px;
        }

        body {
            margin: 0;
        }

        .background-landscape {
            background-color: #D4F3FE;
            padding: 40px 0;
        }

        .border-14 {
            border-radius: 14px;
        }

        .box-section {
            margin: 0 auto;

        }

        @media  only screen and (min-width: 900px) {
            .box-content {
                width: 60%;
            }
        }

        @media  only screen and (min-width: 1200px) {
            .box-content {
                width: 40%;
            }
        }

        @media  only screen and (max-width: 899px) {
            .box-content {
                width: 90%;
            }
        }

        .box-content {
            border-radius: 14px;
            background: white;
            margin: 10px auto;
            padding: 0 0 30px 0;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            padding: 10px;
            border-radius: 7px;
        }

        .btn-primary {
            background-color: #068FC1;
            color: white;
        }

    </style>

</head>
<body>
<div class="background-landscape">
    <div class="top-box-section">
        <div class="box-section">
            <div class="box-content">
                <img src="{{ url($headerImage) }}"
                     alt="piggy-bank-blank"
                     width="100%"
                     class="border-14"
                >
                <div style="padding: 0 50px;">
                    @yield('content')
                    @include('./email/components/anyQuestion')
                    @include('./email/components/socialNetwork')
                    @include('./email/components/designedBy')
                    @include('./email/components/footer')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
