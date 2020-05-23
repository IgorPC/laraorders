var filtroClientes = document.querySelector('#filtro-cliente');

filtroClientes.addEventListener('input', function () {
    var clientes = document.querySelectorAll('.list-cliente');

    if(this.value.length > 0){
        for(var i = 0; i < clientes.length; i++){
            var cliente = clientes[i];
            var nome = cliente.querySelector(".links-cliente").textContent;
            var digito = new RegExp(this.value, "i");
            if(!digito.test(nome)){
                cliente.classList.remove('list-group-item');
                cliente.classList.add('invisivel');
            }else{
                cliente.classList.add('list-group-item');
                cliente.classList.remove('invisivel');
            }
        }
    }else{
        for (var i = 0; i < clientes.length; i++) {
            var cliente = clientes[i];
            cliente.classList.remove("invisivel");
            cliente.classList.add('list-group-item');
        }
    }
})

