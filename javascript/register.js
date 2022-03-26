const form = document.querySelector(".registration-form"),
    continueBtn = form.querySelector(".register-button"),
    errorContainer = form.querySelector(".error-container"),
    errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    alert('reg-clicked')
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/register.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    location.href = "checkout.php";
                } else {
                    errorContainer.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}