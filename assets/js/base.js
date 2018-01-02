var theHTML = document.getElementsByTagName('html')[0];

// Function to set th JS marker
function setJSmarker() {
  theHTML.classList.remove("no-js");
  theHTML.classList.add("js");
}

// Set class to signal if JS is available or not
setJSmarker();
