const form = document.querySelector(".registration-form"),
    continueBtn = document.querySelector(".register-button"),
    errorContainer = document.querySelector(".error-container"),
    errorText = document.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/register.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "index.php";
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