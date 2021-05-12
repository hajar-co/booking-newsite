<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.comp.css">
</head>
<body>
    <nav>
        <div class="container-fluid">
            <a href="#"><img src="./img/logo.png" alt="" class="logo"></a>
            <ul class="link-items">
                <li><a href="#" class="active">Maison de réves</a></li>
                <li><a href="#">Proposition</a></li>
                <li><a href="#">Plan</a></li>
                <li><a href="#">Soumettez votre propriété</a></li>
                <li><a href="#">Nous rejoindre</a></li>
                <li><a href="#">Contactez-nous</a></li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="container">
            <div class="presentation">
                <h1>la maison des réves</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis rem, dolor quidem incidunt porro consequatur repudiandae quae sapiente, aliquam, eligendi sint. Quidem, voluptatem corporis consectetur quia at eveniet voluptatibus vero!</p>
                <a href="#" class="btn-primary">View</a>
            </div>
            <div class="top-3-agents">
                <i class="fa fa-crown"></i>
                <small>Top 3 agents</small>
                <div class="top-agent">
                    <div class="agent">
                        <img src="./img/a-1.png" alt="">
                        <span>Agent name</span>
                    </div>
                    <div class="agent">
                        <img src="./img/a-2.png" alt="">
                        <span>Agent name</span>
                    </div>
                    <div class="agent">
                        <img src="./img/a-3.png" alt="">
                        <span>Agent name</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section id="contact">
                <div class="container">
                    <h2 class="section-title">Contact</h2>
                    <div class="contact">
                        <form action="" method="post">
                            <div class="form-group full-name">
                                <input type="text" name="fullname" placeholder="Nom Complet..." class="form-control">
                            </div>
                            <div class="form-group email">
                                <input type="email" name="email" placeholder="Email..." class="form-control">
                            </div>
                            <div class="form-group message">
                                <textarea name="message" placeholder="Write Your Message Here..." class="form-control"></textarea>
                            </div>
                            <div class="form-group type">
                                <div>
                                    
                                    <input type="radio" class="form-control" name="type" value="entreprise" id="entreprise">
                                    <label for="entreprise">Entreprise</label>
                                </div>
                                <div>
                                    <input type="radio" class="form-control" name="type" value="particulier" id="particulier">
                                    <label for="particulier">Particulier</label>
                                </div>
                            </div>
                            <div class="form-group send">
                                <button type="submit" class="btn-primary">SEND</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </main>
</body>
</html>
