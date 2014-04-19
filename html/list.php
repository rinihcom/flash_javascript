<?php
$url = 'http://vimeo.com/api/v2/channel/tbfwedding/videos.xml';
$urlTwo = 'http://vimeo.com/api/v2/channel/tbfportraits/videos.xml';
$urlThree = 'http://vimeo.com/api/v2/channel/thebigfilms/videos.xml';

$xml = simplexml_load_file($url);
$video = $xml->video;

$xmlTwo = simplexml_load_file($urlTwo);
$videoTwo = $xmlTwo->video;

$xmlThree = simplexml_load_file($urlThree);
$videoThree = $xmlThree->video;

$maxVideo = count($video);
$perPage = 7;
if(empty($_REQUEST['val'])) $_REQUEST['val'] = 0;
$val = intval($_REQUEST['val']) * $perPage;
$j = $val + $perPage;

	for($i=$val;$i<$j;$i++){
		if($i < $maxVideo){
			$thumb = $video[$i]->thumbnail_medium;	
			echo '<a target="_blank" href="'.$video[$i]->url.'">';					
			echo '<img width="138" src="'.$thumb.'" />';
			echo '</a>';
		}
		else{
			echo '<img width="138" class="imgborder" src="assets/images/div.png" />';
		}
	}
	
	for($ia=$val;$ia<$j;$ia++){
		if($ia < $maxVideo){
			$thumb = $videoTwo[$ia]->thumbnail_medium;	
			echo '<a target="_blank" href="'.$videoTwo[$ia]->url.'">';					
			echo '<img width="138" src="'.$thumb.'" />';
			echo '</a>';
		}
		else{
			echo '<img width="138" class="imgborder" src="assets/images/div.png" />';
		}
	}
	
	for($ib=$val;$ib<$j;$ib++){
		if($ib < $maxVideo){
			$thumb = $videoThree[$ib]->thumbnail_medium;	
			echo '<a target="_blank" href="'.$videoThree[$ib]->url.'">';					
			echo '<img width="138" src="'.$thumb.'" />';
			echo '</a>';
		}
		else{
			echo '<img width="138" class="imgborder" src="assets/images/div.png" />';
		}
	}

?>
<input type="hidden" id="offset" value="<?=$_REQUEST['val']?>" />
<input type="hidden" id="maxpage" value="<?=$maxVideo?>" />
<br />
<div id='buttons-div'>
	<?php
		if($val == '0'){
			$prev = 'style="display:none"';
		}
		$prev = 'style="display:none"';
		
		if($i >= $maxVideo){
			$next = 'style="display:none"';
		}
		$next = 'style="display:none"';
	?>
	<span <?=$prev?> id='prev'><a href="#" onClick="pager('prev')" >Previous</a></span>
	<span <?=$next?> id='next'><a href="#" onClick="pager('next')" >Next</a></span>
</div>