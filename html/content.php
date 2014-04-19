			<div align="center" class="header">
				<table width="90%">
					<tr>
						<td width="50%" align="left"><img src="assets/images/thebigfilms.png" /></td>
						<td width="50%" align="right">
							<a href="?page=contact">Contact us</a>&nbsp;&nbsp;&nbsp;
							<a href="http://www.facebook.com/pages/The-BIG-films/250129288350664"><img src="assets/images/fb_2.png" /></a>&nbsp;
							<a href="http://twitter.com/#!/TheBigFilms"><img src="assets/images/tw_2.png" /></a>
						</td>
					</tr>
				</table>
			</div>
			<br /><br />
			<div id="videolist" class="middle">
				<?php
					include_once('list.php');
				?>
			</div>
			<br /><br />
			<div class="footer">
				the BIG films were named with the reason of taking all of our commissioned project to be what BIG movie production would like to do. That's why we are taking a super serious of what we are producing. We are specialised in wedding and prewedding cinematography. We believe in every wedding has an unique story to tell. We also believe that the only way to document the real wedding story must be captured naturally. That's what we live and breath for like what our parent company does ,  <a href='http://www.fotoexpression.com'>foto expression</a>			
			</div>
			
		<script type="text/javascript">
		function pager(dir)
		{
			var page = parseInt($("#offset").val());
			var max = parseInt($("#maxpage").val());
			var no = isNaN(parseInt(dir));
			if(!no)
			{
				page = parseInt(dir);
			}
			if(dir=="next") page = page + 1;
			else if(dir=="first") page =0;
			else page = page - 1;
			
			
			$.post("list.php",{val:page},function(result) {
				$("#videolist").html(result);
				
				if(page==0)
				{
					$("#prev").fadeOut('fast');
				}
				else $("#prev").fadeIn('fast');
				
				if(page==max-1)
				{
					$("#next").fadeOut('fast');
				}
				else $("#next").fadeIn('fast');   
			});
		}
		</script>