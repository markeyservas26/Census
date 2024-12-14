<?php 
include 'header.php'; 
include '../action/fetch.php';
include '../action/updateform.php';

$house_leader_id = $_GET['id']; 
// Fetch data
$house_leader = fetch_house_leader_data($house_leader_id);
$spouse = fetch_spouse_data($house_leader_id);
$older_members = fetch_older_household_members($house_leader_id);
$younger_members = fetch_younger_household_members($house_leader_id);

//checkbox
// Fetch additional data
$transportation = fetch_transportation_data($house_leader_id);
$financial = fetch_financial_accounts_data($house_leader_id);
$internet = fetch_internet_access_data($house_leader_id);
$publicsafety = fetch_public_safety_data($house_leader_id);
$socialprotection = fetch_social_protection_data($house_leader_id);
$watersanitationhygiene = fetch_water_sanitation_hygiene_data($house_leader_id);
$improvedsource = fetch_improved_source_data($house_leader_id);
$unimprovedsource = fetch_unimproved_source_data($house_leader_id);
$mainwatersource = fetch_main_water_source_data($house_leader_id);
$watersourcelocated = fetch_water_source_located_data($house_leader_id);
$sanitation = fetch_sanitation_data($house_leader_id);
$toiletfacility = fetch_toiletfacility_data($house_leader_id);
$garbage = fetch_garbage_data($house_leader_id);
$housingcharacteristics = fetch_housing_characteristics_data($house_leader_id);
$floorbedroom = fetch_floor_bedroom_data($house_leader_id);
$tenturestatus = fetch_tenturestatus_data($house_leader_id);
$housing = fetch_housing_data($house_leader_id);
$energysource = fetch_energy_source_data($house_leader_id);
$energysourcecooking = fetch_energy_souce_cooking_data($house_leader_id);
$householdassets = fetch_household_assets_data($house_leader_id);
$vehicles = fetch_vehicles_data($house_leader_id);

// Function to safely check array values
function safe_array_value($array, $key, $default = '') {
    return isset($array[$key]) ? $array[$key] : $default;
}


