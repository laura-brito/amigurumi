<?php $currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

function countCartItems()
{
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        return count($_SESSION['cart']);
    }
    return 0;
}

$totalItems = countCartItems();
?>

<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Nana navigation bar">

    <div class="container">
        <a href="<?php echo BASE_URL; ?>home">
            <img src="<?php echo BASE_URL; ?>assets/images/logo.svg" alt="Amigurumi" width="115px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsNana"
            aria-controls="navbarsNana" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsNana">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>home">Início</a>
                </li>
                <li
                    class="nav-item <?php echo ($currentPage == 'shop' || $currentPage == 'shop/product') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>shop">Loja</a>
                </li>
                <li class="nav-item <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>about">Sobre nós</a>
                </li>
                <li class="nav-item <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>contact">Contato</a>
                </li>
            </ul>

            <form class="d-flex search-bar" role="search">
                <!-- <input class="form-control me-2" id="search" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search-heart"></i></button> -->
            </form>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

                <?php if (isset($_SESSION['person'])): ?>
                    <div class="d-flex align-self-center">

                        <div class="dropdown">
                            <a class="dropdown-toggle link-light" style="text-decoration: none;" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">Olá,
                                <strong><?php echo htmlspecialchars($_SESSION['person']['name']) ?></strong>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Meus pedidos</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <li><a class="nav-link pointer" data-bs-toggle="modal" data-bs-target="#loginModal"><img
                                src="<?php echo BASE_URL; ?>assets/images/user.svg"></a>
                    <?php endif; ?>
                </li>
                <li><a class="nav-link position-relative" href="<?php echo BASE_URL; ?>shop/cart"><img
                            src="<?php echo BASE_URL; ?>assets/images/cart.svg">
                        <?php if ($totalItems > 0): ?>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                <?php echo $totalItems; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>