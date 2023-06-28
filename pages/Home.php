<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <script type="javascript" src="../js/home.js"></script>
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    <nav>
        <div class="link-background"></div>
        <ul>
            <li>
                <a class="nav_item active">
                    <svg>
                        <use xlink:href="#home">
                    </svg>
                    <span class="link-text">Home</span>
                </a>
            </li>
            <li>
                <a class="nav_item" onclick="">
                    <svg>
                        <use xlink:href="#inbox">
                    </svg>
                    <span class="link-text">Inbox</span>
                </a>
            </li>
            <li>
                <a class="nav_item">
                    <svg>
                        <use xlink:href="#profile">
                    </svg>
                    <span class="link-text"><?php
                                            session_start();
                                            echo  $_SESSION['user'] ?> </span>
                </a>
            </li>
        </ul>
    </nav>
    <svg style=display:none;>
        <symbol version="1.1" id="home" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
            <path fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M31,44.738v-8.52
    c0-1.505-0.69-2.929-1.877-3.87l0,0c-1.826-1.448-4.421-1.448-6.247,0l0,0C21.69,33.288,21,34.712,21,36.218v3.565" />
            <line fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="15" y1="20.223" x2="29" y2="20.223" />
            <path fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M8,19.232
    L24.681,5.466c0.758-0.632,1.869-0.62,2.612,0.03l15.03,13.144C42.754,19.016,43,19.557,43,20.126v22.892
    C43,44.113,42.105,45,41,45h-8.6H31H10c-1.105,0-2-0.887-2-1.982V28.151c0-1.095,0.895-1.982,2-1.982h7" />
        </symbol>
        <symbol version="1.1" id="inbox" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
            <path fill="none" stroke-width="2" stroke-miterlimit="10" d="M45.5,39.5h-40c-1.657,0-3-1.343-3-3V23.55
		c0-0.028,0.022-0.05,0.05-0.05h13.555l0.665,1.989c0.952,3.563,4.29,6.106,8.139,6.115c0.061,0,0.122,0,0.183,0
		c3.849-0.009,7.187-2.552,8.139-6.115l0.665-1.989H47.45c0.028,0,0.05,0.022,0.05,0.05V37.5C47.5,38.605,46.605,39.5,45.5,39.5z" />
            <path fill="none" stroke-width="2" stroke-miterlimit="10" d="M47.5,23.5l-7.109-11.664
		c-0.556-0.835-1.493-1.336-2.496-1.336H12.106c-1.003,0-1.94,0.501-2.496,1.336L2.5,23.5" />
        </symbol>
        <symbol version="1.1" id="profile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
            <line fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="18.5" y1="37" x2="28.5" y2="37" />
            <line fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" x1="14.5" y1="42" x2="21.5" y2="42" />
            <path fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M35.857,27.299
		C32.753,25.216,29.019,24,25,24C14.735,24,6.323,31.931,5.557,42" />
            <path fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M35.857,29.299" />
            <path fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M39.665,30.648" />
            <path fill="none" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M44.443,42
		c-0.269-3.539-1.483-6.815-3.391-9.574" />
            <circle fill="none" stroke="" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" cx="25.5" cy="17" r="9" />
        </symbol>
    </svg>
    <br>
    <div class="ag-format-container">
        <div class="ag-courses_box">
            <?php $cont = 0;
            require '../service/conexao.php';
            $sql = "SELECT * FROM ministerio";
            $result = $conn->query($sql);
            // Loop para exibir cada ministério
            while ($row = $result->fetch_assoc()) {
                $idministerio = $row["idministerio"];
                $titulo = $row["titulo"];
                $descricao = $row["descricao"];
                $cont++;
            ?>
                <div class="ag-courses_item">
                    <a href="#" class="ag-courses-item_link" data-toggle="modal" data-toggle="modal" data-target="#exampleModal<?= ($cont); ?>">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title"><?php echo $titulo; ?></div>
                        <div class="ag-courses-item_date-box"><?php echo $descricao; ?></div>
                    </a>
             
                </div>

                <div class="modal fade bd-example-modal-lg" id="exampleModal<?= ($cont); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <span class="modal-close">&times;</span>
                            <center>
                                <h2><?php echo $titulo; ?></h2>
                            </center>
                            <form>
                            <div class="form-group d-none">
                                    <label for="assunto">Assunto:</label>
                                    <input type="text" id="idministerio" name="idministerio" value="<?php echo $idministerio; ?>" placeholder="Digite o assunto">
                                </div>
                                <div class="form-group">
                                    <label for="assunto">Assunto:</label>
                                    <input type="text" id="assunto" name="assunto"  placeholder="Digite o assunto">
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Mensagem:</label>
                                    <textarea id="mensagem" name="mensagem" rows="4" placeholder="Digite a mensagem"></textarea>
                                </div>
                                <div class="container">
                                    <button id="button"></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        let links = document.querySelectorAll('.nav_item');
        let background = document.querySelector('.link-background')


        const clickHandler = (el) => {
            links.forEach(link => {
                link.classList.remove('active');
            })
            el.classList.add('active');
        }
        links.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                // Update background position
                background.style.transform = `translateX(${128.25 * index}%)`
                clickHandler(e.currentTarget);

            });
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>