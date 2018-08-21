<?php $this->load->view('user/partials/user_header.php'); ?>

<!-- page content -->
<div class="right_col">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                    <div class="col-xs-12 panel training counters">
                       <div class="row mgbt10">
                           <div class="col-md-1">
                               <i class="fa fa-clock-o"></i>
                           </div>
                           <div class="col-md-11">
                               <span class="red"><span class="red counter"><?php echo count($finished_trainings); ?></span> formations réalisée</span>
                           </div>
                       </div>
                        <?php if(count($coming_trainings)>0){
                            $first_training = reset($coming_trainings);
                            ?>
                            <div class="row">
                               <div class="col-md-1">
                                   <i class="fa fa-hourglass-half"></i>
                               </div>
                               <div class="col-md-11">
                                   <span class="red">Prochaine formation dans <span class="counter"><?php echo $first_training['start_in']; ?></span> jours</span>
                               </div>
                           </div>
                        <?php } ?>
                    </div>
                <hr/>
                    <div class="col-xs-12 panel">
                        <h4>Vos thématiques</h4>
                        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid assumenda blanditiis cumque, distinctio doloremque eaque eius eos incidunt minus quis quod repellendus ut! Aperiam eligendi magni minima porro sit.</span></p>
                    </div>
            </div>

            <div class="row">
                <div class="col-xs-12 panel training">
                    <h5>Récapitulatif <span><a class="red" href="<?php echo base_url('user/training/getAll'); ?>">Afficher</a> </span></h5>
                    <div class="col-xs-12 col-sm-4 recap">
                        <div><?php echo count($finished_trainings); ?></div>
                        <div>Formations terminée</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 recap">
                        <div><?php echo count($coming_trainings); ?></div>
                        <div>Formations à venir</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 recap">
                        <div><?php echo count($undefinded_trainings); ?></div>
                        <div>aucune date</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="row mglt0">
                <div class="col-xs-12 header">
                    <h2>Bonjour Khalid ESSALHI!</h2>
                </div>
                <div class="col-xs-12 pdg0">
                    <div class="slider">
                        <img class="width100" src="<?php echo base_url('assets/images/bg.jpg') ?>"/>
                        <div class="bottom-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor ea fugiat laudantium nihil praesentium quidem, saepe sed sit voluptate? Debitis enim et exercitationem fuga officia quidem rerum saepe tenetur.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 pdg0">
            <div class="col-xs-12 large-title">
                Formations à venir
            </div>
            <?php foreach ($coming_trainings as $coming_training){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-12 panel training coming">
                    <h5>Formation en <?php echo $coming_training['title']; ?></h5>
                    <div class="row">
                        <div class="col-xs-2">Inscrit</div>
                        <div class="col-xs-10">Commence dans <?php echo $coming_training['start_in']; ?> jours</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="text-right red">
                                <a href="<?php echo base_url('user/training/show/'.$coming_training['id']); ?>">Afficher la formation</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            if(count($coming_trainings)===0) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-12 panel training coming">
                    <h5>Vous n'êtes inscrit à aucune formation!</h5>
                    <!-- <div class="row">
                         <div class="col-xs-2">Inscrit</div>
                         <div class="col-xs-10">Commence dans 15 jours</div>
                     </div>
                     <div class="row">
                         <div class="col-xs-12">
                             <p class="text-right red">Ouvrir le parcours de formation</p>
                         </div>
                     </div>-->
                </div>
            <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="row">
                <div class="col-xs-12 large-title-reverse mgbt10">
                    Synthèses de formation
                </div>
            </div>
            <div class="row">
                <?php foreach ($trainings as $training){
                    if($training['publish_synthesis']==='true' and
                        (($training['local_synthesis']==='false' and $training['path']!=='') or
                            ($training['local_synthesis']==='true' and $training['synthesis_video']!==''))) {

                        ?>
                         <a href="<?php echo base_url('user/training/synthesis/'.$training['id']); ?>">
                            <div class="col-md-3">
                                <div class="gray text-center">
                                    <img class="half-width" style="min-height: 85px;" src="<?php echo base_url($training['s_image']); ?>"/>
                                </div>
                                <div class="courseTitle"><?php echo $training['title']; ?></div>
                            </div>
                         </a>
                    <?php }} ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('user/partials/user_footer'); ?>
