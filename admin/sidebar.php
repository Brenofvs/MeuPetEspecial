<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Meu Pet Especial</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Páginas
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?page=dashboard">
                            <i class="align-middle"></i> <span class="align-middle">DashBoard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?page=post">
                            <i class="align-middle"></i> <span class="align-middle">Cadastrar Matéria</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?page=edit">
                            <i class="align-middle"></i> <span class="align-middle">Editar Matéria</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="?page=delete">
                            <i class="align-middle"></i> <span class="align-middle">Excluir Matéria</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">Opções</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="?page=logout"><i class="align-middle me-2" data-feather="delete"></i>Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <script src="js/app.js"></script>

            <script>
                let lis = document.querySelectorAll("li.sidebar-item a");

                function ativarLink(link) {
                    const url = location.href;
                    const href = link.href;

                    if (url.includes(href)) {
                        link.parentElement.classList.add("active");
                    }
                }

                lis.forEach(ativarLink);
            </script>