<body>
    <main class="d-flex w-100">
        <div class="container-fluid d-flex flex-column">
            <div class="row">
                <div class="col-sm-12 col-md-11 col-lg-10 mx-auto d-table h-100">
                    <div class="d-table-cell align-top">

                        <div class="text-center mt-4">
                            <div class="d-flex mb-4 justify-content-between">
                                <h1 class="h2">Editar matéria!</h1>
                                <a href='?page=materias' class='btn btn-primary d-inline-flex justify-content-center align-items-center fs-5'><i class='align-middle me-2' data-feather='arrow-left-circle'></i>Voltar</a>
                            </div>
                            <?= $message->render(); ?>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="m-sm-4">
                                    <form name='post' action='./?page=edit&postId=<?= $postUpdt->id ?>' method='post' enctype='multipart/form-data'>
                                        <div class="mb-3">
                                            <label class="form-label">Titulo</label>
                                            <input class="form-control form-control-lg" name='title' value='' placeholder='<?= $postUpdt->title ?>' />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Texto da Matéria</label>
                                            <textarea rows="10" class="form-control form-control-lg" name='body' value='' placeholder='<?= $postUpdt->body ?>'></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-12">Carregue a imagem de capa!</label>
                                            <input id="img-input" class="pl-4 form-control-file" type='file' name='file'>
                                            <div id="img-container">
                                                <img id="preview" class="img-fluid mt-4" src=".<?= $postUpdt->image ?>">
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button style="width: 60%; font-size: 20px;" class="btn btn-lg btn-block btn-primary" id="button">Enviar</button>
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

    <script src="../js/app.js"></script>
    <script>
        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("img-input").addEventListener("change", readImage, false);
    </script>

</body>

</html>