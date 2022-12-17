<style>
    input,
    textarea {
        color: black !important;
    }
</style>

<body>
    <main class="d-flex w-100">
        <div class="container-fluid d-flex flex-column">
            <div class="row">
                <div class="col-sm-12 col-md-11 col-lg-10 mx-auto d-table h-100">
                    <div class="d-table-cell align-top">

                        <div class="text-center mt-4">
                            <div class="d-flex mb-4 justify-content-between">
                                <h1 class="h2">Excluir matéria!</h1>
                                <a href='?page=materias' class='btn btn-primary d-inline-flex justify-content-center align-items-center fs-5'><i class='align-middle me-2' data-feather='arrow-left-circle'></i>Voltar</a>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body ">
                                <div class="m-sm-4">
                                    <form name='post' action='./?page=delete&postId=<?= $postDel->id ?>&delete=true' method='post' enctype='multipart/form-data'>
                                        <div class="mb-3">
                                            <label class="form-label">Titulo</label>
                                            <input class="form-control form-control-lg" name='title' value='' placeholder='<?= $postDel->title ?>' disabled />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Texto da Matéria</label>
                                            <textarea rows="10" class="form-control form-control-lg text-dark" name='body' value='' placeholder='<?= $postDel->body ?>' disabled></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-12 m-0">Imagem de capa!</label>
                                            <div id="img-container">
                                                <img id="preview" class="img-fluid mt-2" src=".<?= $postDel->image ?>">
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button style="width: 60%; font-size: 20px;" class="btn btn-lg btn-block btn-danger" id="button"><i class='align-middle me-2' data-feather='trash-2'></i>Deletar</button>
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

</body>

</html>