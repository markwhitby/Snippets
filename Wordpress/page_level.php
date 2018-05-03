<?php
    global $pageLevel;
    
    $current = $post->ID;
    $parentPageID = $post->post_parent;
    $grandparentPageID = get_post($parentPageID)->post_parent;
    
    if($grandparentPageID == 0 && $parentPageID == 0) {
        $pageLevel = 1;
    } elseif ($grandparentPageID == 0 && $parentPageID != 0) {
        $pageLevel = 2;
    } else {
        $pageLevel = 3;
    }
?>

<?php if($pageLevel == 2) { } ?>