    $(document).ready(function () {
        $('#form_client').on("submit", function () {
            if ($('#name').val() === "") {
                alert("Erro: Necessário preencher o campo nome!");
                return false;
            } else if ($('#zip_code').val() === "" || strlen($('#zip_code').val()) < 8) {
                alert("Erro: Necessário preencher o campo CEP!");
                return false;
            } else if ($('#address').val() === "") {
                alert("Erro: Necessário preencher o campo Endereço!");
                return false;
            } else if ($('#district').val() === "") {
                alert("Erro: Necessário preencher o campo Bairro!");
                return false;
            } else if ($('#city').val() === "") {
                alert("Erro: Necessário preencher o campo Cidade!");
                return false;
            } else if ($('#fu').val() === "") {
                alert("Erro: Necessário preencher o campo Estado!");
                return false;
            }
        });
    });
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('zip_code').value=("");
            document.getElementById('address').value=("");
            document.getElementById('district').value=("");
            document.getElementById('city').value=("");
            document.getElementById('fu').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('address').value=(conteudo.logradouro);
            document.getElementById('district').value=(conteudo.bairro);
            document.getElementById('city').value=(conteudo.localidade);
            document.getElementById('fu').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('address').value="...";
                document.getElementById('district').value="...";
                document.getElementById('city').value="...";
                document.getElementById('fu').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };;

