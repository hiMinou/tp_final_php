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
                <h1>S'inscrire</h1>
                <form  method="post">
                    <div class="form-group">
                        <label for="nom">Username: </label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        
                    </div>
                    <div class="form-group">
                        <label for="nom">Password: </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="hidden" name="type" value="user">
                    <br>
                   <button class="btn btn-primary">Valider</button>
                   <a href="index.php?page=login">J'ai déjà un compte!</a>
                 
                </form>
                
            </section>
        </div>
    </main>