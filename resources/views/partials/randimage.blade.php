<!-- Random Image -->
<div id="api_image"><img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Random Image" class="uk-align-center"></div>
<button id="loadImageButton" class="uk-button uk-button-primary" style="display: block; margin: 20px auto;">New Image</button>

<script>
  // Ensure the script runs only once by checking a global flag
  if (!window.randomImageScriptInitialized) {
    window.randomImageScriptInitialized = true;

    // Function to fetch and display a random image
    async function loadRandomImage() {
      const imageContainer = document.getElementById('api_image');
      if (!imageContainer) {
        console.error("Image container is not found in the DOM.");
        return;
      }

      const apiUrl = 'https://picsum.photos/600/400'; // API for random images

      try {
        // Show loading image while fetching
        imageContainer.innerHTML = '<img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Loading..." class="uk-align-center">';

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
        imageContainer.innerHTML = '<img src="https://minesandmoney.com/_images/loading-600x400.gif?version=164" alt="Error" class="uk-align-center"><br>Failed to load image. Please try again.';
      }
    }

    // Function to reattach the event listener to the "New Image" button
    function attachButtonListener() {
      const loadImageButton = document.getElementById('loadImageButton');
      if (loadImageButton) {
        loadImageButton.addEventListener('click', loadRandomImage);
      } else {
        console.error("Button with id 'loadImageButton' not found.");
      }
    }

    // Track the last known URL pathname
    window.lastPathname = window.lastPathname || window.location.pathname;

    // Check for URL changes
    const checkURLChange = () => {
      const currentPathname = window.location.pathname;
      if (currentPathname !== window.lastPathname) {
        window.lastPathname = currentPathname;
        loadRandomImage(); // Reload the random image
        attachButtonListener(); // Reattach the button listener after navigation
      }
    };

    // Use a timer-based approach to detect URL changes (for SPA frameworks)
    setInterval(checkURLChange, 500);

    // Listen for browser navigation events (e.g., back/forward buttons)
    window.addEventListener('popstate', () => {
      checkURLChange();
    });

    // Initial load
    loadRandomImage();
    attachButtonListener(); // Attach the button listener on the first load
  }
</script>
