const passwordInput = document.getElementById('password');
const lenghtRequirement = document.getElementById('tamanio');
const uppercaseRequirement = document.getElementById('mayus');
const lowercaseRequirement = document.getElementById('min');
const numberRequirement = document.getElementById('num');
const specialRequirement = document.getElementById('spec');

passwordInput.addEventListener('input', function () {
    const password = passwordInput.value;

    //verifica la longitud
    if (password.length >= 8) {
        lenghtRequirement.classList.remove('invalid');
        lenghtRequirement.classList.add('valid');
    } else {
        lenghtRequirement.classList.remove('valid');
        lenghtRequirement.classList.add('invalid');
    }

    //verifica mayus
    if (/[A-Z]/.test(password)) {
        uppercaseRequirement.classList.remove('invalid');
        uppercaseRequirement.classList.add('valid');

    } else {
        uppercaseRequirement.classList.remove('valid');
        uppercaseRequirement.classList.add('invalid');
    }

    //verifica min
    if (/['a-z']/.test(password)) {
        lowercaseRequirement.classList.remove('invalid');
        lowercaseRequirement.classList.add('valid');
        
    }else{
        numberRequirement.classList.remove('valid');
        numberRequirement.classList.add('invalid');
    }

    //verifica spec
    if(/[!@#$%^&(),.?{}|<>]/.test(password)) {
        specialRequirement.classList.remove('invalid');
        specialRequirement.classList.add('valid');
    }else{
        specialRequirement.classList.remove('valid');
        specialRequirement.classList.add('invalid');
    }

    //verifica num
    if(/\d/.test(password)) {
        numberRequirement.classList.remove('invalid');
        numberRequirement.classList.add('valid');
    }else{
        numberRequirement.classList.remove('valid');
        numberRequirement.classList.add('invalid')
    }

})