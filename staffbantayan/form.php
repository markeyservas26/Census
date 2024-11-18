<?php 
include 'header.php'; 
$status = $_GET['status'] ?? '';

// Capture POST data to retain values on error
$postData = $_POST ?? [];
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

    /* Hide the up and down arrows in number input */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield; /* Firefox */
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

        <form method="POST" action="../action/anothertesting.php" id="demographicForm" onsubmit="return validateForm()">
            <h5 class="section-header">CORE DEMOGRAPHIC CHARACTERISTICS</h5>
            <p style="color:red;">NOTICE: Do not include special characters like this *!@$%^&, etc. in your name entry. This will create an issue in the record during verification. Extensions like SR. or JR., etc. must be entered separately by selecting on the box provided below.</p>
            <p><b>House Leader</b></p>
            <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-lg-3">
            <div class="house-number-wrapper">
    <label for="house_number" id="house_number_label">House Number</label>
    <div class="input-group">
        <input type="number" class="form-control" id="house_number" name="house_number" placeholder="000000" required>
    </div>
    <small id="house_number_alert" style="color: red; display: none;">This house number already exists.</small>
</div>
            </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="lastName" class="form-label">Lastname<span class="required-asterisk">*</span></label>
                    <input type="text" id="lastName" name="lastname_hl" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="firstName" class="form-label">Firstname<span class="required-asterisk">*</span></label>
                    <input type="text" id="firstName" name="firstname_hl" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="middleName" class="form-label">Middlename</label>
                    <input type="text" id="middleName" name="middlename_hl" class="form-control" placeholder="Middle Name">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="extensionName" class="form-label">Extension name:</label>
                    <select id="extensionName" name="exname_hl" class="form-select">
                        <option value="" selected disabled>Select an option</option>
                        <option value="jr">Jr.</option>
                        <option value="sr">Sr.</option>
                        <option value="i">I</option>
                        <option value="ii">II</option>
                        <option value="iii">III</option>
                        <option value="iv">IV</option>
                        <option value="v">V</option>
                        <option value="vi">VI</option>
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="province" class="form-label">Province<span class="required-asterisk">*</span></label>
                    <input type="text" id="province" name="province_hl" class="form-control" placeholder="Province" required>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="status" class="form-label">Municipality<span class="required-asterisk">*</span></label>
                    <select id="status" name="municipality_hl" class="form-select" required>
                        <option value="" selected disabled>Select an option</option>
                        <option value="Madridejos">Madridejos</option>
                        <option value="Bantayan">Bantayan</option>
                        <option value="Santafe">Santafe</option>
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="status" class="form-label">Barangay<span class="required-asterisk">*</span></label>
                    <select class="form-select" name="Barangay_hl" id="barangay" required>
                        <!-- Options will be populated based on selected municipality -->
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="purok" class="form-label">Street/Purok/Sitio/Subd.</label>
                    <input type="text" id="purok" name="purok_hl" class="form-control" placeholder="Street/Purok/Sitio/Subd.">
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="dateOfBirth" class="form-label">Date of Birth<span class="required-asterisk">*</span></label>
                    <input type="date" id="dateOfBirth" name="dob_hl" class="form-control" onchange="calculateAge()" required>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="age" class="form-label">Age<span class="required-asterisk">*</span></label>
                    <input type="text" id="age" name="age_hl" class="form-control" placeholder="Age" readonly required>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="sex" class="form-label">Sex at Birth <span class="required-asterisk">*</span></label>
                    <select id="sex" name="sex_hl" class="form-select" required>
                        <option value="" selected disabled>Select an option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="occupation" class="form-label">Occupation:</label>
                    <input type="text" id="occupation" name="occupation_hl" class="form-control" placeholder="Occupation">
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="registered" class="form-label">Registered with LCRO?</label>
                    <select id="registered" name="lcro_hl" class="form-select">
                        <option value="" selected disabled>Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Dont_know">I Don't know</option>
                    </select>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="status" class="form-label">Marital Status<span class="required-asterisk">*</span></label>
                    <select id="status" name="marital_hl" class="form-select" required>
                        <option value="" selected disabled>Select an option</option>
                        <option value="single">Single/Never married</option>
                        <option value="married">Married</option>
                        <option value="common_law">Common-law/Live-in</option>
                        <option value="widowed">Widowed</option>
                        <option value="divorced">Divorced</option>
                        <option value="separated">Separated</option>
                        <option value="annulled">Annulled</option>
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="contactnumber" class="form-label">Contact Number<span class="required-asterisk">*</span></label>
                    <input type="text" id="contactnumber" name="contactnumber_hl" class="form-control" placeholder="Contact Number" pattern="\d{11}" title="Please enter an 11-digit contact number" required>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="religion" class="form-label">Religion</label>
                    <select id="religion" name="religion" class="form-select">
                        <option value="" selected disabled>Select an option</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Islam">Islam</option>
                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option value="Evangelicals">Evangelicals</option>
                        <option value="Protestant">Protestant</option>
                        <option value="Seventh">Seventh-day Adventist</option>
                        <option value="Bible">Bible Baptist Church</option>
                        <option value="Aglipayan">Aglipayan</option>
                        <option value="UCCP">UCCP</option>
                        <option value="Jehovah">Jehovah's Witnesses</option>
                    </select>
                </div>
            </div>
<hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">


<p><b>Spouse</b></p>
                    <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg-3">
        <label for="lastName" class="form-label">Lastname:</label>
        <input type="text" id="lastName" name="lastname_spouse" class="form-control" placeholder="Last Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="firstName" class="form-label">Firstname</label>
        <input type="text" id="firstName" name="firstname_spouse" class="form-control" placeholder="First Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="middleName" class="form-label">Middlename:</label>
        <input type="text" id="middleName" name="middlename_spouse" class="form-control" placeholder="Middle Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="extensionName" class="form-label">Extension name:</label>
        <select id="extensionName" name="extension_spouse" class="form-select">
            <option value="" selected disabled>Select an option</option>
            <option value="jr">Jr.</option>
            <option value="sr">Sr.</option>
            <option value="i">I</option>
            <option value="ii">II</option>
            <option value="iii">III</option>
            <option value="iv">IV</option>
            <option value="v">V</option>
            <option value="vi">VI</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <label for="dateOfBirth" class="form-label">Date of Birth:</label>
    <input type="date" id="dateOfBirthSpouse" name="dob_spouse" class="form-control" onchange="calculateSpouseAge()">
