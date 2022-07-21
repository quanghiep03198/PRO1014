// const { createLogger } = require("vite");
console.log("ahiiihi");
const card = document.querySelector(".card");
const movement = card.getBoundingClientRect().width; // get width m
console.log(movement);
console.log(card);
let defaultTransform = 0;
function goNext() {
  console.log(movement);
  defaultTransform = defaultTransform - movement;
  var slider = document.getElementById("slider");
  if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7)
    defaultTransform = 0;
  slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
  var slider = document.getElementById("slider");
  if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
  else defaultTransform = defaultTransform + movement;
  slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);
