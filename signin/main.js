const loginBtn = document.querySelector('#login');
const registerBtn = document.querySelector('#register');
const loginForm = document.querySelector('.login-form');
const registerForm = document.querySelector('.register-form');
const nextregisterBtn = document.querySelector('#next-register');
const nextregisterForm = document.querySelector('.next-register-form');
const categoryBtn = document.querySelector('#create');
const categoryForm = document.querySelector('.category');

const loginAppBtn = document.querySelector('#login-app');
const finishBtn = document.querySelector('#finish');
const bubbles = document.querySelectorAll(".bubble");

//Categories page

bubbles.forEach(bubble => {
    bubble.addEventListener("click", () => {
        bubble.classList.toggle("selected");
        checkSelection();
    });
});

function checkSelection() {
    const selectedBubbles = document.querySelectorAll(".bubble.selected");
    finishBtn.disabled = selectedBubbles.length === 0;
}



//required function 

function validateForm(form) {
    const inputs = form.querySelectorAll("input[required]");
    let isValid = true;

    inputs.forEach(input => {
        if (input.value.trim() === "") {
            isValid = false;
            input.style.border = "2px solid red"; // Highlight empty fields
        } else {
            input.style.border = ""; // Remove red border if field is filled
        }
    });

    return isValid;
}


//login form

loginBtn.addEventListener('click', ()=> {
    
    loginBtn.style.backgroundColor = "#00B69B";
    registerBtn.style.backgroundColor = "rgba(255, 255, 255, 0.2)";

    loginForm.style.left = "50%";
    registerForm.style.left = "-50%";
    nextregisterForm.style.left = "-50%";
    categoryForm.style.left = "-50%";

    loginForm.style.opacity = 1;
    registerForm.style.opacity = 0;
    nextregisterForm.style.opacity = 0;
    categoryForm.style.opacity = 0;

    document.querySelector(".col-1").style.borderRadius = "0 30% 20% 0"

})

//sign up form

registerBtn.addEventListener('click', ()=> {
    loginBtn.style.backgroundColor = "rgba(255, 255, 255, 0.2)";
    registerBtn.style.backgroundColor = "#00B69B";

    loginForm.style.left = "150%";
    registerForm.style.left = "50%";
    nextregisterForm.style.left = "-50%";
    categoryForm.style.left = "-50%";

    loginForm.style.opacity = 0;
    registerForm.style.opacity = 1;
    nextregisterForm.style.opacity = 0;
    categoryForm.style.opacity = 0;

    document.querySelector(".col-1").style.borderRadius = "0 20% 30% 0"
})

//register 2 form

nextregisterBtn.addEventListener('click', ()=> {

    if (!validateForm(registerForm)) {
        alert("Please complete the required fields before proceeding.");
        return;
    }


    loginBtn.style.backgroundColor = "rgba(255, 255, 255, 0.2)";
    registerBtn.style.backgroundColor = "#00B69B";

    loginForm.style.left = "150%";
    registerForm.style.left = "150%";
    nextregisterForm.style.left = "50%";
    categoryForm.style.left = "-50%";

    loginForm.style.opacity = 0;
    registerForm.style.opacity = 0;
    nextregisterForm.style.opacity = 1;
    categoryForm.style.opacity = 0;

    document.querySelector(".col-1").style.borderRadius = "0 30% 20% 0"

})


//category form


categoryBtn.addEventListener('click', ()=> {

    if (!validateForm(nextregisterForm)) {
        alert("Please complete the required fields before proceeding.");
        return;
    }

    loginBtn.style.backgroundColor = "rgba(255, 255, 255, 0.2)";
    registerBtn.style.backgroundColor = "#00B69B";

    loginForm.style.left = "150%";
    registerForm.style.left = "150%";
    nextregisterForm.style.left = "150%";
    categoryForm.style.left = "50%";

    loginForm.style.opacity = 0;
    registerForm.style.opacity = 0;
    nextregisterForm.style.opacity = 0;
    categoryForm.style.opacity = 1;

    document.querySelector(".col-1").style.borderRadius = "0 20% 30% 0"
})




//required btn settings

loginAppBtn.addEventListener('click', ()=> {
    if (!validateForm(loginForm)) {
        alert("Please complete the required fields before proceeding.");
        return;
    }

})




document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form"); // Replace with your actual form selector
    const inputs = form.querySelectorAll("input[required]");
    const nextButton = document.querySelector("#next"); // Replace with actual button ID

    function validateForm() {
        let isValid = true;

        inputs.forEach(input => {
            if (input.value.trim() === "") {
                isValid = false;
                input.style.border = "2px solid red"; // Highlight empty fields
            } else {
                input.style.border = "2px solid #ccc"; // Reset border when filled
            }
        });

        return isValid;
    }

    // Check validation on form submit
    nextButton.addEventListener("click", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent navigation if validation fails
        }
    });

    // Remove red border dynamically when user types
    inputs.forEach(input => {
        input.addEventListener("input", function () {
            if (input.value.trim() !== "") {
                input.style.border = "2px solid #ccc";
            }
        });
    });
});