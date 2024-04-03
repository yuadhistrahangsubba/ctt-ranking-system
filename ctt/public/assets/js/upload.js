document.getElementById('file-browser').addEventListener('click', function() {
    document.getElementById('file-upload').click();
  });

  document.getElementById('file-upload').addEventListener('change', function() {

    const selectedFile = this.files[0];

    if (selectedFile) {
      const allowedFileTypes = ["application/xml", "application/vnd.ms-excel"];

      if (allowedFileTypes.includes(selectedFile.type)) {

        document.getElementById('file-name-display').textContent = `Selected file: ${selectedFile.name}`;
      } else {

        alert("Please select a valid XML or XLS file.");
        this.value = null;
        document.getElementById('file-name-display').textContent = '';
      }
    } else {
      document.getElementById('file-name-display').textContent = '';
    }
  });
