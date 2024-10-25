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
                <select id="municipality" name="municipality_hl" class="form-select" required>
                    <option value="" <?php echo $house_leader['municipality'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Madridejos" <?php echo $house_leader['municipality'] == 'Madridejos' ? 'selected' : ''; ?>>Madridejos</option>
                    <option value="Bantayan" <?php echo $house_leader['municipality'] == 'Bantayan' ? 'selected' : ''; ?>>Bantayan</option>
                    <option value="Santafe" <?php echo $house_leader['municipality'] == 'Santafe' ? 'selected' : ''; ?>>Santafe</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="barangay" class="form-label">Barangay<span class="required-asterisk">*</span></label>
                <select id="barangay" name="Barangay_hl" class="form-select" required>
                    <option value="" <?php echo $house_leader['barangay'] == '' ? 'selected' : ''; ?>>Select an option</option>
                    <option value="Mancilang" <?php echo $house_leader['barangay'] == 'Mancilang' ? 'selected' : ''; ?>>Mancilang</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="purok" class="form-label">Street/Purok/Sitio/Subd.</label>
                <input type="text" id="purok" name="purok_hl" class="form-control" value="<?php echo $house_leader['purok']; ?>">
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="dateOfBirth" class="form-label">Date of Birth<span class="required-asterisk">*</span></label>
                <input type="date" id="dateOfBirth" name="dob_hl" class="form-control" value="<?php echo $house_leader['dob']; ?>" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="age" class="form-label">Age<span class="required-asterisk">*</span></label>
                <input type="text" id="age" name="age_hl" class="form-control" value="<?php echo $house_leader['age']; ?>" required>
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
        <input type="text" id="lastName" name="lastname_spouse" value="<?php echo $spouse['lastname']; ?>" class="form-control" placeholder="Last Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="firstName" class="form-label">Firstname</label>
        <input type="text" id="firstName" name="firstname_spouse" value="<?php echo $spouse['firstname']; ?>" class="form-control" placeholder="First Name">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="middleName" class="form-label">Middlename:</label>
        <input type="text" id="middleName" name="middlename_spouse" value="<?php echo $spouse['middlename']; ?>" class="form-control" placeholder="Middle Name">
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
        <label for="dateOfBirth" class="form-label">Date of Birth:</label>
        <input type="date" id="dateOfBirth" value="<?php echo $spouse['dob']; ?>" name="dob_spouse" class="form-control">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" name="age_spouse" value="<?php echo $spouse['age']; ?>" class="form-control" placeholder="Age">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="occupation" class="form-label">Occupation:</label>
        <input type="text" id="occupation" name="occupation_spouse" value="<?php echo $spouse['occupation']; ?>" class="form-control" placeholder="Occupation">
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="registered" class="form-label">Registered with LCRO?</label>
        <select id="registered" name="lcro_spouse" class="form-select">
            <option value="" <?php echo $spouse['lcro'] == '' ? 'selected' : ''; ?> selected disabled>Select an option</option>
            <option value="yes" <?php echo $spouse['lcro'] == 'yes' ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo $spouse['lcro'] == 'no' ? 'selected' : ''; ?>>No</option>
            <option value="dont_know" <?php echo $spouse['lcro'] == 'dont_know' ? 'selected' : ''; ?>>I Don't know</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" name="address_spouse" value="<?php echo $spouse['address']; ?>" class="form-control" placeholder="Address">
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
                        <input type="text" id="youngername_<?php echo $i+1; ?>" name="youngername_<?php echo $i+1; ?>"  value="<?php echo $members ? htmlspecialchars($members['name']) : ''; ?>" class="form-control" placeholder="1.Child Name">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                    <?php if ($i === 0) : ?>
                        <label for="firstyoungage" class="form-label">Age:</label>
                        <?php endif; ?>
                        <input type="number" id="firstyoungage" name="youngerage_<?php echo $i+1; ?>" value="<?php echo $members ? htmlspecialchars($members['age']) : ''; ?>" class="form-control" placeholder="Age">
                    </div>
                    <div class="col-12 col-sm-6 col-lg">
                    <?php if ($i === 0) : ?>
        <label for="firstyounglevel" class="form-label">Year level</label>
        <?php endif; ?>
        <select id="firstyounglevel" name="younglevel_<?php echo $i+1; ?>" class="form-select" value="<?php echo $members ? htmlspecialchars($members['education_level']) : ''; ?>">
        <option value="" disabled <?php echo !$members ? 'selected' : ''; ?>></option>
            <option value="Elementary"  <?php echo $members && $members['education_level'] == 'Elementary' ? 'selected' : ''; ?>>Elementary School</option>
            <option value="Junior"  <?php echo $members && $members['education_level'] == 'Junior' ? 'selected' : ''; ?>>Junior High Scool</option>
            <option value="Senior"  <?php echo $members && $members['education_level'] == 'Senior' ? 'selected' : ''; ?>>Senior High School</option>
            <option value="College"  <?php echo $members && $members['education_level'] == 'College' ? 'selected' : ''; ?>>College High School</option>
        </select>
    </div>
    <div class="col-12 col-sm-6 col-lg">
    <?php if ($i === 0) : ?>
        <label for="firstyoungacademic_" class="form-label">Academic Year</label>
        <?php endif; ?>
        <select id="firstyoungacademic" name="youngacademic_<?php echo $i+1; ?>" value="<?php echo $members ? htmlspecialchars($members['academic_status']) : ''; ?>" class="form-select">
            <option value=""disabled selected <?php echo !$members ? 'selected' : ''; ?>></option>
            <option value="yes" <?php echo $members && $members['academic_status'] == 'yes' ? 'selected' : ''; ?>>Script</option>
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