<?php
include_once "../../../login/verificaAdmin.php";
include_once "../../../conexao/conexao.php";

// ID do animal
$idAnimal = isset($_GET['animal']) ? (int)$_GET['animal'] : 0;

// BUSCA DADOS DO ANIMAL
$sqlAnimal = "SELECT a.*, u.nome AS dono
              FROM animal a
              INNER JOIN usuario u ON a.fk_idUsuario = u.idUsuario
              WHERE a.idAnimal = $idAnimal";

$resAnimal = mysqli_query($conn, $sqlAnimal);
$animal = mysqli_fetch_assoc($resAnimal);

if (!$animal) {
    echo "Animal não encontrado.";
    exit;
}

// BUSCA CARTEIRA
$sqlCarteira = "SELECT * FROM carteira_vacinacao 
                WHERE fk_idAnimal = $idAnimal";

$resCarteira = mysqli_query($conn, $sqlCarteira);
$carteira = mysqli_fetch_assoc($resCarteira);

$idCarteira = $carteira['idCarteira'] ?? 0;

// BUSCA VACINAS APLICADAS
$vacinas = [];

$sqlVacinas = "SELECT 
                    av.idAplicacao,
                    v.nome AS vacina,
                    av.data_aplicacao,
                    av.proxima_dose,
                    av.dose,
                    av.observacao
                FROM carteira_vacinacao c
                INNER JOIN aplicacao_vacina av 
                    ON av.fk_idCarteira = c.idCarteira
                INNER JOIN vacina v 
                    ON v.idVacina = av.fk_idVacina
                WHERE c.fk_idAnimal = $idAnimal
                ORDER BY av.data_aplicacao DESC";

$resVacinas = mysqli_query($conn, $sqlVacinas);

while ($row = mysqli_fetch_assoc($resVacinas)) {
    $vacinas[] = $row;
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Carteira de Vacinação</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- NÃO MEXER -->
    <link href="../../styles.css" rel="stylesheet">
</head>

<body>

<?php include_once "../../../includes/headerDash.php"; ?>

<div class="d-flex">

    <!-- SIDEBAR -->
    <?php include_once "../../sidebar/sidebar.php"; ?>

    <!-- CONTENT -->
    <div id="content" class="content flex-grow-1">

        <div class="container mt-4">

            <!-- HEADER PADRÃO -->
            <div class="p-3 border-bottom bg-light d-flex justify-content-between align-items-center mb-3">

                <div>
                    <h4 class="mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-syringe text-success"></i>
                        Carteira de Vacinação
                    </h4>

                    <small class="text-muted">
                        Histórico de vacinas do animal
                    </small>
                </div>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVacina">
                    <i class="fa-solid fa-plus"></i> Adicionar Vacina
                </button>

            </div>

            <!-- ANIMAL INFO -->
            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <h5 class="mb-2">
                        🐾 <?= htmlspecialchars($animal['nome']); ?>
                    </h5>

                    <div class="text-muted">
                        <strong>Espécie:</strong> <?= $animal['especie']; ?> |
                        <strong>Raça:</strong> <?= $animal['raca']; ?> |
                        <strong>Dono:</strong> <?= $animal['dono']; ?>
                    </div>

                </div>
            </div>

            <!-- TABELA VACINAS -->
            <div class="card shadow-sm">

                <div class="card-body">

                    <?php if (count($vacinas) > 0): ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">

                                <thead class="table-dark">
                                    <tr>
                                        <th>Vacina</th>
                                        <th>Data Aplicação</th>
                                        <th>Próxima Dose</th>
                                        <th>Observação</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($vacinas as $v): ?>
                                        <tr>
                                            <td><?= $v['vacina']; ?></td>

                                            <td>
                                                <?= date('d/m/Y', strtotime($v['data_aplicacao'])); ?>
                                            </td>

                                            <td>
                                                <?= $v['proxima_dose']
                                                    ? date('d/m/Y', strtotime($v['proxima_dose']))
                                                    : '-'; ?>
                                            </td>

                                            <td>
                                                <?= $v['observacao']; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                    <?php else: ?>
                        <div class="text-muted text-center py-4">
                            Nenhuma vacina registrada ainda.
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- MODAL VACINA -->
<div class="modal fade" id="modalVacina" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="adicionarVacina.php" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Vacina</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="idAnimal" value="<?= $idAnimal; ?>">

                    <select name="idVacina" class="form-select mb-2" required>
                        <option value="">Selecione a vacina</option>
                        <?php
                        $vacinasList = mysqli_query($conn, "SELECT * FROM vacina");
                        while ($vac = mysqli_fetch_assoc($vacinasList)) {
                            echo "<option value='{$vac['idVacina']}'>{$vac['nome']}</option>";
                        }
                        ?>
                    </select>

                    <input type="date" name="data_aplicacao" class="form-control mb-2" required>
                    <input type="date" name="proxima_dose" class="form-control mb-2">
                    <textarea name="observacao" class="form-control" placeholder="Observação"></textarea>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">
                        Salvar
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/js/sidebar.js"></script>

</body>
</html>