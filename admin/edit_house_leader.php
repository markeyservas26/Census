<?php 
include 'header.php'; 
include '../database/db_connect.php';

function sanitize_output($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}


$conn->close();
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    </style>
</head>
<body>
    <main id="main" class="main">
        <div class="container">
            <h1 class="text-center mb-4">Bantayan Island Census Form</h1>
            <p>
            Please fill up completely and correctly the required information before each item below.  For items that are not associated to you, leave it blank.  Required items are also marked with an asterisk (*) so please fill it up correctly.  Your honest response will help the National Commission of Senior Citizens (NCSC) come up with a good information system of the senior citizens in the country as the basis of designing its programs and activities that will help improve the lives of Filipino older persons.</p>
            <em style="color:red;">* Items with an asterisk (*) are required.</em>
        
            <form id="demographicForm" method="post" action="../action/updateform.php">
            <input type="hidden" name="house_leader_id" id="house_leader_id" value="">
                <h5 class="section-header">CORE DEMOGRAPHIC CHARACTERISTICS</h5>
                <p style="color:red;">NOTICE: Do not include special characters like this *!@$%^&, etc. in your name entry.  This will create an issue in the record during verification.  Extensions like SR. or JR., etc. must be entered separately by selecting on the box provided below.</p>
                <p><b>House Leader</b></p>
                <div class="col-12 col-sm-6 col-lg-3">
        <label for="housenumber" class="form-label">House Number<span class="required-asterisk">*</span></label>
        <input type="text" id="housenumber" name="housenumber" class="form-control" placeholder="House Number" required>
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
        <input type="text" id="middleName" name="middlename_hl" class="form-control" placeholder="Middle Name" required>
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
        <input type="text" id="province" name="province_hl" class="form-control" placeholder="Pronvice">
    </div>

    
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="status" class="form-label">Municipality<span class="required-asterisk">*</span></label>
        <select id="status" name="municipality_hl" class="form-select">
            <option value="" selected disabled>Select an option</option>
            <option value="Madridejos">Madridejos</option>
            <option value="Bantayan">Bantayan</option>
            <option value="Santafe">Santafe</option>
        </select>
    </div>
    

    
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="status" class="form-label">Barangay<span class="required-asterisk">*</span></label>
        <select id="status" name="Barangay_hl" class="form-select">
            <option value="" selected disabled>Select an option</option>
            <option value="Mancilang">Mancilang</option>
       
        </select>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <label for="purok" class="form-label">Street/Purok/Sitio/Subd.</label>
        <input type="text" id="purok" name="purok_hl" class="form-control" placeholder="Province">
    </div>
    

    <div class="col-12 col-sm-6 col-lg-3">
        <label for="dateOfBirth" class="form-label">Date of Birth<span class="required-asterisk">*</span></label>
        <input type="date" id="dateOfBirth" name="dob_hl" class="form-control">
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <label for="age" class="form-label">Age<span class="required-asterisk">*</span></label>
        <input type="text" id="age" name="age_hl" class="form-control" placeholder="Age">
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <label for="sex" class="form-label">Sex at Birth <span class="required-asterisk">*</span></label>
        <select id="sex" name="sex_hl" class="form-select">
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
        <select id="status" name="marital_hl" class="form-select">
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
        <input type="text" id="contactnumber" name="contactnumber_hl" class="form-control" placeholder="Contact Number">
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
        <input type="date" id="dateOfBirth" name="dob_spouse" class="form-control">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" name="age_spouse" class="form-control" placeholder="Age">
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
                <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest</p>
                
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <label for="oldername" class="form-label">Complete Name</label>
                        <input type="text" id="oldername" name="oldername_1" class="form-control" placeholder="1.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" id="age" name="olderage_1" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <label for="working" class="form-label">Is working?</label>
        <select id="working" name="olderworking_1" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <div class="col-12 col-lg">
                        <label for="occupation" class="form-label">Occupation:</label>
                        <input type="text" id="occupation" name="olderoccupation_1" class="form-control" placeholder="Occupation">
                    </div>

                    <div class="col-12 col-sm-6 col-lg">
                        <label for="olderincome" class="form-label">Income:</label>
                        <input type="text" id="olderincome" name="olderincome_1" class="form-control" placeholder="Income">
                    </div>       
                </div>
