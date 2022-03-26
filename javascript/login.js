const form = document.querySelector(".login-form"),
    continueBtn = document.querySelector(".login-button"),
    errorContainer = document.querySelector(".error-container"),
    errorText = document.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "login_success") {
                    location.href = "index.php";
                } else if (data == "cart_login") {
                    location.href = "cart.php";
                } else {
                    errorContainer.style.display = "block";
                    errorText.textContent = data;
                    //$('.error-container').fadeOut(6000);
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}