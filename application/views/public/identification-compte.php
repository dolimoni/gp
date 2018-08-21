<?php
//$titre_page="index";
$titre_page="Identification du compte";
$current_page = "identification-compte";
require '_header.inc'; ?>

<h1 class="tt-1">
    Identification
</h1>

<div class="incsriptionArtcle">
    <div class="pnlCreateAccount frm-holder rte pdt20">


        <div style="margin-bottom:10px;color:#000000">
            Cette adresse n'existe pas dans notre base client.<br>
            Si votre saisie est correcte cela signifie que votre email n'existe pas dans notre base web. Nous vous invitons donc à&nbsp;<a href="/mon-compte/Pages/creation-compte.aspx">créer un compte</a>&nbsp;et à passer une première inscription. Une fois validée par notre service client (dans les 24h), votre compte sera pleinement actif. Vous pourrez alors consulter l'ensemble de votre historique et documents administratifs liés aux inscriptions dont vous avez été le responsable d'inscription ou le stagiaire.&nbsp;
            <br>Merci.
        </div>
        <div class="clearfix"></div>

    </div>
</div>

<h2 class="DINMediumRegular incsriptionArtcleTitleGrey mgt30 ">Vous avez oublié votre mot de passe ?</h2>

<div class="frm-holder">
    <p>Indiquez-nous l'adresse email avec laquelle vous vous êtes inscrit, nous vous enverrons un nouveau mot de passe immédiatement.
    </p>
    <?php echo  form_open('login/ForgotPassword') ?>
    <p>
    <label>Votre email</label>
        <input name="email" type="text">
    </p>
    <p><input type="submit" value="Envoyer" class="subBtnR"></p>
    </form>
    <h2 class="text-center error"><?php echo $this->session->flashdata('msg'); ?></h2>
</div>


<div class="frm-holder">
    <p>Vos données personnelles sont utilisées dans le cadre strict de l’exécution et du suivi de votre demande par les services GPMA en charge du traitement. Elles sont nécessaires à l’exécution de ce service. Elles sont conservées pour une durée de trois ans à compter de notre dernier contact. En application de la réglementation sur la protection des données à caractère personnel, vous bénéficiez d’un droit d’accès, de rectification, de limitation du traitement ainsi que d’un droit d’opposition et de portabilité de vos données si cela est applicable que vous pouvez exercer en vous adressant à GPMA, DPO- Direction des Systèmes d’Information,  19 rue René Jacques, 92798 Issy-les-Moulineaux. Vous bénéficiez également du droit d’introduire une réclamation auprès d’une autorité de contrôle si nécessaire.<span style="display:inline-block;height:15px;width:15px;float:right;margin-right:980px;margin-top:2px;"><input id="ctl00_ctl27_g_0dcf7c51_878d_4508_90c9_b813e29e40b0_chkRgbd" type="checkbox" name="ctl00$ctl27$g_0dcf7c51_878d_4508_90c9_b813e29e40b0$chkRgbd"></span></p>
</div>


<?php require '_footer.inc'; ?>


<script src="<?php echo base_url('assets/js/public/index.js') ?>"></script>
