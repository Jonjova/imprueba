<div class="fixed-top">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4" id="welcome"> </h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>

    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url() ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Maquina/index') ?>">Maquinas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Tipos/index') ?>">Tipos de maquinas</a>
            </li>

        </ul>
    </nav>
</div>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark movil" >
        <h5 class="text-white h5" id="saludo"></h5>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url() ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Tipos/index') ?>">Maquinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tipos de maquinas</a>
                </li>
            </ul>
        </div>
    </nav>


    <br>
    <main>
        <div class="slider">