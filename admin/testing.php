<?php
include '../database/db_connect.php';
include '../action/fetch.php';

$houseLeaderId = $_GET['house_leader_id'] ?? '';
$houseNumber = $_GET['house_number'] ?? '';
$lastname = $_GET['lastname'] ?? '';
$firstname = $_GET['firstname'] ?? '';
$middlename = $_GET['middlename'] ?? '';
$exname = $_GET['exname'] ?? '';
$province = $_GET['province'] ?? '';
$municipality = $_GET['municipality'] ?? '';
$barangay = $_GET['barangay'] ?? '';
$purok = $_GET['purok'] ?? '';
$dob = $_GET['dob'] ?? '';
$age = $_GET['age'] ?? '';
$sex = $_GET['sex'] ?? '';
$occupation = $_GET['occupation'] ?? '';
$lcro = $_GET['lcro'] ?? '';
$marital_status = $_GET['marital_status'] ?? '';
$contact_number = $_GET['contact_number'] ?? '';
$religion = $_GET['religion'] ?? '';
$location = $_GET['location'] ?? '';
$lastname_spouse = $_GET['spouse_lastname'] ?? '';
$firstname_spouse = $_GET['spouse_firstname'] ?? '';
$middlename_spouse = $_GET['spouse_middlename'] ?? '';
$extension = $_GET['extension'] ?? '';
$address = $_GET['address'] ?? '';
$dob_spouse = $_GET['spouse_dob'] ?? '';
$age_spouse = $_GET['spouse_age'] ?? '';
$occupation_spouse = $_GET['spouse_occupation'] ?? '';
$lcro_spouse = $_GET['spouse_lcro'] ?? '';
$status_spouse = $_GET['status'] ?? '';
$tentures = $_GET['tentures_status'] ?? '';
$housing = $_GET['housing'] ?? '';
$floor = $_GET['floor'] ?? '';
$floor2 = $_GET['floor2'] ?? '';
$bedrooms = $_GET['bedrooms'] ?? '';

// Fetch older members
$older_members = [];
$stmt = $conn->prepare("SELECT name, age, working, occupation, income FROM older_household_members WHERE house_leader_id = ?");
$stmt->bind_param("i", $houseLeaderId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $older_members[] = $row;
}

