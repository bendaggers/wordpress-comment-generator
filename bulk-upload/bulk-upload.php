<head>
    <script src="<?php echo plugin_dir_url(__FILE__) . 'validation.js'; ?>"></script>
</head>


<form method="post" action="" enctype="multipart/form-data">

    <?php include 'comment-post-id.php'; ?>
    <br>
    <br>
    <?php include 'comment-date.php'; ?>
    <br>
    <br>
    <?php include 'comment-body.php'; ?>

    <?php include 'process-upload.php'; ?>

    <input type="submit" value="Upload Comments" class="btn btn-primary">

</form>
<br>

<div id="error-message" style="color: red;"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('comment-form');
    const uploadButton = document.getElementById('upload-button');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function(event) {
        errorMessage.textContent = ''; // Clear previous error messages

        const startDate = document.getElementById('start-date').value;
        const endDate = document.getElementById('end-date').value;
        const fileInput = document.getElementById('csv-file');

        if (fileInput.files.length === 0) {
            errorMessage.textContent = 'Please choose a CSV file to upload.';
            event.preventDefault(); // Prevent form submission
            return;
        }

        if (startDate > endDate) {
            errorMessage.textContent = 'Start date must be before or equal to end date.';
            event.preventDefault(); // Prevent form submission
            return;
        }

        if (document.getElementById('post-id').value === '') {
            errorMessage.textContent = 'Please select a post.';
            event.preventDefault(); // Prevent form submission
        }
    });
});
</script>