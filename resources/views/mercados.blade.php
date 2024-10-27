<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Exemplo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Importação do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scriptsprodutos.js') }}"></script>



    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">


</head>

<body>

     <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="images/logo_cb.png" alt="Logo" class="logo-image">
        </a>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('mercados') }}">Mercados</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="{{ route('produtos') }}">
                            Produtos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('cadastro_produto') }}">Cadastrar Produto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Conta -->
            <a href="{{ route('register') }}" class="navbar-brand ms-auto">
                <img src="{{ asset('images/conta_tcc.png') }}" alt="Conta" class="conta-image">
            </a>

        </div>
    </nav>

    <!-- Market Listings -->
    <div class="container mt-5">
        <h2 class="text-start mb-4">Mercados Cadastrados</h2>

        <!-- First Row -->
        <div class="row g-4">
            <div class="col-lg-6 col-md-12">
                <div class="market-card d-flex flex-column flex-lg-row bg-light shadow-sm rounded overflow-hidden">
                    <div class="market-image">
                        <a href="{{ url('/mercado1') }}">
                            <img src="{{ asset('images/mercado_tcc.png') }}" alt="Mercado 1" class="img-fluid">
                        </a>

                    </div>
                    <div class="market-details p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4> Mercado Noemia</h4>
                            <p>Rua: Antônio Dias de Moura<br> Número: 600<br> Bairro: Vila Seabra</p>
                        </div>
                        <form action="{{ route('avaliacao_mercados') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_mercado" value="1"> <!-- ID do mercado -->
                            <input type="hidden" name="avaliacao_mercado" id="avaliacao_mercado1" value="0">
                            <div class="avaliacaoMercado1">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search">Registrar</i><br>
                            </button>
                        </form>

                        @php
                        // Contando as avaliações
                        $media = App\Models\AvaliacaoMercados::where('id_mercado', 1) // ID do mercado
                        ->avg('avaliacao_mercado');
                        $mediaFormatada = number_format($media, 2, ',', '.');
                        @endphp
                        <h6 class="mt-4">Media das Avaliações:</h6>
                        <p class="text-success"><strong>{{ $mediaFormatada }}</strong></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="market-card d-flex flex-column flex-lg-row bg-light shadow-sm rounded overflow-hidden">
                    <div class="market-image">
                        <a href="{{ url('/mercado2') }}">
                            <img src="{{ asset('images/mercado2_tcc.png') }}" alt="Mercado 2" class="img-fluid">
                        </a>
                    </div>
                    <div class="market-details p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4>Mercado Tietê</h4>
                            <p>Rua: Francisco Antônio Meira<br> Número: 700<br> Bairro: Jardim Maia</p>
                        </div>
                        <form action="{{ route('avaliacao_mercados') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_mercado" value="2"> <!-- ID do mercado -->
                            <input type="hidden" name="avaliacao_mercado" id="avaliacao_mercado2" value="0">
                            <div class="avaliacaoMercado2">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search">Registrar</i><br>
                            </button>
                        </form>

                        @php
                        // Contando as avaliações
                        $media = App\Models\AvaliacaoMercados::where('id_mercado', 2) // ID do mercado
                        ->avg('avaliacao_mercado');
                        $mediaFormatada = number_format($media, 2, ',', '.');
                        @endphp
                        <h6 class="mt-4">Media das Avaliações:</h6>
                        <p class="text-success"><strong>{{ $mediaFormatada }}</strong></p>

                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="row g-4 mt-4">
            <div class="col-lg-6 col-md-12">
                <div class="market-card d-flex flex-column flex-lg-row bg-light shadow-sm rounded overflow-hidden">
                    <div class="market-image">
                        <a href="{{ url('/mercado3') }}">
                            <img src="{{ asset('images/mercado3_tcc.png') }}" alt="Mercado 3" class="img-fluid">
                        </a>
                    </div>
                    <div class="market-details p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4>Mercado Economix</h4>
                            <p>Rua: Antônio Dias de Moura<br> Número: 469<br> Bairro: Jardim Maia</p>
                        </div>
                        <form action="{{ route('avaliacao_mercados') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_mercado" value="3"> <!-- ID do mercado -->
                            <input type="hidden" name="avaliacao_mercado" id="avaliacao_mercado3" value="0">
                            <div class="avaliacaoMercado3">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search">Registrar</i><br>
                            </button>
                        </form>

                        @php
                        // Contando as avaliações
                        $media = App\Models\AvaliacaoMercados::where('id_mercado', 3) // ID do mercado
                        ->avg('avaliacao_mercado');
                        $mediaFormatada = number_format($media, 2, ',', '.');
                        @endphp
                        <h6 class="mt-4">Media das Avaliações:</h6>
                        <p class="text-success"><strong>{{ $mediaFormatada }}</strong></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="market-card d-flex flex-column flex-lg-row bg-light shadow-sm rounded overflow-hidden">
                    <div class="market-image">
                        <a href="{{ url('/mercado4') }}">
                            <img src="{{ asset('images/mercado4_tcc.png') }}" alt="Mercado 4" class="img-fluid">
                        </a>
                    </div>
                    <div class="market-details p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4>Mercado Atacadinho</h4>
                            <p>Rua: Salsa Parrilha<br> Número: 485<br> Bairro: Jardim Noemia</p>
                        </div>
                        <form action="{{ route('avaliacao_mercados') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_mercado" value="4"> <!-- ID do mercado -->
                            <input type="hidden" name="avaliacao_mercado" id="avaliacao_mercado4" value="0">
                            <div class="avaliacaoMercado4">
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search">Registrar</i><br>
                            </button>
                        </form>

                        @php
                        // Contando as avaliações
                        $media = App\Models\AvaliacaoMercados::where('id_mercado', 4) // ID do mercado
                        ->avg('avaliacao_mercado');
                        $mediaFormatada = number_format($media, 2, ',', '.');
                        @endphp
                        <h6 class="mt-4">Media das Avaliações:</h6>
                        <p class="text-success"><strong>{{ $mediaFormatada }}</strong></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <footer class="bg-dark text-light pt-5 pb-4" style="font-family: 'Montserrat', sans-serif;">
    <div class="container">
        <div class="row text-center text-md-start justify-content-center">
            <!-- Logo -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex justify-content-center align-items-center">
    <img src="images/logo_cb.png" alt="Logo" class="img-fluid footer-logo">
