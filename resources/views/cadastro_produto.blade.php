<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Valor do Produto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scriptsprodutos.js') }}"></script>
    <style>
        /* Font and color adjustments */


        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            background-image: url('images/banner3.png');
        }

        /* Modern navbar style */
        .navbar {
            background-color: #007bff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .logo-image {
            height: 125px;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #e6e6e6 !important;
        }

        /* Stylish form card */
        .form-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-label {
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #d1d3e2;
            height: 40px;
            box-shadow: none;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        /* Buttons styling */
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-info {
            background-color: #6c757d;
            /* Cor cinza do Bootstrap */
            color: white;
            /* Cor do texto */
            border: none;
            /* Remover borda */
        }

        .btn-info:hover {
            background-color: #5a6268;
            /* Cor ao passar o mouse */
        }


        /* Icon styling */
        .input-group-text {
            transition: background-color 0.3s, color 0.3s;
            background-color: #007bff;
            color: white;
            border: none;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .tooltip.custom-tooltip {
            background-color: #6c757d;
            /* Cor do tooltip */
            color: #fff;
            /* Cor do texto */  
            border-radius: 5px;
            padding: 5px;
            /* Adiciona um pouco de preenchimento */
        }

        .tooltip-inner {
            background-color: #6c757d !important;
            /* Cor do fundo do tooltip */
            color: #fff !important;
            /* Cor do texto */
        }



        .form-control:focus~.input-group-text {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="images/logo_cb.png" alt="Logo" class="logo-image">
            </a>

            <!-- Botão do Menu Colapsável -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links do Menu (Colapsáveis) -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('mercados') }}">Mercados</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="{{ route('produtos') }}">
                            Produtos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('cadastro_produto') }}">Cadastrar Produto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Ícone da Conta -->
            <a href="{{ route('register') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/conta_tcc.png') }}" alt="Conta" class="conta-image">
            </a>
        </div>
    </nav>

    <!-- Form Card -->
    <div class="container d-flex justify-content-center pt-5" style="min-height: 50vh;">
        <div class="form-card mt-5">
            <h2 class="text-start mb-4 text-primary">Cadastre o Valor do Produto</h2>

            <form method="POST" action="{{ route('cadastro_preco') }}">
                @csrf

                <!-- Produto Field -->
                <div class="mb-3">
                    <label for="produto" class="form-label">Produto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                        <input type="text" class="form-control" id="selected-product-name" name="product_name" placeholder="Selecione um produto" readonly>
                        <input type="hidden" id="selected-product-id" name="product_id"> <!-- Campo oculto para o ID do produto -->
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                            Selecionar Produto
                        </button>
                        <button type="button" class="btn btn-info btn-sm custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Selecione o produto que deseja cadastrar e confirme se é realmente o item correto.">
                            <i class="fas fa-info-circle"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <!-- Campo de entrada para escolher o produto -->
                                        <div class="mb-3 position-relative">
                                            <input type="text" id="product-input" class="form-control" placeholder="Digite o nome do produto" onkeyup="filterProducts()" />
                                            <ul id="suggestions" class="list-group" style="display: none; position: absolute; z-index: 1000; width: 100%; max-height: 200px; overflow-y: auto;"></ul>
                                        </div>

                                        <!-- Exibe a imagem selecionada -->
                                        <div id="image-container">
                                            <img id="selected-image" src="" alt="Imagem do Produto Selecionado" style="display:none; max-width: 200px; margin: 0 auto;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mercado Field -->
                <div class="mb-3">
                    <label for="mercado" class="form-label">Mercado</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-store"></i></span>
                        <input type="text" class="form-control" id="selected-market-name" name="market_name" placeholder="Selecione um mercado" readonly>
                        <input type="hidden" id="selected-market-id" name="market_id"> <!-- Campo oculto para o ID do mercado -->
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal1">
                            Selecionar Mercado
                        </button>
                        <button type="button" class="btn btn-info btn-sm custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Selecione o mercado em que este produto está sendo vendido e confirme se é realmente o local correto.">
                            <i class="fas fa-info-circle"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Mercados</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <!-- Select para escolher o mercado -->
                                        <select id="market-select" class="form-select mb-3" onchange="showImageMarket()">
                                            <option value="">Selecione um mercado</option>
                                            <option value="Mercado Noemia" data-id="1" data-image="images/mercado_tcc.png">Mercado Noemia</option>
                                            <option value="Mercado Tietê" data-id="2" data-image="images/mercado2_tcc.png">Mercado Tietê</option>
                                            <option value="Mercado Economix" data-id="3" data-image="images/mercado3_tcc.png">Mercado Economix</option>
                                            <option value="Mercado Atacadinho" data-id="4" data-image="images/mercado4_tcc.png">Mercado Atacadinho</option>
                                        </select>

                                        <!-- Exibe a imagem selecionada -->
                                        <div id="image-container-market">
                                            <img id="selected-image-market" src="" alt="Imagem do Mercado Selecionado" style="display:none; max-width: 200px; margin: 0 auto;">
                                        </div>

                                        <!-- Botão de Seleção -->
                                        <button type="button" class="btn btn-outline-secondary mt-3" onclick="selectMarket()">
                                            Selecionar
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Valor Field -->
                <div class="mb-3">
                    <label for="valor_produto" class="form-label">Valor do Produto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" placeholder="Digite o valor do Produto">
                        <button type="button" class="btn btn-info btn-sm custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Digite exatamente igual o valor do produto conforme está listado no mercado">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer class="bg-dark text-light pt-5 pb-4" style="font-family: 'Montserrat', sans-serif;">
        <div class="container">
            <div class="row align-items-start">
                <!-- Logo -->
                <div class="col-12 col-sm-6 col-md-2 mb-4 d-flex justify-content-center justify-content-md-start">
                    <img src="images/logo_cb.png" alt="Logo" class="img-fluid">
                </div>

                <!-- Sobre Nós -->
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <h5 class="footer-title text-uppercase text-primary">Sobre Nós</h5>
                    <p>Nosso compromisso é comparar e oferecer as melhores opções de produtos, unindo qualidade e preços acessíveis para ajudar você a fazer a melhor escolha.</p>
                </div>

                <!-- Links do Site -->
                <div class="col-12 col-sm-6 col-md-2 mb-4">
                    <h5 class="footer-title text-uppercase text-primary">Links do Site</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-light">Início</a></li>
                        <li><a href="{{ route('mercados') }}" class="text-light">Mercados</a></li>
                        <li><a href="{{ route('produtos') }}" class="text-light">Produtos</a></li>
                        <li><a href="{{ route('cadastro_produto') }}" class="text-light">Cadastrar Produto</a></li>
                    </ul>
                </div>

                <!-- Contato -->
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <h5 class="footer-title text-uppercase text-primary">Contato</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>cbcompare.bem@gmail.com</p>
                </div>

                <!-- Redes Sociais -->
                <div class="col-12 col-sm-6 col-md-2 mb-4">
                    <h5 class="footer-title text-uppercase text-primary">Siga-nos</h5>
                    <a href="https://www.instagram.com/cbcompare.bem/" class="text-light me-2">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>

            <hr class="bg-light">

            <div class="row">
                <div class="col-12 col-md-8 mb-2 mb-md-0">
                    <p>© 2024 <span class="text-primary fw-bold">Compare Bem</span></p>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <p>Desenvolvido por <span class="text-primary fw-bold">Jobson, Samuel, João Vitor e Raphaela</span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('.custom-tooltip'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>

</html>