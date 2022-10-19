<?php include "../layout/cabecalho.php" ?>

<?php 
if (isset($_GET["Id"]) && !empty($_GET["Id"]) ) {

    $dados = file_get_contents("https://reserva.fatectq.edu.br/api/salas/ById/".$_GET["Id"]);
    $dados = json_decode($dados, true);

} else {

    echo "<script>window.location.href='./salas.php?erro=semid'</script>";
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
                        value="<?php echo $dados["salaId"]; ?>" 
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
                    <label>Descrição</label>
                    <input 
                        type="text" 
                        name="sigla"  
                        value="<?php echo $dados["descricao"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Bloco</label>
                    <input 
                        type="text" 
                        name="apelido" 
                        value="<?php echo $dados["bloco"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Capacidade</label>
                    <input 
                        type="text" 
                        name="apelido" 
                        value="<?php echo $dados["capacidade"]; ?>" 
                        class="form-control"/>
                </div>

                <div class="form-group ">
                    <label>Reserva</label>
                        <div class="form-control">
                            <?php 
                                if($dados["permitirReserva"]) {
                            ?>
                                <input type="checkbox" name="permitirReserva" checked="checked"/>
                            <?php
                                }else{
                            ?>
                                <input type="checkbox"/>
                            <?php
                                }
                            ?>
                        </div>
                </div>

               

                <div class="form-group">
                    <label>Equipamento</label>
                    <input 
                        type="text" 
                        name="apelido" 
                        value="<?php echo $dados["equipamentosSala"]; ?>" 
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