</div>

<div class="col-12 col-sm-6 col-lg-3">
    <label for="ageSpouse" class="form-label">Age:</label>
    <input type="number" id="ageSpouse" name="age_spouse" class="form-control" placeholder="Age" readonly>
</div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="occupation" class="form-label">Occupation:</label>
        <input type="text" id="occupation" name="occupation_spouse" class="form-control" placeholder="Occupation">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="registered" class="form-label">Registered with LCRO?</label>
        <select id="registered" name="lcro_spouse" class="form-select">
            <option value="" selected disabled>Select an option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            <option value="dont_know">I Don't know</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" name="address_spouse" class="form-control" placeholder="Address">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="status_spouse" class="form-select">
            <option value="" selected disabled>Select an option</option>
            <option value="single">Single/Never married</option>
            <option value="married">Married</option>
            <option value="common_law">Common-law/Live-in</option>
            <option value="widowed">Widowed</option>
            <option value="divorced">Divorced</option>
            <option value="separated">Separated</option>
            <option value="annulled">Annulled</option>
            <option value="not_reported">Not reported</option>
        </select>
    </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest.</p>
                
                <!-- First Child -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg">
        <label for="oldername" class="form-label">Complete Name</label>
        <input type="text" id="oldername_1" name="oldername_1" class="form-control" placeholder="1. Child Name">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age_1" name="olderage_1" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <label for="working_1" class="form-label">Is working?</label>
        <select id="working_1" name="olderworking_1" class="form-select" onchange="toggleOccupationIncome(1)">
            <option value="" disabled selected>Select an option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-12 col-lg">
        <label for="occupation_1" class="form-label">Occupation:</label>
        <input type="text" id="occupation_1" name="olderoccupation_1" class="form-control" placeholder="Occupation" disabled>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <label for="income_1" class="form-label">Income:</label>
        <input type="text" id="income_1" name="olderincome_1" class="form-control" placeholder="Income" disabled>
    </div>
</div>

<!-- Second Child -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="oldername_2" name="oldername_2" class="form-control" placeholder="2. Child Name">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="number" id="age_2" name="olderage_2" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="working_2" name="olderworking_2" class="form-select" onchange="toggleOccupationIncome(2)">
            <option value="" disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-12 col-lg">
        <input type="text" id="occupation_2" name="olderoccupation_2" class="form-control" placeholder="Occupation" disabled>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="income_2" name="olderincome_2" class="form-control" placeholder="Income" disabled>
    </div>
</div>

<!-- Third Child -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="oldername_3" name="oldername_3" class="form-control" placeholder="3. Child Name">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="number" id="age_3" name="olderage_3" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="working_3" name="olderworking_3" class="form-select" onchange="toggleOccupationIncome(3)">
            <option value="" disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-12 col-lg">
        <input type="text" id="occupation_3" name="olderoccupation_3" class="form-control" placeholder="Occupation" disabled>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="income_3" name="olderincome_3" class="form-control" placeholder="Income" disabled>
    </div>
</div>

<!-- Fourth Child -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="oldername_4" name="oldername_4" class="form-control" placeholder="4. Child Name">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="number" id="age_4" name="olderage_4" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="working_4" name="olderworking_4" class="form-select" onchange="toggleOccupationIncome(4)">
            <option value="" disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-12 col-lg">
        <input type="text" id="occupation_4" name="olderoccupation_4" class="form-control" placeholder="Occupation" disabled>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="income_4" name="olderincome_4" class="form-control" placeholder="Income" disabled>
    </div>
</div>

<!-- Fifth Child -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="oldername_5" name="oldername_5" class="form-control" placeholder="5. Child Name">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="number" id="age_5" name="olderage_5" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="working_5" name="olderworking_5" class="form-select" onchange="toggleOccupationIncome(5)">
            <option value="" disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-12 col-lg">
        <input type="text" id="occupation_5" name="olderoccupation_5" class="form-control" placeholder="Occupation" disabled>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <input type="text" id="income_5" name="olderincome_5" class="form-control" placeholder="Income" disabled>
    </div>
</div>

                 <!-- fifth -->

                 <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest. <em><b>Student Only</b></em></p>
    <div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg">
    <label for="firstyoungchildname" class="form-label">Complete Name</label>
    <input type="text" id="firstyoungchildname" name="youngername_1" class="form-control" placeholder="1.Child Name">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <label for="firstyoungage" class="form-label">Age:</label>
    <input type="number" id="firstyoungage" name="youngerage_1" class="form-control" placeholder="Age">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <label for="firstyounglevel" class="form-label">Year level</label>
    <select id="firstyounglevel" name="younglevel_1" class="form-select" onchange="updateAcademicYear('firstyounglevel', 'firstyoungacademic')">
      <option value="" disabled selected></option>
      <option value="Elementary">Elementary School</option>
      <option value="Junior">Junior High School</option>
      <option value="Senior">Senior High School</option>
      <option value="College">College</option>
    </select>
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <label for="firstyoungacademic" class="form-label">Academic Year</label>
    <select id="firstyoungacademic" name="youngacademic_1" class="form-select">
      <option value="" disabled selected></option>
    </select>
  </div>
</div>

