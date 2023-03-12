<?php
include_once 'header.php';
include_once 'navbar.php';
?>
<div class="container">
    <div class="text-center">
        <h2>Fuel Quote Form</h2>
    </div>
    <div class="row justify-content-center my-6">
        <div class="col-lg-6">
            <form id="fuelForm" action="includes/fuel-form.inc.php" method="post">
                <div class="my-5" onchange="priceChanger()">
                    <label for="Gallons" class="form-label">Gallons Requested:</label>
                    <input type="number" name="Gallons" id="Gallons" placeholder="10" class="form-control form-control-lg" required
                        min="0">
                    <span class="error-msg hidden" id="numError">Invalid number</span>
                </div>
                <div class="my-5">
                    <label for="deliveryAddress" class="form-label">Delivery Address:</label>
                    <input type="deliveryAddress" name="deliveryAddess" id="deliveryAddress" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <label for="deliveryDate" class="form-label">Delivery Date:</label>
                    <input type="date" name="deliveryDate" id="deliveryDate" class="form-control form-control-lg" required>
                    <span class="error-msg hidden" id="dateError">Invalid Date</span>
                </div>
                <div class="my-5">
                    <label for="suggestPrice" class="form-label">Suggested Price / Gallon:</label>
                    <input type="number" name="suggestPrice" id="suggestPrice" value="6" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <label for="totalAmount" class="form-label">Total Amount Due:</label>
                    <input type="number" name="totalAmount" id="totalAmount" value="0" class="form-control form-control-lg" readonly>
                </div>
                <div class="my-5">
                    <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
                </div>
            </form>
            <?php
            echo "<script src='fuelForm.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
                integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
                crossorigin='anonymous'>
                </script>";
                if(isset($_GET["error"])) {
                    if($_GET["error"] === "emptyInput" || $_GET["error"] === "invalidInput") {
                        echo '<script>
                                document.getElementById("Gallons").style.backgroundColor = "Orange";
                                document.getElementById("numError").classList.remove("hidden");
                                document.getElementById("deliveryDate").style.backgroundColor = "Orange";
                                document.getElementById("dateError").classList.remove("hidden");
                            </script>';
                    }
                    else if($_GET["error"] === "emptyGallons") {
                        echo '<script>
                                document.getElementById("Gallons").style.backgroundColor = "Orange";
                                document.getElementById("numError").classList.remove("hidden");
                            </script>';
                    }
                    else if($_GET["error"] === "emptyDate" || $_GET["error"] === "invalidDate") {
                        echo '<script>
                                document.getElementById("deliveryDate").style.backgroundColor = "Orange";
                                document.getElementById("dateError").classList.remove("hidden");
                            </script>';
                    }
                    else if($_GET["error"] === "invalidGallons") {
                        echo '<script>
                                document.getElementById("Gallons").style.backgroundColor = "Orange";
                                document.getElementById("numError").classList.remove("hidden");
                            </script>';
                    }
                }
            ?>
        </div>

    </div>

</div>


<?php
include_once 'footer.php';
?>