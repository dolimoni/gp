
Bonjour <b><?php echo $trainee['first_name'].' '.$trainee['last_name'] ?></b><br/>
Le programme de votre formation <b><?php echo $training['title']; ?></b> est disponible sur votre espace client, pour le consulter cliquer sur le lien <a href="<?php echo base_url('user/training/show/'.$training['id']); ?>">suivant</a>;