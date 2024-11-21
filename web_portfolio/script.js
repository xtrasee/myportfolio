// contact form
const form = document.querySelector('form');
const fullName = document.getElementById("name");
const email = document.getElementById("email");
const message = document.getElementById("message");
let scrollpos = window.scrollY
const header = document.querySelector("nav")
const header_height = header.offsetHeight
// light & dark mode
const switchInput = document.querySelector('.ui-switch input');

// navbar scroll function
window.addEventListener('scroll', function () {
  scrollpos = window.scrollY;

  if (scrollpos >= header_height) { document.getElementById("navbar").classList.add('transparent'); }
  else { document.getElementById("navbar").classList.remove('transparent'); }

});

// Function to toggle dark mode
function toggleDarkMode(isDarkMode) {
  document.body.classList.toggle('dark-mode', isDarkMode);
  localStorage.setItem('dark-mode', isDarkMode);
}

// Add event listener to the switch input
switchInput.addEventListener('change', function() {
  const isDarkMode = this.checked;
  toggleDarkMode(isDarkMode);
  // Update local storage with the checked state
  localStorage.setItem('switch-checked', isDarkMode);
});

// Check local storage for switch checked state on page load
const switchChecked = localStorage.getItem('switch-checked') === 'true';
switchInput.checked = switchChecked;
toggleDarkMode(switchChecked);

function zoomImage() {
  const image = document.getElementById('mainImg');
  image.classList.toggle('zoomed');
}
