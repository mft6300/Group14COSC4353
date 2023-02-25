<?php
include_once 'header.php';
include_once 'navbar.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<div class="container p-4">
        <div class="container p-4">
			<div class="d-flex justify-content-end">
				<div>
					<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" id="filterMenuButton">
						Filter
					</button>
					<form class="dropdown-menu p-4">
						<div class="form-group">
							<label for="startDate">Start Date</label>
							<input type="date" id="startDate" name="startDate" class="form-control">
						</div>
						<div class="form-group">
							<label for="endDate">End Date</label>
							<input type="date" id="endDate" name="startDate" class="form-control">
						</div>
						<button type="button" class="btn btn-primary" onclick="filterTable()">Apply</button>
					</form>
					<button type="button" class="btn btn-light" onclick="resetFilter()">Reset Filter</button>
				</div>
			</div>
			<table id="table" class="table table-bordered table-hover table-striped table-sm table-border">
				<caption>Showing 1-10 out of 30 receipts</caption>
				<thead>
					<tr>
						<th>Request Date</th>
						<th>Gallons Requested</th>
						<th>Delivery Address</th>
						<th>Delivery Date</th>
						<th>Price Per Gallon</th>
						<th>Total Amount Due</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>09/24/2022</td>
						<td>100</td>
						<td>123 Main St, Anytown, CA 12345</td>
						<td>09/27/2022</td>
						<td>$2.50</td>
						<td>$250.00</td>
					</tr>
					<tr>
						<td>09/23/2022</td>
						<td>200</td>
						<td>456 Elm St, Springfield, IL 67890</td>
						<td>09/25/2022</td>
						<td>$2.30</td>
						<td>$460.00</td>
					</tr>
					<tr>
						<td>09/17/2022</td>
						<td>150</td>
						<td>789 Oak Ave, Knoxville, TN 23456</td>
						<td>09/21/2022</td>
						<td>$2.40</td>
						<td>$360.00</td>
					</tr>
					<tr>
						<td>08/24/2022</td>
						<td>100</td>
						<td>1010 Maple St, Denver, CO 34567</td>
						<td>08/27/2022</td>
						<td>$2.50</td>
						<td>$250.00</td>
					</tr>
					<tr>
						<td>08/16/2022</td>
						<td>200</td>
						<td>1313 Cedar Rd, Des Moines, IA 45678</td>
						<td>08/19/2022</td>
						<td>$2.30</td>
						<td>$460.00</td>
					</tr>
					<tr>
						<td>08/15/2022</td>
						<td>150</td>
						<td>1414 Pine St, Boston, MA 56789</td>
						<td>08/17/2022</td>
						<td>$2.40</td>
						<td>$360.00</td>
					</tr>
					<tr>
						<td>08/11/2022</td>
						<td>100</td>
						<td>1616 Walnut Ave, Miami, FL 67890</td>
						<td>08/14/2022</td>
						<td>$2.50</td>
						<td>$250.00</td>
					</tr>
					<tr>
						<td>08/03/2022</td>
						<td>200</td>
						<td>1818 Oak St, Portland, OR 78901</td>
						<td>08/07/2022</td>
						<td>$2.30</td>
						<td>$460.00</td>
					</tr>
					<tr>
						<td>08/02/2022</td>
						<td>150</td>
						<td>2020 Cedar Ln, Charlotte, NC 89012</td>
						<td>08/05/2022</td>
						<td>$2.40</td>
						<td>$360.00</td>
					</tr>
					
					<tr>
						<td>08/01/2022</td>
						<td>150</td>
						<td>2222 Maple Ave, Seattle, WA 90123</td>
						<td>08/04/2022</td>
						<td>$2.40</td>
						<td>$360.00</td>
					</tr>
				</tbody>
			</table>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-end">
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>

    <script>
        function filterTable() {
            var startDate = Date.parse(document.getElementById("startDate").value);
            var endDate = Date.parse(document.getElementById("endDate").value);
            var table = document.getElementById("table");
            var rows = table.getElementsByTagName("tr");

			console.log(startDate, endDate)

            for (var i = 1; i < rows.length; i++) {
                var orderDate = Date.parse(rows[i].getElementsByTagName("td")[0].innerHTML);
                if (orderDate) {
                    if (orderDate < startDate || orderDate > endDate) {
                        rows[i].style.display = "none";
                    } else {
                        rows[i].style.display = "";
                    }
                }
            }
        }

        function resetFilter() {
            var table = document.getElementById("table");
            var rows = table.getElementsByTagName("tr");
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "";
            }
        }
    </script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
include_once 'footer.php';
?>