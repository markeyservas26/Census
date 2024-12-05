<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/travelogo.png" rel="icon">
    <title>Change Email or Phone Number</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-serif flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md text-center">
        <h1 class="text-gray-800 text-3xl font-bold mb-6">Change Email or Phone Number</h1>

        <form id="changeEmailPhoneForm" method="POST" action="../staffaction/change_email_phone.php" class="space-y-6">
            <div>
                <label for="email" class="block text-left text-gray-600 text-sm mt-1">Email</label>
                <input type="email" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="email" name="email" placeholder="New Email" required>
            </div>
            <div>
    <label for="phone" class="block text-left text-gray-600 text-sm mt-1">Phone Number</label>
    <input type="text" class="w-full px-4 py-3 border rounded-md text-lg text-gray-700" id="phone" name="phone" placeholder="New Phone Number"  required pattern="^[0-9]{11}$" title="Phone number must be 11 digits." maxlength="11" oninput="validatePhone(this)">
</div>

            <button type="submit" class="w-full bg-gray-800 text-white rounded-md px-6 py-3 text-xl font-semibold shadow-md hover:bg-gray-700">
                Change Email & Phone Number
            </button>
        </form>

        <p class="text-gray-500 text-lg mt-8">If you have any issues, please contact support.</p>
        <div class="text-gray-600 text-sm font-semibold mt-4">
            <a href="../staffbantayan/myaccount" class="text-gray-600 hover:text-gray-800">Back to My Account</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            // Fetch current email and phone number
            $.ajax({
                url: '../staffaction/fetch_email_phone.php',
                type: 'GET',
                success: function (response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        $('#email').val(res.email);
                        $('#phone').val(res.phone);
                    } else {
                        Swal.fire('Error!', 'Failed to fetch current details.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'An unexpected error occurred while fetching details.', 'error');
                }
            });

            // Update email and phone number
            $('#changeEmailPhoneForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        const res = JSON.parse(response);
                        if (res.success) {
                            Swal.fire('Success!', 'Your details have been updated.', 'success')
                                .then(() => window.location.href = '../staffbantayan/myaccount');
                        } else {
                            Swal.fire('Error!', res.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                    }
                });
            });
        });
    </script>
</body>
</html>
