<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Visitas</title>
        <!-- Favicon-->

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css2/styles.css') }}">
        <script src="{{ asset('js2/scripts.js') }}"></script>
     <link rel="stylesheet" href="{{ asset('assets/img/') }}">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/logo.png" alt="...">Cabelum</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>

                        <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>

                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                        <li class="nav-item"> <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
<br><br>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>

                </div>
                <div class="row text-center">
                    <div class="col-md-4" >
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-fist-raised fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Fuerza Laboral</h4>
                        <p class="text-muted">CABELUM es fuente de empleo sustentable para 360 trabajadores, con antigüedad promedio 15 años en la empresa.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-globe-americas fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Nuestra Planta</h4>
                        <p class="text-muted">La Planta de CABELUM cuenta con los medios idóneos para la fabricación de Conductores desnudos de Aluminio y de Aleación de Aluminio, así como también de Alambrón de Aluminio y Aleación. La situación geográfica de CABELUM le permite ofrecer un óptimo servicio a sus clientes en Venezuela y el Exterior.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-clipboard-check fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Control de Calidad</h4>
                        <p class="text-muted">Todos los procesos y métodos de fabricación son cuidadosamente controlados y supervisados en cada una de sus etapas, por nuestros ingenieros, técnicos y especialistas para la producción de Conductor y Alambrón de Aluminio, que se adapten a las aplicaciones y especificaciones finales del producto.



                             </p>
                    </div>
                </div>
            </div>
        </section>

        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosotros</h2>
                    <h3 class="section-subheading text-muted">CONDUCTORES DE ALUMINIO DEL CARONI, C.A. (CABELUM,C.A.) es una empresa del Estado Venezolano, especializada en la manufactura de Alambrón de Aluminio y Conductores Eléctricos de Aluminio Desnudo del tipo AAC, AAAC, ACAR, ACSR y AACSR, utilizados en media y alta tensión. Cuenta con 37 años de operaciones, y sus productos son de reconocida calidad, tanto en el mercado nacional como el de exportación, avalados por las Marcas NORVEN y CERTIFICACIÓN DE PRODUCTO FONDONORMA.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/logo.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Ubicación</h4>
                                <h4 class="subheading"></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">La empresa se encuentra ubicada en Ciudad Bolívar, Capital del Estado Bolívar, y fue fundada en Mayo de 1976, iniciando sus operaciones el 13 Agosto de 1979. En el año 2004 CABELUM pasa a formar parte de las empresas tuteladas por la Corporación Venezolana de Guayana, permaneciendo en esta corporación hasta Junio de 2014.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Gaceta Oficial</h4>

                            </div>
                            <div class="timeline-body"><p class="text-muted">Mediante Decreto 1040, Publicado en la Gaceta Oficial de la República N° 40.432 del 12 de Junio de 2014, CABELUM pasa a ser empresa filial de la Corporación Industrial para la Energía Eléctrica,S.A., (CORPOELEC INDUSTRIAL), adscrita al Ministerio del Poder Popular para la Energía Eléctrica (MPPEE).</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Decreto Precidencial</h4>

                            </div>
                            <div class="timeline-body"><p class="text-muted">Recientemente mediante Decreto Presidencial N° 2.357, publicado en la Gaceta Oficial N° 40.931 de fecha 22 de Junio de 2016, CABELUM,CA pasa a formar parte del Ministerio del Poder Popular de Industrias Básicas, Estratégicas y Socialistas.</p></div>
                        </div>
                    </li>


                </ul>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contactanos</h2>

                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <Label style="color: #fff">Nombre de La Empresa</Label>
                                <!-- Name input-->
                                <input class="form-control" id="name" disabled type="text" placeholder="CVG Conductores de Aluminio del Caroní, C.A." data-sb-validations="required" />

                            </div>
                            <div class="form-group">
                                <Label style="color: #fff">Correo Electronico</Label>
                                <!-- Email address input-->
                                <input class="form-control" disabled id="email" type="email" placeholder="presidencia@cabelum.gob.ve" data-sb-validations="required,email" />

                            </div>
                            <div class="form-group mb-md-0">
                                <Label style="color: #fff">Telefono</Label>
                                <!-- Phone number input-->
                                <input class="form-control"  disabled id="phone" type="tel" placeholder="+58 (412) 6069998*" data-sb-validations="required" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <Label style="color: #fff">Dirección</Label>
                                <!-- Message input-->
                                <textarea class="form-control" disabled id="message" placeholder="Avenida Perimetral, Nueva Zona Industrial, Edificio Cabelum. Ciudad Bolívar, Edo. Bolívar - Venezuela." data-sb-validations="required"></textarea>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Derechos Reservados &copy; 2024-2025</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Política de Privacidad </a>
                        <a class="link-dark text-decoration-none" href="#!">Términos de Uso</a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../resources/js2/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