<!-- second -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="oldername_second" name="oldername_2" class="form-control" placeholder="2.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="agesecond" name="olderage_2" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="working" name="olderworking_2" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <div class="col-12 col-lg">
                        <input type="text" id="occupationsecond" name="olderoccupation_2" class="form-control" placeholder="Occupation">
                    </div>

                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="olderincomesec" name="olderincome_2" class="form-control" placeholder="Income">
                    </div>
                  
                </div>
<!-- third -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="oldernamethird" name="oldername_3" class="form-control" placeholder="3.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="agethree" name="olderage_3" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="workingthree" name="olderworking_3" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <div class="col-12 col-lg">
                        <input type="text" id="occupationthree" name="olderoccupation_3" class="form-control" placeholder="Occupation">
                    </div>

                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="incomethree" name="olderincome_3" class="form-control" placeholder="Income">
                    </div>
                  
                </div>
<!-- fourth -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="oldernamefour" name="oldername_4" class="form-control" placeholder="4.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="agefour" name="olderage_4" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="workingfour" name="olderworking_4" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <div class="col-12 col-lg">
                        <input type="text" id="occupationfour" name="olderoccupation_4" class="form-control" placeholder="Occupation">
                    </div>

                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="incomefour" name="olderincome_4" class="form-control" placeholder="Income">
                    </div>
                  
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="houseNumber" name="oldername_5" class="form-control" placeholder="5.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="agefive" name="olderage_5" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="workingfive" name="olderworking_5" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>


    <div class="col-12 col-lg">
                        <input type="text" id="occupationfive" name="olderoccupation_5" class="form-control" placeholder="Occupation">
                    </div>

                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="incomefive" name="olderincome_5" class="form-control" placeholder="Income">
                    </div>

                    
                </div>

                 <!-- fifth -->

    <p><b>Name of your child(ren)</b> - If applicable, enumerate the first five and arrange them from oldest to youngest <em><b>Student Only</b></em></p>
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
        <select id="firstyounglevel" name="younglevel_1" class="form-select">
            <option value=""disabled selected></option>
            <option value="Elementary">Elementary School</option>
            <option value="Junior">Junior High Scool</option>
            <option value="Senior">Senior High School</option>
            <option value="College">College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <label for="firstyoungacademic" class="form-label">Academic Year</label>
        <select id="firstyoungacademic" name="youngacademic_1" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Script</option>
        </select>
    </div>

                    
</div>  
<!-- ikaduwa -->
<div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="secondyoungname" name="youngername_2" class="form-control" placeholder="2.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="secondyoungage" name="youngerage_2" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="secondyounglevel" name="younglevel_2" class="form-select">
            <option value=""disabled selected></option>
            <option value="Elementary">Elementary School</option>
            <option value="Junior">Junior High Scool</option>
            <option value="Senior">Senior High School</option>
            <option value="College">College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="secondyoungacademic" name="youngacademic_2" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Script</option>
        </select>
    </div>

                    
</div>  
<!-- ikatulo -->
<div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="thirdyoungname" name="youngername_3" class="form-control" placeholder="3.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="thirdyoungage" name="youngerage_3" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="thirdyounglevel" name="younglevel_3" class="form-select">
            <option value=""disabled selected></option>
            <option value="Elementary">Elementary School</option>
            <option value="Junior">Junior High Scool</option>
            <option value="Senior">Senior High School</option>
            <option value="College">College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="thirdyoungacademic" name="youngacademic_3" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Script</option>
        </select>
    </div>

                    
</div>   

<!-- ikaupat -->

