// Add svg-sprite to document
// Useful because no version of IE and older WebKit-Browsers currently support file paths in use
// And with a separate svg-sprite we are able to use browser-cache
function getSVG() {
  var ajax = new XMLHttpRequest();
  // var spriteURL = "http://depone-mbp.local:8888/bc-dyn/wp-content/themes/benson-coffee/assets/images/sprite.svg";
  var spriteURL = themeParams.templateURL + "/assets/img/depone.svg";
  ajax.open("GET", spriteURL, true);
  ajax.responseType = "document";
  ajax.onload = function() {
    document.body.insertBefore(ajax.responseXML.documentElement, document.body.childNodes[0]);
  };
  ajax.send();
}

// Test if browser supports inline-svg
// Used from Practical SVG by Chris Coyer
var supportsSvg = function() {
  var div = document.createElement("div");
  div.innerHTML = "<svg/>";
  return (div.firstChild && div.firstChild.namespaceURI) === "http://www.w3.org/2000/svg";
};

if (supportsSvg()) {
  document.documentElement.className += " svg";
  // call getSVG-function
  getSVG();

} else {
  document.documentElement.className += " no-svg";
}
