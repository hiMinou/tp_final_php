<div class="container">
        <div class="row">
            <section class="col-12">
                <h1>Informations sur le film <?=$data['nom']?>:</h1>
                <br>
                <br>
                <p> ID: <?=$data['id']?></p>
                <p> Nom: <?=$data['nom']?></p>
                <p> Année: <?=$data['annee']?></p>
                <p> Score: <?=$data['score']?></p>
                <p> Nbre de Votants: <?=$data['nbVotants']?></p>
                <?php
                    if(isset($_SESSION)&&$_SESSION!=null){
                        ?>
                        <p class="votetag">
                            <a href="index.php?page=vote&id=<?=$data['id']?>&vote=top"><img class="vote" src="../like.png" alt="top"></a> 
                            <a href="index.php?page=vote&id=<?=$data['id']?>&vote=flop"><img class="vote" src="../dislike.png" alt="flop"></a>
                        </p>
                        <?php
                    }
                ?>
                
                <p><a href="index.php?page=home">Retour</a> 
                <?php
                    if(isset($_SESSION["type"])&&$_SESSION["type"]=='admin'){
                        ?>
                        <a href="index.php?page=edit&id=<?= $data['id']?>">Modifier</a>
                        <?php
                    }
                ?>
            </p>
            </section>
        </div>
    </div>