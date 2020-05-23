var clientes = document.querySelectorAll('.list-cliente');

for (var i = 5; i < clientes.length; i++){
    var cliente = clientes[i];
    cliente.classList.remove('list-group-item');
    cliente.classList.add('invisivel');
}



var filtroClientes = document.querySelector('#filtro-cliente');

filtroClientes.addEventListener('input', function () {
    if(this.value.length >= 0){
        for (var i = 4; i < clientes.length; i++){
            var cliente = clientes[i];
            cliente.classList.remove('list-group-item');
            cliente.classList.add('invisivel');
        }
    }
})