// Fetch younger members
$younger_members = [];
$stmt = $conn->prepare("SELECT name, age, education_level, academic_status FROM younger_household_members WHERE house_leader_id = ?");
$stmt->bind_param("i", $houseLeaderId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $younger_members[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Census Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">


    <style>
       body {
    font-family: 'Georgia', serif;
    background-color: #ffffff; /* White background for the body */
    color: #000;
    margin: 0;
    padding: 20px;
    line-height: 1.6;
}
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            background-color: #fafafa; /* Off-white */
        }
        .header {
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
    position: relative;
}
.header img.logo {
    max-width: 100px;
    height: auto;
    position: absolute;
    left: 0; /* Position the logo to the left */
    margin-left: 40px;
    margin-bottom: 70px;
}
.header img.logo-right {
    max-width: 100px;
    height: auto;
    position: absolute;
    right: 0; /* Position the second logo on the right */
    margin-right: 40px;
    margin-bottom: 70px;
}
.header-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    color: #000;
    flex-grow: 1;
    margin-top: 30px;
}
        .header h3 {
            margin: 0;
            color: #000;
            flex-grow: 1; /* Allows title to take remaining space */
            text-align: center;
        }
        h1, h3, h4 {
            text-align: center;
            color: #000;
            margin: 0;
            padding: 5px 0;
        }

         h5 {
            text-align: center;
            color: #000;
            margin: 0;
            padding: 5px 0;
        }

        h1 {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #000;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            color: #000;
            font-weight: bold;
        }
        .header-row th {
            background-color: #e0e0e0;
        }
        .full-width {
            width: 100%;
        }
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .checkbox-group label {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            color: #000;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
            opacity: 0;
        }
        .checkbox-group label::before{
            content: "";
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 1px solid #ccc;
            margin-right: 5px;
        }
        .signature-line {
            border-top: 1px solid #ccc;
            margin-top: 30px;
            text-align: center;
            padding-top: 20px;
        }
        .note {
            font-style: italic;
            margin-bottom: 15px;
            color: #555;
            font-size: 0.9em;
        }
        input[type="text"], input[type="date"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 5px 0;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #ccc;
            color: #000;
            outline: none;
        }
        input[type="text"]:focus, input[type="date"]:focus, input[type="number"]:focus, input[type="email"]:focus {
            border-bottom: #000;
        }
        .section-title {
            background-color: #f5f5f5;
            padding: 5px 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-left: 4px solid #ccc;
            color: #000;
        }
        td {
            position: relative;
        }
        td::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 5px;
        }
        .form-title {
    font-weight: bold;
    font-size: 13px; /* Adjust font size as needed */
    margin: 0; /* Remove any margin */
    color: #000; /* Black text */
    text-align: left; /* Align text to the left */
}
.house-number {
    font-weight: bold;
    font-size: 13px; /* Adjust font size as needed */
    margin: 0; /* Remove any margin */
    color: #000; /* Black text */
    text-align: right; /* Align text to the right */
}
.form-header {
    display: flex; /* Use flexbox to align items */
    justify-content: space-between; /* Space between title and house number */
    align-items: center; /* Center items vertically */
    margin-bottom: 10px; /* Space below the header */
}
.house-number label {
    margin-right: 5px; /* Space between label and input */
    color: #000; /* Black text */
}

.house-number input {
    border: none; /* No border */
    border-bottom: 1px solid #000; /* Black underline */
    width: 100px; /* Adjust width of the input as needed */
    padding: 5px; /* Add some padding for comfort */
    outline: none; /* Remove outline on focus */
    font-size: 13px; /* Match label font size */
}

.house-number input:focus {
    border-bottom: 2px solid #000; /* Thicker underline on focus */
}

.button-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 5px;
    padding: 20px;
    margin-right: 16%;
}

.print-btn, .back-btn {
    padding: 5px 20px;
    font-size: 16px;
    text-decoration: none; /* Remove underline from link */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: inline-block;
    text-align: center;
    margin-left: 10px; /* Adds spacing between buttons */
}

.print-btn {
    background-color: #0080FF; /* Green color */
    color: white;
}

.print-btn:hover {
    background-color: #45a049; /* Darker green */
    transform: scale(1.05);
}

.back-btn {
    background-color: #45a049; /* Red color */
    color: white;
}

.back-btn:hover {
    background-color: #0080FF; /* Darker red */
    transform: scale(1.05);
}
</style>
<style>
        @media print {
    /* General font and layout adjustments */
    body {
    font-family: 'Georgia', serif;
    background-color: #ffffff; /* White background for the body */
    color: #000;
    margin: 0;
    padding: 20px;
    line-height: 1.6;
}
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            background-color: #fafafa; /* Off-white */
        }

    h1 {
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: -20px;
            margin-bottom: -8px;
            font-size: 9px;
        }

        h3 {
            font-size: 9px;
        }


        h4 {
            font-size: 9px;
        }

        h5 {
            font-size: 9px;
        }


    .header img.logo, .header img.logo-right {
        max-width: 50px; /* Adjust logo size */
        margin-bottom: 60px;
    }
    
    /* Table adjustments */
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 9px; /* Smaller font size for table text */
        margin-bottom: 5px;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 3px; /* Reduced padding */
        text-align: left;
    }
    th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

     /* Adjust the spacing between rows */
     tr {
        height: 5px; /* Set a specific height for table rows */
    }

    /* Form title and header adjustments */
    .form-title, .house-number {
        margin-top: -10px;
        font-size: 7px; /* Smaller form title font */
    }

    /* Input fields for form content */
    input[type="text"], input[type="date"], input[type="number"], input[type="email"] {
        font-size: 7px; /* Smaller input font */
        border: none;
        border-bottom: 1px solid #ccc;
        color: #000;
        outline: none;
        text-align: center;
    }

    /* Checkbox group adjustments */
    .checkbox-group label {
        font-size: 9px; /* Smaller font size for checkbox labels */
    }

    .button-container {
        display: none; /* Hide the button container during print */
    }

            .section-title {
            background-color: #f5f5f5;
            padding: 2px 2px;
            margin-top: 5px;
            border-left: 4px solid #ccc;
            color: #000;
        }

        .note {
            font-style: italic;
            margin-bottom: 15px;
            color: #555;
            font-size: 0.5em;
        }

        .header-text {
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        text-align: center;
        padding-top: 30px; /* Adjust this value to control the top spacing */
        margin-top: -30px; /* Optional, remove any margin if it's being applied */
        line-height: 1.5; /* Adjust this value to control the spacing between text lines */
    }


}
    </style>