<!-- Second Child -->
<div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg">
    <input type="text" id="secondyoungname" name="youngername_2" class="form-control" placeholder="2.Child Name">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <input type="number" id="secondyoungage" name="youngerage_2" class="form-control" placeholder="Age">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="secondyounglevel" name="younglevel_2" class="form-select" onchange="updateAcademicYear('secondyounglevel', 'secondyoungacademic')">
      <option value="" disabled selected></option>
      <option value="Elementary">Elementary School</option>
      <option value="Junior">Junior High School</option>
      <option value="Senior">Senior High School</option>
      <option value="College">College</option>
    </select>
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="secondyoungacademic" name="youngacademic_2" class="form-select">
      <option value="" disabled selected></option>
    </select>
  </div>
</div>

<!-- Third Child -->
<div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg">
    <input type="text" id="thirdyoungname" name="youngername_3" class="form-control" placeholder="3.Child Name">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <input type="number" id="thirdyoungage" name="youngerage_3" class="form-control" placeholder="Age">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="thirdyounglevel" name="younglevel_3" class="form-select" onchange="updateAcademicYear('thirdyounglevel', 'thirdyoungacademic')">
      <option value="" disabled selected></option>
      <option value="Elementary">Elementary School</option>
      <option value="Junior">Junior High School</option>
      <option value="Senior">Senior High School</option>
      <option value="College">College</option>
    </select>
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="thirdyoungacademic" name="youngacademic_3" class="form-select">
      <option value="" disabled selected></option>
    </select>
  </div>
</div>

<!-- Fourth Child -->
<div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg">
    <input type="text" id="fourthyoungname" name="youngername_4" class="form-control" placeholder="4.Child Name">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <input type="number" id="fourthyoungage" name="youngerage_4" class="form-control" placeholder="Age">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="fourthyounglevel" name="younglevel_4" class="form-select" onchange="updateAcademicYear('fourthyounglevel', 'fourthyoungacademic')">
      <option value="" disabled selected></option>
      <option value="Elementary">Elementary School</option>
      <option value="Junior">Junior High School</option>
      <option value="Senior">Senior High School</option>
      <option value="College">College</option>
    </select>
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="fourthyoungacademic" name="youngacademic_4" class="form-select">
      <option value="" disabled selected></option>
    </select>
  </div>
</div>

<!-- Fifth Child -->
<div class="row g-3 mb-4">
  <div class="col-12 col-sm-6 col-lg">
    <input type="text" id="fifthyoungname" name="youngername_5" class="form-control" placeholder="5.Child Name">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <input type="number" id="fifthyoungage" name="youngerage_5" class="form-control" placeholder="Age">
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="fifthyounglevel" name="younglevel_5" class="form-select" onchange="updateAcademicYear('fifthyounglevel', 'fifthyoungacademic')">
      <option value="" disabled selected></option>
      <option value="Elementary">Elementary School</option>
      <option value="Junior">Junior High School</option>
      <option value="Senior">Senior High School</option>
      <option value="College">College</option>
    </select>
  </div>
  <div class="col-12 col-sm-6 col-lg">
    <select id="fifthyoungacademic" name="youngacademic_5" class="form-select">
      <option value="" disabled selected></option>
    </select>
  </div>
</div>

