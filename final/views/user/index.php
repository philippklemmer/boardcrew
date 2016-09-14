<!--Up == userprofile-->

<div id="UP" class="profileUserWrapper">
     <?php $this->renderUserProfile();  ?>

    <!--UserProfile Timeline-->
    <div class="UPTimeline">
        <div class="timelineWrapper" data-sort="userTimelineDESC" data-userid="<?= $this->getData()['user_id'] ?>">
        <!--render the User Posts-->
            <?php $this->renderTimeline();  ?>
        </div>

    </div>


</div>
