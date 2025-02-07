<?php include '../Templates/header.php'; 
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/EstadoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/EstadoCivilModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Model/SexoModel.php";

    $acao = "create";

    $estadoModel = new EstadoModel();
    $estados = $estadoModel->getAllEstado();

    $estadoCivilModel = new EstadoCivilModel();
    $estadosCivil = $estadoCivilModel->getAllEstadoCivil();
    
    $sexoModel = new SexoModel();
    $sexo = $sexoModel->getAllSexo();
?>
<style>
    input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

    <div class="row">
        <div class="col-md-2"></div>
            <div class="form-group col-md-8">

        <h1 class="titulo my-4">
            Cadastro de Pessoa Física
        </h1>

<form method="POST" id="cadastroPessoaFisica" action="/corretora/Controller/PessoaFisicaController.php?acao=<?=$acao?>">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nomeCompleto"><span>*</span>Nome completo:</label>
            <input type="text" class="form-control" id="nome" placeholder="Informe seu nome completo" name="nome" required>
        </div>
   
        <div class="form-group col-md-4">
            <label for="estadoCivil"><span>*</span>Estado civil:</label>
            <select id="estadoCivil" class="form-control" name="estadoCivil" required>
                <option selected>Selecione seu estado civil</option>
                <?php foreach($estadosCivil as $estadoCivil){?>
                <option value="<?php echo $estadoCivil['idEstadoCivil'];?>"> <?php echo $estadoCivil['descricaoEstadoCivil'];?> </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="sexo"><span>*</span>Sexo:</label>
            <select id="sexo" class="form-control" name="sexo" required>
                <option selected>Selecione seu sexo</option>
                <?php foreach($sexo as $opcao) { ?>
                <option value="<?php echo $opcao['codigoSexo'];?>"> <?php echo $opcao['descricaoSexo'];?> </option>
                <?php } ?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="email"><span>*</span>E-mail:</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Informe seu e-mail" name="email" required>
        <small id="emailHelp" class="form-text text-muted">Esse email será para usado para contatos.</small>
    </div>

    <div class="form-group">
        <label for="senha"><span>*</span>Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Informe sua senha de acesso" name="senha" required>

    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="telefone1">Telefone residencial:</label>
            <input type="text" class="form-control" placeholder="Ex.: (00) 0000-0000" name="telefone1" id="telefone1">
        </div>
        <div class="form-group col-md-6">
            <label for="telefone2">Telefone pessoal:</label>
            <input type="text" class="form-control" placeholder="Ex.: (00) 0000-0000" name="telefone2" id="telefone2">
        </div>
    </div>

    <div class="form-group">
        <label for="rg"><span>*</span>RG:</label>
        <input type="text" class="form-control" id="rg" placeholder="Informe seu RG" name="rg" required>
    </div>

    <div class="form-group">
        <label for="cpf"><span>*</span>CPF:</label>
        <input type="text" class="form-control cpf" id="cpf" placeholder="Ex.: 000.000.000-00" name="cpf" required>
        <small id="cpf" class="form-text text-muted">Digite apenas os números.</small>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="cep"><span>*</span>CEP:</label>
            <input type="text" class="form-control cep" id="cep"  aria-describedby="cep" placeholder="Ex.: 00000-000" name="cep" required>
            <small id="cep" class="form-text text-muted">Se o CEP preenchido for válido, alguns dados serão preenchidos automaticamente.</small>
        </div>

        <div class="form-group col-md-7">
            <label for="logradouro"><span>*</span>Logradouro:</label>
            <input type="text" class="form-control" id="logradouro" placeholder="Rua, Avenida, etc..." name="logradouro" required>
        </div>

        <div class="form-group col-md-1">
            <label for="numero"><span>*</span>Numero:</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
    </div>

    <div class="form-group">
        <label for="complemento">Complemento:</label>
        <input type="text" class="form-control" id="complemento" aria-describedby="complemento" placeholder="Apartamento, fundos, etc..." name="complemento">
        <small id="complemento" class="form-text text-muted">Esse campo é opcional.</small>
    </div>
  
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="bairro"><span>*</span>Bairro:</label>
            <input type="text" class="form-control" id="bairro" placeholder="Informe seu bairro" name="bairro" required>
        </div>

        <div class="form-group col-md-4">
            <label for="cidade"><span>*</span>Cidade:</label>
            <input type="text" class="form-control" id="cidade" placeholder="Informe sua cidade" name="cidade" required>
        </div>

        <div class="form-group col-md-4">
            <label for="estado"><span>*</span>Estado:</label>
            <select id="estado" class="form-control" name="estado" required>
                <option selected>Selecione seu estado</option>
                <?php foreach($estados as $estado){?>
                <option data-uf="<?php echo $estado['siglaEstado'];?>" value="<?php echo $estado['idEstado'];?>"> <?php echo $estado['descricaoEstado'];?> </option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="profissao"><span>*</span>Profissão:</label>
            <input type="text" class="form-control" id="profissao" placeholder="Informe sua profissão" name="profissao" required>
        </div>
    </div>  

    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-plus"></i> Cadastrar Usuário</button>
    <div id="mensagem"></div>

</form>
<br>
</div>
</div>

<p style="text-align:center">Já possui uma conta?<a href="../login/user/login.php">Entre Aqui</a>

<script src="/corretora/Config/JS/jquery.mask.js"></script>
<!--JS do CEP -->
<script type="text/javascript">

        $('#telefone1').mask('(00) 0000-00000');
        $('#telefone2').mask('(00) 0000-00000');
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00');
        

	$("#cep").focusout(function(){
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#logradouro").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
                $("#estado option[data-uf="+resposta.uf+"]").attr("selected", true);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#numero").focus();
			}
		});
	});
</script>

<?php include "../Templates/footer.php"; ?>

