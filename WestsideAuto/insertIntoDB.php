<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	$user = 'root';
	$password = 'root';
	$db = 'westsideAuto';
	$host = 'localhost';
	$port = 3307;

	$link = mysqli_init();
	$success = mysqli_real_connect(
	   $link, 
	   $host, 
	   $user, 
	   $password, 
	   $db,
	   $port
	);
	
	if(!$success)
		exit("Couldn't connect to DB");
	
	$inputType = $_POST['insert_into'];
	$sql = "";
	echo $inputType."<br>";
	
	switch($inputType) {
		case "purchased":
			$purchase_ID = $_POST['purchase_ID'];

			$dateOfPurchase = $_POST['date_of_purchase'];
			$seller = $_POST['seller'];
			$isAuction = $_POST['isAuction'];
			$location = $_POST['location'];
			
			if($isAuction == 'Yes')
				$isAuction = 1;
			else
				$isAuction = 0;

			//book price
			//Purchased price?
			$VIN = $_POST['VIN'];
			$make = $_POST['make'];
			$model = $_POST['model'];
			$trim = $_POST['trim'];
			$year = $_POST['year'];
			$color = $_POST['color'];
			$current_condition = $_POST['vehicle_condition'];
			$kilometers = $_POST['kilometers'];
			$style = $_POST['style'];
			$interiorColor = $_POST['interior_color'];
			
			$sql = "INSERT INTO purchase (purchase_ID, date_of_purchase, seller, isAuction, location) VALUES ($purchase_ID, \"$dateOfPurchase\", \"$seller\", $isAuction, \"$location\")"; 
			
			$sql = "INSERT INTO vehicles (VIN, make, model, trim, year, color, current_condition, km, style, interior_color) VALUES ($VIN, \"$make\", \"$model\", \"$trim\", $year, \"$color\", \"$current_condition\", $kilometers, \"$style\", \"$interiorColor\")";
			
			$sql = "INSERT INTO r_PurchasedRelationship (purchase_ID, VIN) VALUES ($purchase_ID, $VIN)";
			break;
		case "employee":
			$empid = $_POST['empid'];
			$employee_first_name = $_POST['employee_first_name'];
			$employee_last_name = $_POST['employee_first_name'];
			$department = $_POST['department'];
			$phone_number = $_POST['phone_number'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$postal_code = $_POST['employee_postal_code'];
			
			$sql = "INSERT INTO employees (empid, dept, first_name, last_name, phone_no, address, city, postal_code, province) VALUES (\"$empid\", \"$department\", \"$employee_first_name\", \"$employee_last_name\", \"$phone_number\", \"$address\", \"$city\", \"$postal_code\")";
			break;
		
		case "customer":
			$drivers_license_no = $_POST['drivers_license_no'];
			$customer_first_name = $_POST['customer_first_name'];
			$customer_last_name = $_POST['customer_last_name'];
			$customer_address = $_POST['customer_address'];
			$customer_city = $_POST['customer_city'];
			$customer_postal_code = $_POST['customer_postal_code'];
			$tax_id = $_POST['customer_tax_id'];
			$customer_gender = $_POST['customer_gender'];
			$customer_DOB = $_POST['customer_DOB'];
			
			$sql = "INSERT INTO customers (drivers_license_no, TaxID, address, first_name, last_name, no_of_late_payments, gender, DOB) VALUES ($drivers_license_no, $tax_id, \"$customer_address\", \"$customer_first_name\", \"$customer_last_name\", $no_of_late_payments, \"$customer_gender\", $customer_DOB)";
			
			break;
	
			
		case "warranty":
			$warranty_name = _POST['warranty_name'];
			$cost_per_month = _POST['cost_per_month'];
			$deductible = _POST['deductible'];
			
			$sql = "INSERT INTO warranty (warranty_name, cost_per_month, deductible) VALUES (\"$warranty_name\", $cost_per_month, $deductible)";
			break;
			
		case "invoice":
			$invoice_no = _POST['invoice_no'];
			$date_purchased = _POST['date_purchased'];
			
			$sql = "INSERT INTO invoice (invoice_no, date_purchased) VALUES (\"$invoice_no\", \"$date_purchased\")";
			
			break;
		
		default:
			echo "Found nothing!";
			break;
	}
	
	echo $sql."<br>";
	$result = mysqli_query($link, $sql);
	
	if($result) {
		echo "Success<br>";
	}
	else
		echo "Failure<br>";
	
	mysqli_close($link);
?>