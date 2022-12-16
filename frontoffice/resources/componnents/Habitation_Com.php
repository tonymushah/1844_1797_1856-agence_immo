<?php
    function show_habitation_as_card(PDO $connection ,Habitation $to_use){
        $to_use_photo = Photo_Habitation::getByHabitationID($connection, $to_use->get_id())[0];
        ?>
            <div class="card" style="width: 15rem;">
                <img src="/resources/photo/<?php echo $to_use_photo->get_lien(); ?>" class="card-img-top" alt="<?php echo $to_use->get_id(); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php
                        echo $to_use->get_loyer();
                    ?> FMG</h5>
                    <p class="card-text"><?php
                        echo $to_use->get_description();
                    ?></p>
                    <a href="" class="btn btn-primary">Show more detail</a>
                </div>
            </div>
        <?php
    }
?>