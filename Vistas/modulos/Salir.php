<?php

session_destroy();

echo '<script>

window.location = "'.$generales["ruta"].'";
</script>';