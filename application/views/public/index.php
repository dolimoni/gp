<?php
$titre_page="Acceuil";
$current_page = "index";
require '_header.inc'; ?>


<div class="sidebar-left page-content">
	<div class="content-block">
		<h3 class="block-title"> Actualités &raquo; </h3>
		<!-- Viewport -->
		<ul class="event-list">
			<li class="event-wrapper clearfix"> <!-- BEGIN .event-wrapper -->
				<div class="event-info posts">
					<h4><i class="fa fa-calendar red"></i> <a href="contact.php">13 Septembre 2014 à Casablanca </a></h4>
					<p>Formation PMP<br/>
					<a  href="contact.php">S'inscrire</a> </p>
				</div>
			</li> <!-- END .event-wrapper -->

			<li class="event-wrapper clearfix"> <!-- BEGIN .event-wrapper -->


				<div class="event-info posts">
					<h4><i class="fa fa-calendar red"></i> <a target="_blank" href="seminaire-SSI.pdf">29 octobre 2014 à Casablanca </a></h4>
					<p>Séminaire sur la sécurité des systèmes d'information en collaboration avec LEXSI France .<br/>
					<a target="_blank" href="seminaire-SSI.pdf">S'inscrire</a></p>
				</div>
			</li> <!-- END .event-wrapper -->
		</ul> <!-- End viewport-->
	</div>
</div>
	<!--================================================================
									main-content-right
	=================================================================== -->
<div class="main-content-right page-content">
	<div class="inner-content-wrapper"> <!-- BEGIN .inner-content-wrapper -->
		<div class="title1 clearfix"> <h4>Qui somme-nous ?</h4> <div class="title-block"></div> </div>
		<ul class="columns-1 clearfix">
			<li class="col">
				<p>Générale performance est un cabinet de formation professionnelle et de conseil. <br/>
					grâce à notre expertise, nous mettons à votre disposition nos consultants et formateurs, experts dans
					les domaines des systèmes d’informations, de la gouvernance des SI, de la stratégie d’entreprise, du
					Business Intelligence et du management.
				</p>
			</li>
		</ul>
		<ul class="columns-5 clearfix">
			<li class="col">
				<h3 class="grey4">Les 5 bonnes raisons pour nous faire confiance : </h3>
				<ul class="list3">
					<li><i class="fa fa-circle red"></i> Une qualité de prestation reconnue et appréciée </li>
					<li><i class="fa fa-circle red"></i> Une équipe active et innovante </li>
					<li><i class="fa fa-circle red"></i> Une offre personnalisée selon votre besoin </li>
					<li><i class="fa fa-circle red"></i> Un interlocuteur dédié </li>
					<li><i class="fa fa-circle red"></i> Des offres tarifaires attractives </li>
				</ul>
			</li>
		</ul>
		<ul class="columns-1 clearfix">
			<li class="col">
				<p>Toute l’expertise de Générale Performance à votre service,
					avec la meilleure qualité d’accueil, d’écoute et de conseil.<br/>

				</p>
				<p><span class="red">Générale Performance</span>  Partenaire de votre <span class="red">performance</span></p>
			</li>
		</ul>
	</div> <!-- END .inner-content-wrapper -->
</div> <!-- END .main-content -->





<?php require '_footer.inc'; ?>


<script src="<?php echo base_url('assets/js/public/index.js') ?>"></script>