?>
<style>
    body{
        background-color: white;
    }

        @media (max-width: 768px) {
            .form-label {
                margin-bottom: 0;
                margin-top: 0.5rem;
            }
        }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantayan Island Census Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
       @media (max-width: 768px) {
            .form-label {
                margin-bottom: 0;
                margin-top: 0.5rem;
            }
        }
        .form-check-input[type="radio"] {
            border: 1px solid #000;
        }
        .form-check-input[type="checkbox"] {
            border: 1px solid #0dcaf0;
        }
        .section-header {
            background-color: #26619c;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            font-weight:bold;
        }

        .required-asterisk {
        color: red;
        margin-left: 3px;
    }

    .form-control {
        background-color: #FEFCFF;
    }
    .error-message {
        color: red;
        font-size: 0.875em;
    }
    .alert-label {
        display: inline-block;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 5px 10px;
        margin-bottom: 10px;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .text-center {
        text-align: center;
    }

    .mb-4 {
        margin-bottom: 1.8rem;
        font-family: 'Georgia', serif;
    }

    .mb-3 {
        margin-bottom: 1.8rem;
        font-family: 'Georgia', serif;
    }

    h1 {
        font-size: 25px;
        color: #2c3e50;
    }

    .header1 {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        position: relative;
    }

    .logo {
        max-width: 100px; /* Maximum size for larger screens */
        width: 100%; /* Responsive scaling */
    height: auto;
    position: absolute;
    left: 0; /* Position the second logo on the right */
    margin-left: 40px;
    margin-top: 70px;
    }

    .logo-right {
        max-width: 100px; /* Maximum size for larger screens */
        width: 100%; /* Responsive scaling */
    height: auto;
    position: absolute;
    right: 0; /* Position the second logo on the right */
    margin-right: 40px;
    margin-top: 70px;
    }

    .header-text {
        text-align: center;
        width: 100%;
        padding-top: 10px;
    }

    h4 {
        font-size: 20px;
        color: #34495e;
        margin: 0;
    }

    @media (max-width: 768px) {
        .header1 {
            flex-direction: column;
            margin-bottom: 70px;
        }

        .logo, .logo-right {
            max-width: 80px; /* Smaller logo size for medium screens */
            margin-top: 30px;
        }
    }

    @media (max-width: 480px) {
        .logo, .logo-right {
            max-width: 60px; /* Even smaller logo size for small screens */
        }
    }

    .location-btn {
  background-color: #4CAF50; /* Green background */
  color: white; /* White text */
  border: none; /* Remove border */
  padding: 10px 20px; /* Add padding */
  text-align: center; /* Center text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Inline block */
  font-size: 16px; /* Font size */
  margin: 10px 0; /* Margin around button */
  cursor: pointer; /* Pointer cursor on hover */
  border-radius: 5px; /* Rounded corners */
  transition: background-color 0.3s ease; /* Smooth background change on hover */
}

.location-btn:hover {
  background-color: #45a049; /* Darker green on hover */
}

.location-btn:focus {
  outline: none; /* Remove the outline when the button is focused */
}

    </style>
</head>
<body>
    <main id="main" class="main">
    <div class="container">
    <div class="header1">
        <img src="assets/img/censusformlogo.png" alt="Census Logo" class="logo">
        <img src="assets/img/censusformlogo2.png" alt="Census Logo 2" class="logo-right">
    </div>
    <h1 class="text-center mb-3">REPUBLIC OF THE PHILIPPINES</h1>
    <h1 class="text-center mb-3">PHILIPPINE STATISTICS AUTHORITY</h1>
    <div class="form-header"></div>
    <div class="header-text">
        <h4>BANTAYAN ISLAND CENSUS FORM</h4>
    </div>
    <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
        <p>
        Please complete the required information for each item below. Items marked with an asterisk (*) are mandatory. Your honest and accurate responses will assist in gathering comprehensive data for the Bantayan Island Census. This information will serve as a foundation for designing programs and activities aimed at improving the lives of residents in Bantayan Island.
        </p>
        <em style="color:red;">* Items with an asterisk (*) are required.</em>
        
            <form id="demographicForm" method="post" action="../action/update_record.php">
            <input type="hidden" name="house_leader" value="<?php echo $house_leader['id']; ?>">
                <h5 class="section-header">CORE DEMOGRAPHIC CHARACTERISTICS</h5>
                <p style="color:red;">NOTICE: Do not include special characters like this *!@$%^&, etc. in your name entry.  This will create an issue in the record during verification.  Extensions like SR. or JR., etc. must be entered separately by selecting on the box provided below.</p>
                <p><b>House Leader</b></p>
                <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="housenumber" class="form-label">House Number<span class="required-asterisk">*</span></label>
                <input type="text" id="housenumber" name="housenumber" class="form-control" value="<?php echo $house_leader['house_number']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="lastName" class="form-label">Lastname<span class="required-asterisk">*</span></label>
                <input type="text" id="lastName" name="lastname_hl" class="form-control" value="<?php echo $house_leader['lastname']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="firstName" class="form-label">Firstname<span class="required-asterisk">*</span></label>
                <input type="text" id="firstName" name="firstname_hl" class="form-control" value="<?php echo $house_leader['firstname']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="middleName" class="form-label">Middlename</label>
                <input type="text" id="middleName" name="middlename_hl" class="form-control" value="<?php echo $house_leader['middlename']; ?>">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="extensionName" class="form-label">Extension name:</label>
                <select id="extensionName" name="exname_hl" class="form-select">
                    <option value="" <?php echo $house_leader['exname'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="jr" <?php echo $house_leader['exname'] == 'jr' ? 'selected' : ''; ?>>Jr.</option>
                    <option value="sr" <?php echo $house_leader['exname'] == 'sr' ? 'selected' : ''; ?>>Sr.</option>
                    <option value="i" <?php echo $house_leader['exname'] == 'i' ? 'selected' : ''; ?>>I</option>
                    <option value="ii" <?php echo $house_leader['exname'] == 'ii' ? 'selected' : ''; ?>>II</option>
                    <option value="iii" <?php echo $house_leader['exname'] == 'iii' ? 'selected' : ''; ?>>III</option>
                    <option value="iv" <?php echo $house_leader['exname'] == 'iv' ? 'selected' : ''; ?>>IV</option>
                    <option value="v" <?php echo $house_leader['exname'] == 'v' ? 'selected' : ''; ?>>V</option>
                    <option value="vi" <?php echo $house_leader['exname'] == 'vi' ? 'selected' : ''; ?>>VI</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="province" class="form-label">Province<span class="required-asterisk">*</span></label>
                <input type="text" id="province" name="province_hl" class="form-control" value="<?php echo $house_leader['province']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
    <label for="municipality" class="form-label">Municipality<span class="required-asterisk">*</span></label>
    <input type="text" id="municipality" name="municipality_hl" class="form-control" value="<?php echo $house_leader['municipality']; ?>" readonly>
</div>
<div class="col-12 col-sm-6 col-lg-3">
    <label for="barangay" class="form-label">Barangay<span class="required-asterisk">*</span></label>
    <input type="text" id="barangay" name="Barangay_hl" class="form-control" value="<?php echo $house_leader['barangay']; ?>" readonly>
</div>

            <div class="col-12 col-sm-6 col-lg-3">
                <label for="purok" class="form-label">Street/Purok/Sitio/Subd.</label>
                <input type="text" id="purok" name="purok_hl" class="form-control" value="<?php echo $house_leader['purok']; ?>">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="dateOfBirth" class="form-label">Date of Birth<span class="required-asterisk">*</span></label>
                <input type="date" id="dateOfBirth" name="dob_hl" class="form-control" value="<?php echo $house_leader['dob']; ?>" onchange="calculateAge()" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="age" class="form-label">Age<span class="required-asterisk">*</span></label>
                <input type="text" id="age" name="age_hl" class="form-control" value="<?php echo $house_leader['age']; ?>" readonly required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="sex" class="form-label">Sex at Birth <span class="required-asterisk">*</span></label>
                <select id="sex" name="sex_hl" class="form-select" required>
                    <option value="" <?php echo $house_leader['sex'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Male" <?php echo $house_leader['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $house_leader['sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="occupation" class="form-label">Occupation:</label>
                <input type="text" id="occupation" name="occupation_hl" class="form-control" value="<?php echo $house_leader['occupation']; ?>">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="registered" class="form-label">Registered with LCRO?</label>
                <select id="registered" name="lcro_hl" class="form-select">
                    <option value="" <?php echo $house_leader['lcro'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Yes" <?php echo $house_leader['lcro'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                    <option value="No" <?php echo $house_leader['lcro'] == 'No' ? 'selected' : ''; ?>>No</option>
                    <option value="Dont_know" <?php echo $house_leader['lcro'] == 'Dont_know' ? 'selected' : ''; ?>>I Don't know</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="marital_status" class="form-label">Marital Status<span class="required-asterisk">*</span></label>
                <select id="marital_status" name="marital_hl" class="form-select" required>
                    <option value="" <?php echo $house_leader['marital_status'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="single" <?php echo $house_leader['marital_status'] == 'single' ? 'selected' : ''; ?>>Single/Never married</option>
                    <option value="married" <?php echo $house_leader['marital_status'] == 'married' ? 'selected' : ''; ?>>Married</option>
                    <option value="common_law" <?php echo $house_leader['marital_status'] == 'common_law' ? 'selected' : ''; ?>>Common-law/Live-in</option>
                    <option value="widowed" <?php echo $house_leader['marital_status'] == 'widowed' ? 'selected' : ''; ?>>Widowed</option>
                    <option value="divorced" <?php echo $house_leader['marital_status'] == 'divorced' ? 'selected' : ''; ?>>Divorced</option>
                    <option value="separated" <?php echo $house_leader['marital_status'] == 'separated' ? 'selected' : ''; ?>>Separated</option>
                    <option value="annulled" <?php echo $house_leader['marital_status'] == 'annulled' ? 'selected' : ''; ?>>Annulled</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="contactnumber" class="form-label">Contact Number<span class="required-asterisk">*</span></label>
                <input type="text" id="contactnumber" name="contactnumber_hl" class="form-control" value="<?php echo $house_leader['contact_number']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="religion" class="form-label">Religion</label>
                <select id="religion" name="religion" class="form-select">
                    <option value="" <?php echo $house_leader['religion'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Catholic" <?php echo $house_leader['religion'] == 'Catholic' ? 'selected' : ''; ?>>Catholic</option>
                    <option value="Islam" <?php echo $house_leader['religion'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                    <option value="Iglesia ni Cristo" <?php echo $house_leader['religion'] == 'Iglesia ni Cristo' ? 'selected' : ''; ?>>Iglesia ni Cristo</option>
                    <option value="Evangelicals" <?php echo $house_leader['religion'] == 'Evangelicals' ? 'selected' : ''; ?>>Evangelicals</option>
                    <option value="Protestant" <?php echo $house_leader['religion'] == 'Protestant' ? 'selected' : ''; ?>>Protestant</option>
                    <option value="Seventh" <?php echo $house_leader['religion'] == 'Seventh' ? 'selected' : ''; ?>>Seventh-day Adventist</option>
                    <option value="Bible" <?php echo $house_leader['religion'] == 'Bible' ? 'selected' : ''; ?>>Bible Baptist Church</option>
                    <option value="Aglipayan" <?php echo $house_leader['religion'] == 'Aglipayan' ? 'selected' : ''; ?>>Aglipayan</option>
                    <option value="UCCP" <?php echo $house_leader['religion'] == 'UCCP' ? 'selected' : ''; ?>>UCCP</option>
            <option value="Jehovah" <?php echo $house_leader['religion'] == 'Jehovah' ? 'selected' : ''; ?>>Jehovah's Witnesses</option>
        </select>
    </div>

</div>

<p><b>Spouse</b></p>
<input type="hidden" name="house_leader_id" value="<?php echo $house_leader['id']; ?>">
                    <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg-3">
        <label for="lastName" class="form-label">Lastname:</label>
        <input type="text" id="lastName" name="lastname_spouse" value="<?php echo $spouse['spouse_lastname']; ?>" class="form-control" placeholder="Last Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="firstName" class="form-label">Firstname</label>
        <input type="text" id="firstName" name="firstname_spouse" value="<?php echo $spouse['spouse_firstname']; ?>" class="form-control" placeholder="First Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="middleName" class="form-label">Middlename:</label>
        <input type="text" id="middleName" name="middlename_spouse" value="<?php echo $spouse['spouse_middlename']; ?>" class="form-control" placeholder="Middle Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="extensionName" class="form-label">Extension name:</label>
        <select id="extensionName" name="extension_spouse" class="form-select">
            <option value="" <?php echo $spouse['extension'] == '' ? 'selected' : ''; ?>  >Select an option</option>
            <option value="jr" <?php echo $spouse['extension'] == 'jr' ? 'selected' : ''; ?>>Jr.</option>
            <option value="sr" <?php echo $spouse['extension'] == 'sr' ? 'selected' : ''; ?>>Sr.</option>
            <option value="i" <?php echo $spouse['extension'] == 'i' ? 'selected' : ''; ?>>I</option>
            <option value="ii" <?php echo $spouse['extension'] == 'ii' ? 'selected' : ''; ?>>II</option>
            <option value="iii" <?php echo $spouse['extension'] == 'iii' ? 'selected' : ''; ?>>III</option>
            <option value="iv" <?php echo $spouse['extension'] == 'iv' ? 'selected' : ''; ?>>IV</option>
            <option value="v" <?php echo $spouse['extension'] == 'v' ? 'selected' : ''; ?>>V</option>
            <option value="vi" <?php echo $spouse['extension'] == 'vi' ? 'selected' : ''; ?>>VI</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
                <label for="dateOfBirthSpouse" class="form-label">Date of Birth</label>
                <input type="date" id="dateOfBirthSpouse" name="dob_spouse" class="form-control" value="<?php echo $spouse['spouse_dob']; ?>" onchange="calculateSpouseAge()">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="age1" class="form-label">Age</label>
                <input type="text" id="age1" name="age_spouse" class="form-control" value="<?php echo $spouse['spouse_age']; ?>" readonly>
            </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="occupation" class="form-label">Occupation:</label>
        <input type="text" id="occupation" name="occupation_spouse" value="<?php echo $spouse['spouse_occupation']; ?>" class="form-control" placeholder="Occupation">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
                <label for="spouse_sex" class="form-label">Sex at Birth</label>
                <select id="spouse_sex" name="sex_spouse" class="form-select">
                    <option value="" <?php echo $spouse['spouse_sex'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Male" <?php echo $spouse['spouse_sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $spouse['spouse_sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="registered" class="form-label">Registered with LCRO?</label>
        <select id="registered" name="lcro_spouse" class="form-select">
            <option value="" <?php echo $spouse['spouse_lcro'] == '' ? 'selected' : ''; ?> selected disabled>Select an option</option>
            <option value="yes" <?php echo $spouse['spouse_lcro'] == 'yes' ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo $spouse['spouse_lcro'] == 'no' ? 'selected' : ''; ?>>No</option>
            <option value="dont_know" <?php echo $spouse['spouse_lcro'] == 'dont_know' ? 'selected' : ''; ?>>I Don't know</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
                <label for="provinceSpouse" class="form-label">Province</label>
                <input type="text" id="provinceSpouse" name="province_spouse" class="form-control" value="<?php echo $spouse['province_spouse']; ?>">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
    <label for="municipalitySpouse" class="form-label">Municipality</label>
    <input type="text" id="municipalitySpouse" name="municipality_spouse" class="form-control" value="<?php echo $spouse['municipality_spouse']; ?>" readonly>
</div>
<div class="col-12 col-sm-6 col-lg-3">
    <label for="barangaySpouse" class="form-label">Barangay</label>
    <input type="text" id="barangaySpouse" name="Barangay_spouse" class="form-control" value="<?php echo $spouse['barangay_spouse']; ?>" readonly>
</div>
<div class="col-12 col-sm-6 col-lg-3">
                <label for="purokSpouse" class="form-label">Street/Purok/Sitio/Subd.</label>
                <input type="text" id="purokSpouse" name="puroks_spouse" class="form-control" value="<?php echo $spouse['purok_spouse']; ?>">
            </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="status_spouse" class="form-select">
        <option value="" <?php echo $spouse['status'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="single" <?php echo $spouse['status'] == 'single' ? 'selected' : ''; ?>>Single/Never married</option>
                    <option value="married" <?php echo $spouse['status'] == 'married' ? 'selected' : ''; ?>>Married</option>
                    <option value="common_law" <?php echo $spouse['status'] == 'common_law' ? 'selected' : ''; ?>>Common-law/Live-in</option>
                    <option value="widowed" <?php echo $spouse['status'] == 'widowed' ? 'selected' : ''; ?>>Widowed</option>
                    <option value="divorced" <?php echo $spouse['status'] == 'divorced' ? 'selected' : ''; ?>>Divorced</option>
                    <option value="separated" <?php echo $spouse['status'] == 'separated' ? 'selected' : ''; ?>>Separated</option>
                    <option value="annulled" <?php echo $spouse['status'] == 'annulled' ? 'selected' : ''; ?>>Annulled</option>
        </select>
    </div>
                </div>
                
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest</p>

<?php for ($i = 0; $i < 5; $i++) : ?>
    <?php $member = isset($older_members[$i]) ? $older_members[$i] : null; ?>
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="oldername_1" class="form-label">Complete Name</label>
            <?php endif; ?>
            <input type="text" id="oldername_<?php echo $i+1; ?>" name="oldername_<?php echo $i+1; ?>" class="form-control" placeholder="<?php echo $i+1; ?>.Child Name" value="<?php echo $member ? htmlspecialchars($member['name']) : ''; ?>">
        </div>
        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="olderage_1" class="form-label">Age:</label>
            <?php endif; ?>
            <input type="number" id="olderage_<?php echo $i+1; ?>" name="olderage_<?php echo $i+1; ?>" class="form-control" placeholder="Age" value="<?php echo $member ? htmlspecialchars($member['age']) : ''; ?>">
        </div>
        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="olderworking_1" class="form-label">Is working?</label>
            <?php endif; ?>
            <select id="olderworking_<?php echo $i+1; ?>" name="olderworking_<?php echo $i+1; ?>" class="form-select">
                <option value="" disabled <?php echo !$member ? 'selected' : ''; ?>></option>
                <option value="yes" <?php echo $member && $member['working'] == 'yes' ? 'selected' : ''; ?>>Yes</option>
                <option value="no" <?php echo $member && $member['working'] == 'no' ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
        <div class="col-12 col-lg">
            <?php if ($i === 0) : ?>
                <label for="olderoccupation_1" class="form-label">Occupation:</label>
            <?php endif; ?>
            <input type="text" id="olderoccupation_<?php echo $i+1; ?>" name="olderoccupation_<?php echo $i+1; ?>" class="form-control" placeholder="Occupation" value="<?php echo $member ? htmlspecialchars($member['occupation']) : ''; ?>">
        </div>
        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="olderincome_1" class="form-label">Income:</label>
            <?php endif; ?>
            <input type="text" id="olderincome_<?php echo $i+1; ?>" name="olderincome_<?php echo $i+1; ?>" class="form-control" placeholder="Income" value="<?php echo $member ? htmlspecialchars($member['income']) : ''; ?>">
        </div>
    </div>
    <?php endfor; ?>

    <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest <em><b>Student Only</b></em></p>
    <?php for ($i = 0; $i < 5; $i++) : ?>
    <?php $members = isset($younger_members[$i]) ? $younger_members[$i] : null; ?>
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="firstyoungchildname" class="form-label">Complete Name</label>
            <?php endif; ?>
            <input type="text" id="youngername_<?php echo $i+1; ?>" name="youngername_<?php echo $i+1; ?>"  
                   value="<?php echo $members ? htmlspecialchars($members['name']) : ''; ?>" 
                   class="form-control" placeholder="1.Child Name">
        </div>

        <div class="col-12 col-sm-6 col-lg">
            <?php if ($i === 0) : ?>
                <label for="firstyoungage" class="form-label">Age:</label>
            <?php endif; ?>
            <input type="number" id="firstyoungage_<?php echo $i+1; ?>" name="youngerage_<?php echo $i+1; ?>" 
                   value="<?php echo $members ? htmlspecialchars($members['age']) : ''; ?>" 
                   class="form-control" placeholder="Age">
        </div>

        <div class="col-12 col-sm-6 col-lg">
    <?php if ($i === 0) : ?>
        <label for="younglevel_<?php echo $i + 1; ?>" class="form-label">Year Level</label>
    <?php endif; ?>
    <select id="younglevel_<?php echo $i + 1; ?>" name="younglevel_<?php echo $i + 1; ?>" class="form-select" 
            data-saved-academic-year="<?php echo isset($members) ? htmlspecialchars($members['academic_status']) : ''; ?>"
            onchange="updateAcademicYear('younglevel_<?php echo $i + 1; ?>', 'youngacademic_<?php echo $i + 1; ?>')">
        <option value="" disabled <?php echo !isset($members) ? 'selected' : ''; ?>></option>
        <option value="Elementary" <?php echo isset($members) && $members['education_level'] == 'Elementary' ? 'selected' : ''; ?>>Elementary School</option>
        <option value="Junior" <?php echo isset($members) && $members['education_level'] == 'Junior' ? 'selected' : ''; ?>>Junior High School</option>
        <option value="Senior" <?php echo isset($members) && $members['education_level'] == 'Senior' ? 'selected' : ''; ?>>Senior High School</option>
        <option value="College" <?php echo isset($members) && $members['education_level'] == 'College' ? 'selected' : ''; ?>>College</option>
    </select>
</div>

<div class="col-12 col-sm-6 col-lg">
    <?php if ($i === 0) : ?>
        <label for="youngacademic_<?php echo $i + 1; ?>" class="form-label">Academic Year</label>
    <?php endif; ?>
    <select id="youngacademic_<?php echo $i + 1; ?>" name="youngacademic_<?php echo $i + 1; ?>" class="form-select"
            data-saved-academic-year="<?php echo isset($members) ? htmlspecialchars($members['academic_status']) : ''; ?>">
        <option value="" disabled selected>Select an Academic Year</option>
        <!-- Options will be populated by JavaScript -->
    </select>
</div>
    </div>
<?php endfor; ?>
     
</div> 

<h5 class="section-header">Access to Public Transportation</h5>
<div class="row">
    <div class="col-md-6">
        <p>Does your household have access to any public transportation vehicle within 500 meters from your housing unit (if within 10-15 minutes walking distance)? </p>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="transportation" id="yes" value="Yes" <?php echo ($transportation['transportation'] == 'Yes') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="transportation" id="no" value="No" <?php echo ($transportation['transportation'] == 'No') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="no">No</label>
            </div>
        </div>
    </div>
</div>

<h5 class="section-header">Formal Financial Account</h5>
<div class="row">
    <div class="col-md-6">
        <p>Which of the following formal financial accounts (which is/are active, whether personal or joint accounts) do you or any of your household members have?</p>
        <div class="ms-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial1" name="bankaccount" value="Bank Account" <?php echo (isset($financial['bank_account']) && $financial['bank_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial1">A Bank account (ATM, online/electronic banking, passbook)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial2" name="digitalbankaccount" value="Digital Bank Account" <?php echo (isset($financial['digital_bank_account']) && $financial['digital_bank_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial2">Digital bank account e.g., UNObank, Union Digital Bank, GoTyme, Overseas Filipino Bank, Tonik, and Maya Bank</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial3" name="emoneyaccount" value="E-money Account" <?php echo (isset($financial['emoney_account']) && $financial['emoney_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial3">E-money account (e.g., G-Cash, Maya) or cash card </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial4" name="nssla" value="NSSLA" <?php echo (isset($financial['nssla_account']) && $financial['nssla_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial4">Account with Non-Stock Savings and Loan Association or NSSLA (e.g., AFPSLAI, Manila Teachers SLA)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial5" name="awc" value="Account with cooperatives" <?php echo (isset($financial['cooperative_account']) && $financial['cooperative_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial5">Account with cooperatives</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial6" name="ngo" value="Account with microfinance NGO" <?php echo (isset($financial['microfinance_ngo_account']) && $financial['microfinance_ngo_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial6">Account with microfinance NGO (e.g., CARD, ASA)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial7" name="amrc" value="Account with money remittance centers" <?php echo (isset($financial['remittance_center_account']) && $financial['remittance_center_account'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial7"> Account with money remittance centers (e.g., Palawan Express, LBC, ML Kwarta Padala, Western Union) </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="financial8" name="notanswer" value="Prefer not to answer" <?php echo (isset($financial['prefer_not_answer']) && $financial['prefer_not_answer'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="financial8"> Prefer not to answer</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <p>What types of internet connection are available at home? </p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="connection1" name="ko3network" value="FIXED (WIRED) NARROWBAND/BROADBAND NETWORK" <?php echo (isset($internet['fixed_wired']) && $internet['fixed_wired'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="connection1">FIXED (WIRED) NARROWBAND/BROADBAND NETWORK [e.g., via Digital Subscriber Line (DSL), cable modem, high speed leased line, fiber-to-the-home/building, powerline, and other fixed (wired) broadband] </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="connection2" name="fixednetwork" value="FIXED (WIRELESS) BROADBAND NETWORK" <?php echo (isset($internet['fixed_wireless']) && $internet['fixed_wireless'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="connection2">FIXED (WIRELESS) BROADBAND NETWORK [e.g., via WiMAX and fixed Code Division Multiple Access (CDMA)] </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="connection3" name="satellitenetwork" value="SATELLITE BROADBAND NETWORK" <?php echo (isset($internet['satellite']) && $internet['satellite'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="connection3">SATELLITE BROADBAND NETWORK</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="connection4" name="mobilenetwork" value="MOBILE BROADBAND NETWORK" <?php echo (isset($internet['mobile']) && $internet['mobile'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="connection4">MOBILE BROADBAND NETWORK [e.g., via handset, card (e.g., integrated SIM card) or USB modem] </label>
        </div>
        
    </div>
    <h5 class="section-header">Public Safety</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>How safe do you feel walking alone in your area (i.e., neighborhood or village) at night? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety1" name="publicsafety" value="Very safe" <?php echo ($publicsafety['safety_level'] == 'Very Safe') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety1"> Very safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety2" name="publicsafety" value="Safe" <?php echo ($publicsafety['safety_level'] == 'Safe') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety2">Safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety3" name="publicsafety" value="Unsafe" <?php echo ($publicsafety['safety_level'] == 'Unsafe') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety3">Unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety4" name="publicsafety" value="Very unsafe" <?php echo ($publicsafety['safety_level'] == 'Very unsafe') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety4"> Very unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety5" name="publicsafety" value="I never go out at night/Does not apply" <?php echo ($publicsafety['safety_level'] == 'I never go out at night/Does not apply') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety5">I never go out at night/Does not apply </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety6" name="publicsafety" value="Don’t Know" <?php echo ($publicsafety['safety_level'] == 'Don’t Know') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="publicsafety6">Don’t Know</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="section-header">Social Protection and Assistance Programs</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>Is any member of your household (including) OFW, who is a dependent/beneficiary/member of any of the following social/health insurance programs?</p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap1" name="sss" value="A Social Security System (SSS)" <?php echo (isset($socialprotection['sss']) && $socialprotection['sss'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap1"> A Social Security System (SSS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap2" name="gsis" value="Government Service Insurance System (GSIS)" <?php echo (isset($socialprotection['gsis']) && $socialprotection['gsis'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap2"> Government Service Insurance System (GSIS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap3" name="philhealth" value="PhilHealth" <?php echo (isset($socialprotection['philhealth']) && $socialprotection['philhealth'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap3">PhilHealth</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap4" name="healthormedical" value="Health/Medical Insurance other than PhilHealth" <?php echo (isset($socialprotection['health_or_medical']) && $socialprotection['health_or_medical'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap4">  Health/Medical Insurance other than PhilHealth (e.g., MediCard, Maxicare, LGU Health card, cooperative health card)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap6" name="dontwork" value="Don’t Know" <?php echo (isset($socialprotection['dont_work']) && $socialprotection['dont_work'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap6">Don’t Know</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>In the past 12 months (July 01, 2023 - June 30, 2024), did any member of your household receive benefits/ grants/assistance from the following social/health insurance programs?</p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap7" name="sss2" value="A Social Security System (SSS)" <?php echo (isset($socialprotection['sss2']) && $socialprotection['sss2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap7"> A Social Security System (SSS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap8" name="gsis2" value="Government Service Insurance System (GSIS)" <?php echo (isset($socialprotection['gsis2']) && $socialprotection['gsis2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap8"> Government Service Insurance System (GSIS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap9" name="philhealth2" value="PhilHealth" <?php echo (isset($socialprotection['philhealth2']) && $socialprotection['philhealth2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap9">PhilHealth</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap10" name="healthormedical2" value="Health/Medical Insurance other than PhilHealth" <?php echo (isset($socialprotection['health_or_medical2']) && $socialprotection['health_or_medical2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap10">  Health/Medical Insurance other than PhilHealth (e.g., MediCard, Maxicare, LGU Health card, cooperative health card)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap12" name="dontknow2" value="Don’t Know" <?php echo (isset($socialprotection['dont_know2']) && $socialprotection['dont_know2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="spap12">Don’t Know</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="section-header">Water, Sanitation, and Hygiene</h5>
<div class="row">
    <div class="col-md-6">
        <p>What is your household's main source of water supply?</p>
        <div class="ms-4">
        <b><p>Community Water System</p></b>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh1" name="community_water_supply" value="Piped into Dwelling" <?php echo ($watersanitationhygiene['community_water_supply'] == 'Piped into Dwelling') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh1"> Piped into Dwelling</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh2" name="community_water_supply" value="Piped into yard/plot" <?php echo ($watersanitationhygiene['community_water_supply'] == 'Piped into yard/plot') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh2">Piped into yard/plot</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh3" name="community_water_supply" value="Public Tap/Stand Pipe" <?php echo ($watersanitationhygiene['community_water_supply'] == 'Public Tap/Stand Pipe') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh3">Public Tap/Stand Pipe</label>
            </div>
            <b><p>Point Source</p></b>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh4" name="point_source_water_supply" value="Protected Well/Tube Well/Borehole" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Protected Well/Tube Well/Borehol') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh4">Protected Well/Tube Well/Borehole  </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh5" name="point_source_water_supply" value="Protected Spring" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Protected Spring') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh5">Protected Spring</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh6" name="point_source_water_supply" value="RainWater" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'RainWater') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh6">RainWater</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh7" name="point_source_water_supply" value="Transfer Truck/Peddler/Neighbor" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Transfer Truck/Peddler/Neighbor') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh7">Transfer Truck/Peddler/Neighbor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh8" name="point_source_water_supply" value="Unprotected (Open Dug Well)" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Unprotected (Open Dug Well)') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh8">Unprotected (Open Dug Well)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh9" name="point_source_water_supply" value="Unproteced Spring" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Unproteced Spring') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh9">Unproteced Spring</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh10" name="point_source_water_supply" value="Surfaced Water" <?php echo ($watersanitationhygiene['point_source_water_supply'] == 'Surfaced Water') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="wsh10">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
            </div>
        </div>
    </div>

                    <div class="col-md-6">
                        <p>What is the main source of drinking water used by members of your household?</p>
                        <div class="ms-4">
                        <p><b>Improved source of drinking water</b></p>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh12" name="dwelling2" value="Piped into Dwelling" <?php echo (isset($improvedsource['dwelling2']) && $improvedsource['dwelling2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh12"> Piped into Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh13" name="yardorplot2" value="Piped into yard/plot" <?php echo (isset($improvedsource['yardorplot2']) && $improvedsource['yardorplot2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh13">Piped into yard/plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh14" name="PipedtoNeighbor" value="Piped to Neighbor" <?php echo (isset($improvedsource['PipedtoNeighbor']) && $improvedsource['PipedtoNeighbor'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh14">Piped to Neighbor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh15" name="PublicTap2" value="Public Tap/Stand Pipe" <?php echo (isset($improvedsource['PublicTap2']) && $improvedsource['PublicTap2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh15">Public Tap/Stand Pipe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh16" name="TubeWell2" value="Tube Well/Borehole" <?php echo (isset($improvedsource['TubeWell2']) && $improvedsource['TubeWell2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh16">Tube Well/Borehole  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh17" name="ProtectedWell2" value="Protected Well" <?php echo (isset($improvedsource['ProtectedWell2']) && $improvedsource['ProtectedWell2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh17">Protected Well</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh18" name="RainWater2" value="RainWater" <?php echo (isset($improvedsource['RainWater2']) && $improvedsource['RainWater2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh18">RainWater</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh19" name="UnprotectedSpring2" value="Unprotected Spring" <?php echo (isset($improvedsource['UnprotectedSpring2']) && $improvedsource['UnprotectedSpring2'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh19">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh20" name="TankerTruck" value="Tanker - Truck" <?php echo (isset($improvedsource['TankerTruck']) && $improvedsource['TankerTruck'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh20">Tanker - Truck</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh21" name="CartwithSmallTank" value="Cart with Small-Tank" <?php echo (isset($improvedsource['CartwithSmallTank']) && $improvedsource['CartwithSmallTank'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh21">Cart with Small-Tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh22" name="WaterRefillingStation" value="Water Refilling Station" <?php echo (isset($improvedsource['WaterRefillingStation']) && $improvedsource['WaterRefillingStation'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh22">Water Refilling Station</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh23" name="BottledWater" value="Bottled Water" <?php echo (isset($improvedsource['BottledWater']) && $improvedsource['BottledWater'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh23">Bottled Water</label>
                            </div>
                            <p><b>Unimproved source of drinking water</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh24" name="UnprotectedWell" value="Unprotected Well (Open Dug Well)" <?php echo (isset($unimprovedsource['UnprotectedWell']) && $unimprovedsource['UnprotectedWell'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh24">Unprotected Well (Open Dug Well)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh25" name="UnprotectedSpring3" value="Unprotected Spring" <?php echo (isset($unimprovedsource['UnprotectedSpring3']) && $unimprovedsource['UnprotectedSpring3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh25">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh26" name="SurfacedWater3" value="Surfaced Water" <?php echo (isset($unimprovedsource['SurfacedWater3']) && $unimprovedsource['SurfacedWater3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh26">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
                        </div>
                    </div>
                    <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                    <div class="col-md-6">
                        <p>What is the main source of water used by members of your household for other purposes such as cooking and handwashing?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh28" name="PipedintoDwelling" value="Piped into Dwelling" <?php echo (isset($mainwatersource['PipedintoDwelling']) && $mainwatersource['PipedintoDwelling'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh28"> Piped into Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh29" name="Pipedintoyardorplot" value="Piped into yard/plot" <?php echo (isset($mainwatersource['Pipedintoyardorplot']) && $mainwatersource['Pipedintoyardorplot'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh29">Piped into yard/plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh30" name="PipedtoNeighbor" value="Piped to Neighbor" <?php echo (isset($mainwatersource['PipedtoNeighbor']) && $mainwatersource['PipedtoNeighbor'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh30">Piped to Neighbor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh31" name="PublicTap3" value="Public Tap/Stand Pipe" <?php echo (isset($mainwatersource['PublicTap3']) && $mainwatersource['PublicTap3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh31">Public Tap/Stand Pipe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh32" name="TubeWell3" value="Tube Well/Borehole" <?php echo (isset($mainwatersource['TubeWell3']) && $mainwatersource['TubeWell3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh32">Tube Well/Borehole  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh33" name="ProtectedWell3" value="Protected Well" <?php echo (isset($mainwatersource['ProtectedWell3']) && $mainwatersource['ProtectedWell3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh33">Protected Well</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh34" name="RainWater3" value="RainWater" <?php echo (isset($mainwatersource['RainWater3']) && $mainwatersource['RainWater3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh34">RainWater</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh35" name="ProtectedSpring3" value="Protected Spring" <?php echo (isset($mainwatersource['ProtectedSpring3']) && $mainwatersource['ProtectedSpring3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh35">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh36" name="TankerTruck3" value="Tanker - Truck" <?php echo (isset($mainwatersource['TankerTruck3']) && $mainwatersource['TankerTruck3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh36">Tanker - Truck</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh37" name="CartwithSmallTank3" value="Cart with Small-Tank" <?php echo (isset($mainwatersource['CartwithSmallTank3']) && $mainwatersource['CartwithSmallTank3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh37">Cart with Small-Tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh38" name="WaterRefillingStation3" value="Water Refilling Station" <?php echo (isset($mainwatersource['WaterRefillingStation3']) && $mainwatersource['WaterRefillingStation3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh38">Water Refilling Station</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh39" name="BottledWater3" value="Bottled Water" <?php echo (isset($mainwatersource['BottledWater3']) && $mainwatersource['BottledWater3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh39">Bottled Water</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh40" name="UnprotectedWell3" value="Unprotected Well (Open Dug Well)" <?php echo (isset($mainwatersource['UnprotectedWell3']) && $mainwatersource['UnprotectedWell3'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh40">Unprotected Well (Open Dug Well)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh41" name="UnprotectedSpring4" value="Unprotected Spring" <?php echo (isset($mainwatersource['UnprotectedSpring4']) && $mainwatersource['UnprotectedSpring4'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh41">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh42" name="SurfacedWater4" value="Surfaced Water" <?php echo (isset($mainwatersource['SurfacedWater4']) && $mainwatersource['SurfacedWater4'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh42">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is that water source located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh44" name="watersourcelocated" value="In Own Dwelling" <?php echo ($watersourcelocated['watersource_location'] == 'In Own Dwelling') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh44">In Own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh45" name="watersourcelocated" value="In own Yard/Plot" <?php echo ($watersourcelocated['watersource_location'] == 'In own Yard/Plot') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh45">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh46" name="watersourcelocated" value="Elsewhere" <?php echo ($watersourcelocated['watersource_location'] == 'Elsewhere') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh46">Elsewhere</label>
                            </div>
                        </div>
</div>
<hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
<div class="col-md-6">
                        <p>What kind of toilet facility do members of your household usually use?</p>
                        <div class="ms-4">
                        <p><b>Improved Sanitation Facility</b></p>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh47" name="improvedsanitation" value="Flush/Pour flush to piped sewer system" <?php echo ($sanitation['improved_sanitation'] == 'Flush/Pour flush to piped sewer system') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh47">Flush/Pour flush to piped sewer system</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh48" name="improvedsanitation" value="Flush/Pour flush to septic tank" <?php echo ($sanitation['improved_sanitation'] == 'Flush/Pour flush to septic tank') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh48">Flush/Pour flush to septic tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh49" name="improvedsanitation" value="Flush/Pour flush to pit latrine" <?php echo ($sanitation['improved_sanitation'] == 'Flush/Pour flush to pit latrine') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh49">Flush/Pour flush to pit latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh50" name="improvedsanitation" value="wsh50" <?php echo ($sanitation['improved_sanitation'] == 'wsh50') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh50">Ventilated Improve Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh51" name="improvedsanitation" value="Pit Latrine with Slab" <?php echo ($sanitation['improved_sanitation'] == 'Pit Latrine with Slab') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh51">Pit Latrine with Slab</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh52" name="improvedsanitation" value="Composting Toilet" <?php echo ($sanitation['improved_sanitation'] == 'Composting Toilet') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh52">Composting Toilet</label>
                            </div>
                            <p><b>Unimproved Sanitation Facility</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh53" name="unimprovedsanitation" value="Flush/Pour flush to somewhere else/open drain" <?php echo ($sanitation['unimproved_sanitation'] == 'Flush/Pour flush to somewhere else/open drain') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh53">Flush/Pour flush to somewhere else/open drain</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh54" name="unimprovedsanitation" value="Pit Latrine without slab/Open pit" <?php echo ($sanitation['unimproved_sanitation'] == 'Pit Latrine without slab/Open pit') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh54">Pit Latrine without slab/Open pit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh55" name="unimprovedsanitation" value="Bucket/Pil System" <?php echo ($sanitation['unimproved_sanitation'] == 'Bucket/Pil System') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh55">Bucket/Pil System</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh56" name="unimprovedsanitation" value="Hanging Toilet/Hanging Latrine" <?php echo ($sanitation['unimproved_sanitation'] == 'Hanging Toilet/Hanging Latrine') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh56">Hanging Toilet/Hanging Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh57" name="unimprovedsanitation" value="Flush or pour flush to don't know where" <?php echo ($sanitation['unimproved_sanitation'] == 'Flush or pour flush to dont know where') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh57">Flush or pour flush to don't know where</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh58" name="unimprovedsanitation" value="Public Toilet" <?php echo ($sanitation['unimproved_sanitation'] == 'Public Toilet') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh58">Public Toilet</label>
                            </div>
                            <p><b>Open Defecation</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh59" name="opendefecation" value="No Facility" <?php echo ($sanitation['open_defecation'] == 'No Facility') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh59">No Facility/Disposal of human feces in feilds, forests, bushes, open bodies of water, beaches, or other open species</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is the toilet facility located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh61" name="toiletfacility" value="In own Dwelling" <?php echo ($toiletfacility['toilet_facility'] == 'In own Dwelling') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh61">In own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh62" name="toiletfacility" value="In own Yard/Plot" <?php echo ($toiletfacility['toilet_facility'] == 'In own Yard/Plot') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh62">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh63" name="toiletfacility" value="Elsewhere" <?php echo ($toiletfacility['toilet_facility'] == 'Elsewhere') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh63">Elsewhere</label>
                            </div>
                            <div class="col-md-6">
                        <p>Do you share this facility with others who are not members of your households?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh64" name="facilitywithothers" value="Yes" <?php echo ($toiletfacility['facility_with_others'] == 'Yes') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh64">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh65" name="facilitywithothers" value="No" <?php echo ($toiletfacility['facility_with_others'] == 'No') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh65">No</label>
                            </div>
                            </div>
                      <p>Do you share this facility only with members of other household that you know or is the facility open to the use of the general public?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh67" name="facilitywithmembers" value="Shared with known household (Not Public)" <?php echo ($toiletfacility['facility_with_members'] == 'Shared with known household (Not Public)') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh67">Shared with known household (Not Public)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh68" name="facilitywithmembers" value="Shared with General Public" <?php echo ($toiletfacility['facility_with_members'] == 'Shared with General Public') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh68">Shared with General Public</label>
                            </div>
                           </div>
                           <p>In what ways does your household dispose its garbage/solid wastes?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh69" name="SegregatingWaste" value="Segregating Waste" <?php echo (isset($garbage['SegregatingWaste']) && $garbage['SegregatingWaste'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh69">Segregating Waste</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh70" name="Lettinggarbagetruckcollectwaste" value="Letting garbage truck collect waste" <?php echo (isset($garbage['Lettinggarbagetruckcollectwaste']) && $garbage['Lettinggarbagetruckcollectwaste'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh70">Letting garbage truck collect waste</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh71" name="Recycling" value="Recycling/Giving Away Recyclables" <?php echo (isset($garbage['Recycling']) && $garbage['Recycling'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh71">Recycling/Giving Away Recyclables</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh72" name="Composting" value="Composting" <?php echo (isset($garbage['Composting']) && $garbage['Composting'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh72">Composting</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh73" name="Burning" value="Burning" <?php echo (isset($garbage['Burning']) && $garbage['Burning'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh73">Burning</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh74" name="Dumpinginpitwithcover" value="Dumping in pit with cover" <?php echo (isset($garbage['Dumpinginpitwithcover']) && $garbage['Dumpinginpitwithcover'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh74">Dumping in pit with cover</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh75" name="Throwinginunhabitedlocations" value="Throwing in unhabited locations" <?php echo (isset($garbage['Throwinginunhabitedlocations']) && $garbage['Throwinginunhabitedlocations'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="wsh75">Throwing in unhabited locations</label>
                            </div>
                           </div>
</div>
</div>
</div>
<h5 class="section-header">Housing Characteristics</h5>
<div class="row">
                    <div class="col-md-6">
                        <p>What is the type of building occupied by your household? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing1" name="SINGLEHOUSE" value="SINGLE HOUSE" <?php echo (isset($housingcharacteristics['SINGLEHOUSE']) && $housingcharacteristics['SINGLEHOUSE'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing1"> SINGLE HOUSE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing2" name="DUPLEX" value="DUPLEX" <?php echo (isset($housingcharacteristics['DUPLEX']) && $housingcharacteristics['DUPLEX'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing2"> DUPLEX</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing3" name="AAROW_HOUSE" value="APARTMENT/ACCESSORIA/ROW HOUSE" <?php echo (isset($housingcharacteristics['AAROW_HOUSE']) && $housingcharacteristics['AAROW_HOUSE'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing3"> APARTMENT/ACCESSORIA/ROW HOUSE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing4" name="Multi_urb" value="OTHER MULTI-UNIT RESIDENTIAL BUILDING" <?php echo (isset($housingcharacteristics['Multi_urb']) && $housingcharacteristics['Multi_urb'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing4"> OTHER MULTI-UNIT RESIDENTIAL BUILDING (3 OR MORE UNITS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing5" name="Cominag" value="COMMERCIAL/INDUSTRIAL/AGRICULTURAL" <?php echo (isset($housingcharacteristics['Cominag']) && $housingcharacteristics['Cominag'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing5"> COMMERCIAL/INDUSTRIAL/AGRICULTURAL (E.G., OFFICE, FACTORY, BARN)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing6" name="Institution_living" value="INSTITUTIONAL LIVING QUARTER" <?php echo (isset($housingcharacteristics['Institution_living']) && $housingcharacteristics['Institution_living'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing6"> INSTITUTIONAL LIVING QUARTER (E.G., HOTEL, HOSPITAL, CONVENT, JAIL)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing7" name="none" value="NONE">
                                <label class="form-check-label" for="housing7"> NONE (e.g., HOMELESS/CART), END INTERVIEW</label <?php echo (isset($housingcharacteristics['none']) && $housingcharacteristics['none'] == 1) ? 'checked' : ''; ?>>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing8" name="Othertype" value="OTHER TYPES OF BUILDING" <?php echo (isset($housingcharacteristics['Othertype']) && $housingcharacteristics['Othertype'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing8">OTHER TYPES OF BUILDING (e.g., BUS/TRAILER, BOAT, TENT), SPECIFY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing9" name="Temporaryevac" value="TEMPORARY EVACUATION CENTER/RELOCATION AREA" <?php echo (isset($housingcharacteristics['Temporaryevac']) && $housingcharacteristics['Temporaryevac'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing9"> TEMPORARY EVACUATION CENTER/RELOCATION AREA (E.G., SCHOOL, GYM, RELOCATION HOUSE)</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>How many floors are there in this building?</p>
                        <div class="ms-4">
                            <label>Number of Floors</label>
                       <input class="form-control" type="number" id="housing10" name="floor"  value="<?php echo isset($floorbedroom['floor']) && $floorbedroom['floor'] !== '' ? (int)$floorbedroom['floor'] : 0; ?>">
                    </div>
                </div>
            </div>

                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What is the main construction material of the roof of this building? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing11" name="Metalroofing" value="METAL ROOFING SHEETS" <?php echo (isset($housingcharacteristics['Metalroofing']) && $housingcharacteristics['Metalroofing'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing11">  METAL ROOFING SHEETS (E.G., GALVANIZED IRON, COPPER, ALUMINUM, STAINLESS STEEL, ETC.)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing12" name="concretslayslate" value="CONCRETE/CLAY/SLATE TILE" <?php echo (isset($housingcharacteristics['concretslayslate']) && $housingcharacteristics['concretslayslate'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing12"> CONCRETE/CLAY/SLATE TILE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing13" name="HG_concrete" value="HALF-GALVANIZED IRON AND HALF-CONCRETE" <?php echo (isset($housingcharacteristics['HG_concrete']) && $housingcharacteristics['HG_concrete'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing13">HALF-GALVANIZED IRON AND HALF-CONCRETE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing14" name="Woodbamboo" value="WOOD/BAMBOO" <?php echo (isset($housingcharacteristics['Woodbamboo']) && $housingcharacteristics['Woodbamboo'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing14">  WOOD/BAMBOO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing15" name="Sodthatch" value="SOD/THATCH" <?php echo (isset($housingcharacteristics['Sodthatch']) && $housingcharacteristics['Sodthatch'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing15">SOD/THATCH (E.G., COGON, NIPA, ANAHAW, ETC.)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing15" name="Asbestos" value="ASBESTOS" <?php echo (isset($housingcharacteristics['Asbestos']) && $housingcharacteristics['Asbestos'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing15"> ASBESTOS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing16" name="Msi_materials" value="MAKESHIFT/SALVAGED/IMPROVISED MATERIALS" <?php echo (isset($housingcharacteristics['Msi_materials']) && $housingcharacteristics['Msi_materials'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing16">MAKESHIFT/SALVAGED/IMPROVISED MATERIALS</label>
                            </div>
                        </div>
                    </div>

                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What is the finishing material of the floor of this building/housing unit? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing17" name="CMG" value="CERAMIC TILE/MARBLE/GRANITE" <?php echo (isset($housingcharacteristics['CMG']) && $housingcharacteristics['CMG'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing17"> CERAMIC TILE/MARBLE/GRANITE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing18" name="CBS" value="CEMENT/BRICK/STONE" <?php echo (isset($housingcharacteristics['CBS']) && $housingcharacteristics['CBS'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing18"> CEMENT/BRICK/STONE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing19" name="WBP" value="WOOD/BAMBOO PLANK" <?php echo (isset($housingcharacteristics['WBP']) && $housingcharacteristics['WBP'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing19"> WOOD/BAMBOO PLANK</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing20" name="WTP" value="WOOD TILE/PARQUET" <?php echo (isset($housingcharacteristics['WTP']) && $housingcharacteristics['WTP'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing20"> WOOD TILE/PARQUET</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing20" name="VCT" value="VINYL/CARPET TILE" <?php echo (isset($housingcharacteristics['VCT']) && $housingcharacteristics['VCT'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing20"> VINYL/CARPET TILE </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing21" name="Linoleum" value="LINOLEUM" <?php echo (isset($housingcharacteristics['Linoleum']) && $housingcharacteristics['Linoleum'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing21"> LINOLEUM </label>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What is the main construction material of the floor of this housing unit? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing23" name="concrete" value="CONCRETE" <?php echo (isset($housingcharacteristics['concrete']) && $housingcharacteristics['concrete'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing23">CONCRETE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing24" name="earthsandmud" value="EARTH/SAND/MUD" <?php echo (isset($housingcharacteristics['earthsandmud']) && $housingcharacteristics['earthsandmud'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing24">  EARTH/SAND/MUD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing25" name="wood" value="WOOD" <?php echo (isset($housingcharacteristics['wood']) && $housingcharacteristics['wood'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing25">WOOD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing26" name="coconutlumber" value="COCONUTLUMBER" <?php echo (isset($housingcharacteristics['coconutlumber']) && $housingcharacteristics['coconutlumber'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing26"> COCONUT LUMBER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing27" name="bamboo" value="BAMBOO" <?php echo (isset($housingcharacteristics['bamboo']) && $housingcharacteristics['bamboo'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing27">BAMBOO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing28" name="msim" value="MAKESHIFT/SALVAGED/ IMPROVISED MATERIALS" <?php echo (isset($housingcharacteristics['msim']) && $housingcharacteristics['msim'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing28"> MAKESHIFT/SALVAGED/ IMPROVISED MATERIALS</label>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">    
                <div class="col-md-6">
                        <p>What is the estimated floor area of this housing unit? </p>
                        <div class="ms-4">
                            <input type="number" class="form-control" name ="floor2"  value="<?php echo isset($floorbedroom['floor2']) && $floorbedroom['floor2'] !== '' ? (int)$floorbedroom['floor2'] : 0; ?>">
                    </div>
                  

                    <div class="col-md-6">
                        <p> How many bedrooms does this housing unit have? </p>
                        <div class="ms-4">
                            <input type="number" class="form-control" name ="bedrooms"  value="<?php echo isset($floorbedroom['bedrooms']) && $floorbedroom['bedrooms'] !== '' ? (int)$floorbedroom['bedrooms'] : 0; ?>">
                    </div>
                </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What is the tenture status of the housing unit and lot occupied by this household? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing30" name="tenturestatus" value="OWNER-LIKE POSSESSION OF THE HOUSE AND LOT" <?php echo ($tenturestatus['tentures_status'] == 'OWNER-LIKE POSSESSION OF THE HOUSE AND LOT') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing30">  OWN OR OWNER-LIKE POSSESSION OF THE HOUSE AND LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing31" name="tenturestatus" value="OWN HOUSE & RENT LOT" <?php echo ($tenturestatus['tentures_status'] == 'OWN HOUSE & RENT LOT') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing31">OWN HOUSE, RENT LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing32" name="tenturestatus" value="OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER" <?php echo ($tenturestatus['tentures_status'] == 'OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing32">OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing33" name="tenturestatus" value="OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER" <?php echo ($tenturestatus['tentures_status'] == 'OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing33"> OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing34" name="tenturestatus" value="RENT HOUSE/INCLUDING LOT" <?php echo ($tenturestatus['tentures_status'] == 'RENT HOUSE/INCLUDING LOT') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing34">RENT HOUSE/INCLUDING LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing35" name="tenturestatus" value="RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER" <?php echo ($tenturestatus['tentures_status'] == 'RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing35">RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing36" name="tenturestatus" value="RENT- FREE HOUSE AND LOT WITHOUT CONSENT OF OWNER" <?php echo ($tenturestatus['tentures_status'] == 'RENT- FREE HOUSE AND LOT WITHOUT CONSENT OF OWNER') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing36"> RENT- FREE HOUSE AND LOT WITHOUT CONSENT OF OWNER</label>
                            </div>
                        </div>
                    </div>
</div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-6">
                        <p>When was the housing unit/building constructed?</p>
                        <div class="ms-4">
                           <input type="date" class="form-control" name="housing" value="<?php echo isset($housing['housing']) && $housing['housing'] !== '' ? $housing['housing'] : ''; ?>">
                    </div>

                  
</div>
<div class="col-md-6">
                        <p>Is there electricity in the building?</p>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing37" name="electricities" value="YES" <?php echo ($housing['electricity'] == 'YES') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing37"> YES</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing38" name="electricities" value="NO" <?php echo ($housing['electricity'] == 'NO') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing38">NO</label>
                            </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What type of fuel/energy source does this household mainly use for lighting? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing39" name="electricity" value="ELECTRICITY" <?php echo (isset($energysource['electricity']) && $energysource['electricity'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing39">  ELECTRICITY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing40" name="kerosene" value="KEROSENE" <?php echo (isset($energysource['kerosene']) && $energysource['kerosene'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing40"> KEROSENE (GAAS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing41" name="liquefiedpetroleum" value="LIQUEFIED PETROLEUM GAS" <?php echo (isset($energysource['liquefied_petroleum']) && $energysource['liquefied_petroleum'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing41"> LIQUEFIED PETROLEUM GAS (LPG)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing42" name="oil" value="OIL" <?php echo (isset($energysource['oil']) && $energysource['oil'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing42"> OIL (VEGETABLE, ANIMAL, AND OTHERS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing43" name="Solapanelandlamp" value="SOLAR PANEL/SOLAR LAMP" <?php echo (isset($energysource['solar_panel_lamp']) && $energysource['solar_panel_lamp'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing43">SOLAR PANEL/SOLAR LAMP </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing44" name="candle" value="CANDLE" <?php echo (isset($energysource['candle']) && $energysource['candle'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing44">CANDLE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing45" name="battery" value="BATTERY" <?php echo (isset($energysource['battery']) && $energysource['battery'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing45">BATTERY</label>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What type of fuel/energy source does this household use most of the time for cooking? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing47" name="electricity1" value="ELECTRICITY" <?php echo (isset($energysourcecooking['electricity']) && $energysourcecooking['electricity'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing47">ELECTRICITY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing48" name="kerosene" value="KEROSENE" <?php echo (isset($energysourcecooking['kerosene']) && $energysourcecooking['kerosene'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing48"> KEROSENE (GAAS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing49" name="liquefiedpetroleum" value="LIQUEFIED PETROLEUM GAS" <?php echo (isset($energysourcecooking['liquefied_petroleum']) && $energysourcecooking['liquefied_petroleum'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing49"> LIQUEFIED PETROLEUM GAS (LPG)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing50" name="charcoal" value="CHARCOAL" <?php echo (isset($energysourcecooking['charcoal']) && $energysourcecooking['charcoal'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing50"> CHARCOAL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing51" name="wood" value="WOOD" <?php echo (isset($energysourcecooking['wood']) && $energysourcecooking['wood'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing51">WOOD </label>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>Choose the following items in good working condition does the household own? </p>
                        <div class="ms-4">
                        <p><b>HOUSEHOLD CONVENIENCES</b> </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing53" name="regrigerator" value="Refrigerator/Freezer" <?php echo (isset($householdassets['refrigerator']) && $householdassets['refrigerator'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing53"> Refrigerator/Freezer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing54" name="Airconditioner" value="Air conditioner" <?php echo (isset($householdassets['air_conditioner']) && $householdassets['air_conditioner'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing54"> Air conditioner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing55" name="WashingMachine" value="Washing Machine" <?php echo (isset($householdassets['washing_machine']) && $householdassets['washing_machine'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing55">Washing Machine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing56" name="StoveGasrange" value=" Stove with oven / Gas range" <?php echo (isset($householdassets['stove_gas_range']) && $householdassets['stove_gas_range'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing56"> Stove with oven / Gas range</label>
                            </div>

                            <p><b>ICT DEVICES</b> </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing56" name="Radiocassette" value="Radio/Radio cassette" <?php echo (isset($householdassets['radio_cassette']) && $householdassets['radio_cassette'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing56">Radio/Radio cassette (AM, FM, and transistor) </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing57" name="Television" value="Television" <?php echo (isset($householdassets['television']) && $householdassets['television'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing57">Television</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing58" name="Askv" value="Audio component/Stereo set/Karaoke/Videoke" <?php echo (isset($householdassets['cd_vcd_dvd']) && $householdassets['cd_vcd_dvd'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing58">Audio component/Stereo set/Karaoke/Videoke</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing59" name="Landwiretelephone" value="Landline/Wireless telephone" <?php echo (isset($householdassets['landline_telephone']) && $householdassets['landline_telephone'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing59">Landline/Wireless telephone</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing60" name="Cellularphonebasic" value="Cellular phone (basic or with button keypad)" <?php echo (isset($householdassets['cellular_phone_basic']) && $householdassets['cellular_phone_basic'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing60">Cellular phone (basic or with button keypad)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing61" name="Cellularphonemodern" value="Cellular phone (modern or smart phone)" <?php echo (isset($householdassets['cellular_phone_smart']) && $householdassets['cellular_phone_smart'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing61"> Cellular phone (modern or smart phone)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing62" name="Tablet" value="Tablet" <?php echo (isset($householdassets['tablet']) && $householdassets['tablet'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing62">Tablet</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing63" name="Personalcomputer" value="Personal computer" <?php echo (isset($householdassets['personal_computer']) && $householdassets['personal_computer'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing63"> Personal computer (e.g., desktop, laptop, notebook, netbook)</label>
                            </div>
                            <p><b>VEHICLES</b> </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing64" name="Car" value="Car" <?php echo (isset($vehicles['car']) && $vehicles['car'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing64">Car</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing65" name="Van" value="Van" <?php echo (isset($vehicles['van']) && $vehicles['van'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing65">Van</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing66" name="Jeep" value="Jeep" <?php echo (isset($vehicles['jeep']) && $vehicles['jeep'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing66"> Jeep</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing67" name="Truck" value="Truck" <?php echo (isset($vehicles['truck']) && $vehicles['truck'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing67">Truck</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing68" name="Motorcycleandscooter" value="Motorcycle/Motor scooter" <?php echo (isset($vehicles['motorcycle_scooter']) && $vehicles['motorcycle_scooter'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing68"> Motorcycle/Motor scooter</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing69" name="E-bike" value="E-bike" <?php echo (isset($vehicles['e_bike']) && $vehicles['e_bike'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing69"> E-bike</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing70" name="Tricycle" value="Tricycle" <?php echo (isset($vehicles['tricycle']) && $vehicles['tricycle'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing70"> Tricycle (for errands and travel)</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing71" name="Bicycle" value="Bicycle" <?php echo (isset($vehicles['bicycle']) && $vehicles['bicycle'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing71"> Bicycle</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing72" name="Pedicab" value="Pedicab" <?php echo (isset($vehicles['pedicab']) && $vehicles['pedicab'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing72"> Pedicab</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing73" name="Motorizedboat" value="Motorized boat/Banca" <?php echo (isset($vehicles['motorized_boat']) && $vehicles['motorized_boat'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing73"> Motorized boat/Banca</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing74" name="Nonmotorized" value="Non-motorized boat/Banca" <?php echo (isset($vehicles['non_motorized_boat']) && $vehicles['non_motorized_boat'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="housing74"> Non-motorized boat/Banca</label>
</div>
                        </div>
                    </div>


                    <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                    <div class="form-check">
  <h4>Click the button to get your location:</h4>
  <!-- Set type="button" to avoid form submission -->
  <button type="button" onclick="getLocation()" class="location-btn">Get Location</button>

</div>
                    
<!-- Input field for Latitude and Longitude -->
<div style="margin-top: 10px;">
  <label for="coordinates">Coordinates (Latitude, Longitude):</label>
  <input type="text" id="coordinates" name="location" value="<?php echo isset($house_leader['coordinates']) && $house_leader['coordinates'] !== '' ? $house_leader['coordinates'] : '0, 0'; ?>">
</div>


</div>
               
                  
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    function getLocation() {
        // Ensure that location services are ready in the app (Mobile App Only)
        if (typeof median_geolocation_ready === 'function') {
            median_geolocation_ready(function() {
                if (navigator.geolocation) {
                    // Get current position
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat = position.coords.latitude;   // Get latitude
                        var lng = position.coords.longitude;  // Get longitude

                        // Update the input field with the user's current location
                        document.getElementById("coordinates").value = lat + ", " + lng;
                    }, function(error) {
                        // Handle errors if geolocation fails (denied or unavailable)
                        alert("Geolocation failed or was denied. Please enable location access.");
                    });
                } else {
                    // Handle if geolocation is not supported by the browser
                    alert("Geolocation is not supported by this browser.");
                }
            });
        } else {
            // If median_geolocation_ready() is not available (for non-mobile environments)
            if (navigator.geolocation) {
                // Get current position
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;   // Get latitude
                    var lng = position.coords.longitude;  // Get longitude

                    // Update the input field with the user's current location
                    document.getElementById("coordinates").value = lat + ", " + lng;
                }, function(error) {
                    // Handle errors if geolocation fails (denied or unavailable)
                    alert("Geolocation failed or was denied. Please enable location access.");
                });
            } else {
                // Handle if geolocation is not supported by the browser
                alert("Geolocation is not supported by this browser.");
            }
        }
    }
</script>
<script>
    // Assuming the form uses AJAX to submit the data
$(document).ready(function() {
    $('#demographicForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../action/update_record.php", // Your PHP script for processing
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    // Success: Display a success SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        // Optionally, redirect to another page or refresh the current page
                        location.reload(); // Or replace with window.location.href = 'another-page.php';
                    });
                } else {
                    // Error: Display an error SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                // If the AJAX request fails
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong with the server.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactNumberInput = document.querySelector('input[name="contactnumber_hl"]');

    // Remove non-numeric characters and enforce length limit
    contactNumberInput.addEventListener('input', function() {
        // Remove non-digit characters
        this.value = this.value.replace(/\D/g, '');

        // Ensure the value is no longer than 11 digits
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });

    // Validate on blur
    contactNumberInput.addEventListener('blur', function() {
        if (this.value.length !== 11) {
            this.setCustomValidity('Please enter exactly 11 digits.');
        } else {
            this.setCustomValidity('');
        }
    });

    // Optionally, you can also validate on form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        if (contactNumberInput.value.length !== 11) {
            contactNumberInput.setCustomValidity('Please enter exactly 11 digits.');
            event.preventDefault(); // Prevent form submission if validation fails
        } else {
            contactNumberInput.setCustomValidity('');
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const municipalitySelect = document.querySelector('select[name="municipality_hl"]');
    const barangaySelect = document.getElementById('barangay');

    // Define barangay options for each municipality
    const barangayOptions = {
        Bantayan: [
            'Atop-Atop', 'Bigad', 'Bantigue', 'Baod', 'Binaobao', 'Botigues', 'Doong', 'Guiwanon', 'Hilotongan',
            'Kabac', 'Kabangbang', 'Kampingganon', 'Kangkaibe', 'Lipayran', 'Luyongbaybay', 'Mojon',
            'Oboob', 'Patao', 'Putian', 'Sillion', 'Suba', 'Sulangan', 'Sungko', 'Tamiao', 'Ticad'
        ],
        Madridejos: [
            'Poblacion', 'Mancilang', 'Malbago', 'Kaongkod', 'San Agustin', 'Kangwayan', 'Pili', 'Kodia',
            'Tabagak', 'Bunakan', 'Maalat', 'Tugas', 'Tarong', 'Talangnan'
        ],
        Santafe: [
            'Balidbid', 'Hagdan', 'Hilantagaan', 'Kinatarkan', 'Langub', 'Marikaban', 'Okoy', 'Poblacion',
            'Pooc', 'Talisay'
        ]
    };

    // Function to update barangay options
    function updateBarangayOptions(municipality) {
        // Clear existing options
        barangaySelect.innerHTML = '<option value=""><?php echo $house_leader['barangay']; ?></option>';

        // Add new options if municipality has barangays
        if (barangayOptions[municipality]) {
            barangayOptions[municipality].forEach(function(barangay) {
                const option = document.createElement('option');
                option.value = barangay;
                option.textContent = barangay;
                barangaySelect.appendChild(option);
            });
        }
    }

    // Initialize barangay options based on the current municipality
    const initialMunicipality = municipalitySelect.value || '<?php echo $house_leader['municipality']; ?>';
    updateBarangayOptions(initialMunicipality);

    // Set the selected barangay based on existing value
    if (barangayOptions[initialMunicipality]) {
        const initialBarangay = '<?php echo $house_leader['barangay']; ?>';
        if (initialBarangay) {
            barangaySelect.value = initialBarangay;
        }
    }

    // Update barangay options when municipality changes
    municipalitySelect.addEventListener('change', function() {
        updateBarangayOptions(this.value);
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const status = new URLSearchParams(window.location.search).get('status');
    
    if (status === 'house_number_exists') {
        Swal.fire({
            icon: 'error',
            title: 'House Number Exists',
            text: 'The house number you entered already exists. Please use a different one.'
        });
    } else if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'The form has been submitted successfully!'
        });
    }
});
</script>
<script>
    // Function to generate a random house number
    function generateHouseNumber() {
        const prefix = '';
        const randomNumber = Math.floor(100000 + Math.random() * 900000); // Random 6-digit number
        return prefix + randomNumber;
    }

    // Add an event listener to the icon
    document.getElementById('generate-house-number').addEventListener('click', function() {
        const houseNumberInput = document.getElementById('house_number');
        houseNumberInput.value = generateHouseNumber(); // Set the generated number to the input field
    });
</script>
<script>
    function calculateAge() {
        const dob = document.getElementById('dateOfBirth').value;
        if (dob) {
            const dobDate = new Date(dob);
            const diff = Date.now() - dobDate.getTime();
            const ageDate = new Date(diff);
            const age = Math.abs(ageDate.getUTCFullYear() - 1970);
            document.getElementById('age').value = age;
        }
    }
</script>
<script>
    function calculateSpouseAge() {
        const dobInput = document.getElementById('dateOfBirthSpouse').value;
        const ageInput = document.getElementById('age1');
        
        if (dobInput) {
            const dob = new Date(dobInput);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDifference = today.getMonth() - dob.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            ageInput.value = age;
        }
    }
</script>
<script>
    function toggleOccupationIncome(childNumber) {
        const working = document.getElementById(`working_${childNumber}`).value;
        const occupationField = document.getElementById(`occupation_${childNumber}`);
        const incomeField = document.getElementById(`income_${childNumber}`);

        if (working === "yes") {
            occupationField.disabled = false;
            incomeField.disabled = false;
        } else {
            occupationField.disabled = true;
            occupationField.value = ''; // Clear field if disabled
            incomeField.disabled = true;
            incomeField.value = ''; // Clear field if disabled
        }
    }
</script>
<script>
function updateAcademicYear(levelId, academicId) {
    const levelElement = document.getElementById(levelId);
    const academicYearSelect = document.getElementById(academicId);
    const level = levelElement.value;
    const savedAcademicYear = levelElement.getAttribute('data-saved-academic-year');

    console.log("Level selected:", level);
    console.log("Saved Academic Year:", savedAcademicYear); // Check what this is

    // Clear existing options
    academicYearSelect.innerHTML = '<option value="" disabled selected>Select an Academic Year</option>';

    // Function to add options based on the level
    const addOptions = (start, end, isCollege = false) => {
        for (let i = start; i <= end; i++) {
            const newOption = document.createElement('option');
            if (isCollege) {
                const suffix = i === 1 ? 'st' : i === 2 ? 'nd' : i === 3 ? 'rd' : 'th';
                newOption.value = `${i}${suffix} Year`;
                newOption.textContent = `${i}${suffix} Year`;
            } else {
                newOption.value = `Grade ${i}`;
                newOption.textContent = `Grade ${i}`;
            }

            // Append the new option to the select
            academicYearSelect.appendChild(newOption);
            console.log("Added option:", newOption.value); // Log the added option
        }
    };

    // Populate options based on the selected level
    switch (level) {
        case 'Elementary':
            addOptions(1, 6);
            break;
        case 'Junior':
            addOptions(7, 10);
            break;
        case 'Senior':
            addOptions(11, 12);
            break;
        case 'College':
            addOptions(1, 4, true);
            break;
        default:
            academicYearSelect.innerHTML = '<option value="" disabled selected>Select an Academic Year</option>';
            return; // Exit if no valid level is selected
    }

    // Select the previously saved academic year if it exists
    if (savedAcademicYear) {
        const existingOption = Array.from(academicYearSelect.options).find(option => option.value === savedAcademicYear);
        if (existingOption) {
            existingOption.selected = true;
            console.log("Selected existing option:", existingOption.value); // Log selected option
        } else {
            console.warn("No existing option found for saved academic year:", savedAcademicYear); // Warning if not found
        }
    }
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", function() {
    const levelSelects = document.querySelectorAll('[id^="younglevel_"]');
    levelSelects.forEach((levelSelect) => {
        const i = levelSelect.id.split('_')[1];
        
        // Initialize academic year dropdown with saved value
        updateAcademicYear(`younglevel_${i}`, `youngacademic_${i}`);

        // Update academic year when the level changes
        levelSelect.addEventListener('change', function() {
            updateAcademicYear(`younglevel_${i}`, `youngacademic_${i}`);
        });
    });
});
</script>
<script>
function validateForm() {
    const form = document.forms[0];
    const inputs = form.querySelectorAll('[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value) {
            isValid = false;
            input.classList.add('is-invalid'); // Add error class if needed
        } else {
            input.classList.remove('is-invalid'); // Remove error class if filled
        }
    });

    return isValid; // Prevents form submission if not valid
}
</script>
<?php 
include 'footer.php';
?>