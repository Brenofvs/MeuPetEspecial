<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2 text-light">Criar nova matéria!</h1>
                            <?= $message->render(); ?>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form name='post' action='./?page=post' method='post' enctype='multipart/form-data'>
                                        <div class="mb-3">
                                            <label class="form-label">Titulo</label>
                                            <input class="form-control form-control-lg" name='title' value='' placeholder='Insira o titulo' required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Texto da Matéria</label>
                                            <textarea class="form-control form-control-lg" name='body' value='' placeholder='Comece a escrever!' required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Carregue a imagem de capa!</label>
                                            <input class="form-control form-control-lg" type='text' name='image' value='' placeholder='imagem' required>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button class="btn btn-lg btn-primary" id="button">Enviar</button>
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