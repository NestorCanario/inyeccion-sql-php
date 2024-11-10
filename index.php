<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Maquina Virtual - PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <!--  <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script> -->
    <script src="./assets/js/jquery-3.3.1.slim.min.js"></script>
    <link rel="shortcut icon" href="./assets/image/docker-icon-512x438-ga1hb37h.png"
        type="image/x-icon">
    <script src="./assets/js/lottie.min.js"></script>
</head>

<body class="min-vh-100">
    <div onclick="closePopup()" id="popup_effect_for_credentials">
        <!-- popup -->
    </div> 

    <div class="container mt-3 d-flex align-items-center justify-content-between">
        <h1 class="display-4 my-2">Bienvenido <b style="color: #055160;">Admin</b>.</h1> 
        <div style="width: 43px;height: 43px;border-radius: 50%;background: rgba(225,225,225,.5);display: flex;align-items:center;justify-content: center;">
            <a class="d-flex align-items-center justify-content-center" href="./session_destroy.php">
                <image src="./assets/image/2185-logout.svg" style="width: 60%;cursor: pointer;" title="logout" />
            </a>
        </div>
    </div>

    <div class="container" id="soporte" style="display: none;">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>¡Recuerda!</strong> Ofrecemos soporte 24/7.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="container mt-3">
        <div class="alert alert-info wrapper" role="alert">
            <h4 class="alert-heading">Aviso importante!</h4>
            <p class="lead">No tenemos opciones de recuperación de contraseña. Como cliente nuestro, te estaremos
                mostrando tus
                credenciales aleatoriamente un día del mes, como hoy. Puedes tambien contactarnos a :
                <a href="" class="text-decoration-none"> <small>+1 800 XXX XXXX</small> </a>.
            </p>
            <small>Mediantes cookies, la cuenta se mantendrá con la sesión activa.</small>
            <hr>
            <p class="mb-0">
                <a class="btn-link text-primary">
                    Más información
                </a>
            </p>
        </div>

        <div class="accordion accordion mt-3 wrapper" id="accordionExample"
            onclick="popup_effect_for_credentials.classList.add('show-effect-opacity');posicionarScrollY()"
            style="position: relative;z-index: 100;" tabindex="0">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button id="accordion_button" class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                        aria-controls="collapseOne" style="color: #055160;">
                        <b>Mis credenciales</b>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <p style="color: #055160;">La siguiente información le permite ver sus credenciales, tanto web
                            como la
                            credencial de la maquina virtual en la que corre esta app. Haga click en la parte de
                            contraseña oculta para verla visiblemente.</p>

                        <strong>Credenciales Web.</strong>

                        <div class="alert alert-light d-flex align-items-center my-1 bg-white p-0 border-0"
                            role="alert">
                            <svg style="width: 30px;" xmlns="http://www.w3.org/2000/svg"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div class="d-flex align-items-center">
                                <span class="mx-2 text-decoration-underline font-monospace"
                                    style="color: #055160;">admin_01@gmail.com</span>
                                <span class="mx-1">:</span>
                                <span class="btn borderm text-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Haga click aquí para ver la contraseña." id="liveToastBtn"
                                    style="padding-top:9px">******</span>
                            </div>
                        </div>

                        <!--  -->
                        <hr>
                        <strong>Credenciales SSH.</strong>

                        <div class="alert alert-light d-flex align-items-center my-1 bg-white p-0 border-0"
                            role="alert">
                            <svg style="width: 30px;" xmlns="http://www.w3.org/2000/svg"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div class="d-flex align-items-center">
                                <span class="mx-2 text-decoration-underline font-monospace"
                                    style="color: #055160;">root</span>
                                <span class="mx-1">:</span>
                                <span class="btn borderm text-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Haga click aquí para ver la contraseña." id="liveToastBtn1"
                                    style="padding-top:9px">******</span>
                            </div>
                        </div>
                        <div class="d-block mt-2 mx-1 bg-light" style="font-size: 13px;">
                            <p class="p-2 rounded"> <b>WORKDIR</b> <i>/usr/src/myapp</i> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 wrapper">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <img src="./assets/image/PayPal_Logo_Icon_2014.svg"
                        style="width: 20px;" alt="">
                    <span class="mx-2 fw-bold" style="color: #055160;">
                        Ayudanos a crecer
                    </span>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-secondary">Ayudanos con una donación.</h5>
                        <p class="card-text fw-lighter">Eso nos hará ofrecerte lo mejor de nosotros y nuestros
                            conocimientos.</p>
                        <div class="d-flex align-items-center">
                            <span class="p-2">$</span>
                            <input type="number" class="fw-lighter form-control w-25 border-primary p-2"
                                style="text-align: center;color: #0d6efd;font-size: 26px" min="5.00" value="5.00"
                                autofocus step="5.10" onchange="resetValuePaypalme(this)" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Introduzca aquí la cantidad que desea donar." />
                            <a id="link_paypal_me" onclick="ani()" class="btn-paypal border-primary btn d-flex align-items-center text-primary px-3 mx-3 text-primary fw-bold"
                                style="padding: 6px;">
                                <div id="icon_paypal" style="width: 45px;"></div>     
                                Realizar donación
                                <span class="mx-2"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./assets/image/key.png" style="width: 20px;"
                    class="rounded me-2" alt="...">
                <strong class="me-auto">Password Web</strong>
                <small>Autorizado</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body d-flex justify-content-between align-items-center">
                <input type="text" value="<?php echo base64_encode('abc123zxy');?>" class="border-0 text-primary text-center fw-bold outline-none d-inline" readonly style="color:#055160;background: transparent;max-width: 150px;" id="passwd1"> 
                <span class="btn border border-light text-secondary position-relative" onclick="Copy('passwd1', 'lottieCheck1')">
                    <small
                        class="d-flex align-items-center text-success bg-white p-1 px-3 fw-bold position-absolute rounded"
                        style="top: -100px;right: -22%;opacity: 0;">
                        <span id="lottieCheck1" style="width: 33px;position: relative;z-index: 10;"></span>
                        <span class="mx-2">Copiado</span>
                    </small>
                    Copy
                </span>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
        <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./assets/image/key.png" style="width: 20px;"
                    class="rounded me-2" alt="...">
                <strong class="me-auto">Password SSH</strong>
                <small>Autorizado</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body d-flex justify-content-between align-items-center">
                <input type="text" value="<?php echo base64_encode('abc123zxy');?>" class="border-0 text-primary text-center fw-bold outline-none d-inline" readonly style="color:#055160;background: transparent;max-width: 150px;" id="passwd2"> 
                <span class="btn border border-light text-secondary position-relative" onclick="Copy('passwd2', 'lottieCheck2')">
                    <small
                        class="d-flex align-items-center text-success bg-white p-1 px-3 fw-bold position-absolute rounded"
                        style="top: -100px;right: -22%;opacity: 0;">
                        <span id="lottieCheck2" style="width: 33px;position: relative;z-index: 10;"></span>
                        <span class="mx-2">Copiado</span>
                    </small>
                    Copy
                </span>
            </div>
        </div>
    </div>

    <div class="container mt-1">
        <p class="text-secondary text-center p-3">
            <small>
                Esta es una página ficticia para afrontar el desafío de realizar <b>inyección SQL</b> y hackear la
                máquina virtual a través de <b>SSH</b>.
            </small>
        </p>
    </div>

    <script>
        let IconAnimatedLottie = (idTag, urlJson) => {
            return lottie.loadAnimation({
                container: document.getElementById(idTag),
                renderer: 'svg',
                loop: false,
                autoplay: false,
                path: urlJson //'./icon-check.json' 
            });
        }   
        
        let iconPaypal = IconAnimatedLottie('icon_paypal', './assets/json/investment.json')
        iconPaypal.pause()
     
        let ani = () => {
            iconPaypal.play()
            iconPaypal.onComplete = () => {
                iconPaypal.stop() 
                window.open("https://www.paypal.com/paypalme/LuisCanarioDO/5", "_blank");
            }
        }
     
        // tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // Toast
        const toastTrigger = document.querySelector('#liveToastBtn')
        const toastLiveExample = document.querySelector('#liveToast')

        const toastTrigger2 = document.querySelector('#liveToastBtn1')
        const toastLiveExample2 = document.querySelector('#liveToast1')

        if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                popup_effect_for_credentials.classList.toggle('show-effect-opacity')
                document.querySelectorAll('.toast').forEach((e) => {
                    e.classList.remove('show')
                })
                setTimeout(() => {
                    toastBootstrap.show()
                }, 300)
            })
        }
        if (toastTrigger2) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample2)
            toastTrigger2.addEventListener('click', () => {
                popup_effect_for_credentials.classList.toggle('show-effect-opacity')
                document.querySelectorAll('.toast').forEach((e) => {
                    e.classList.remove('show')
                })
                setTimeout(() => {
                    toastBootstrap.show()
                }, 300)
            })
        }

        const Copy = async (id, idIconCheck) => {
            let messageCopy = event.target.querySelectorAll('small')[0]
            let inputPasswd = document.getElementById(id)

            if ('clipboard' in navigator) {
                let copyCheck = IconAnimatedLottie(idIconCheck, './assets/json/icon-check.json')
                await navigator.clipboard.writeText(inputPasswd.innerText);
                messageCopy.style.opacity = '1'
                copyCheck.play()
                setTimeout(() => {
                    messageCopy.style.opacity = '0'
                    copyCheck.stop()
                    copyCheck.destroy()
                }, 1500)
            } else {
                let copyCheck = IconAnimatedLottie(idIconCheck, './assets/json/icon-check.json')
                console.log('Clipboard API is not supported!');
                inputPasswd.focus()
                inputPasswd.select()
                document.execCommand("copy")

                messageCopy.style.opacity = '1'
                copyCheck.play()
                setTimeout(() => {
                    messageCopy.style.opacity = '0'
                    copyCheck.stop()
                    copyCheck.destroy()
                }, 1500)
            }
        }

        const resetValuePaypalme = (e) => {
            let inputMoney = document.querySelector('#link_paypal_me')
            inputMoney.href = `https://www.paypal.com/paypalme/LuisCanarioDO/${e.value}`
        }

        const closePopup = () => {
            popup_effect_for_credentials.classList.toggle('show-effect-opacity')
            $('#collapseOne').collapse('hide')
            //window.scrollTo(0, 0)
        }

        const posicionarScrollY = () => {
            setTimeout(() => {
                window.scrollTo(0, innerHeight / 1.36)
            }, 500)
        }

        let timeW = Math.floor(Math.random() * (30000 - 1 + 1) + 1)
        setTimeout(() => {
            soporte.style.display = 'block'
        }, timeW) 
    </script>

    <style>
        *::-webkit-scrollbar {
            overflow: scroll;
            background: rgb(241, 236, 236);
            width: 5px;
        }

        *::-webkit-scrollbar-thumb {
            background: #055160;
            filter: drop-shadow(0 0 0.75rem crimson);
            cursor: move;

        }

        input.outline-none {
            outline: 0;
        }

        .custom-tooltip {
            --bs-tooltip-bg: red;
            --bs-tooltip-color: var(--bs-white);
            z-index: 0 !important;
            position: relative;
        }

        #popup_effect_for_credentials {
            position: fixed;
            top: 0 !important;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* scale: 0; */
            backdrop-filter: blur(0px);
            transition: 700ms;
            transition-delay: 300ms;
        }

        #popup_effect_for_credentials.show-effect-opacity {
            transition-delay: 0ms;
            z-index: 50;
            background: rgba(0, 0, 0, .4);
            width: 100%;
            /* height: 100%; */
            backdrop-filter: blur(10px);
            scale: 1;
        }
    </style>


</body>

</html>
