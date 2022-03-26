const userDropdown = document.getElementById('user-dropdown');
const userLinks = document.querySelector('.user-dropdown')
userDropdown.onclick = () => {
    userLinks.classList.toggle("user-dropdown-show");
}