</head>
<body>
<div class="form-container">
    <div class="form-header">
        <p class="form-title">POPCEN-CBMS Form 20</p> <!-- Added Title Here -->
        <div class="house-number">
            <label for="house-number-input">House Number:</label>
            <input type="text" id="housenumber" name="housenumber" class="form-control" value="<?php echo $houseNumber; ?>" required readonly>
        </div>
    </div>
    <div class="header">
        <img src="../admin/assets/img/censusformlogo.png" alt="Census Logo" class="logo">
        <div class="header-text">
            <h4>REPUBLIC OF THE PHILIPPINES</h4>
            <h3>PHILIPPINE STATISTICS AUTHORITY</h3>
            <h4>PROVINCE OF CEBU</h4>
            <h4>Municipality of <?php echo $municipality; ?></h4>
        </div>
        <img src="../admin/assets/img/censusformlogo2.png" alt="Census Logo 2" class="logo-right">
    </div>  

        <h1>BANTAYAN ISLAND CENSUS FORM</h1>
        
        <div class="section-title">
                <h4>House Leader (Pinuno ng Bahay)</h4>
        </div>
        <table>
            <tr>
                <th>Last Name (Apelyido)</th>
                <th>First Name (Pangalan)</th>
                <th>Middle Name</th>
                <th>Initial Name (Palayaw)</th>
            </tr>
            <tr>
            <td><?php echo $lastname; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $middlename; ?></td>
            <td><?php echo $exname; ?></td>
            </tr>
        </table>
        
        <table>
        <tr>
            <th>Province</th>
            <th>Municipality</th>
            <th>Barangay</th>
            <th>Purok</th>
        </tr>
        <tr>
            <td><?php echo $province; ?></td>
            <td><?php echo $municipality; ?></td>
            <td><?php echo $barangay; ?></td>
            <td><?php echo $purok; ?></td>
        </tr>
    </table>
        
    <table>
        <tr>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Occupation</th>
        </tr>
        <tr>
            <td><?php echo $dob; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $sex; ?></td>
            <td><?php echo $occupation; ?></td>
        </tr>
    </table>
        
    <table>
        <tr>
            <th>LCRO Registration</th>
            <th>Marital Status</th>
            <th>Contact Number</th>
            <th>Religion</th>
        </tr>
        <tr>
            <td><?php echo $lcro; ?></td>
            <td><?php echo $marital_status; ?></td>
            <td><?php echo $contact_number; ?></td>
            <td><?php echo $religion; ?></td>
        </tr>
    </table>
        
        <div class="section-title">
                <h4>Spouse (Asawa)</h4>
        </div>
        <table>
            <tr>
                <th>Last Name (Apelyido)</th>
                <th>First Name (Pangalan)</th>
                <th>Middle Name</th>
                <th>Initial Name (Palayaw)</th>
            </tr>
            <tr>
            <td><?php echo $lastname_spouse; ?></td>
            <td><?php echo $firstname_spouse; ?></td>
            <td><?php echo $middlename_spouse; ?></td>
            <td><?php echo $extension; ?></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th class="full-width"> Complete Address (Kompletong Address)</th>
            </tr>
            <tr>
                <td><?php echo $address; ?></td>
            </tr>
        </table>

        <table>
        <tr>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Occupation</th>
        </tr>
        <tr>
            <td><?php echo $dob_spouse; ?></td>
            <td><?php echo $age_spouse; ?></td>
            <td><?php echo $occupation_spouse; ?></td>
        </tr>
    </table>

    <table>
        <tr>
            <th>LCRO Registration</th>
            <th>Marital Status</th>
        </tr>
        <tr>
            <td><?php echo $lcro_spouse; ?></td>
            <td><?php echo $status_spouse; ?></td>
        </tr>
    </table>
        
    <div class="section-title">
                <h4>Other House Occupants (Ibang Nakatira sa Bahay)</h4>
        </div>
        <p class="note">Older Members</p>
        <table>
        <tr>
            <th>Complete Name</th>
            <th>Age</th>
            <th>Is Working?</th>
            <th>Occupation</th>
            <th>Income</th>
            </tr>
            <?php foreach ($older_members as $member) : ?>
                <tr>
            <td><?php echo htmlspecialchars($member['name']); ?></td>
                <td><?php echo htmlspecialchars($member['age']); ?></td>
                <td><?php echo $member['working'] === 'yes' ? 'Yes' : 'No'; ?></td>
                <td><?php echo htmlspecialchars($member['occupation']); ?></td>
                <td><?php echo htmlspecialchars($member['income']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="note">Younger Members</p>
        <table>
        <tr>
        <th>Complete Name</th>
            <th>Age</th>
            <th>Year Level</th>
            <th>Academic Year</th>
        </tr>
        <?php foreach ($younger_members as $members) : ?>
            <tr>
        <td><?php echo htmlspecialchars($members['name']); ?></td>
                <td><?php echo htmlspecialchars($members['age']); ?></td>
                <td><?php echo htmlspecialchars($members['education_level']); ?></td>
                <td><?php echo htmlspecialchars($members['academic_status']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
        
        <div class="section-title">
            <h4>Housing Characteristics</h4>
        </div>
        <table>
            <tr>
                <th> Number of Bedrooms (Bilang ng mga Silid-Tulugan)</th>
                <th> Date of Housing Constructed (Petsa ng Pagtatayo ng Pabahay)</th>
            </tr>
            <tr>
                <td><?php echo $bedrooms; ?></td>
                <td><?php echo $housing; ?></td>
            </tr>
            <tr>
                <th> Number of Floors (Bilang ng mga Palapag)</th>
                <th> Estimated Floor Area (Tinatayang Sukat ng Palapag)</th>
            </tr>
            <tr>
                <td><?php echo $floor; ?></td>
                <td><?php echo $floor2; ?></td>
            </tr>
        </table>
        <table>
        <tr>
                <th class="full-width"> Tentures Status (Katayuan ng Pagmamay-ari)</th>
            </tr>
            <tr>
                <td><?php echo $tentures; ?></td>
            </tr>
        </table>
        </div>
        <div class="button-container">
    <button class="print-btn" onclick="printForm()">Print Form</button>
    <a href="form.php" class="back-btn">Back</a>
</div>
        <script>
        function printForm() {

            window.print();
            var printWindow = window.open('', '', 'height=800,width=600');
            printWindow.document.write('<html><head><title>Print Census Form</title>');
            printWindow.document.write('<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">');
            printWindow.document.write('<style>' + document.querySelector('style').innerHTML + '</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(document.querySelector('.form-container').outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
        }
    </script>

</body>
</html>