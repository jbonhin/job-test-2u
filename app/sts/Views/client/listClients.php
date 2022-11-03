<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
        <div class="content p-1 test-list">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 title">Lista Clientes</h2>
                    </div>
                    <div class="ml-auto p-2">
                        <a class="btn btn-primary btn-lg test-btn" href="<?php echo URL;?>client" role="button">Cadastrar</a>
                    </div>
                </div>
                <hr class="hr-title">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome Completo</th>
                                <th>Endereço</th>
                                <th>Número</th>
                                <th>Bairro</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Incluído em</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->dados['customers'] as $value) {
                                extract($value);
                                echo "<tr>";
                                echo "<td>". $value['id'] ."</td>";
                                echo "<td>". $value['name'] ."</td>";
                                echo "<td>". $value['address'] ."</td>";
                                echo "<td>". $value['number_address'] ."</td>";
                                echo "<td>". $value['district'] ."</td>";
                                echo "<td>". $value['zip_code'] ."</td>";
                                echo "<td>". $value['city'] ."</td>";
                                echo "<td>". $value['fu'] ."</td>";
                                echo "<td>". $value['created'] ."</td>";
                                echo "<tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
