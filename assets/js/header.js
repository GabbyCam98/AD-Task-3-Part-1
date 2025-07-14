document.addEventListener("DOMContentLoaded", () => {
  const imgBtn = document.getElementById("img-btn");

  imgBtn.addEventListener("mouseover", () => {
    imgBtn.src = "/assets/img/travelez-green.png";
  });

  imgBtn.addEventListener("mouseout", () => {
    imgBtn.src = "/assets/img/travelez-white.png";
  });
});
