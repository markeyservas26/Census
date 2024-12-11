<?php
include '../online/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['sqlFile']) && $_FILES['sqlFile']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['sqlFile']['tmp_name'];
        $fileContents = file_get_contents($uploadedFile);

        if ($fileContents) {
            // Split file contents into individual SQL statements
            $statements = explode(";", $fileContents);

            $errors = [];
            foreach ($statements as $statement) {
                $statement = trim($statement);
                if (!empty($statement)) {
                    if (!mysqli_query($conn, $statement)) {
                        $errors[] = "Error executing: $statement - " . mysqli_error($conn);
                    }
                }
            }

            if (empty($errors)) {
                echo "
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Data imported successfully!',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'madridejos';
                    });
                </script>";
            } else {
                echo "
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Import failed with errors. Check console for details.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href = 'madridejos';
                    });
                    console.log(" . json_encode($errors) . ");
                </script>";
            }
        } else {
            echo "
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'The file is empty or invalid!',
                    icon: 'warning'
                }).then(() => {
                    window.location.href = 'madridejos';
                });
            </script>";
        }
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'File upload failed!',
                icon: 'error'
            }).then(() => {
                window.location.href = 'madridejos';
            });
        </script>";
    }
}
?>
