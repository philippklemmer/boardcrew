<!--Up == userprofile-->
<script>
    var URL = "<?php echo URL  ?>";
</script>
<div id="UP" class="profileUserWrapper">
     <?php $this->renderUserProfile();  ?>

    <!--UserProfile Timeline-->
    <div class="UPTimeline">

        <div class="timelineWrapper" data-sort="userTimelineDESC" data-sort="">
        <!--render the User Posts-->
            <?php $this->renderTimeline();  ?>
        </div>

    </div>


</div>
