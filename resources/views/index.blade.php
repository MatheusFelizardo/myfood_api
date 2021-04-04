<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>myFood - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/home.css">

        <!-- Fontawasome -->
        <script src="https://kit.fontawesome.com/407ada2811.js" crossorigin="anonymous"></script>

    </head>
    <body class="Page_Home">
        
        <div class="Page_Home-Container">
            <div class="Page_Home-LeftWrapper">
                <div class="LeftWrapper_Logo">
                    <img src="img/logo.png" alt="myFood Admin - Logo">
                </div>

                <div class="LeftWrapper_Form">
                    <h2>Bem vindo de volta!!</h2>
                    <form action="" method="POST">
                        <div class="Form_Label User">
                            <p>Usuário</p>
                            <input type="text" name="user">
                        </div>
                        <div class="Form_Label Password">
                            <p>Password</p>
                            <input type="password" name="password">
                        </div>

                        <a class="ForgotPassword" href="#esqueci">Esqueceu a senha?</a>

                        <button type="submit"> <span>Logar-se</span><span><i class="fal fa-long-arrow-right"></i></span></button>
                    </form>

                    <div class="text-divisor"></div>
                    <a class="NewUser" href="#cadastrar">Cadastrar novo usuário.</a>
                </div>
            </div>

            <div class="Page_Home-RightWrapper">
                <div class="RightWrapper_News">
                    <h3>Nova atualização!!</h3>
                    <p>Inserido opção de permissões para usuários master.</p>
                    <a class="RightWrapper_News-Btn" href="#noticia">Ver mais</a>
                </div>

                <div class="RightWrapper_Image">
                    <img src="img/home_img.svg" alt="Homem sentado num chapéu de cozinheiro.">
                </div>
            </div>

        </div>


    </body>
</html>