</div>


            <!-- Sobre Nós -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Sobre Nós</h5>
                <p class="text-center text-md-start">Nosso compromisso é comparar e oferecer as melhores opções de produtos, unindo qualidade e preços acessíveis para ajudar você a fazer a melhor escolha.</p>
            </div>

            <!-- Links do Site -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Links do Site</h5>
                <ul class="list-unstyled text-center text-md-start">
                    <li><a href="{{ route('home') }}" class="text-light">Início</a></li>
                    <li><a href="{{ route('mercados') }}" class="text-light">Mercados</a></li>
                    <li><a href="{{ route('produtos') }}" class="text-light">Produtos</a></li>
                    <li><a href="{{ route('cadastro_produto') }}" class="text-light">Cadastrar Produto</a></li>
                </ul>
            </div>

            <!-- Contato -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Contato</h5>
                <div class="contact-info d-flex align-items-center">
                    <i class="fas fa-envelope me-2"></i>
                    <span>cbcompare.bem@gmail.com</span>
                </div>
            </div>

            <!-- Redes Sociais -->
            <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex flex-column align-items-center align-items-md-start">
                <h5 class="footer-title text-uppercase text-primary">Siga-nos</h5>
                <div class="social-icons d-flex align-items-center">
                    <a href="https://www.instagram.com/cbcompare.bem/" class="text-light">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="bg-light">

        <div class="row text-center text-md-start">
            <div class="col-12 col-md-8 mb-2 mb-md-0">
                <p>© 2024 <span class="text-primary fw-bold">Compare Bem</span></p>
            </div>
            <div class="col-12 col-md-4 text-center text-md-end">
                <p>Desenvolvido por <span class="text-primary fw-bold">Jobson, Samuel, João Vitor e Raphaela</span></p>
            </div>
        </div>
    </div>
</footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6p3dF8jZ8mDdpeDWjOU4n3dD3/21zWcJwFzY5MzAE+8n/Y1cnh8TwJXVzV1J7fgF" crossorigin="anonymous"></script>

</body>

</html>