<!DOCTYPE html>
<html lang="en">
<?php
include('includes/head.php');
?>

<head>
    <style>
        #piezas {
            width: auto;
            display: flex;
            flex-wrap: nowrap;
        }

        #puzzle {
            width: 120px;
            height: 120px;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
        }

        .pieza {
            width: 40px;
            height: 40px;
            background-size: 40px 40px;
            margin: auto;
        }

        .placeholder {
            background-color: #F2F2F2;
            outline: 1px solid #333;
            width: 40px;
            height: 40px;
            transition: 1s;
        }

        .placeholder.hover {
            background-color: orange;
        }

        .placeholder .pieza {
            margin: 0;
        }
    </style>
</head>

<p class="text-white text-center mt-3 fs-3 fw-bold">Réaliser le captcha</p>
<div id="puzzle"></div>
<p class="text-white text-center mt-2">Mettre l'image au bon endroit</p>
<div class="d-flex justify-content-center mt-2 border">
    <div id="piezas"></div>
</div>

<script>
    const imagenes = [
        'capt-0', 'capt-1', 'capt-2',
        'capt-3', 'capt-4', 'capt-5',
        'capt-6', 'capt-7', 'capt-8'
    ];

    const puzzle = document.getElementById('puzzle');
    const piezas = document.getElementById('piezas');

    let terminado = imagenes.length;

    while (imagenes.length) {
        const index = Math.floor(Math.random() * imagenes.length);
        const div = document.createElement('div');
        div.className = 'pieza';
        div.id = imagenes[index];
        div.draggable = true;
        div.style.backgroundImage = `url("recursos/${imagenes[index]}.jpg")`;
        piezas.appendChild(div);
        imagenes.splice(index, 1);
    }

    for (let i = 0; i < terminado; i++) {
        const div = document.createElement('div');
        div.className = 'placeholder';
        div.dataset.id = i;
        puzzle.appendChild(div);
    }


    piezas.addEventListener('dragstart', e => {
        e.dataTransfer.setData('id', e.target.id);
    });

    puzzle.addEventListener('dragover', e => {
        e.preventDefault();
        e.target.classList.add('hover');
    });

    puzzle.addEventListener('dragleave', e => {
        e.target.classList.remove('hover');
    });

    puzzle.addEventListener('drop', e => {
            e.target.classList.remove('hover');

            const id = e.dataTransfer.getData('id');
            const numero = id.split('-')[1];

            if (e.target.dataset.id === numero) {
                e.target.appendChild(document.getElementById(id));

                terminado--;

                var x = document.getElementById("captcha");
                if (terminado === 0) {
                    x.value = "verifier";
                } else {
                    x.value = "non verifier";

                }
            }
        }


    );
</script>
</body>

</html>