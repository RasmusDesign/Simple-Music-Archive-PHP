<?php
function dominant($url){
    $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
    if ($ext == 'jpg' || $ext == 'jpeg') $i = imagecreatefromjpeg($url);
    if ($ext == 'gif') $i = imagecreatefromgif($url);
    if ($ext == 'png') $i = imagecreatefrompng($url);
    $rTotal  = '';
    $bTotal  = '';
    $gTotal  = '';
    $total = '';
    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }

    }
    $r = round($rTotal/$total);
    $g = round($gTotal/$total);
    $b = round($bTotal/$total);
    return $color = "rgb(".$r.",".$g.",".$b.")";
}
?>
