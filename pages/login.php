<div class="container">
    <div class="row">
        <aside class="col-sm-4" style="margin-left: auto;margin-right: auto; margin-top: 100px;">
            <div class="card">
                <article class="card-body">
                    <a href="?register=true" class="float-end btn btn-outline-primary">Zarejestruj</a>
                    <h4 class="card-title mb-4 mt-1">Logowanie</h4>
                        <div>
                            <label>Login</label>
                            <input id="login" name="login" class="form-control" placeholder="Login">
                        </div>
                        <div>
                            <label>Hasło</label>
                            <input id="pass" name="pass" class="form-control" placeholder="******" type="password">
                        </div>
                        <div style="margin-top:5px">
                            <button onclick="loginForm()" class="btn btn-primary btn-block"> Zaloguj  </button>
                            <p class="alert-danger bg-white">
                                <?php
                                    if(isset($_SESSION["login"])) {
                                        if ($_SESSION["login"] == 'err') {
                                            print("Błędny login lub hasło!");
                                        }
                                    }?>
                            </p>
                        </div>
                </article>
            </div>
        </aside>
    </div>
</div>