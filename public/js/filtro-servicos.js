var filtro = document.querySelector('#filtro-servicos');

filtro.addEventListener('input', function () {
    var servicos = document.querySelectorAll('.accordion');

    if (this.value.length > 0){
        for (var i = 0; i < servicos.length; i++){
            var servico = servicos[i];
            var nome = servico.querySelector('.text-simple').textContent;
            var digito = new RegExp(this.value, "i");
            if(!digito.test(nome)){
                servico.classList.add('invisivel');
            }else{
                servico.classList.remove('invisivel');
            }
        }
    }else{
        for (var i = 0; i < servicos.length; i++) {
            var servico = servicos[i];
            servico.classList.remove("invisivel");
        }
    }
})

