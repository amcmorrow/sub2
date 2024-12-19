<!-- Random Image -->
<div id="api_image"><img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Random Image" class="uk-align-center"></div>
<button id="loadImageButton" class="uk-button uk-button-primary" style="display: block; margin: 20px auto;">New Image</button>

<script>
    // Function to fetch and display a random image
    async function loadRandomImage() {
      const imageContainer = document.getElementById('api_image');
      const apiUrl = 'https://picsum.photos/600/400'; // API for random images

      try {
        // Show loading text while fetching
        imageContainer.innerHTML = '<img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Random Image" class="uk-align-center">';

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
        imageContainer.innerHTML = '<img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Random Image" class="uk-align-center"><br>Failed to load image. Please try again.';
      }
    }

    // Load a random image on button click
    document.getElementById('loadImageButton').addEventListener('click', loadRandomImage);


     // Load a random image when the DOM content is loaded
    document.addEventListener('DOMContentLoaded', loadRandomImage);
  </script>
