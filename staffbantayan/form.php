<?php include 'header.php'; ?>
<style>
    body{
        background-color: #faf9f6;
    }
    .form-control {
        background-color: #FEFCFF;
    }
</style>

<main id="main" class="main">
    <div class="container">
        <h1 class="text-center mb-4">Barangay Census Form</h1>
        <form method="post" action="#">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-md-4">
        <div class="mb-3">
                        <label class="form-label">House Number:</label>
                        <input type="text" class="form-control" name="house_number" placeholder="House Number">
                    </div>
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Street/Purok/Sitio/Subd.:</label>
                <input type="text" class="form-control" name="street" placeholder="Street/Purok/Sitio/Subd.">
            </div>
            <div class="mb-3">
                <label class="form-label">Barangay:</label>
                <input type="text" class="form-control" name="barangay" placeholder="Barangay">
            </div>
            <div class="mb-3">
                <label class="form-label">Municipality:</label>
                <select class="form-select" name="municipality">
                    <option value="madridejos">Madridejos</option>
                    <option value="bantayan">Bantayan</option>
                    <option value="santafe">Santa Fe</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Province:</label>
                <input type="text" class="form-control" name="province" placeholder="Province">
            </div>
        </div>

        <!-- Column 2 -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Residence Status:</label>
                <select class="form-select" name="residence_status">
                    <option value="owner">Owner</option>
                    <option value="boarder">Boarder/Rentee</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Length of Stay:</label>
                <input type="text" class="form-control" name="length_of_stay" placeholder="Length of Stay">
            </div>
            <div class="mb-3">
                <label class="form-label">Provincial Address:</label>
                <input type="text" class="form-control" name="provincial_address" placeholder="(House/Block/Lot No.) (St./Purok/Sitio/Subd.) (Barangay) (City/Municipality) (Province)">
            </div>
            <div class="mb-3">
                <label class="form-label">Sex:</label>
                <select class="form-select" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Civil Status:</label>
                <select class="form-select" name="civil_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="widower">Widow/er</option>
                    <option value="separated">Separated</option>
                </select>
            </div>
        </div>

        <!-- Column 3 -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth">
            </div>
            <div class="mb-3">
                <label class="form-label">Place of Birth:</label>
                <input type="text" class="form-control" name="place_of_birth" placeholder="Place of Birth">
            </div>
            <div class="mb-3">
                <label class="form-label">Height and Weight:</label>
                <div class="row">
                    <div class="col">
                        <input type="number" step="0.01" class="form-control" name="height" placeholder="Height (m)">
                    </div>
                    <div class="col">
                        <input type="number" step="0.1" class="form-control" name="weight" placeholder="Weight (kg)">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number:</label>
                <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
            </div>
            <div class="mb-3">
                <label class="form-label">Religion:</label>
                <input type="text" class="form-control" name="religion" placeholder="Religion">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4>Educational Attainment:</h4>
            <div class="mb-3">
                <label class="form-label">Elementary:</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="elementary_school" placeholder="School">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="elementary_address" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Highschool:</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="highschool" placeholder="School">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="highschool_address" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Vocational Course:</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="vocational_school" placeholder="School">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="vocational_address" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">College/Course:</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="college" placeholder="School">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="college_address" placeholder="Address">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4>Employment Record:</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Duration:</label>
                    <input type="text" class="form-control" name="employment_duration" placeholder="Duration">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Name of Company/Employer:</label>
                    <input type="text" class="form-control" name="employer_name" placeholder="Name of Company/Employer">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control" name="employer_address" placeholder="Address">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4>Other House Occupants:</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Name (LN, FN, MI, QLFR):</label>
                    <input type="text" class="form-control" name="occupant_name" placeholder="Name">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Position in the Family:</label>
                    <input type="text" class="form-control" name="occupant_position" placeholder="Position in the Family">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Age:</label>
                    <input type="number" class="form-control" name="occupant_age" placeholder="Age">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Birth Date:</label>
                    <input type="date" class="form-control" name="occupant_birth_date">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Civil Status:</label>
                    <select class="form-select" name="occupant_civil_status">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widower">Widow/er</option>
                        <option value="separated">Separated</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Occupation/Income:</label>
                    <input type="text" class="form-control" name="occupant_occupation" placeholder="Occupation/Income">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h4>Character References:</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="reference_name" placeholder="Name">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Address:</label>
                    <input type="text" class="form-control" name="reference_address" placeholder="Address">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Contact Number:</label>
                    <input type="text" class="form-control" name="reference_contact" placeholder="Contact Number">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
    </div>
</main><!-- End #main -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script to handle SweetAlert based on PHP response -->
<script>
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'success'): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'The form has been submitted successfully!'
            });
        <?php elseif ($_GET['status'] == 'error'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'There was an error submitting the form. Please try again.'
            });
        <?php endif; ?>
    <?php endif; ?>
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<?php 

include 'footer.php';
?>