<div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="fourthyoungname" name="youngername_4" class="form-control" placeholder="4.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="fourthyoungage" name="youngerage_4" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="fourthyounglevel" name="younglevel_4" class="form-select">
            <option value=""disabled selected></option>
            <option value="Elementary">Elementary School</option>
            <option value="Junior">Junior High Scool</option>
            <option value="Senior">Senior High School</option>
            <option value="College">College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="fourthyoungacademic" name="youngacademic_4" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Script</option>
        </select>
    </div>

                    
</div>  

<!-- ikalima -->

<div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="text" id="fifthyoungname" name="youngername_5" class="form-control" placeholder="5.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                        <input type="number" id="fifthyoungage" name="youngerage_5" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
        <select id="fifthyounglevel" name="younglevel_5" class="form-select">
            <option value=""disabled selected></option>
            <option value="Elementary">Elementary School</option>
            <option value="Junior">Junior High Scool</option>
            <option value="Senior">Senior High School</option>
            <option value="College">College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
        <select id="fifthyoungacademic" name="youngacademic_5" class="form-select">
            <option value=""disabled selected></option>
            <option value="yes">Script</option>
        </select>
    </div>

                    
</div>  

<h5 class="section-header">Access to Public Transportation</h5>
<div class="row">
                    <div class="col-md-6">
                        <p>Does your household have access to any public transportation vehicle within 500 meters from your housing unit (if within 10-15 minutes walking distance)? </p>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="yes" id="yes" value="Yes">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="no" id="no" value="No" checked>
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
                                <input class="form-check-input" type="checkbox" id="publicsafety1" name="verysafe" value="Very safe">
                                <label class="form-check-label" for="publicsafety1"> Very safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicsafety2" name="safe" value="Safe">
                                <label class="form-check-label" for="publicsafety2">Safe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicsafety3" name="unsafe" value="Unsafe">
                                <label class="form-check-label" for="publicsafety3">Unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicsafety4" name="veryunsafe" value="Very unsafe">
                                <label class="form-check-label" for="publicsafety4"> Very unsafe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicsafety5" name="nevergoout" value="I never go out at night/Does not apply">
                                <label class="form-check-label" for="publicsafety5">I never go out at night/Does not apply </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publicsafety6" name="dontknow" value="Don’t Know">
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
                                <input class="form-check-input" type="checkbox" id="spap5" name="nevergoout" value="I never go out at night/Does not apply">
                                <label class="form-check-label" for="spap5">I never go out at night/Does not apply </label>
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
                                <input class="form-check-input" type="checkbox" id="spap11" name="nevergoout2" value="I never go out at night/Does not apply">
                                <label class="form-check-label" for="spap11">I never go out at night/Does not apply </label>
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
                                <input class="form-check-input" type="checkbox" id="wsh1" name="dwelling" value="Piped into Dwelling">
                                <label class="form-check-label" for="wsh1"> Piped into Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh2" name="yardorplot" value="Piped into yard/plot">
                                <label class="form-check-label" for="wsh2">Piped into yard/plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh3" name="publictaporstandpipe" value="Public Tap/Stand Pipe">
                                <label class="form-check-label" for="wsh3">Public Tap/Stand Pipe</label>
                            </div>
                            <b><p>Point Source</p></b>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh4" name="protectedtube" value="Protected Well/Tube Well/Borehole">
                                <label class="form-check-label" for="wsh4">Protected Well/Tube Well/Borehole  </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh5" name="protectedspring" value="Protected Spring">
                                <label class="form-check-label" for="wsh5">Protected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh6" name="RainWater" value="RainWater">
                                <label class="form-check-label" for="wsh6">RainWater</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh7" name="TransferTruck" value="Transfer Truck/Peddler/Neighbor">
                                <label class="form-check-label" for="wsh7">Transfer Truck/Peddler/Neighbor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh8" name="Unprotected" value="Unprotected (Open Dug Well)">
                                <label class="form-check-label" for="wsh8">Unprotected (Open Dug Well)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh9" name="UnprotecedSpring" value="Unproteced Spring">
                                <label class="form-check-label" for="wsh9">Unproteced Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh10" name="SurfacedWater" value="Surfaced Water">
                                <label class="form-check-label" for="wsh10">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh11" name="Others" value="Others">
                                <label class="form-check-label" for="wsh11">Others:</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify2" placeholder="Specify">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh27" name="Others2" value="Others">
                                <label class="form-check-label" for="wsh27">Others:</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify3" placeholder="Specify">
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
                                <input class="form-check-input" type="checkbox" id="wsh35" name="UnprotectedSpring3" value="Unprotected Spring">
                                <label class="form-check-label" for="wsh35">Unprotected Spring</label>
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
                                <input class="form-check-input" type="checkbox" id="wsh41" name="UnprotectedSpring3" value="Unprotected Sprin">
                                <label class="form-check-label" for="wsh41">Unprotected Spring</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh42" name="SurfacedWater3" value="Surfaced Water">
                                <label class="form-check-label" for="wsh42">Surfaced Water (e.g.., River, Dam, Lake, Pond, Stream, Canal, Irrigation Channel)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh43" name="Others3" value="Others">
                                <label class="form-check-label" for="children">Others:</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify4" placeholder="Specify">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is that water source located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh44" name="InOwnDwelling" value="In Own Dwelling">
                                <label class="form-check-label" for="wsh44">In Own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh45" name="InownYardorPlot" value="In own Yard/Plot">
                                <label class="form-check-label" for="wsh45">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh46" name="Elsewhere" value="Elsewhere">
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
                                <input class="form-check-input" type="checkbox" id="wsh47" name="pipedsewersystem" value="Flush/Pour flush to piped sewer system">
                                <label class="form-check-label" for="wsh47">Flush/Pour flush to piped sewer system</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh48" name="septictank" value="Flush/Pour flush to septic tank">
                                <label class="form-check-label" for="wsh48">Flush/Pour flush to septic tank</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh49" name="pitlatrine" value="Flush/Pour flush to pit latrine">
                                <label class="form-check-label" for="wsh49">Flush/Pour flush to pit latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh50" name="VentilatedImproveLatrine" value="wsh50">
                                <label class="form-check-label" for="wsh50">Ventilated Improve Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh51" name="PitLatrinewithSlab" value="Pit Latrine with Slab">
                                <label class="form-check-label" for="wsh51">Pit Latrine with Slab</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh52" name="CompostingToilet" value="Composting Toilet">
                                <label class="form-check-label" for="wsh52">Composting Toilet</label>
                            </div>
                            <p><b>Unimproved Sanitation Facility</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh53" name="somewhereelseandopendrain" value="Flush/Pour flush to somewhere else/open drain">
                                <label class="form-check-label" for="wsh53">Flush/Pour flush to somewhere else/open drain</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh54" name="PitLatrinewithoutslab" value="Pit Latrine without slab/Open pit">
                                <label class="form-check-label" for="wsh54">Pit Latrine without slab/Open pit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh55" name="BucketandPilSystem" value="Bucket/Pil System">
                                <label class="form-check-label" for="wsh55">Bucket/Pil System</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh56" name="HangingToiletandHangingLatrine" value="Hanging Toilet/Hanging Latrine">
                                <label class="form-check-label" for="wsh56">Hanging Toilet/Hanging Latrine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh57" name="dontknowwhere" value="Flush or pour flush to don't know where">
                                <label class="form-check-label" for="wsh57">Flush or pour flush to don't know where</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh58" name="PublicToilet" value="Public Toilet">
                                <label class="form-check-label" for="wsh58">Public Toilet</label>
                            </div>
                            <p><b>Open Defecation</b></p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh59" name="NoFacility" value="No Facility">
                                <label class="form-check-label" for="wsh59">No Facility/Disposal of human feces in feilds, forests, bushes, open bodies of water, beaches, or other open species</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh60" name="Others4" value="Others">
                                <label class="form-check-label" for="children">Others:</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify5" placeholder="Specify">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Where is the toilet facility located?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh61" name="InownDwelling2" value="In own Dwelling">
                                <label class="form-check-label" for="wsh61">In own Dwelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh62" name="InownYard/Plot2" value="In own Yard/Plot">
                                <label class="form-check-label" for="wsh62">In own Yard/Plot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh63" name="Elsewhere2" value="Elsewhere">
                                <label class="form-check-label" for="wsh63">Elsewhere</label>
                            </div>
                            <div class="col-md-6">
                        <p>Do you share this facility with others who are not members of your households?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh64" name="Yes" value="Yes">
                                <label class="form-check-label" for="wsh64">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh65" name="No" value="No">
                                <label class="form-check-label" for="wsh65">No</label>
                            </div>
                            </div>
                      <p>Do you share this facility only with members of other household that you know or is the facility open to the use of the general public?</p>
                        <div class="ms-4">
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh67" name="Sharedwithknownhousehold" value="Shared with known household (Not Public)">
                                <label class="form-check-label" for="wsh67">Shared with known household (Not Public)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh68" name="SharedwithGeneralPublic" value="Shared with General Public">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wsh76" name="Others5" value="Others">
                                <label class="form-check-label" for="wsh76">Others:</label>
                                <input type="text" class="form-control form-control-sm d-inline-block w-auto" name="othersLivingSpecify6" placeholder="Specify">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing22" name="none" value="NONE">
                                <label class="form-check-label" for="housing22"> NONE </label>
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing29" name="notobserved" value="NOT OBSERVED">
                                <label class="form-check-label" for="housing29">NOT OBSERVED</label>
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
                                <input class="form-check-input" type="checkbox" id="housing30" name="Owner" value="OWNER-LIKE POSSESSION OF THE HOUSE AND LOT">
                                <label class="form-check-label" for="housing30">  OWN OR OWNER-LIKE POSSESSION OF THE HOUSE AND LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing31" name="ownhouseandrent" value="OWN HOUSE & RENT LOT">
                                <label class="form-check-label" for="housing31">OWN HOUSE, RENT LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing32" name="ownhouserentfreewithconsent" value="OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER">
                                <label class="form-check-label" for="housing32">OWN HOUSE, RENT-FREE LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing33" name="ownhouserentwithoutconsent" value="OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER">
                                <label class="form-check-label" for="housing33"> OWN HOUSE, RENT-FREE LOT WITHOUT CONSENT OF OWNER </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing34" name="RENTHOUSE/INCLUDINGLOT" value="RENT HOUSE/INCLUDING LOT">
                                <label class="form-check-label" for="housing34">RENT HOUSE/INCLUDING LOT</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing35" name="rentfreehousewithconsent" value="RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER">
                                <label class="form-check-label" for="housing35">RENT- FREE HOUSE AND LOT WITH CONSENT OF OWNER</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing36" name="rentfreehousewithoutconsent" value="RENT- FREE HOUSE AND LOT WITHOUT CONSENT OF OWNER">
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
                           <input type="text" class="form-control" name="housing">
                    </div>

                  
</div>
<div class="col-md-6">
                        <p>Is there electricity in the building?</p>
                        <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing37" name="YES" value=" YES">
                                <label class="form-check-label" for="housing37"> YES</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing38" name="NO" value="NO">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing46" name="none" value="NONE">
                                <label class="form-check-label" for="housing46">NONE</label>
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
                                <input class="form-check-input" type="checkbox" id="housing47" name="electricity" value="ELECTRICITY">
                                <label class="form-check-label" for="housing47">ELECTRICITY</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing48" name="kerosene" value="KEROSENE">
                                <label class="form-check-label" for="housing48"> KEROSENE (GAAS)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing49" name="liquefiedpetroleum" value="LIQUEFIED PETROLEUM GAS">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="housing52" name="none" value="NONE">
                                <label class="form-check-label" for="housing52">NONE</label>
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

<?php 
include 'footer.php';
?>