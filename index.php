<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
</head>

<body class="text-center">
    <div class="row">
        <div class="col-12">
            <form class="form-signin">
                <img class="mb-4" src="images/wallet.jpg" alt="" width="205">
                <div class="form-group">
                    <label for="transaction_id" >Transaction ID:</label>
                    <input type="text" id="transaction_id" class="form-control" value="othmane_1" name="transaction_id" required autofocus>
                </div>

                <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit">GET INFO</button>
            </form>
        </div>

        <div class="col-12">
            <div id="result" class="row justify-content-center">
                <div class="col-8">
                    <div class="card mb-3">
                        <div class="card-header text-white bg-dark">
                            Transaction informations
                        </div>

                        <div class="card-body">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header  bg-secondary" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-wallet"
                                                aria-expanded="true" aria-controls="collapse-wallet">
                                                1. Ewallet
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-wallet" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped"table-bordered table-striped">
                                                <thead class="thead-dark">
                                                    <th>ID</th>
                                                    <th>Financial Status</th>
                                                    <th>Fast Checkout</th>
                                                    <th>Status</th>
                                                    <th>Created at</th>
                                                    <th>Modified at</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-secondary" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-transaction"
                                                aria-expanded="false" aria-controls="collapse-transaction">
                                                2.	Transaction info
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-transaction" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thead-dark">
                                                    <th>ID</th>
                                                    <th>Description</th>
                                                    <th>Cost</th>
                                                    <th>Amount</th>
                                                    <th>Amount refunded</th>
                                                    <th>Currency</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-secondary" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-payment"
                                                aria-expanded="false" aria-controls="collapse-payment">
                                                3.	Payment Details
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-payment" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thead-dark">
                                                    <th>Account ID</th>
                                                    <th>External transaction ID</th>
                                                    <th>type</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header bg-secondary" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-customer"
                                                aria-expanded="false" aria-controls="collapse-customer">
                                                4.	Customer info
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-customer" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thead-dark">
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>House Number</th>
                                                    <th>City</th>
                                                    <th>Zip Code</th>
                                                    <th>ِCountry</th>
                                                    <th>Local</th>
                                                    <th>Amount</th>
                                                    <th>Currency</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header bg-secondary" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-shopping-cart"
                                                aria-expanded="false" aria-controls="collapse-shopping-cart">
                                                5.	Shopping cart
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-shopping-cart" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <h3>Items:</h3>
                                            <table class="table table-bordered table-striped">
                                                <thead class="thead-dark">
                                                    <th>Merchant item ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>TAX</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>

</body>

</html>