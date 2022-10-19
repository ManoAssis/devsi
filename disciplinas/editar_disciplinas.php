<?php include "../layout/cabecalho.php" ?>

<?php 
if (isset($_GET["Id"]) && !empty($_GET["Id"]) ) {

    $dados = file_get_contents("https://reserva.fatectq.edu.br/api/disciplinas/ById/".$_GET["Id"]);
    $dados = json_decode($dados, true);
    // echo "<pre>";
    // print_r ($dados);
    // echo "</pre>";

} else {

    echo "<script>window.location.href='./disciplinas.php?erro=semid'</script>";
}
?>
    <div class="row">
        <div class="col-4 offset-4">
            <form>
                <div class="form-group">
                    <label>Id</label>
                    <input 
                        type="text" 
                        name="Id" 
                        readonly="readonly" 
                        value="<?php echo $dados["disciplinaId"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Nome</label>
                    <input 
                        type="text" 
                        name="nome" 
                        value="<?php echo $dados["nome"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Sigla</label>
                    <input 
                        type="text" 
                        name="sigla"  
                        value="<?php echo $dados["sigla"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Apelido</label>
                    <input 
                        type="text" 
                        name="apelido" 
                        value="<?php echo $dados["apelido"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group mt-3">
                    <button 
                    class="btn btn-success " 
                    type="submit"> Salvar Disciplina </button>
                </div>

            </form>
        </div>
    </div>

<?php include "../layout/rodape.php" ?>
