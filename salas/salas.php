<?php include "../layout/cabecalho.php"; ?>

<?php
if (isset($_GET["busca"]) && !empty($_GET["busca"]) ) {
    $dados = file_get_contents("https://reserva.fatectq.edu.br/api/salas/busca/".$_GET["busca"]);
    $dados = json_decode($dados, true);
}
else{

    $dados = file_get_contents("https://reserva.fatectq.edu.br/api/salas");
    $dados = json_decode($dados, true);
}

    if (isset($_GET["erro"]) && $_GET["erro"] == "semid")  { ?>
        <div class="alert alert-danger">
            Selecione uma Sala para editar
        </div>
    <?php
    }
?>  

    <div class="row">
        <div class="col-8 offset-2">

            <select class="form-control">
                <?php
                    for ($i = 0 ; $i < count($dados); $i++ ) { 
                ?>
                    <option value="<?php echo $dados[$i]["salaId"];?>">
                        <?php echo $dados[$i]["nome"];?>
                    </option>
                <?php
                    }
                ?>
            </select>




            <div class="card mt-3">
                <div class="card-header">Lista de Disciplinas</div>
                <div class="card-body">
                <form action="./salas.php" method="get">
                    <div class="row">
                        
                        <div class="col-2">
                            <a class="btn btn-success">
                                Nova Disciplina
                            </a>
                        </div>

                        <div class="col-4">
                            
                            
                        <input 
                                type="text"
                                name="busca"
                                class="form-control" />

                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">
                                Pesquisar
                            </button>
                        </div>

                    </div>
                </form>
                </div>
            </div>

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Bloco</th>
                        <th>Capacidade</th>
                        <th>Reserva</th>
                        <th>Equipamento Sala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($dados); $i++)
                     { 
                    ?>  
                    <tr>
                        <td> <?php echo $dados[$i]["salaId"]; ?> </td>
                        <td> <?php echo $dados[$i]["nome"]; ?> </td>
                        <td> <?php echo $dados[$i]["descricao"]; ?> </td>
                        <td> <?php echo $dados[$i]["bloco"]; ?> </td>
                        <td> <?php echo $dados[$i]["capacidade"]; ?> </td>
                        <td> 
                            <?php 
                                if($dados[$i]["permitirReserva"]) {
                            ?>
                                <input type="checkbox" checked="checked"/>
                            <?php
                                }else{
                            ?>
                                <input type="checkbox"/>
                            <?php
                                }
                            ?>
                        </td>


                        <td> <?php echo $dados[$i]["equipamentosSala"]; ?> </td>

                        <td>
                            <a class="btn btn-warning" 
                            href="./editar_salas.php?Id=<?php echo $dados[$i]["salaId"]; ?> ">
                            Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger">Excluir</a>
                        </td>
                        
                    </tr>

                    <?php  
                    }
                   ?>
                </tbody>

            </table>
        </div>
    </div>
<?php include "../layout/rodape.php" ?>