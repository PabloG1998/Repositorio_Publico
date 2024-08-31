document.getElementById('imcForm').addEventListener('submit', function(event){
    let peso = document.getElementById('peso').value;
    let altura = document.getElementById('altura').value;

    if (peso <= 0 || altura <= 0) {
        event.preventDefault();
        alert("Por favor, ingrese valor validos.")
    }
});
