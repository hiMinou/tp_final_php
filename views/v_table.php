
    
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                            '.$_SESSION['erreur'].'
                        </div>';
                        $_SESSION['erreur']="";
                    }
                ?>
                 <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                            '.$_SESSION['message'].'
                        </div>';
                        $_SESSION['message']="";
                    }
                ?>
                <h1>Liste des films</h1>
                <?php
                    if(isset($_SESSION["type"])&&$_SESSION["type"]=='admin'){
                        ?>
                        <a href="index.php?page=add" class="btn btn-primary">Ajouter un film</a>
                        <?php
                    }
                ?>
                <table class="table">
                    <thead>
                        <th>ID
                            <a href="index.php?page=home&orderBy=idDirection=ASC" class="up"><img src="up-arrow.png" alt="up"></a>
                            <a href="index.php?page=home&orderBy=id&Direction=DESC" class="down"><img src="down-arrow.png" alt="down"></a>
                        </th>
                        <th>NOM
                            <a href="index.php?page=home&orderBy=nomDirection=ASC" class="up"><img src="up-arrow.png" alt="up"></a>
                            <a href="index.php?page=home&orderBy=nom&Direction=DESC" class="down"><img src="down-arrow.png" alt="down"></a>
                        </th>
                        <th>ANNEE
                            <a href="index.php?page=home&orderBy=anneeDirection=ASC" class="up"><img src="up-arrow.png" alt="up"></a>
                            <a href="index.php?page=home&orderBy=annee&Direction=DESC" class="down"><img src="down-arrow.png" alt="down"></a>
                        </th>
                        <th>SCORE
                            <a href="index.php?page=home&orderBy=scoreDirection=ASC" class="up"><img src="up-arrow.png" alt="up"></a>
                            <a href="index.php?page=home&orderBy=score&Direction=DESC" class="down"><img src="down-arrow.png" alt="down"></a>
                        </th>
                        <th>NBRE VOTANTS
                        <a href="index.php?page=home&orderBy=nbVotantsDirection=ASC" class="up"><img src="up-arrow.png" alt="up"></a>
                        <a href="index.php?page=home&orderBy=nbVotants&Direction=DESC" class="down"><img src="down-arrow.png" alt="down"></a>
                        </th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                           foreach($result as $key=>$row){
                            ?>
                                <tr>
                                    <td><?= $row['id']?></td>
                                    <td><?= $row['nom']?></td>
                                    <td><?= $row['annee']?></td>
                                    <td><?= $row['score']?></td>
                                    <td><?= $row['nbVotants']?></td>
                                    <td><a href="index.php?page=voir&id=<?=$row["id"]?>"><img src="search-interface-symbol.png" alt="Voir"></a>
                                    <?php
                                    if(isset($_SESSION["type"])&& $_SESSION["type"]=='admin'){
                                    ?>
                                    <a href="index.php?page=edit&id=<?=$row["id"]?>"><img src="pen.png" alt="Modifier"></a> 
                                    <a href="index.php?page=delete&id=<?=$row["id"]?>"><img src="recycling-bin.png" alt="Supprimer"></a></td>
                                    <?php
                                    }

                                    ?>
                                
                                </tr>
                            <?php
                           } 
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>