const profile = document.getElementById("profile");
const menuUser = document.getElementById('menuUser');

profile.addEventListener('click', () => {
    if(menuUser.style.display == 'flex') {
      menuUser.style.display = 'none';
    } else {
      menuUser.style.display = 'flex';
    }
})   