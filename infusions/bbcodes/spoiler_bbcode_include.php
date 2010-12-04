<?php
echo "<style>
.spoiler {
border:1px solid black;

.spoiler > div {
display:none;
 
</style>";

echo "<script>
$(document).ready(function(){
$('.spoiler_div').hide(0);
$('.spoiler').click(
function () {
$(this).children('.spoiler_div').toggle();
}
);
});
</script>";

$text = preg_replace('#\[spoiler\](.*?)\[/spoiler\]#si', '<div class=\'spoiler\'>'.$locale['bb_spoiler'].'<div  class=\'spoiler_div\'>\\1</div></div>', $text);
 
?>