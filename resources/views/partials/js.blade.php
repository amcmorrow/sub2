<script>
const bookmarkList = document.getElementById('bookmarkList');
const bookmarkInput = document.getElementById('bookmarkInput');

// Load bookmarks from localStorage on page load
document.addEventListener('DOMContentLoaded', loadBookmarks);

// Add a new bookmark
function addBookmark() {
  const url = bookmarkInput.value.trim();
  if (!url) {
    alert('Please enter a valid URL.');
    return;
  }

  const bookmark = {
    url: url.startsWith('http') ? url : `https://${url}`,
  };

  // Save to localStorage
  const bookmarks = getBookmarks();
  bookmarks.push(bookmark);
  saveBookmarks(bookmarks);

  // Add to the list
  addBookmarkToDOM(bookmark);

  // Clear the input field
  bookmarkInput.value = '';
}

// Remove a bookmark
function removeBookmark(index) {
  const bookmarks = getBookmarks();
  bookmarks.splice(index, 1); // Remove the bookmark at the given index
  saveBookmarks(bookmarks);
  renderBookmarks();
}

// Save bookmarks to localStorage
function saveBookmarks(bookmarks) {
  localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
}

// Get bookmarks from localStorage
function getBookmarks() {
  const bookmarks = localStorage.getItem('bookmarks');
  return bookmarks ? JSON.parse(bookmarks) : [];
}

// Add a bookmark to the DOM
function addBookmarkToDOM(bookmark, index = null) {
  const li = document.createElement('li');

  const link = document.createElement('a');
  link.href = bookmark.url;
  link.target = '_blank';
  link.textContent = bookmark.url;

  const removeButton = document.createElement('button');
  removeButton.textContent = 'Remove';
  removeButton.onclick = () => removeBookmark(index);

  li.appendChild(link);
  li.appendChild(removeButton);
  bookmarkList.appendChild(li);
}

// Render all bookmarks
function renderBookmarks() {
  bookmarkList.innerHTML = ''; // Clear the list
  const bookmarks = getBookmarks();
  bookmarks.forEach((bookmark, index) => {
    addBookmarkToDOM(bookmark, index);
  });
}

// Load bookmarks and render them
function loadBookmarks() {
  renderBookmarks();
}
</script>
