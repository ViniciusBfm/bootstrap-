<?php 
    $pdo=new PDO('mysql:host=localhost;dbname=bootstrap_projeto','root','');
    $sobre = $pdo->prepare("SELECT * FROM  `tb_sobre`");
    $sobre->execute();
    $sobre = $sobre->fetch()['sobre'];
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-primary navbar-fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-4 fw-bold" href="#">BootStrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-medium" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium" href="sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium" href="contato">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="box">
        <section class="banner">
            <div class="overlay d-flex flex-column align-items-center justify-content-center">
                <div class="container text-center">
                    <div class="row">
                        <div class="col text-white">
                            <h2>Aprendendo <span class="text-primary">BootStrap</span></h2>
                            <p class="fs-6">Framework CSS projetado para otimizar o trabalho do desenvolvedor frontend
                                no
                                dia a dia.
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-lg text-white">Conhecer</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cadastro-lead">
            <div class="container">
                <div class="row text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="col-md-6">
                        <h3 class="fs-3">Aprenda a usar o BootStrap!</h3>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="post">
                            <input placeholder="Insira seu email"
                                class="rounded border border-success p-2 border-opacity-50" type="text" name=""
                                id=""><input type="submit" name="acao"
                                class="bg-primary  rounded border border-success p-2 border-opacity-50" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="depoimentos">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h3 class="fs-3">Depoimento</h3>
                        <blockquote>
                            <p class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia
                                auctor nibh et bibendum. Maecenas cursus maximus turpis. Vestibulum et maximus turpis.
                                Maecenas aliquam elit in ante hendrerit pretium. Cras et libero a est volutpat eleifend
                                id et ipsum. Maecenas velit velit, tempor a ex a, vulputate feugiat velit. Vestibulum
                                nisl purus, sodales non imperdiet vel, pretium eget justo."</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
        <div class="">
            <h2 class="fs-3 titulo text-center ">Conheça a tecnologia</h2>
            <div class="container ">
                <div class="row cont text-center">
                    <?php 
                        echo $sobre;
                    ?>
                </div>
            </div>
        </div>
        <div class="equipe bg-primary text-white">
            <h2 class="fs-3 text-center">Equipe</h2>
            <div class="container equipe-container">
                <div class="row">
                    <?php 
                    $selectMembros = $pdo->prepare("SELECT * FROM `tb_equipe`");
                    $selectMembros->execute();
                    $membros = $selectMembros->fetchAll();
                    for($i=0; $i < count($membros); $i++){         
                    ?>
                    <div class="col-md-6">
                        <div
                            class="equipe-single bg-white text-black rounded border border-success p-2 border-opacity-100">
                            <div class="row text-left">
                                <div class="col-md-2">
                                    <div class="user-picture">
                                        <div class="user-picture-child"></div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h3><?=$membros[$i]['nome']?></h3>
                                    <p><?=$membros[$i]['descricao']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="final-site">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 final">
                        <h3 class="fs-3">Fale conosco</h3>
                        <form>
                            <div class=" mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                            </div>
                            <div class="mb-3">
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea name="mensagem" id="mensagem" class="form-control" rows="4"
                                    placeholder="Digite sua mensagem"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    <div class="col-md-6 final">
                        <h3 class="fs-3">Nossos planos</h3>
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Plano Diário </th>
                                    <th scope="col">Plano Semanal</th>
                                    <th scope="col">Plano Mensal</th>
                                    <th scope="col">Plano Anual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>R$ 199,90</td>
                                    <td>R$ 699,90</td>
                                    <td>R$ 1999,90</td>
                                    <td>R$ 2599,90</td>
                                </tr>
                                <tr>
                                    <td>R$ 199,90</td>
                                    <td>R$ 699,90</td>
                                    <td>R$ 1999,90</td>
                                    <td>R$ 2599,90</td>

                                </tr>
                                <tr>
                                    <td>R$ 199,90</td>
                                    <td>R$ 699,90</td>
                                    <td>R$ 1999,90</td>
                                    <td>R$ 2599,90</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="conclusao bg-primary text-center text-white">
        <p>&copy Todos os direitos reservados</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>