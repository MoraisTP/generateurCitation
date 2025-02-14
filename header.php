<header>
    <style>
        header{
            background-color: white;
            height: 100px;
            z-index: 10;
        }

        .hd-navbar{
            display: flex;
            flex-direction: row;
        }

        #logo{
            z-index: 20;
        }

        #logo img{
            height: 7rem;
            width: 7rem;
            margin-left: 3rem;
            margin-top: 2rem;
        }

        nav{
            width: 100%;
            height: 2rem;
            margin: 2rem;
        }

        .hd-nav-links{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            font-size: 1.2rem;
            list-style-type: none;
        }

        .hd-nav-links a{
            color: var(--main-color);
            text-decoration: none;
        }

        .hd-nav-links i{
            color: var(--main-color);
        }

        .hd-mobil{
            display: none;

        }

        /** BREAKPOINTS **/

        @media (max-width: 768px){
            .hd-nav-links{
                display: none;
            }

            .main_pages{
                display: none;
                flex-direction: column;
                background: var(--second-bg-color);
                max-width: 200px;
                border-radius: 10px;
                a{
                    width: 100%;
                    color: white;
                    text-decoration: none;
                    margin-top: 30px;
                    font-size: 1.5em;
                    text-align: center;
                }
                a:first-child{
                    margin-top: 0;
                }
                a:hover{
                    background: var(--main-color);
                }
            }

            .hd-mobil{
                display: flex;
                justify-content: flex-end;
            }

            #burger{
                display: none;
            }

            .burger-menu{
                display: flex;
                cursor: pointer;
                font-size: 2rem;
            }

            .burger-menu i{
                color: var(--second-bg-color);
            }

            #burger:checked + .main_pages {
                display: flex;
                z-index: 1000000;
            }

        }

    </style>
    <div class="hd-navbar">
        <div id="logo">
            <a href="#"><img src="../Images/Logo_super_hero.png" alt=""></a>
        </div>


        <nav>
            <div class="hd-mobil">
                <label for="burger" class="burger-menu"><i class="fa-solid fa-bars"></i></label>
                <input type="checkbox" id="burger">
                <div class="main_pages">
                    <a href="#">Accueil</a>
                    <a href="#">Rechercher</a>
                    <a href="#">Déclarer un incident</a>
                    <a href="#">Comment ça marche ?</a>
                    <a href="#">Mon compte</a>
                </div>
            </div>
            <ul class="hd-nav-links">
                <li class="hd-desk"><a href="#">Accueil</a></li>
                <li class="hd-desk"><a href="#">Rechercher</a></li>
                <li class="hd-desk"><a href="#">Déclarer un incident</a></li>
                <li class="hd-desk"><a href="#">Comment ça marche ?</a></li>
                <li class="hd-desk"><a href="#">Mon Compte</a></li>
                <li class="hd-desk"><a href="#"><i class="fa-regular fa-circle-user"></i></a></li>
            </ul>

        </nav>
    </div>
</header>

