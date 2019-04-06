
{include file="tpls/haut.tpl"}
<section>
    <div class="container">
        <div class="row">

            <form id="form-login" action="connexion.php" method="POST" class="col-md-6 center" >

                <div class="alert alert-danger hide" id="notif">Erreur.....</div>
                <div class="form-group">
                    <label for="mail">Adresse e-mail</label>
                    <input type="text" name="email" id="mail" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="mdp" id="pwd" value="" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</section>
{include file="tpls/bas.tpl"}
{literal}
    <script language="JavaScript">
        $(function () {
            $("#form-login").submit(function (event) {
                if (("#mail").val() ===""){
                   $("#notif").removeClass("hide");
                   return true
                } else {
                    $("#notif").addClass("hide");
                    return false
                }

            });
            event.preventDefault();
        });
    </script>
{/literal}
