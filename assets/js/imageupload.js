const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('preview');

    imageInput.addEventListener('change', function () {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
          previewContainer.innerHTML = `<img src="${e.target.result}" alt="Image Preview" />`;
        };

        reader.readAsDataURL(file);
      } else {
        previewContainer.innerHTML = "<p>No image selected</p>";
      }
    });