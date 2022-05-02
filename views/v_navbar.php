<div class="topbar">
    <div class="navbar">
        <ul class="leftbar">
            <p class="name navbar-brand"><a href="index.php?page=home">VideoClub</a></p>
        </ul>
        <?php
            if(isset($_SESSION["username"])){
        ?>
        <ul class="midllebar">
            <li><a href="index.php?page=home">Films</a></li>
        </ul>
        <?php
            }
        ?>
        <ul class="rightbar">
           <?php    
                if(!isset($_SESSION["username"]))
                {?>
                    <li><a href="index.php?page=signin">S'inscrire</a></li>
                    <li><a href="index.php?page=login">Se connecter</a></li>
                <?php
                }else{
                ?>
                <li><a href="index.php?page=logout">Se déconnecter</a></li>
                <?php

                }
                ?>
            
        </ul>
    </div>
</div>