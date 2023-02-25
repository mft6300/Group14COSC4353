<?php
include_once 'header.php';
?>
<nav class="navbar navbar-expand-lg" style="background-color: gray">
    <div class="container-fluid">
        <h1 class="navbar-brand">Company name</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile/Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fuelHistory.html">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center">
        <h2>Fuel Quote Form</h2>

    </div>
    <div class="row justify-content-center my-6">
        <div class="col-lg-6">
            <form id="fuelForm">
                <div class="my-5" onchange="priceChanger()">
                    <label for="Gallons" class="form-label">Gallons Requested:</label>
                    <input type="number" id="Gallons" placeholder="10" class="form-control form-control-lg" required
                        min="0">
                    <span class="error-msg hidden" id="numError">Invalid number</span>
                </div>
                <div class="my-5">
                    <label for="deliveryAddress" class="form-label">Delivery Address:</label>
                    <input type="deliveryAddress" id="deliveryAddress" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <label for="deliveryDate" class="form-label">Delivery Date:</label>
                    <input type="date" id="deliveryDate" class="form-control form-control-lg" required>
                    <span class="error-msg hidden" id="dateError">Invalid Date</span>
                </div>
                <div class="my-5">
                    <label for="suggestPrice" class="form-label">Suggested Price / Gallon:</label>
                    <input type="number" id="suggestPrice" value="6" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <label for="totalAmount" class="form-label">Total Amount Due:</label>
                    <input type="number" id="totalAmount" value="0" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            <?php
            echo "<script src='fuelForm.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
                integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
                crossorigin='anonymous'>
                </script>";
            ?>
        </div>

    </div>

</div>


<?php
include_once 'footer.php';
?>