<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <h1>Seu Signo</h1>
    <?php
    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");

    $dataNascimento = DateTime::createFromFormat('Y-m-d', $data_nascimento);

    foreach ($signos->signo as $signo) {
        $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
        $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);

        // Ajustar o ano para comparar corretamente
        $dataInicio->setDate($dataNascimento->format('Y'), $dataInicio->format('m'), $dataInicio->format('d'));
        $dataFim->setDate($dataNascimento->format('Y'), $dataFim->format('m'), $dataFim->format('d'));

        if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
            echo "<h2>{$signo->signoNome}</h2>";
            echo "<p>{$signo->descricao}</p>";
            break;
        }
    }
    ?>
    <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
</div>

<?php include('layouts/header.php'); ?
