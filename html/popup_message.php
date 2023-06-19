<?php
  if (isset($_SESSION["message"])):
?>

  <div id="popup_message" class="active">
    <div class="inner_container">
      <p><?= $_SESSION["message"] ?></p>
    </div>
  </div>

<?php endif ?>

<?php unset($_SESSION["message"]) ?>