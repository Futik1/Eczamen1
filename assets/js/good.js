const current = document.querySelector(".current");
const previews = document.querySelectorAll(".preview .image");

function unset_active_preview() {
    previews.forEach(preview => {
        preview.classList.remove("active");
    });
}

previews.forEach((preview) => {
    preview.addEventListener("click", () => {
        unset_active_preview();
        current.querySelector("img").src = preview.querySelector("img").src;
        preview.classList.add("active");
    });
});

const tab_names = document.querySelectorAll(".tab_names .tab_name");
const tabs = document.querySelector(".tabs");

function unset_active_tab() {
    tab_names.forEach(tab_name => {
        tab_name.classList.remove("active");
    });
    tabs.querySelectorAll(".tab").forEach(tab => {
        tab.classList.remove("active");
    });
}

tab_names.forEach((tab_name) => {
    tab_name.addEventListener("click", () => {
        unset_active_tab();
        let data_id = tab_name.getAttribute("data-id");
        let tab = tabs.querySelector(`[data-id="${data_id}"]`);
        tab_name.classList.add("active");
        tab.classList.add("active");
    });
});