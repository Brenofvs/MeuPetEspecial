<?php

use Source\Models\Admin;
use Source\Support\Message;

$message = new Message;
$loginData = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ?? null;

if (!empty($loginData['login']) && !empty($loginData['password'])) {
    $admin = new Admin;
    $admin->login($loginData['login'], $loginData['password']);

    if (is_null($admin->data)) {
        $message->error("Usuário ou senha incorretos");
    }
}

?>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Bem vindo de volta!</h1>
                            <p class="lead">
                                Faça login para proceder!
                            </p>
                            <?= $message->render(); ?>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form name='post' action='./' method='post' enctype='multipart/form-data'>
                                        <div class="mb-3">
                                            <label class="form-label">Login</label>
                                            <input class="form-control form-control-lg" type="text" name="login" placeholder="Insira seu login" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Senha</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Insira sua senha" required />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button class="btn btn-lg btn-primary" id="button">Entrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>