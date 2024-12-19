<!-- Random Image -->
<div id="api_image"></div>
<button id="loadImageButton" class="uk-button uk-button-primary" style="display: block; margin: 20px auto;">New Image</button>

<script>
    // Function to fetch and display a random image
    async function loadRandomImage() {
      const imageContainer = document.getElementById('api_image');
      const apiUrl = 'https://picsum.photos/600/400'; // API for random images

      try {
        // Show loading text while fetching
        imageContainer.innerHTML = '<img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/6b449513765711.56277d303236b.gif" alt="Random Image" class="uk-align-center">';

        // Fetch the image (Lorem Picsum automatically redirects to a random image)
        const response = await fetch(apiUrl);

        // If successful, update the div with the image
        if (response.ok) {
          const imageUrl = response.url;
          imageContainer.innerHTML = `<img src="${imageUrl}" alt="Random Image" class="uk-align-center">`;
        } else {
          throw new Error('Failed to fetch image');
        }
      } catch (error) {
        // Handle errors and display a message
        console.error(error);
        imageContainer.innerHTML = 'Failed to load image. Please try again.';
      }
    }

    // Load a random image on button click
    document.getElementById('loadImageButton').addEventListener('click', loadRandomImage);

    // Optionally, load a random image on page load
    window.onload = loadRandomImage;
  </script>
