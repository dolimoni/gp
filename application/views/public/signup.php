<?php
//$titre_page="index";
$titre_page="Inscription";
$current_page = "signup";
require '_header.inc'; ?>

<style>
    #loading {
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        position: fixed;
        opacity: 0.7;
        background-color: #fff;
        z-index: 999999;
        text-align: center;
        display: none;
    }

    #loading-image {
        position: absolute;
        top: 20%;
        z-index: 10000;
    }

</style>

<div id="loading">
    <img id="loading-image" src="<?php echo base_url("assets/images/loader.gif"); ?>" alt="Loading..."/>
</div>

<div id="signupContainer" class="container">
    <form id="createUserForm">
        <div class="row">
            <h4>Compte</h4>
            <div class="input-group last-name-group input-group-icon">
                <input name="last_name"  type="text" placeholder="Nom"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group first-name-group input-group-icon">
                <input name="first_name" type="text" placeholder="Prénom"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group email-group input-group-icon">
                <input name="email" type="email" placeholder="Email"/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <div class="input-group password-group input-group-icon">
                <input name="password" type="password" placeholder="Mot de passe"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
        </div>
        <div class="row">
            <div class="col-half">
                <h4>Date de naissance</h4>
                <div class="input-group">
                    <div class="col-third">
                        <input name="day" min="1" max="31" type="number" placeholder="DD"/>
                    </div>
                    <div class="col-third">
                        <input name="month" min="1" max="12" type="number" placeholder="MM"/>
                    </div>
                    <div class="col-third">
                        <input name="year" min="1900" max="2900" type="number" placeholder="YYYY"/>
                    </div>
                </div>
            </div>
            <div class="col-half">
                <h4>Sexe</h4>
                <div class="input-group">
                    <input checked type="radio" name="gender" value="homme" id="gender-male"/>
                    <label for="gender-male">Homme</label>
                    <input type="radio" name="gender" value="femme" id="gender-female"/>
                    <label for="gender-female">Femme</label>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>Entreprise</h4>
            <div class="input-group input-group-icon">
                <input name="company"  type="text" placeholder="Entreprise"/>
                <div class="input-icon"><i class="fa fa-building-o"></i></div>
            </div>
        </div>
        <div class="row">
            <h4>Termes et conditions</h4>
            <div class="input-group terms-group">
                <input type="checkbox" id="terms"/>
                <label for="terms">J'accepte les termes et conditions pour m'inscrire à ce service, et confirme par la présente que j'ai lu la politique de confidentialité.</label>
            </div>
        </div>

        <input type="submit" VALUE="S'inscrire">
    </form>

<?php require '_footer.inc'; ?>
<script src="<?php echo base_url('assets/vendors/sweetalert/sweetalert.min.js'); ?>"></script>
<script>
    let signup_url="<?php echo base_url('public/Signup/signup'); ?>";
    let redirect_url="<?php echo base_url('welcome'); ?>";
</script>

<script src="<?php echo base_url('assets/js/public/signup/index.js') ?>"></script>
