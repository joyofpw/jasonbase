<?php namespace ProcessWire; 


?>

<?php echo wireRenderFile("views/includes/header", $params); ?>

<textarea class="textarea" style="width: 100%;height: 100vw; background-color:#fffff3" readonly><?php echo $content ?></textarea>


<?php echo wireRenderFile("views/includes/footer", $params); ?>
