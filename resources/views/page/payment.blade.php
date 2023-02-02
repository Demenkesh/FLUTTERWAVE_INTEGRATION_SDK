<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Flutterwave payment page for Laravel 8</title>
</head>

<body>
    <div class="container">
        {{-- using ajax to post a done message --}}
        <p class="ajax-res"></p>

        <div class="header mt-2 px-5 text-center bg-primary py-5 text-white">
            <h1>Pay for services</h1>
        </div>
        <div class="main">
            <form id="makePaymentForm">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="umeh" id="name" class="form-control "
                                required placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="umehonyedika0@gmail.com" required
                                class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount"  placeholder="Enter amount" id="amount"
                            class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="number">Phone Number</label>
                        <input type="number" name="number" value="09032491755" placeholder="Enter number"
                            id="number" class="form-control">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" id="btn1" class="btn btn-primary">Pay Now</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        $(function() {
            $("#makePaymentForm").submit(function(e) {
                e.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#number").val();
                var amount = $("#amount").val();
                //make our payment
                makePayment(amount, email, phone, name);
            });
        });

        function makePayment(amount, email, phone_number, name) {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-06b52c025ec5e1bfd12d049541122185-X",
                tx_ref: "RX1_{{ substr(rand(0, time()), 0, 7) }}",
                amount,
                currency: "NGN",
                country: "NG",
                payment_options: " ",
                // redirect_url: "http://127.0.0.1:8000",
                customer: {
                    email,
                    phone_number,
                    name,
                },

                callback: function(data) {
                    var transaction_id = data.transaction_id;
                    var customer = data.amount;
                    //Make ajax request
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ URL::to('verify-payment') }}",
                        dataType: 'json',
                        data: {
                            transaction_id,
                            _token,
                            amount,
                        },
                        success: function(response) {
                            $(".ajax-res").text('done');
                            console.log(response);
                        }
                    });

                    // $.ajax({
                    //     type: "POST",
                    //     url: "{{ URL::to('verify-payments') }}",
                    //     dataType: 'json',
                    //     data: {
                    //         transaction_id,
                    //         _token,
                    //         customer,
                    //     },
                    //     success: function(response) {
                    //         $(".ajax-res").text('done');
                    //         console.log(response);
                    //     }
                    // });


                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://s3-us-west-2.amazonaws.com/hp-cdn-01/uploads/orgs/flutterwave_logo.jpg?69",
                },
            });
        }
    </script>
</body>

</html>
