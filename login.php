<!doctype html>
<html>
    <head>
        <title>Maquina Virtual - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./assets/image/docker-icon-512x438-ga1hb37h.png"
        type="image/x-icon">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: arial;
                box-sizing: border-box;
            }
            h1 {
                font-size: 4em;
                margin: .5em 0;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            body form {
                width: 350px;
            }
            /* body form > * {
                display: block;
                width: 100%;
                border-radius: 5px;
                padding: 10px;
                margin: 5px 0;
            }
            button[type="submit"] {
                font-weight: bold;
                font-size: 18px;
            } */
        </style>
        
        <script>
            window.addEventListener('load', () => {
                let param = decodeURIComponent(location.search.slice(1)) 
                if ( param ) { 
                    let message = param.split("&")[1] 
                    document.querySelector('#warnings').innerHTML = `  
                        <div>${message.split("=")[1]}!</div>
                    `
                    setTimeout(() => {
                        history.pushState({}, 'Login', location.pathname)
                        document.querySelector('#warnings').innerText = ''
                    }, 2500)          
                } 
            }) 
        </script>
    </head>
    <body class="container text-center p-3">
        <div>
            <h1>Login</h1>
            
            <p id="warnings" style="color: red;"></p>
            
            <form action="./verifyLogin.php" method="POST" class="p-3">
                <input type="text" class="form-control form-control-lg" placeholder="Email" name="email">
                <input type="password" class="form-control form-control-lg my-3" placeholder="Password" name="password">
                <button type="submit" class="btn btn-primary btn-lg w-100">Entrar</button>
            </form>
            <br />
            <br />
        </div>
    </body>
</html>
