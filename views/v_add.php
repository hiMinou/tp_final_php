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
                <h1>Ajouter un film:</h1>
                <form  method="post">
                    <div class="form-group">
                        <label for="nom">Nom: </label>
                        <input type="text" name="nom" id="nom" class="form-control">
                        
                    </div>
                    <div class="form-group">
                        <label for="nom">Année: </label>
                        <input type="text" name="annee" id="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nom">Score: </label>
                        <input type="text" name="score" id="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nbre Votants: </label>
                        <input type="text" name="nbVotants" id="nom" class="form-control">
                    </div>
                    <br>
                   <button class="btn btn-primary">Valider</button>
                 
                </form>
                
            </section>
        </div>
    </main>