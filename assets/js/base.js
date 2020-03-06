var theHTML = document.getElementsByTagName('html')[0];

// Function to set JS marker
function setJSmarker() {
  theHTML.classList.remove("no-js");
  theHTML.classList.add("js");
}

// Function to set Connection marker
function setConnectionMarker() {
  var isConnected = navigator.onLine ? "online" : "offline"
  if (isConnected == "online") {
    theHTML.classList.remove("offline");
    theHTML.classList.add("online");
  } else {
    theHTML.classList.remove("online");
    theHTML.classList.add("offline");
  }
}

// Set class to signal if JS and Connection are available or not
setJSmarker();
setConnectionMarker();
