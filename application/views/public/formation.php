<?php 
$titre_page="Formation";
$current_page = "formation";
require '_header.inc'; ?>

<div class="main-content page-content"> <!-- BEGIN .main-content -->
	<div class="inner-content-wrapper"><!-- BEGIN .inner-content-wrapper -->
		<ul class="event-list">
			<li class="event-wrapper event-full event-single clearfix"><!-- BEGIN .event-wrapper -->
				<div class="event-info">
					<img src="images/seminaires.jpg" alt="Formation generale performance" class="event-image" />
					<div style="height: 30px;"></div>
					<div class="title1 clearfix"> <h4>Equipes :</h4> <div class="title-block"></div> </div>
					<ul class="columns-1 clearfix">
						<li class="col">
							<p>Notre équipe est composé de formateurs certifiés et de consultants experts dans leurs domaines d’intervention </p>
						</li>
					</ul>

					<div class="title1 clearfix"> <h4>Programme :</h4> <div class="title-block"></div> </div>
					<ul class="columns-1 clearfix">
						<li class="col">
							<p>Nos programmes de formation sont conçus par notre équipe pédagogique dans le cadre d’une méthodologie 
								ayant pour objectif de rendre les participants opérationnels dès leur retour en entreprise. <br/>
								L’approche pédagogique est orientée sur la mise en pratique et l’étude de cas réels. <br/>
								Chaque intervenant allie expertise technique et compétence pédagogique.</p>
						</li>
					</ul>

					
				</div> <!-- END event-info -->
			</li>
		</ul>
		<div class=" formations-inner">
			<div class="header-block-inner">
				<a href="management.php" class="header-block-5 header-block-style-2 clearfix">
					<i class="fa fa-thumbs-up"></i>
					<h2>Management</h2>
				</a>

				<a href="informatique.php" class="header-block-5 header-block-style-1 clearfix">
					<i class="fa fa-file-code-o"></i>
					<h2>Informatique</h2>
				</a>
				
				<a href="coaching.php" class="header-block-5 header-block-style-2 clearfix">
					<i class="fa fa-user"></i>
					<h2>Coaching</h2>
				</a>
			</div>
		</div>
	</div> <!-- END .main-content -->
</div><!-- END .inner-content-wrapper -->
<?php require '_footer.inc'; ?>