const nav_button = document.querySelector(".nav_button");
const nav = document.querySelector("nav");

nav_button.addEventListener("click", (event) => {
    event.stopPropagation();
    nav.classList.add("active");
});

document.addEventListener("click", () => {
    nav.classList.remove("active");
});