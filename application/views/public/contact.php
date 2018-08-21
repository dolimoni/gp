<?php 
$titre_page="Contactez-nous";
$current_page = "contact";
require '_header.inc'; ?>


<div class="main-content page-content"> <!-- BEGIN .main-content -->
	<div class="inner-content-wrapper"> <!-- BEGIN .inner-content-wrapper -->
		<div id="message">Mon message</div>
		<p></p>
		<form action="sendcontact.php" id="contactform" class="clearfix" method="post">

			<div class="field-row">
				<label for="name">Nom <span>(<span class="red">*</span>)</span></label>
			    <input type="text" name="name" id="name" class="text_input" value="" />
			</div>
			<div class="field-row">
				<label for="company">Entreprise <span>(<span class="red">*</span>)</span></label>
			    <input type="text" name="company" id="company" class="text_input" value="" />
			</div>
			<div class="field-row">
				<label for="tel">Téléphone <span></span></label>
			    <input type="text" name="tel" id="tel" class="text_input" value="" />
			</div>

			<div class="field-row">
				<label for="email">Email <span>(<span class="red">*</span>)</span></label>
				<input type="text" name="email" id="email" class="text_input" value="" />		
			</div>

			<div class="field-row">
				<label for="message_text">Message</label>
				<textarea name="message" id="message" class="text_input" cols="60" rows="9"></textarea>
			</div>

			<input class="button1" type="submit" value="Envoyer" id="submit" name="submit">

		</form>

	</div><!-- END .inner-content-wrapper -->
</div><!-- END .main-content -->

<!-- BEGIN .sidebar-right -->
<div class="sidebar-right page-content">
	<div class="content-block"> <!-- BEGIN .content-block -->
		<h3 class="block-title">Contact</h3>
		<ul class="contact-widget">
			<li><span class="contact-phone">+212 (0) 522 390 026</span></li>
			<li><span class="contact-mobile">+212 (0) 661 375 999</span></li>
			<li><span class="contact-email">contact@gp.ma</span></li>
		</ul>
	</div> <!-- END .content-block -->

	<!-- BEGIN .content-block -->
	<div class="content-block"> 
		<h3 class="block-title"><a href="#">Adresse</a></h3>
		<p>265, Bd Zerktouni N°92<br />
		Casablanca,<br />
		Maroc</p>
		<div id="google-map" style="width:100%;height:200px;">
			<a class="lightbox" href="images/map.png"><img src="images/map-thumb.png" alt="map general performance"></a>
		</div>
	</div><!-- END .content-block -->

</div> <!-- END .sidebar-right -->
<?php require '_footer.inc'; ?>