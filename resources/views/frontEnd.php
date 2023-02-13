<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud Universidad</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .container {
                width: 100%;
                max-width: 900px;
                margin: 0 auto;
            }

            .btn-location {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                padding: 20px 0;
            }

            .btn-location button {
                background-color: #3F85D6;
                color: #fff;
                padding: 7px;
                border-radius: 7px;
                cursor: pointer;
            }

            table {
                text-align: center;
                border-collapse: collapse;
            }

            #tableStudents td, #tableStudents th{
                border: 1px solid #d3d3d3;
            }

            .showMatters {
                background-color: transparent;
                margin: 0 auto;
                cursor: pointer;
            }

            .modal {
                top: 0;
                left: 0;
                position: fixed;
                width: 100%;
                height: 100vh;
                background-color: rgb(0, 0, 0, .6);
                display: none;
                align-items: center;
                justify-content: center;
                transition: all .2s;
            }

            .modal-update {
                top: 0;
                left: 0;
                position: fixed;
                width: 100%;
                height: 100vh;
                background-color: rgb(0, 0, 0, .6);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all .2s;
            }

            .formCreateUser, .formUpdateUser{
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
                padding-top: 30px;
                border-radius: 7px;
                background-color: #fff;
                width: 600px;
                position: relative;
            }

            .formCreateUser input, .formUpdateUser input {
                margin: 10px 0;
                outline: none;
                border: 1px solid #3d3d3d;
                padding: 10px;
                border-radius: 7px;
                width: 100%;
            }

            .btn-createUser {
                background-color: #3F85D6;
                color: #fff;
                padding: 7px 15px;
                border-radius: 7px;
                cursor: pointer;
                margin: 10px 0;
                width: fit-content;
            }

            .close-modal{
                position: absolute;
                top: 10px;
                right: 10px;
                padding: 0;
                background-color: transparent;
                font-size: 20px;
                cursor: pointer;
            }

            .materias {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
            }

            .materia {
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .materia input {
                cursor: pointer;
                margin-right: 5px;
                width: 15px;
                height: 15px;
            }

            .modal-materias {
                top: 0;
                left: 0;
                position: fixed;
                width: 100%;
                height: 100vh;
                background-color: rgb(0, 0, 0, .6);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all .2s;
            }

            .button-update, .button-delete {
                background-color: #3F85D6;
                color: #fff;
                padding: 7px 15px;
                border-radius: 7px;
                cursor: pointer;
                margin: 10px 0;
                width: fit-content;
            }

            .button-delete {
                background-color: #DC3545;
            }
        </style>
    </head>
    <body class="">
        <div class="container">
            <div class="btn-location">
                <button>Crear estudiante</button>
            </div>

            <table id="tableStudents" style="width:100%">
                <thead class="text-center">
                    <tr>                                
                        <th>Nombre</th>  
                        <th>Apellido</th>  
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Materias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="modal">
            <form class="formCreateUser" method="post" action="<?php echo htmlspecialchars('api/createUser') ?>">
                <button class="close-modal">
                    X
                </button>
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="text" placeholder="Apellido" name="apellido" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Clave" name="clave" required>
                <input type="phone" placeholder="Telefono" name="telefono" required>
                <label>Seleccionar materias</label>
                <div class="materias">
                </div>
                <button class="btn-createUser" type="submit" class="btn">Enviar</button>
            </form>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        <script>
        $( document ).ready(function() {
            iniciarApp();
        });

        function iniciarApp(){
            getUsers();
            modalCreateUser();
        }

        function getUsers(){
            $.ajax({
            url: "api/getUsers",
            })
            .done(function( data ) {
                prinOnTable(data);
            });
        }

        function getMatters(){
            $.ajax({
            url: "api/getMatters",
            })
            .done(function( data ) {
                printMatters(data);
            });
        }

        function prinOnTable(data){

            data.forEach(user => {
                let id = user.id;

                user.materias = generateShowMatters(id);
                user.acciones = generateActionsByUser(id);
            });

            $('#tableStudents').DataTable().destroy()
            $('#tableStudents').DataTable({
                data: data,
                columns: [
                    { data: 'nombre' },
                    { data: 'apellido' },
                    { data: 'email' },
                    { data: 'telefono' },
                    { data: 'materias' },
                    { data: 'acciones'}
                ]
            });

            getMattersByUser();
            deleteUSer();
            updateUser();
        }

        function generateShowMatters(id){
            let showMatter = `
                <button id="${id}" class="showMatters" title="Mostrar materias">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <line x1="9" y1="12" x2="9.01" y2="12" />
                        <line x1="13" y1="12" x2="15" y2="12" />
                        <line x1="9" y1="16" x2="9.01" y2="16" />
                        <line x1="13" y1="16" x2="15" y2="16" />
                    </svg>
                </button>
            `;

            return showMatter;
        }

        function generateActionsByUser(id){
            let html = 
            `
                <div class="actions">
                    <button class="button-update" id="${id}">Actualizar</button>
                    <button class="button-delete" id="${id}">Eliminar</button>
                </div>
            `

            return html;
        }

        function modalCreateUser(){
            let btn = $('.btn-location button');

            btn.on('click', function(){
                let modal = $('.modal');
                let btnX = $('.close-modal');

                modal.fadeIn(200);
                modal.css('display', 'flex');

                getMatters();

                btnX.on('click', function(e){
                    e.preventDefault();

                    modal.fadeOut(200);
                    modal.css('display', 'flex');
                });
            });
        }
        
        function printMatters(matters){
            let container = $('.materias');

            container.empty();

            matters.forEach(matter => {
                
                let html = 
                `
                    <div class="materia">
                        <input type="checkbox" value="${matter.id}" id="ch-${matter.id}" name="materias[]">
                        <p>${matter.nombre}</p>
                    </div>
                `;

                container.append(html);
            });
        }

        function getMattersByUser(){
            let btn = $('.showMatters');

            btn.on('click', function(){
                let id = $(this).attr('id');

                $.ajax({
                    url: "api/getMattersByUser/"+ id +"",
                })
                .done(function( data ) {
                    printModalMatters(data);
                });
            });
        }

        function printModalMatters(data){
            let htmlChild = ``;

            data.forEach(element => {
                htmlChild = `${htmlChild} <h2>${element.nombre}</h2>`;
            });

            let htmlFather = `
                <div class="modal-materias">
                    <div class="formCreateUser">
                        <button class="close-modal">
                            X
                        </button>
                        ${htmlChild}
                    </div>
                </div>
            `;

            $('body').append(htmlFather);

            $('.modal-materias .close-modal').on('click', function(){
                $(this).parent().parent().remove();
            });
        }

        function deleteUSer(){
            let btn = $('.button-delete');

            btn.on('click', function(){
                let id = $(this).attr('id');

                if (confirm('¿Está seguro de eliminar este usuario?')) {

                    $.ajax({
                        url: "api/deleteUser/"+ id +"", 
                        type : 'DELETE'
                    })
                    .done(function( data ) {
                        if(data === "1"){
                            window.location.reload();
                        } else {
                            alert('No se pudo eliminar el usuario');
                        }
                    });
                }
            });
        }

        function updateUser(){
            let btn = $('.button-update');

            btn.on('click', function(){
                let id = $(this).attr('id');

                $.ajax({
                    url: "api/getUser/"+ id +""
                })
                .done(function( data ) {
                    openModalUpdateUser(data);
                });
            });
        }

        async function openModalUpdateUser(data){
            let obj = {
                "id" : data[0].idUsuario,
                "nombre" : data[0].nombre,
                "apellido" : data[0].apellido,
                "email" : data[0].email,
                "telefono" : data[0].telefono,
                "materias" : []
            }

            let htmlModal = `
            <div class="modal-update">
                <form class="formUpdateUser" method="post" action="<?php echo htmlspecialchars('api/updateUser/') ?>${obj.id}">
                    <button class="close-modal" id="clo-${obj.id}">
                        X
                    </button>
                    <input type="text" placeholder="Nombre" name="nombre" value=${obj.nombre} required>
                    <input type="text" placeholder="Apellido" name="apellido" value=${obj.apellido} required>
                    <input type="email" placeholder="Email" name="email" value=${obj.email} required>
                    <input type="phone" placeholder="Telefono" name="telefono" value=${obj.telefono} required>
                    <label>Seleccionar materias</label>
                    <div class="materias">
                    </div>
                    <button class="btn-createUser" type="submit" class="btn">Enviar</button>
                </form>
            </div>
            `;

            $('body').append(htmlModal);

            await getMatters();

            setTimeout(()=>{
                data.forEach(element => {
                    $('.modal-update .materias .materia #ch-'+element.idMateria+'').trigger('click');
                })
            }, 1000);

            $('#clo-'+obj.id+'').on('click', function(){
                $(this).parent().parent().remove();
            })
        }
        </script>
    </body>
</html>
