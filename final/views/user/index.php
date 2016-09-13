<!--Up == userprofile-->
<script>
    var URL = "<?php echo URL  ?>";
</script>
<div id="UP" class="profileUserWrapper">
     <?php $this->renderUserProfile();  ?>

    <!--UserProfile Timeline-->
    <div class="UPTimeline">
        <div class="timelineWrapper" data-sort="userTimelineDESC" data-userid="<?= $this->getData()['user_id'] ?>">
        <!--render the User Posts-->
            
        </div>

    </div>


</div>
