<?php session_start(); 
echo $_SESSION['first_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
    <title>WestSide Autos</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/myStyle.css">
</head>
<body>
<div class="jumbotron">
    <a href="index.php"><h1 class="display-4">Westside Autos</h1></a>
    <hr class="my-4">
</div>

<div id="employeeFormTop" class="topDiv">
    <a href="index.php"><img src="./assets/backBtn.png" alt="back" class="backBtn"></a>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Add a new customer</h1>
            </div>
        </div>
        <form action="insertIntoDB.php" method="post" id="addCustomer">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="customerLastName">Last Name</label>
                        <input type="text" class="form-control" name="customer_last_name" id="customerLastName"
                               placeholder="Enter last name">
                    </div>
                    <div class="col-sm">
                        <label for="customerFirstName">First Name</label>
                        <input type="text" class="form-control" name="customer_first_name" id="customerFirstName"
                               placeholder="Enter first name">
                    </div>
                    <div class="col-sm">
                        <label for="customerPhone">Phone</label>
                        <input type="text" class="form-control" id="customerPhone"
                               name="phone_no" placeholder="Enter phone number">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="DOB">Date of Birth (YYYY-MM-DD)</label>
                        <input type="date" class="form-control" name="customer_DOB" id="DOB"
                               placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-sm">
                        <label for="Gender">Gender</label>
                        <select id="Gender" name="customer_gender" class="form-control">
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="taxID">Tax ID</label>
                        <input type="text" class="form-control" name="customer_tax_id" id="taxID"
                               placeholder="Enter tax id">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="customer_address" id="address" placeholder="Enter street address">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="customer_city" id="city" placeholder="Enter city">
                    </div>
                    <div class="col-sm">
                        <label for="province">Province</label>
                        <select id="province" name="customer_province" class="form-control">
                            <option selected>Province</option>
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia<">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Northwest Territories">Northwest Territories</option>
                            <option value="Nunavut">Nunavut</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                            <option value="Quebec">Quebec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                            <option value="Yukon">Yukon</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" name="customer_postal_code" id="postalCode" placeholder="Enter postal code">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="dln">Driver's Licence Number</label>
                        <input type="text" class="form-control" name="drivers_license_no" id="dln"
                               placeholder="Enter driver's licence number" value="<?php echo $_SESSION['drivers_license_no'] ?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="insert_into" value="customer">
            <div class="container" style="padding-top: 20px">
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-primary" onclick="checkInputs('addCustomer')">Submit</a>
                        <button class="btn btn-secondary" type="reset" value="Reset">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <script src="javascript/myScripts.js"></script>
</body>
</html>