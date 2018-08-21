
Bonjour <b><?php echo $trainee['first_name'].' '.$trainee['last_name'] ?></b><br/>
Votre support de formation <b><?php echo $training['title']; ?></b> est disponible sur votre espace client, vous pouvez le télécharger via le lien <a href="<?php echo base_url('user/training/show/'.$training['id']); ?>">suivant</a>