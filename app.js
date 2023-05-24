const password = document.querySelector('#password');
const form = document.querySelector('.login-form');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    if (password.value.trim() == '') {
        error(password, 'الرجاء ادخال رمز الدخول* ');
    } else if (password.value.trim() == '112233') {
        alert("Login Successful");
        window.location.assign("index.php");
    } else {
        error(password, 'رمز الدخول خاطئ* ');
