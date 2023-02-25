<!-- http://localhost/Group14COSC4353/client-registration.php -->

<?php
include_once 'header.php';
?>

  <div class="testbox">
    <form action="/">
      <div class="banner">
        <h1>New User Registration</h1>
      </div>
      <div class="colums">
        <div class="item">
          <label for="fname"> First Name<span>*</span></label>
          <input id="fname" type="text" name="fname" maxlength="50" required />
        </div>
        <div class="item">
          <label for="lname"> Last Name<span>*</span></label>
          <input id="lname" type="text" name="lname" maxlength="50" required />
        </div>
        <div class="item">
          <label for="address1">Address 1<span>*</span></label>
          <input id="address1" type="text" name="address1" maxlength="100" required />
        </div>
        <div class="item">
          <label for="address2">Address 2</label>
          <input id="address2" type="text" name="address2" maxlength="100" />
        </div>
        <div class="item">
          <label for="city">City<span>*</span></label>
          <input id="city" type="text" name="city" required />
        </div>
        <div class="item">
          <label for="state">State<span>*</span></label>
          <select name="state" id="state" required>
            <option value=""></option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="item">
          <label for="zip">Zip/Postal Code<span>*</span></label>
          <input id="zip" type="text" name="zip" minlength="5" maxlength="9" required />
        </div>
      </div>
      <div class="btn-block">
        <button type="submit" href="/">Submit</button>
      </div>
    </form>
  </div>
<?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] === "emptyinput") {
      echo "<p>Fill in all fields.</p>";
    }
    if ($_GET["error"] === "invalidssn") {
      echo "<p>Enter a proper SSN.</p>";
    }
    if ($_GET["error"] === "invalidzip") {
      echo "<p>Enter a proper zip code.</p>";
    }
  }
  if ($_REQUEST["status"] === 'success') {
    echo '<script>alert("User Registered")</script>';
  }
  ?>
</div>

<?php
include_once 'footer.php';
?>