<h5 class="section-header">Access to Public Transportation</h5>
<div class="row">
                    <div class="col-md-6">
                        <p>Does your household have access to any public transportation vehicle within 500 meters from your housing unit (if within 10-15 minutes walking distance)? </p>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transportation" id="yes" value="Yes">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transportation" id="no" value="No" >
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>
                    </div>

                <h5 class="section-header">Formal Financial Account</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>Which of the following formal financial accounts (which is/are active, whether personal or joint accounts) do you or any of yourhousehold members have?</p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial1" name="bankaccount" value="Bank Account">
                                <label class="form-check-label" for="financial1">A Bank account (ATM, online/electronic banking, passbook)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial2" name="digitalbankaccount" value="digitalbankaccount">
                                <label class="form-check-label" for="financial2">Digital bank account e.g., UNObank, Union Digital Bank, 
                                GoTyme, Overseas Filipino Bank, Tonik, and Maya Bank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial3" name="emoneyaccount" value="E-money Account">
                                <label class="form-check-label" for="financial3">E-money account (e.g., G-Cash, Maya) or cash card </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial4" name="nssla" value="NSSLA">
                                <label class="form-check-label" for="financial4">Account with Non-Stock Savings and Loan Association or 
                                NSSLA (e.g., AFPSLAI, Manila Teachers SLA)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial5" name="awc" value="Account with cooperatives">
                                <label class="form-check-label" for="financial5">Account with cooperatives</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial6" name="ngo" value="Account with microfinance NGO">
                                <label class="form-check-label" for="financial6">Account with microfinance NGO (e.g., CARD, ASA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial7" name="amrc" value="Account with money remittance centers">
                                <label class="form-check-label" for="financial7"> Account with money remittance centers 
                                (e.g., Palawan Express, LBC, ML Kwarta Padala, Western Union) </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial8" name="notanswer" value="Prefer not to answer">
                                <label class="form-check-label" for="financial8"> Prefer not to answer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="financial9" name="none" value="None">
                                <label class="form-check-label" for="financial9"> None</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify" placeholder="Specify">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <p>What types of internet connection are available at home? </p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="connection1" name="ko3network" value="FIXED (WIRED) NARROWBAND/BROADBAND NETWORK ">
                            <label class="form-check-label" for="connection1">FIXED (WIRED) NARROWBAND/BROADBAND NETWORK 
[e.g., via Digital Subscriber Line (DSL), cable modem, high speed leased line, fiber-to-the-home/building, powerline, and other fixed (wired) broadband] </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="connection2" name="fixednetwork" value="FIXED (WIRELESS) BROADBAND NETWORK">
                            <label class="form-check-label" for="connection2">FIXED (WIRELESS) BROADBAND NETWORK
                            [e.g., via WiMAX and fixed Code Division Multiple Access (CDMA)] </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="connection3" name="satellitenetwork" value="SATELLITE BROADBAND NETWORK">
                            <label class="form-check-label" for="connection3">SATELLITE BROADBAND NETWORK</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="connection4" name="mobilenetwork" value="MOBILE BROADBAND NETWORK">
                            <label class="form-check-label" for="connection4">MOBILE BROADBAND NETWORK
                            [e.g., via handset, card (e.g., integrated SIM card) or USB modem] </label>
                        </div>
                    </div>
                </div>

                <h5 class="section-header">Public Safety</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>How safe do you feel walking alone in your area (i.e., neighborhood or village) at night? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety1" name="publicsafety" value="Very safe">
                                <label class="form-check-label" for="publicsafety1"> Very safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety2" name="publicsafety" value="Safe">
                                <label class="form-check-label" for="publicsafety2">Safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety3" name="publicsafety" value="Unsafe">
                                <label class="form-check-label" for="publicsafety3">Unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety4" name="publicsafety" value="Very unsafe">
                                <label class="form-check-label" for="publicsafety4"> Very unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety5" name="publicsafety" value="I never go out at night/Does not apply">
                                <label class="form-check-label" for="publicsafety5">I never go out at night/Does not apply </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="publicsafety6" name="publicsafety" value="Don’t Know">
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
                                <input class="form-check-input" type="checkbox" id="spap1" name="sss" value="A Social Security System (SSS)">
                                <label class="form-check-label" for="spap1"> A Social Security System (SSS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap2" name="gsis" value="Government Service Insurance System (GSIS)">
                                <label class="form-check-label" for="spap2"> Government Service Insurance System (GSIS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap3" name="philhealth" value="PhilHealth">
                                <label class="form-check-label" for="spap3">PhilHealth</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap4" name="healthormedical" value="Health/Medical Insurance other than PhilHealth">
                                <label class="form-check-label" for="spap4">  Health/Medical Insurance other than PhilHealth (e.g., MediCard, Maxicare, LGU Health card, cooperative health card)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap6" name="dontwork" value="Don’t Know">
                                <label class="form-check-label" for="spap6">Don’t Know</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>In the past 12 months (July 01, 2023 - June 30, 2024), did any member of your household receive benefits/ grants/assistance from the following social/health insurance programs?</p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap7" name="sss2" value="A Social Security System (SSS)">
                                <label class="form-check-label" for="spap7"> A Social Security System (SSS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap8" name="gsis2" value="Government Service Insurance System (GSIS)">
                                <label class="form-check-label" for="spap8"> Government Service Insurance System (GSIS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap9" name="philhealth2" value="PhilHealth">
                                <label class="form-check-label" for="spap9">PhilHealth</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap10" name="healthormedical2" value="Health/Medical Insurance other than PhilHealth">
                                <label class="form-check-label" for="spap10">  Health/Medical Insurance other than PhilHealth (e.g., MediCard, Maxicare, LGU Health card, cooperative health card)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="spap12" name="dontknow2" value="Don’t Know">
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
                <input class="form-check-input" type="radio" id="wsh1" name="communitywatersupply" value="Piped into Dwelling">
                <label class="form-check-label" for="wsh1"> Piped into Dwelling</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh2" name="communitywatersupply" value="Piped into yard/plot">
                <label class="form-check-label" for="wsh2">Piped into yard/plot</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh3" name="communitywatersupply" value="Public Tap/Stand Pipe">
                <label class="form-check-label" for="wsh3">Public Tap/Stand Pipe</label>
            </div>
            <b><p>Point Source</p></b>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh4" name="pointsourcewatersupply" value="Protected Well/Tube Well/Borehole">
                <label class="form-check-label" for="wsh4">Protected Well/Tube Well/Borehole  </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh5" name="pointsourcewatersupply" value="Protected Spring">
                <label class="form-check-label" for="wsh5">Protected Spring</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh6" name="pointsourcewatersupply" value="RainWater">
                <label class="form-check-label" for="wsh6">RainWater</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh7" name="pointsourcewatersupply" value="Transfer Truck/Peddler/Neighbor">
                <label class="form-check-label" for="wsh7">Transfer Truck/Peddler/Neighbor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh8" name="pointsourcewatersupply" value="Unprotected (Open Dug Well)">
                <label class="form-check-label" for="wsh8">Unprotected (Open Dug Well)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh9" name="pointsourcewatersupply" value="Unproteced Spring">
                <label class="form-check-label" for="wsh9">Unproteced Spring</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="wsh10" name="pointsourcewatersupply" value="Surfaced Water">
                <label class="form-check-label" for="wsh10">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
            </div>
        </div>
    </div>

                    <div class="col-md-6">
                        <p>What is the main source of drinking water used by members of your household?</p>
                        <div class="ms-4">
                        <p><b>Improved source of drinking water</b></p>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh12" name="dwelling2" value="Piped into Dwelling">
                                <label class="form-check-label" for="wsh12"> Piped into Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh13" name="yardorplot2" value="Piped into yard/plot">
                                <label class="form-check-label" for="wsh13">Piped into yard/plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh14" name="PipedtoNeighbor" value="Piped to Neighbor">
                                <label class="form-check-label" for="wsh14">Piped to Neighbor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh15" name="PublicTap2" value="Public Tap/Stand Pipe">
                                <label class="form-check-label" for="wsh15">Public Tap/Stand Pipe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh16" name="TubeWell2" value="Tube Well/Borehole">
                                <label class="form-check-label" for="wsh16">Tube Well/Borehole  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh17" name="ProtectedWell2" value="Protected Well">
                                <label class="form-check-label" for="wsh17">Protected Well</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh18" name="RainWater2" value="RainWater">
                                <label class="form-check-label" for="wsh18">RainWater</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh19" name="UnprotectedSpring2" value="Unprotected Spring">
                                <label class="form-check-label" for="wsh19">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh20" name="TankerTruck" value="Tanker - Truck">
                                <label class="form-check-label" for="wsh20">Tanker - Truck</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh21" name="CartwithSmallTank" value="Cart with Small-Tank">
                                <label class="form-check-label" for="wsh21">Cart with Small-Tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh22" name="WaterRefillingStation" value="Water Refilling Station">
                                <label class="form-check-label" for="wsh22">Water Refilling Station</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh23" name="BottledWater" value="Bottled Water">
                                <label class="form-check-label" for="wsh23">Bottled Water</label>
                            </div>
                            <p><b>Unimproved source of drinking water</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh24" name="UnprotectedWell" value="Unprotected Well (Open Dug Well)">
                                <label class="form-check-label" for="wsh24">Unprotected Well (Open Dug Well)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh25" name="UnprotectedSpring3" value="Unprotected Spring">
                                <label class="form-check-label" for="wsh25">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh26" name="SurfacedWater3" value="Surfaced Water">
                                <label class="form-check-label" for="wsh26">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
                        </div>
                    </div>
                    <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                    <div class="col-md-6">
                        <p>What is the main source of water used by members of your household for other purposes such as cooking and handwashing?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh28" name="PipedintoDwelling" value="Piped into Dwelling">
                                <label class="form-check-label" for="wsh28"> Piped into Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh29" name="Pipedintoyardorplot" value="Piped into yard/plot">
                                <label class="form-check-label" for="wsh29">Piped into yard/plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh30" name="PipedtoNeighbor" value="Piped to Neighbor">
                                <label class="form-check-label" for="wsh30">Piped to Neighbor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh31" name="PublicTap3" value="Public Tap/Stand Pipe">
                                <label class="form-check-label" for="wsh31">Public Tap/Stand Pipe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh32" name="TubeWell3" value="Tube Well/Borehole">
                                <label class="form-check-label" for="wsh32">Tube Well/Borehole  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh33" name="ProtectedWell3" value="Protected Well">
                                <label class="form-check-label" for="wsh33">Protected Well</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh34" name="RainWater3" value="RainWater">
                                <label class="form-check-label" for="wsh34">RainWater</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh35" name="ProtectedSpring3" value="Protected Spring">
                                <label class="form-check-label" for="wsh35">Protected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh36" name="TankerTruck3" value="Tanker - Truck">
                                <label class="form-check-label" for="wsh36">Tanker - Truck</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh37" name="CartwithSmallTank3" value="Cart with Small-Tank">
                                <label class="form-check-label" for="wsh37">Cart with Small-Tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh38" name="WaterRefillingStation3" value="Water Refilling Station">
                                <label class="form-check-label" for="wsh38">Water Refilling Station</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh39" name="BottledWater3" value="Bottled Water">
                                <label class="form-check-label" for="wsh39">Bottled Water</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh40" name="UnprotectedWell3" value="Unprotected Well (Open Dug Well)">
                                <label class="form-check-label" for="wsh40">Unprotected Well (Open Dug Well)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh41" name="UnprotectedSpring3" value="Unprotected Spring">
                                <label class="form-check-label" for="wsh41">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh42" name="SurfacedWater3" value="Surfaced Water">
                                <label class="form-check-label" for="wsh42">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is that water source located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh44" name="watersourcelocated" value="In Own Dwelling">
                                <label class="form-check-label" for="wsh44">In Own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh45" name="watersourcelocated" value="In own Yard/Plot">
                                <label class="form-check-label" for="wsh45">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh46" name="watersourcelocated" value="Elsewhere">
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
                                <input class="form-check-input" type="radio" id="wsh47" name="improvedsanitation" value="Flush/Pour flush to piped sewer system">
                                <label class="form-check-label" for="wsh47">Flush/Pour flush to piped sewer system</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh48" name="improvedsanitation" value="Flush/Pour flush to septic tank">
                                <label class="form-check-label" for="wsh48">Flush/Pour flush to septic tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh49" name="improvedsanitation" value="Flush/Pour flush to pit latrine">
                                <label class="form-check-label" for="wsh49">Flush/Pour flush to pit latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh50" name="improvedsanitation" value="Ventilated Improve Latrine">
                                <label class="form-check-label" for="wsh50">Ventilated Improve Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh51" name="improvedsanitation" value="Pit Latrine with Slab">
                                <label class="form-check-label" for="wsh51">Pit Latrine with Slab</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh52" name="improvedsanitation" value="Composting Toilet">
                                <label class="form-check-label" for="wsh52">Composting Toilet</label>
                            </div>
                            <p><b>Unimproved Sanitation Facility</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh53" name="unimprovedsanitation" value="Flush/Pour flush to somewhere else/open drain">
                                <label class="form-check-label" for="wsh53">Flush/Pour flush to somewhere else/open drain</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh54" name="unimprovedsanitation" value="Pit Latrine without slab/Open pit">
                                <label class="form-check-label" for="wsh54">Pit Latrine without slab/Open pit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh55" name="unimprovedsanitation" value="Bucket/Pil System">
                                <label class="form-check-label" for="wsh55">Bucket/Pil System</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh56" name="unimprovedsanitation" value="Hanging Toilet/Hanging Latrine">
                                <label class="form-check-label" for="wsh56">Hanging Toilet/Hanging Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh57" name="unimprovedsanitation" value="Flush or pour flush to do not know where">
                                <label class="form-check-label" for="wsh57">Flush or pour flush to don't know where</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh58" name="unimprovedsanitation" value="Public Toilet">
                                <label class="form-check-label" for="wsh58">Public Toilet</label>
                            </div>
                            <p><b>Open Defecation</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh59" name="opendefecation" value="No Facility">
                                <label class="form-check-label" for="wsh59">No Facility/Disposal of human feces in feilds, forests, bushes, open bodies of water, beaches, or other open species</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is the toilet facility located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh61" name="toiletfacility" value="In own Dwelling">
                                <label class="form-check-label" for="wsh61">In own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh62" name="toiletfacility" value="In own Yard/Plot">
                                <label class="form-check-label" for="wsh62">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh63" name="toiletfacility" value="Elsewhere">
                                <label class="form-check-label" for="wsh63">Elsewhere</label>
                            </div>
                            <div class="col-md-6">
                        <p>Do you share this facility with others who are not members of your households?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh64" name="facilitywithothers" value="Yes">
                                <label class="form-check-label" for="wsh64">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh65" name="facilitywithothers" value="No">
                                <label class="form-check-label" for="wsh65">No</label>
                            </div>
                            </div>
                      <p>Do you share this facility only with members of other household that you know or is the facility open to the use of the general public?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh67" name="facilitywithmembers" value="Shared with known household (Not Public)">
                                <label class="form-check-label" for="wsh67">Shared with known household (Not Public)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wsh68" name="facilitywithmembers" value="Shared with General Public">
                                <label class="form-check-label" for="wsh68">Shared with General Public</label>
                            </div>
                           </div>
                           <p>In what ways does your household dispose its garbage/solid wastes?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh69" name="SegregatingWaste" value="Segregating Waste">
                                <label class="form-check-label" for="wsh69">Segregating Waste</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh70" name="Lettinggarbagetruckcollectwaste" value="Letting garbage truck collect waste">
                                <label class="form-check-label" for="wsh70">Letting garbage truck collect waste</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh71" name="Recycling" value="Recycling/Giving Away Recyclables">
                                <label class="form-check-label" for="wsh71">Recycling/Giving Away Recyclables</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh72" name="Composting" value="Composting">
                                <label class="form-check-label" for="wsh72">Composting</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh73" name="Burning" value="Burning">
                                <label class="form-check-label" for="wsh73">Burning</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh74" name="Dumpinginpitwithcover" value="Dumping in pit with cover">
                                <label class="form-check-label" for="wsh74">Dumping in pit with cover</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh75" name="Throwinginunhabitedlocations" value="Throwing in unhabited locations">
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
                                <input class="form-check-input" type="checkbox" id="housing1" name="SINGLEHOUSE" value="SINGLE HOUSE">
                                <label class="form-check-label" for="housing1"> SINGLE HOUSE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing2" name="DUPLEX" value="DUPLEX">
                                <label class="form-check-label" for="housing2"> DUPLEX</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing3" name="AAROW_HOUSE" value="APARTMENT/ACCESSORIA/ROW HOUSE">
                                <label class="form-check-label" for="housing3"> APARTMENT/ACCESSORIA/ROW HOUSE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing4" name="Multi_urb" value="OTHER MULTI-UNIT RESIDENTIAL BUILDING">
                                <label class="form-check-label" for="housing4"> OTHER MULTI-UNIT RESIDENTIAL BUILDING (3 OR MORE UNITS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing5" name="Cominag" value="COMMERCIAL/INDUSTRIAL/AGRICULTURAL">
                                <label class="form-check-label" for="housing5"> COMMERCIAL/INDUSTRIAL/AGRICULTURAL (E.G., OFFICE, FACTORY, BARN)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing6" name="Institution_living" value="INSTITUTIONAL LIVING QUARTER">
                                <label class="form-check-label" for="housing6"> INSTITUTIONAL LIVING QUARTER (E.G., HOTEL, HOSPITAL, CONVENT, JAIL)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing7" name="none" value="NONE">
                                <label class="form-check-label" for="housing7"> NONE (e.g., HOMELESS/CART), END INTERVIEW</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing8" name="Othertype" value="OTHER TYPES OF BUILDING">
                                <label class="form-check-label" for="housing8">OTHER TYPES OF BUILDING (e.g., BUS/TRAILER, BOAT, TENT), SPECIFY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing9" name="Temporaryevac" value="TEMPORARY EVACUATION CENTER/RELOCATION AREA">
                                <label class="form-check-label" for="housing9"> TEMPORARY EVACUATION CENTER/RELOCATION AREA (E.G., SCHOOL, GYM, RELOCATION HOUSE)</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p>How many floors are there in this building?</p>
                        <div class="ms-4">
                            <label>Number of Floors</label>
                       <input class="form-control" type="number" id="housing10" name="floor">
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
                                <input class="form-check-input" type="checkbox" id="housing11" name="Metalroofing" value="METAL ROOFING SHEETS">
                                <label class="form-check-label" for="housing11">  METAL ROOFING SHEETS (E.G., GALVANIZED IRON, COPPER, ALUMINUM, STAINLESS STEEL, ETC.)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing12" name="concretslayslate" value="CONCRETE/CLAY/SLATE TILE">
                                <label class="form-check-label" for="housing12"> CONCRETE/CLAY/SLATE TILE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing13" name="HG_concrete" value="HALF-GALVANIZED IRON AND HALF-CONCRETE">
                                <label class="form-check-label" for="housing13">HALF-GALVANIZED IRON AND HALF-CONCRETE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing14" name="Woodbamboo" value="WOOD/BAMBOO">
                                <label class="form-check-label" for="housing14">  WOOD/BAMBOO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing15" name="Sodthatch" value="SOD/THATCH">
                                <label class="form-check-label" for="housing15">SOD/THATCH (E.G., COGON, NIPA, ANAHAW, ETC.)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing15" name="Asbestos" value="ASBESTOS">
                                <label class="form-check-label" for="housing15"> ASBESTOS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing16" name="Msi_materials" value="MAKESHIFT/SALVAGED/IMPROVISED MATERIALS">
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
                                <input class="form-check-input" type="checkbox" id="housing17" name="CMG" value="CERAMIC TILE/MARBLE/GRANITE">
                                <label class="form-check-label" for="housing17"> CERAMIC TILE/MARBLE/GRANITE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing18" name="CBS" value="CEMENT/BRICK/STONE">
                                <label class="form-check-label" for="housing18"> CEMENT/BRICK/STONE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing19" name="WBP" value="WOOD/BAMBOO PLANK">
                                <label class="form-check-label" for="housing19"> WOOD/BAMBOO PLANK</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing20" name="WTP" value="WOOD TILE/PARQUET">
                                <label class="form-check-label" for="housing20"> WOOD TILE/PARQUET</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing20" name="VCT" value="VINYL/CARPET TILE">
                                <label class="form-check-label" for="housing20"> VINYL/CARPET TILE </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing21" name="Linoleum" value="LINOLEUM">
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
                                <input class="form-check-input" type="checkbox" id="housing23" name="concrete" value="CONCRETE">
                                <label class="form-check-label" for="housing23">CONCRETE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing24" name="earthsandmud" value="EARTH/SAND/MUD">
                                <label class="form-check-label" for="housing24">  EARTH/SAND/MUD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing25" name="wood" value="WOOD">
                                <label class="form-check-label" for="housing25">WOOD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing26" name="coconutlumber" value="COCONUTLUMBER">
                                <label class="form-check-label" for="housing26"> COCONUT LUMBER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing27" name="bamboo" value="BAMBOO">
                                <label class="form-check-label" for="housing27">BAMBOO</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing28" name="msim" value="MAKESHIFT/SALVAGED/ IMPROVISED MATERIALS">
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
                            <input type="number" class="form-control" name ="floor2">
                    </div>
                  

                    <div class="col-md-6">
                        <p> How many bedrooms does this housing unit have? </p>
                        <div class="ms-4">
                            <input type="number" class="form-control" name ="bedrooms">
                    </div>
                </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What is the tenure status of the housing unit and lot occupied by this household? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing30" name="tenturestatus" value="OWNER-LIKE POSSESSION OF THE HOUSE AND LOT">
                                <label class="form-check-label" for="housing30">  OWN OR OWNER-LIKE POSSESSION OF THE HOUSE AND LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing31" name="tenturestatus" value="OWN HOUSE & RENT LOT">
                                <label class="form-check-label" for="housing31">OWN HOUSE, RENT LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing32" name="tenturestatus" value="OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER">
                                <label class="form-check-label" for="housing32">OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing33" name="tenturestatus" value="OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER">
                                <label class="form-check-label" for="housing33"> OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing34" name="tenturestatus" value="RENT HOUSE/INCLUDING LOT">
                                <label class="form-check-label" for="housing34">RENT HOUSE/INCLUDING LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing35" name="tenturestatus" value="RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER">
                                <label class="form-check-label" for="housing35">RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing36" name="tenturestatus" value="RENT- FREE HOUSE AND LOT WITHOUT CONSENT OF OWNER">
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
                           <input type="date" class="form-control" name="housing">
                    </div>

                  
</div>
<div class="col-md-6">
                        <p>Is there electricity in the building?</p>
                        <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing37" name="electricitys" value="YES">
                                <label class="form-check-label" for="housing37">YES</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="housing38" name="electricitys" value="NO">
                                <label class="form-check-label" for="housing38">NO</label>
                            </div>
                </div>
                <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                <div class="row">
                    <div class="col-md-9">
                        <p>What type of fuel/energy source does this household mainly use for lighting? </p>
                        <div class="ms-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing39" name="electricity" value="ELECTRICITY">
                                <label class="form-check-label" for="housing39">  ELECTRICITY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing40" name="kerosene" value="KEROSENE">
                                <label class="form-check-label" for="housing40"> KEROSENE (GAAS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing41" name="liquefiedpetroleum" value="LIQUEFIED PETROLEUM GAS">
                                <label class="form-check-label" for="housing41"> LIQUEFIED PETROLEUM GAS (LPG)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing42" name="oil" value="OIL">
                                <label class="form-check-label" for="housing42"> OIL (VEGETABLE, ANIMAL, AND OTHERS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing43" name="Solapanelandlamp" value="SOLAR PANEL/SOLAR LAMP">
                                <label class="form-check-label" for="housing43">SOLAR PANEL/SOLAR LAMP </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing44" name="candle" value="CANDLE">
                                <label class="form-check-label" for="housing44">CANDLE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing45" name="battery" value="BATTERY">
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
                                <input class="form-check-input" type="checkbox" id="housing47" name="electricity1" value="ELECTRICITY">
                                <label class="form-check-label" for="housing47">ELECTRICITY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing48" name="kerosene1" value="KEROSENE">
                                <label class="form-check-label" for="housing48"> KEROSENE (GAAS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing49" name="liquefiedpetroleum1" value="LIQUEFIED PETROLEUM GAS">
                                <label class="form-check-label" for="housing49"> LIQUEFIED PETROLEUM GAS (LPG)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing50" name="charcoal" value="CHARCOAL">
                                <label class="form-check-label" for="housing50"> CHARCOAL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing51" name="wood" value="WOOD">
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
                                <input class="form-check-input" type="checkbox" id="housing53" name="regrigerator" value="Refrigerator/Freezer">
                                <label class="form-check-label" for="housing53"> Refrigerator/Freezer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing54" name="Airconditioner" value="Air conditioner">
                                <label class="form-check-label" for="housing54"> Air conditioner</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing55" name="WashingMachine" value="Washing Machine">
                                <label class="form-check-label" for="housing55">Washing Machine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing56" name="StoveGasrange" value=" Stove with oven / Gas range">
                                <label class="form-check-label" for="housing56"> Stove with oven / Gas range</label>
                            </div>

                            <p><b>ICT DEVICES</b> </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing56" name="Radiocassette" value="Radio/Radio cassette">
                                <label class="form-check-label" for="housing56">Radio/Radio cassette (AM, FM, and transistor) </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing57" name="Television" value="Television">
                                <label class="form-check-label" for="housing57">Television</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing58" name="Askv" value="Audio component/Stereo set/Karaoke/Videoke">
                                <label class="form-check-label" for="housing58">Audio component/Stereo set/Karaoke/Videoke</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing59" name="Landwiretelephone" value="Landline/Wireless telephone">
                                <label class="form-check-label" for="housing59">Landline/Wireless telephone</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing60" name="Cellularphonebasic" value="Cellular phone (basic or with button keypad)">
                                <label class="form-check-label" for="housing60">Cellular phone (basic or with button keypad)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing61" name="Cellularphonemodern" value="Cellular phone (modern or smart phone)">
                                <label class="form-check-label" for="housing61"> Cellular phone (modern or smart phone)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing62" name="Tablet" value="Tablet">
                                <label class="form-check-label" for="housing62">Tablet</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing63" name="Personalcomputer" value="Personal computer">
                                <label class="form-check-label" for="housing63"> Personal computer (e.g., desktop, laptop, notebook, netbook)</label>
                            </div>
                            <p><b>VEHICLES</b> </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing64" name="Car" value="Car">
                                <label class="form-check-label" for="housing64">Car</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing65" name="Van" value="Van">
                                <label class="form-check-label" for="housing65">Van</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing66" name="Jeep" value="Jeep">
                                <label class="form-check-label" for="housing66"> Jeep</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing67" name="Truck" value="Truck">
                                <label class="form-check-label" for="housing67">Truck</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing68" name="Motorcycleandscooter" value="Motorcycle/Motor scooter">
                                <label class="form-check-label" for="housing68"> Motorcycle/Motor scooter</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing69" name="E-bike" value="E-bike">
                                <label class="form-check-label" for="housing69"> E-bike</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing70" name="Tricycle" value="Tricycle">
                                <label class="form-check-label" for="housing70"> Tricycle (for errands and travel)</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing71" name="Bicycle" value="Bicycle">
                                <label class="form-check-label" for="housing71"> Bicycle</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing72" name="Pedicab" value="Pedicab">
                                <label class="form-check-label" for="housing72"> Pedicab</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing73" name="Motorizedboat" value="Motorized boat/Banca">
                                <label class="form-check-label" for="housing73"> Motorized boat/Banca</label>
</div>
<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing74" name="Nonmotorized" value="Non-motorized boat/Banca">
                                <label class="form-check-label" for="housing74"> Non-motorized boat/Banca</label>
</div>

                        </div>
                        </div>
                   
                    <hr style="height: 2px; border-width: 0; color: black; background-color: black; text-decoration: underline; margin-top: 2rem; margin-bottom: 2rem;">
                    <div class="form-check">
  <h4>Click the button to get your location:</h4>
  <!-- Set type="button" to avoid form submission -->
  <button type="button" class="btn btn-primary  mt-4" onclick="getLocation()">Get Location</button>
</div>

<!-- Input field for Latitude and Longitude -->
<div style="margin-top: 10px;">
  <label for="coordinates">Coordinates (Latitude, Longitude):</label>
  <input type="text" id="coordinates" name="location">
</div>
                    
                </div>
               
                  
                <div class="text-center mt-4">
           
    <!-- Your form fields here -->
    <button type="submit"  class="btn btn-primary  mt-4">Submit</button>

                </div>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;

    // Set the latitude and longitude as a single string in the input field
    document.getElementById("coordinates").value = `${lat}, ${lon}`;
  }

  function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        alert("User denied the request for Geolocation.");
        break;
      case error.POSITION_UNAVAILABLE:
        alert("Location information is unavailable.");
        break;
      case error.TIMEOUT:
        alert("The request to get user location timed out.");
        break;
      case error.UNKNOWN_ERROR:
        alert("An unknown error occurred.");
        break;
    }
  }
</script>

<script>
$(document).ready(function() {
    $('#demographicForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        console.log('Submitting form to:', $(this).attr('action')); // Debugging URL
        console.log('Serialized data:', $(this).serialize()); // Debugging serialized data

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                console.log('Response from server:', response); // Debugging response
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'form.php';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error); // Log more error details
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    confirmButtonColor: '#d33',
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
        barangaySelect.innerHTML = '';

        // Add new options
        if (barangayOptions[municipality]) {
            barangayOptions[municipality].forEach(function(barangay) {
                const option = document.createElement('option');
                // Keep the value in uppeSrcase, but display text with proper capitalization
                option.value = barangay;
                option.textContent = barangay.charAt(0).toUpperCase() + barangay.slice(1).toLowerCase();
                barangaySelect.appendChild(option);
            });
        }
    }

    // Initialize barangay options based on the current municipality
    updateBarangayOptions(municipalitySelect.value);

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

    function calculateSpouseAge() {
        const dob = document.getElementById('dateOfBirthSpouse').value;
        if (dob) {
            const dobDate = new Date(dob);
            const diff = Date.now() - dobDate.getTime();
            const ageDate = new Date(diff);
            const age = Math.abs(ageDate.getUTCFullYear() - 1970);
            document.getElementById('ageSpouse').value = age;
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
    const level = document.getElementById(levelId).value;
    const academicYearSelect = document.getElementById(academicId);

    // Clear previous options
    academicYearSelect.innerHTML = '<option value="" disabled selected></option>';

    let academicOptions = [];

    // Define options based on the selected year level
    switch (level) {
      case 'Elementary':
        academicOptions = ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'];
        break;
      case 'Junior':
        academicOptions = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10'];
        break;
      case 'Senior':
        academicOptions = ['Grade 11', 'Grade 12'];
        break;
      case 'College':
        academicOptions = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
        break;
    }

    // Add new options
    academicOptions.forEach(function(option) {
      let newOption = document.createElement('option');
      newOption.value = option;
      newOption.textContent = option;
      academicYearSelect.appendChild(newOption);
    });
  }
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
<script>
    $(document).ready(function() {
        $('#house_number').on('blur', function() {
            const houseNumber = $(this).val();

            if (houseNumber) {
                $.ajax({
                    url: 'check_house_number.php',
                    method: 'POST',
                    data: { house_number: houseNumber },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            $('#house_number_alert').show(); // Show the alert
                        } else {
                            $('#house_number_alert').hide(); // Hide the alert if no match
                        }
                    },
                    error: function() {
                        console.error("An error occurred while checking the house number.");
                    }
                });
            } else {
                $('#house_number_alert').hide(); // Hide the alert if the input is empty
            }
        });
    });
</script>
<?php 
include 'footer.php';
?>
