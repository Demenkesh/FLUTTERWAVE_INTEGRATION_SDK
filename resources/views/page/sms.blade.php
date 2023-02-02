<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Twilio SMS API for Laravel 8</title>
    </head>

    <body>
        <div class="container">
            <div class="header mt-2 px-5 text-center bg-primary py-5 text-white">
                <h1>Twilio SMS API for Laravel 8</h1>
            </div>
            <div class="main">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">Phone Number Plus Country Code</label>
                                <input type="text" name="phone" placeholder="Enter phone number" class="form-control"
                                    id="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message">Message Body</label>
                                <textarea name="message" id="" placeholder="Enter SMS content"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    </body>

</html>
