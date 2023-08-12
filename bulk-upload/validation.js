document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("comment-form");
  const uploadButton = document.getElementById("upload-button");
  const errorMessage = document.getElementById("error-message");

  form.addEventListener("submit", function (event) {
    errorMessage.textContent = ""; // Clear previous error messages

    const startDate = document.getElementById("start-date");
    const endDate = document.getElementById("end-date");
    const fileInput = document.getElementById("csv-file");
    const postID = document.getElementById("post-id");

    if (!fileInput) {
      console.log("CSV file input not found.");
      event.preventDefault();
      return;
    }

    if (!startDate) {
      console.log("Start date input not found.");
      event.preventDefault();
      return;
    }

    if (!endDate) {
      console.log("End date input not found.");
      event.preventDefault();
      return;
    }

    if (!postID) {
      console.log("Post ID input not found.");
      event.preventDefault();
      return;
    }

    if (fileInput.files.length === 0) {
      errorMessage.textContent = "Please choose a CSV file to upload.";
      event.preventDefault();
      return;
    }

    if (startDate.value > endDate.value) {
      errorMessage.textContent =
        "Start date must be before or equal to end date.";
      event.preventDefault();
      return;
    }

    if (postID.value === "") {
      errorMessage.textContent = "Please select a post.";
      event.preventDefault();
    }
  });
});
