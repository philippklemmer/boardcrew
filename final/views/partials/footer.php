<div class="securityCheck">
    <h4>Are you sure to delete your entrys?</h4>
    <div class="resetEntrys"><a href="#" >Yes</a></div>
    <div class="stayWithEntrys"><a href="#" >No</a></div>
</div>

<!--Scripts einbinden-->
<!-- doing a loop for scripts to get fewest amount of code -->
<script type="text/javascript" src="<?=URL?>public/js/jquery-3.0.0.js"></script>
<?php
    if(isset($this->js)){
        foreach($this->js as $js){
            echo '<script type="text/javascript" src="'.URL."views/".$js.'"></script>';
        }
    }
?>
<script type="text/javascript" src="<?=URL?>public/js/main.js"></script>
    </body>
</html>
