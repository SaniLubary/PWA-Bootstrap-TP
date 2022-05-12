<?php include_once("../components/header.php"); ?>
<link rel="stylesheet" href="../../vista/css/style_tp2ej4.css">
</link>

<!-- Content -->
<div class="container row main-content mx-auto align-items-center my-5 p-3 w-75">
    <div class="container dominio">
        <div class="m-5 row gx-5">
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="row justify-content-center">

                                <div class="col-md-6">
                                    <h3 class="heading mb-4">Nuevo usuario</h3>
                                    <p>Completa con tus datos para formar parte.</p>
                                    <p> <img src="../assets/tp2-ej4-images/new_user.jpg" alt="Image" class="img-fluid"> </p>
                                </div>

                                <div class="col-md-6">
                                    <!-- Formulario -->
                                    <form class="mb-5" id="contactForm" name="contactForm">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Empresa">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group autocomplete">
                                                <input id="estado" type="text" class="form-control" name="estado" placeholder="Estado/Provincia">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="text" pattern="^\d{4}-\d{3}-\d{4}$" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="mail" id="mail" placeholder="Mail">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" name="comentario" id="comentario" cols="30" rows="7" placeholder="Comentarios"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <input id="btn_enviar" type="submit" value="Enviar formulario" class="btn btn-primary rounded-0 py-2 px-4">
                                                <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="form-message-warning mt-4"></div>
                                    <div id="form-message-success">
                                        Your message was sent, thank you!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





            <script src="../js/jquery.validate.min.js"></script>
            <script src="../js/tp2-ej4.js"></script>

        </div>
    </div>
</div>

</div>

<?php include_once("../components/footer.php"); ?>
<script src="../js/tp2-ej6.js" defer></script>