<?php
include ('header.php');
$noticia=$web->obtenerNoticias();
?>
        <section class="container-fluid">
            <?php

                for ($i=0;$i<count($noticia);$i++){
                    echo "<hr class=\"featurette-divider\">";
                    echo "<div class=\"row featurette\">
                                <div class=\"col-md-3 col-md-7 order-md-2\">";
                                $titulo=explode(",",$noticia[$i]['titulo']);
                                $stitulo=array();
                                for ($j=1; $j<count($titulo); $j++)
                                    $stitulo[$j]=$titulo[$j];
                                $sobrante=implode(",",$stitulo);
                                    echo "<h2 class=\"featurette-heading\">$titulo[0],<span class=\"text-muted\"> $sobrante</span></h2>";
                                    echo "<p class=\"lead\">".$noticia[$i]['noticia']."</p>
                                </div>";
                        echo "<div class=\"col-md-5 order-md-1\">";
                            echo "<img class=\"featurette-image img-fluid mx-auto\" data-src=\"holder.js/500x500/auto\" alt=\"500x500\" style=\"width: 300px; height: 300px;\" src=\"images/".$noticia[$i]['foto']."\" data-holder-rendered=\"true\">";
                        echo "</div>";
                    echo "</div>";
                    echo "<hr class=\"featurette-divider\">";
                }
            ?>
        </section>

<?php
include ('footer.php');