
// Side Menu (IN/OUT)

let sideMenu = document.querySelectorAll(".nav-link");
sideMenu.forEach((item) => {
  let li = item.parentElement;

  item.addEventListener("click", () => {
    sideMenu.forEach((link) => {
      link.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});


document.addEventListener("DOMContentLoaded", function () {
    let menuBar = document.querySelector(".menu-btn");
    let sideBar = document.querySelector(".sidebar");
  
    if (menuBar && sideBar) {
      menuBar.addEventListener("click", () => {
        sideBar.classList.toggle("hide");
      });
    }
  });


// Switch Mode (Light/Dark)

let switchMode = document.getElementById("switch-mode");
switchMode.addEventListener("change", (e) => {
  if (e.target.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

let searchFrom = document.querySelector(".content nav form");
let searchBtn = document.querySelector(".search-btn");
let searchIcon = document.querySelector(".search-icon");
searchBtn.addEventListener("click", (e) => {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchFrom.classList.toggle("show");
    if (searchFrom.classList.contains("show")) {
      searchIcon.classList.replace("fa-search", "fa-times");
    } else {
      searchIcon.classList.replace("fa-times", "fa-search");
    }
  }
});





window.addEventListener("resize", () => {
  if (window.innerWidth > 576) {
    searchIcon.classList.replace("fa-times", "fa-search");
    searchFrom.classList.remove("show");
  }
  if (window.innerWidth < 768) {
    sideBar.classList.add("hide");
  }
});

if (window.innerWidth < 768) {
  sideBar.classList.add("hide");
}






  //Filter Bar




  document.getElementById("reset-filter").addEventListener("click", function () {
    // Select all dropdowns
    document.querySelectorAll(".filter-bar select").forEach(select => {
        select.selectedIndex = 0; // Reset to first option
    });
});











// Status task page


document.querySelectorAll(".status-label").forEach(label => {
  label.addEventListener("click", function() {
      let select = this.nextElementSibling;
      select.style.display = "block";
      select.focus();
  });
});

document.querySelectorAll(".status-select").forEach(select => {
  select.addEventListener("change", function() {
      let statusLabel = this.previousElementSibling;
      let selectedOption = this.options[this.selectedIndex];

      // Update text and class
      statusLabel.textContent = selectedOption.text;
      statusLabel.className = "status-label " + this.value;

      // Hide dropdown after selection
      this.style.display = "none";
  });

  // Hide dropdown if focus is lost
  select.addEventListener("blur", function() {
      this.style.display = "none";
  });
});
