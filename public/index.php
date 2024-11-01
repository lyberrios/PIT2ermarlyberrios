<?php
session_start(); // Iniciar la sesión para verificar si el usuario ha iniciado sesión
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulcinea | Loja de Cupcakes</title>
    <link rel="icon" href="img/logo-png.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body>

    <header class="header">
        <div class="header__contenedor">
            <div class="header__barra">
                <a href="index.php">
                    <img class="header__logo" src="img/logo-png.png" alt="imagen logo">
                </a>

                <nav class="navegacion">
                    <a class="navegacion__enlace" href="index.php">Inicio</a>
                    <a class="navegacion__enlace" href="nos.html">Dulcinea</a>
                    <a class="navegacion__enlace" href="loja.html">Cardápio</a>
                    <a class="navegacion__enlace" href="contato.html">Contato</a>
                    
                    <!-- Verificar si la sesión está iniciada para mostrar el botón correcto -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="navegacion__enlace" href="logout.php">Logout</a>
                    <?php else: ?>
                        <a class="navegacion__enlace" href="login.php">Login</a>
                    <?php endif; ?>
                </nav>
                
                <div class="submenu">
                    <img src="img/cart.png" id="img-carrito">
                    <div id="carrito">
                        <table id="lista-carrito" class="u-full-width">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Productos del carrito se agregan aquí -->
                            </tbody>
                        </table>
                        <a href="#" id="vaciar-carrito" class="button u-full-width">Excluir do carrinho</a>
                        <button id="continuar-carrito" class="button continuar u-full-width">Confirmar compra</button>
                    </div>
                </div>
            </div><!--.header-barra-->

            <div class="modelo">
                <h1 class="modelo__nombre">Os Melhores Cupcakes do Brasil</h1>
                <p class="modelo__descripcion">Especializada em delícias que combinam sabores autênticos brasileiros com a delicadeza dos cupcakes, essa marca se destaca pela criatividade e qualidade.</p>
                <p class="modelo__precio">Desde R$5</p>
                <a class="modelo__enlace" href="produto.html">Ver Produtos</a>
            </div>
        </div>

        <img class="header__cupcake" src="img/cupcake1.webp" alt="imagem header cupcake">
    </header>


    <main class="productos productos__contenedor">
        <h2 class="productos__heading">Cardápio</h2>

        <div  id="lista-cupcakes" class="productos__grid">

            <div id="cuapcake" class="producto">
                <img class="producto__imagen original-img" src="img/cupcake01.png" alt="imagem cupcake">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Canelita</h3>
                    <p class="producto__descripcion">Decorado com um glacê de creme de canela e polvilhado com um pouco de cacau em pó, cada mordida é uma explosão de sabores que te transporta a um momento doce e acolhedor.</p>
                    <p class="producto__precio description__price">R$9,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="1">Adicionar</a>
                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake2.png" alt="imagem cupcake cereja">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Cerejinha</h3>
                    <p class="producto__descripcion">Com uma base fofinha e úmida de massa de cereja, cada mordida traz a explosão da fruta fresca e suculenta. Coberto com um generoso fio de calda de chocolate, que derrete na boca e adiciona um toque intenso e doce. </p>
                    <p class="producto__precio">R$10,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="2">Adicionar</a>
                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake3.png" alt="imagem cupcake de chocolate">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Chocolate</h3>
                    <p class="producto__descripcion">Com uma massa rica e fofinha, feita com cacau de alta qualidade, cada mordida é uma explosão de sabor intenso e profundo.  Coberto com um irresistível glacê de chocolate cremoso. </p>
                    <p class="producto__precio">R$7,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="3">Adicionar</a>
                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake4.png" alt="imagem red velvet">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">RED VELVET</h3>
                    <p class="producto__descripcion">Com sua icônica cor vermelha vibrante, ele é sinônimo de elegância e sofisticação. A massa é macia e aveludada, com um sabor delicado de chocolate que combina perfeitamente com o toque ácido do buttermilk.</p>
                    <p class="producto__precio">R$12,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="4">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake5.png" alt="imagem cenoura cupcake">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Cenoura</h3>
                    <p class="producto__descripcion">Coberto com um cremoso glacê de cream cheese, que equilibra perfeitamente a doçura do cupcake, cada mordida é uma explosão de sabor e textura.</p>
                    <p class="producto__precio">R$7,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="5">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake6.png" alt="imagem oreo cupcake">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Oreo</h3>
                    <p class="producto__descripcion">Com uma base de massa de chocolate super fofinha, cada mordida revela pedaços crocantes de Oreo, que adicionam uma textura irresistível.</p>
                    <p class="producto__precio">R$7,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="6">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake7.png" alt="imagem amendoin cupcake">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Amendoin</h3>
                    <p class="producto__descripcion">Coberto com um cremoso glacê de amendoim, que complementa perfeitamente a base, o cupcake é decorado com pedacinhos de amendoim crocante, adicionando uma textura extra e um toque especial.</p>
                    <p class="producto__precio">R$7,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="7">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake8.png" alt="imagem arco-iris">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Arco-iris</h3>
                    <p class="producto__descripcion">Com uma massa colorida e vibrante, cada camada traz uma explosão de sabores que se complementam de forma deliciosa. A textura fofinha e leve faz com que cada mordida seja uma experiência mágica. </p>
                    <p class="producto__precio">R$7,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="8">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake9.png" alt="imagem cupcake olímpico">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Olympics</h3>
                    <p class="producto__descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique vel consequuntur fugit commodi</p>
                    <p class="producto__precio">R$17,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="9">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake10.png" alt="imagen guitarra">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Campbell</h3>
                    <p class="producto__descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique vel consequuntur fugit commodi</p>
                    <p class="producto__precio">R$10,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="10">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake11.png" alt="imagen guitarra">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Inverno</h3>
                    <p class="producto__descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique vel consequuntur fugit commodi</p>
                    <p class="producto__precio">R$12,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="11">Adicionar</a>                </div>
            </div><!--./producto-->

            <div class="producto">
                <img class="producto__imagen" src="img/cupcake12.webp" alt="imagen guitarra">

                <div class="producto__contenido">
                    <h3 class="producto__nombre">Azulejo</h3>
                    <p class="producto__descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique vel consequuntur fugit commodi</p>
                    <p class="producto__precio">R$5,00</p>
                    <a class="producto__enlace agregar-carrito" href="#" data-i="12">Adicionar</a>                </div>
            </div><!--./producto-->


        </div><!--./productos__grid-->
    </main>

    <section class="cursos">
        <div class="cursos__contenedor cursos__grid">
            <div class="cursos__contenido">
                <h2 class="cursos__heading">Delivery para toda a cidade</h2>
                <p class="cursos__texto">Se orgulhe de suas raízes, se orgulhe de sua terra, se orgulhe de sua família e da sua cultura. Essa é nossa maior inspiração!</p>
                <a class="cursos__enlace" href="#">Mais informação</a>
            </div>
        </div>
    </section>

    <section class="footer__top">
        <h2 class="productos__heading">Nossas redes</h2>
            <ul class="footer__social">
                <li class="social__item">
                    <a href="https://www.facebook.com" class="social__link">
                        <i class="fa-brands fa-facebook social__img"></i>
                    </a>
                </li>

                <li class="social__item">
                    <a href="https://www.ifood.com" class="social__link">
                        <i class="fa-solid fa-heart social__img"></i>
                    </a>
                </li>

                <li class="social__item">
                    <a href="#" class="social__link">
                        <i class="fa-solid fa-mug-saucer social__img"></i>
                    </a>
                </li>

                <li class="social__item">
                    <a href="#" class="social__link">
                        <i class="fa-solid fa-x social__img"></i>
                    </a>
                </li>

                <li class="social__item">
                    <a href="https://www.instagram.com/" class="social__link">
                        <i class="fa-brands fa-instagram social__img"></i>
                    </a>
                </li>

                <li class="social__item">
                    <a href="https://www.tiktok.com/" class="social__link">
                        <i class="fa-brands fa-tiktok social__img"></i>
                    </a>
                </li>

            </ul>
        </section>

    <footer class="footer">
        <div class="footer__contenedor footer__contenido">
            <nav class="footer__nav">
                <a class="footer__enlace" href="index.html">Inicio</a>
                <a class="footer__enlace" href="nosotros.html">Dulcinea</a>
                <a class="footer__enlace" href="tienda.html">Cardápio</a>
                <a class="footer__enlace" href="contato.html">Contato</a>
                <a class="footer__enlace" href="login.html">Login</a>
            </nav>

            <p class="footer__copyright">&copy;Todos os direitos reservados 2024</p>
        </div>
    </footer>
    <script src="js/app.js"></script>
    <script src="js/hover-carrito.js"></script>
</body>
</html>