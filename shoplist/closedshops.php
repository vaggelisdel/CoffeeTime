<?php 
echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="'.dirname($_SERVER['REQUEST_URI']).'/shop.php?shopid='.$fetch["ShopID"].'&lat='.$mylat.'&lng='.$mylng.'" class="card">
                                <div class="figure closedshop">
                                    <img src="../'.$fetch['Image'].'" alt="image" style="width:100%;height:183px;object-fit: cover;">
                                    <div class="figView"><span class="icon-eye"></span></div>
									<div class="figType">ΚΛΕΙΣΤΟ</div> ';
									
                                    if (strtotime($regday) >= $today){
										
										echo '<div class="figTypenew newstamp">ΝΕΟ</div>';
									}  

									
                                echo '</div>
                                <h2>'.$fetch['ShopName'].'</h2>
                                <div class="cardAddress"><span class="icon-pointer"></span> '.$fetch['ShopAddress'].' '.$fetch['ShopAddressNumber'].', '.$fetch['ShopCity'].', '.$fetch['ShopTK'].'</div>
                                <div class="cardRating">
                                    <span id="'.$fetch["ShopID"].'star1" class="fa fa-star-o"></span>
                                    <span id="'.$fetch["ShopID"].'star2" class="fa fa-star-o"></span>
                                    <span id="'.$fetch["ShopID"].'star3" class="fa fa-star-o"></span>
                                    <span id="'.$fetch["ShopID"].'star4" class="fa fa-star-o"></span>
                                    <span id="'.$fetch["ShopID"].'star5" class="fa fa-star-o"></span>
                                    ('.$totalreviews["total"].')
                                </div>
                                <ul class="cardFeat">';
									if ($distance > 1000){
										$distance = $distance / 1000;

										
										echo '<li><span class="fa fa-road"></span> '. round($distance, 2). ' χιλιόμετρα μακριά</li>';
										
									}else{
									
										echo '<li><span class="fa fa-road"></span> '. round($distance, -1). ' μέτρα μακριά</li>';
									
									}

							
                               echo ' </ul>
                                <div class="clearfix"></div>
                            </a>
                        </div>';
?>
<script>
var myrate = "<?= number_format(round($avgrate["avg"],1),1) ?>";
var getnum = myrate.split('.', 2);
var integernum = parseFloat(getnum[0]);
var floatnum = parseFloat("0." + getnum[1]);

for (i = 1; i <= myrate; i++){
	document.getElementById(<?= $fetch["ShopID"] ?> + "star"+i).className = "fa fa-star";
	document.getElementById(<?= $fetch["ShopID"] ?> + "star"+i).style.color = "#ffd534";
}
if (floatnum < 1 && floatnum > 0){
	var halfnum = integernum + 1;
	document.getElementById(<?= $fetch["ShopID"] ?> + "star"+halfnum).className = "fa fa-star-half-o";
	document.getElementById(<?= $fetch["ShopID"] ?> + "star"+halfnum).style.color = "#ffd534";
}

</script>