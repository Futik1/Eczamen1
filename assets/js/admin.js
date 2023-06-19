document.querySelectorAll(".switch_tab").forEach((button) => {
  button.addEventListener("click", function () {
    let id = this.getAttribute("data-id");
    document.querySelectorAll(".tab").forEach((tab) => {
      tab.style.display = "none";
    });
    document.querySelector(`.tab[data-id="${id}"]`).style.display = "block";
  });
});

document.querySelectorAll(".delete_review").forEach(button => {
  button.addEventListener("click", function () {
    let id = this.getAttribute("data-id");
    let data = new FormData();
    data.append("review_id", id);
    fetch("ajax/delete_review.php", {
      method: "POST",
      body: data,
    })
      .then((response) => response.json())
      .then((json) => {
        location.reload();
      });
  });
});

$('.summernote').summernote({
  height: 200,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
});

document.querySelectorAll(".remove_image").forEach(button => {
  button.addEventListener("click", function (event) {
    event.preventDefault();
    this.parentNode.querySelector("img").remove();
  });
});

document.querySelectorAll(".remove_spec").forEach(spec => {
  spec.addEventListener("click", function (event) {
    event.preventDefault();
    this.parentNode.remove();
  });
});

document.querySelectorAll(".add_spec").forEach(spec => {
  spec.addEventListener("click", function (event) {
    event.preventDefault();
    let spec = document.createElement("div");
    spec.classList.add("spec");
    spec.innerHTML = `
                      <label>
                          <span>Название</span>
                          <input type="text" name="spec_name">
                      </label>
                      <label>
                          <span>Значение</span>
                          <input type="text" name="spec_value">
                      </label>
                      <button class="remove_spec">Удалить</button>`;
    spec.querySelector(".remove_spec").addEventListener("click", function (event) {
        event.preventDefault();
        this.parentNode.remove();
      });
    this.parentNode.insertBefore(spec, this);
    });
});

document.querySelectorAll(".save_good").forEach(button => {
  button.addEventListener("click", function(event) {
    event.preventDefault();
    let form = this.parentNode;
    let data = new FormData();
    data.append("name", form.querySelector("[name='name']").value);
    if (form.querySelector("[name='cover']").files[0]) {
      data.append("cover", form.querySelector("[name='cover']").files[0]);
    }
    else {
      data.append("cover", form.querySelector("[name='cover']").parentNode.querySelector("img").src);
    }
    data.append("price", form.querySelector("[name='price']").value);
    data.append("info", form.querySelector("[name='info']").value);
    let specs = [];
    form.querySelector(".specs").querySelectorAll(".spec").forEach(spec => {
      specs.push({
        name: spec.querySelector("[name='spec_name']").value,
        value: spec.querySelector("[name='spec_value']").value
      });
    });
    data.append("specs", JSON.stringify(specs));
    data.append("description", $(form.querySelector(".summernote")).summernote("code"));
    let image_index = 0;
    form.querySelector(".images").querySelectorAll(".image").forEach(image => {
      if (image.querySelector("[name='image']").files[0]) {
        data.append(`image_${image_index}`, image.querySelector("[name='image']").files[0]);
      }
      else if (image.querySelector("img")) {
        data.append(`image_${image_index}`, image.querySelector("img").src);
      }
      image_index++;
    });
    data.append("category", form.querySelector("[name='categories']").value);
    data.append("good_id", this.getAttribute("data-id"));
    fetch("ajax/save_good.php", {
      method: "POST",
      body: data,
    })
        .then((response) => response.json())
        .then((json) => {
          location.reload();
        });
  });
});

document.querySelectorAll(".delete_good").forEach(button => {
  button.addEventListener("click", function(event) {
    event.preventDefault();
    let data = new FormData();
    data.append("good_id", this.getAttribute("data-id"));
    fetch("ajax/delete_good.php", {
      method: "POST",
      body: data,
    })
        .then((response) => response.json())
        .then((json) => {
          location.reload();
        });
  });
});