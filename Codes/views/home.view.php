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
                <li><a href="/contact">Contactez-nous</a></li>
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
                    <?php foreach($top3Agents as $agent){?>
                        <div class="agent">
                            <img src="<?= $agent->image->url ?>" alt="<?= $agent->image->alt_title ?>">
                            <span><?= $agent->name ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section id="features">
                <div class="container">
                    <h2 class="section-title">Features</h2>
                    <div class="features">
                        <?php foreach($features as $feature){?>
                            <div class="feature">
                                <i class="<?= $feature->icon ?>"></i>
                                <h3><?= $feature->title ?></h3>
                                <p><?= $feature->description ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        </section>
        <section id="partners">
            <div class="container">
            <h2 class="section-title">Partners</h2>
            <div class="partners">
                <?php foreach($partners as $partner){ ?>
                    <img src="<?= $partner->image->url ?>" alt="<?= $partner->image->alt_title ?>">
                <?php } ?>
            </div>
            </div>
        </section>
        <section id="story">
            <div class="container">
                <div class="story">
                    <h2>STORY_clients and book</h2>
                    <small>Client Heureux</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam vero rerum tenetur architecto dignissimos quia voluptas necessitatibus iusto obcaecati mollitia explicabo modi temporibus accusamus nam, quo maiores reiciendis distinctio. Id.</p>
                    <a id="book-with-me" class="btn-primary">Book with me</a>
                </div>
            </div>
        </section>
        <section id="homes">
            <div class="container">
            <h2 class="section-title">Homes</h2>
            <div class="homes">
                <?php foreach($homes as $home){?>
                    <div class="home">                        
                        <img src="<?=$home->thumbnail->url?>" alt="">
                        <div class="detaills">
                            <h3><?= $home->title ?></h3>
                            <span class="adress"><i class="fa fa-map-marker-alt"></i> <?= $home->adress ?></span>
                            <span class="surface"><i class="fa fa-square"></i> <?= $home->surface ?>m²</span>
                            <span class="rooms"><i class="fa fa-bed"></i> <?= $home->rooms ?> Chambres</span>
                            <span class="price"><i class="fa fa-dollar-sign"></i> <?= $home->price ?> MAD</span>
                            <a href="/contact" class="btn-primary"><i class="fa fa-phone"></i> Contactez Agent</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </section>
        <section id="gallery" >
            <div class="container-fluid">
                <div class="gallery">
                    <?php foreach($galleries as $gallery){?>
                        <div class="imgbox">
                            <img src="<?= $gallery->image->url?>" alt="<?= $gallery->image->alt_title?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer">
    <section class="footer-one">
        <div class="container">
            <img src="./img/logo-colored.png" alt="">
            <form action="/newsletter" method="POST">
                <i class="fa fa-envelope-open-text"></i>
                <input type="email" name="email" id="email" required placeholder="Email...">
                <button type="submit" class="btn-primary">Subscribe</button>
            </form>
        </div>
    </section>
    <section class="footer-tow">
        <div class="container">
            <p class="copyright">Copyright © 2021 booking Company</p>
            <ul class="link-items">
                <li><a href="#" class="active">Maison de réves</a></li>
                <li><a href="#">Proposition</a></li>
                <li><a href="#">Plan</a></li>
                <li><a href="#">Soumettez votre propriété</a></li>
                <li><a href="#">Nous rejoindre</a></li>
                <li><a href="#">Contactez-nous</a></li>
            </ul>
        </div>
    </section>
    </footer>
    <!-- Modal -->
    <div id="modal">
        <div class="modal">
        <i class="fas fa-times" id="close-modal"></i>
            <div class="left">
                <img src="./img/modal-1.png" alt="">
                <img src="./img/modal-2.png" alt="">
            </div>
            <div class="right">
                <h3>NE TARDE PAS</h3>
                <small>Lisez les termes avant de choisir</small>
                <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
                lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <a href="/contact" class="btn-primary">BOOK WITH ME</a>
            </div>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>
