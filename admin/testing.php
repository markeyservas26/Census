<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Census Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Georgia', serif;
    background-color: #eaeaea; /* Light gray with a formal tone */
    color: #000;
    margin: 0;
    padding: 20px;
    line-height: 1.6;
    background-image: linear-gradient(135deg, #f0f4f8 25%, #eaeaea 75%);
    background-size: cover;
    backdrop-filter: blur(20px); /* Adds a slight blur effect */
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            background-color: #fafafa; /* Off-white */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
            padding: 10px 0;
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
            border-bottom: 1px dotted #ccc;
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
    </style>
</head>
<body>
<div class="form-container">
    <div class="form-header">
        <p class="form-title">POPCEN-CBMS Form 20</p> <!-- Added Title Here -->
        <div class="house-number">
            <label for="house-number-input">House Number:</label>
            <input type="text" id="house-number-input" placeholder="" /> <!-- Input Field -->
        </div>
    </div>
    <div class="header">
        <img src="admin/assets/img/censusformlogo.png" alt="Census Logo" class="logo">
        <div class="header-text">
            <h4>REPUBLIC OF THE PHILIPPINES</h4>
            <h3>PHILIPPINE STATISTICS AUTHORITY</h3>
            <h5>PROVINCE OF CEBU</h5>
            <h5>MUNICIPALITY OF MADRIDEJOS</h5>
        </div>
        <img src="admin/assets/img/censusformlogo2.png" alt="Census Logo 2" class="logo-right">
    </div>



        
        <h1>BANTAYAN ISLAND CENSUS FORM</h1>
        
        <p class="note">Note: Please write LEGIBLY (Pakisulat ng Mahabasa)</p>
        
        <table>
            <tr>
                <th>Last Name (Apelyido)</th>
                <th>First Name (Pangalan)</th>
                <th>Middle Name</th>
                <th>Initial Name (Palayaw)</th>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th class="full-width">Present Address (Kasalukuyang Tirahan)</th>
            </tr>
            <tr>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th class="full-width">Provincial Address (Tirahan sa Probinsya)</th>
            </tr>
            <tr>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th>Date of Birth (dd/mm/yyyy)</th>
                <th>Place of Birth</th>
                <th>Nationality</th>
                <th>Religion</th>
                <th>Sex</th>
            </tr>
            <tr>
                <td><input type="date"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th>Height (inches)</th>
                <th>Weight (kilos)</th>
                <th>Contact No.</th>
                <th>Email:</th>
            </tr>
            <tr>
                <td><input type="number"></td>
                <td><input type="number"></td>
                <td><input type="text"></td>
                <td><input type="email"></td>
            </tr>
        </table>
        
        <div class="section-title">
                <h4>Marital Status (Estado sa Buhay)</h4>
        </div>
        <div class="checkbox-group">
                <label><input type="checkbox" name="marital_status" value="single"> Single (Walang Asawa)</label>
                <label><input type="checkbox" name="marital_status" value="married"> Married (May Asawa)</label>
                <label><input type="checkbox" name="marital_status" value="separated"> Separated (Hiwalay sa Asawa)</label>
                <label><input type="checkbox" name="marital_status" value="widowed"> Widow(er) (Biyudo/Biyuda)</label>
                <label><input type="checkbox" name="marital_status" value="divorced"> Divorced (Diborsyado)</label>
        </div>

        
        <table>
            <tr>
                <th class="full-width">Mother's Maiden Name (Last Name, First Name, Middle Name)</th>
            </tr>
            <tr>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <table>
            <tr>
                <th class="full-width">Father's Name (Last Name, First Name, Middle Name)</th>
            </tr>
            <tr>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <div class="section-title">
            <h4>EDUCATION ATTAINMENT</h4>
        </div>
        <p class="note">Please give exact titles of degrees in original language. Do not translate or equate to other degrees. (Isulat ang wastong batayan o kursong natapos.)</p>
        <table>
            <tr>
                <th>Name and Address of School</th>
                <th>Address</th>
            </tr>
            <tr>
                <td>Elementary:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Highschool:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Vocational/Course:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>College/Course:</td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <div class="section-title">
            <h4>EMPLOYMENT RECORD</h4>
        </div>
        <p class="note">Starting with your present post, list in REVERSE ORDER your employment history. (Mula sa kasalukuyang posisyon, ilista nang pabaliktad ang mga trabahong pinagdaanan.)</p>
        <table>
            <tr>
                <th>Duration (Tagal)</th>
                <th>Name of Employer (Pangalan ng Kompanya)</th>
                <th>Address</th>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <div class="section-title">
            <h4>OTHER HOUSE OCCUPANTS</h4>
        </div>
        <table>
            <tr>
                <th>Name</th>
                <th>Position in the family</th>
                <th>Age</th>
                <th>Birth of Date</th>
                <th>Civil Status</th>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="date"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="date"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="date"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="number"></td>
                <td><input type="date"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        <p class="note">I certify that the statements made by me in answering the foregoing questions are true, complete and correct to the best of my knowledge and belief. (Ang lahat ng ibinigay na kasagutan sa mga nabanggit na katanungan ay matapat kong sinagutan at pinatutunayan kong lahat ay totoo, kumpleto at tama sa abot ng aking kaalaman at paniniwala.)</p>
        
        <div class="signature-line">
            <p>Date (day/month/year): <input type="date" style="width: 150px;"> Signature: ___________________</p>
        </div>
    </div>
</body>
</html>