<?php
	if(empty($_GET['error'])){
		$style = 'style="display:none"';
	}
?>
<div class="contact">
	<table>
		<tr>
			<td width="45%" valign="top">
				<span class="title">How we connect</span>
				<br /><br />
				We are based in Sydney, Australia.<br />However our sister companies under the management of <a href="http://www.fotoexpression.com">Foto Expression</a> are available around in Bali and Jakarta, Indonesia. We welcome any inquiries for Australia and Indonesia.<br />Our commissions for a complete wedding coverage starts from AUD$4995 recommended for sydney-based weddings.<br />Please feel free to leave your details on the following form or you can contact us via email connect@thebigfilms.com to arrange some appointments
				<br /><br /><br /><br /><br /><br />
				<a href="index.php">Back to main site</a>
			</td>
			<td width="10%" valign="top"></td>
			<td width="45%" valign="top">
				<div id="error" class="error">
					<?php
						if($_GET['error'] == '1') echo 'Please insert your name';
						else if($_GET['error'] == '2') echo 'Please insert your email';
						else if($_GET['error'] == '3') echo 'Please insert your contact number';
						else if($_GET['error'] == '4') echo 'Please insert your message';
						else if($_GET['error'] == '5') echo 'Thanks to contact us';
					?>
				</div>
				<form action="docontact.php" method="post" id="form-contact">
					<div>
						<label for="name">Your name/partner</label><br />
						<input class="text" type="text" id="name" name="name" />
					</div>
					<div>
						<label for="email">Email address</label><br />
						<input class="text" type="text" id="email" name="email" />
					</div>
					<div>
						<label for="number">Contact number</label><br />
						<input class="text" type="text" id="number" name="number" />
					</div>
					<div>
						<label for="date">Event date</label><br />
						<input class="date" type="text" id="date" name="date" />
						<span class="warning">format dd/mm/YYYY</span>
					</div>
					<div>
						<label for="location">Location</label><br />
						<select name="location" id="location">
							<option value="Sydney, Australia">Sydney, Australia</option>
							<option value="Jakarta, Indonesia">Jakarta, Indonesia</option>
							<option value="Bali, Indonesia">Bali, Indonesia</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<div>
						<label for="message">Why you need BIG films expertise to shoot your story</label><br />
						<textarea class="textarea" id="message" name="message"></textarea>
					</div>
					<div>
						<input onclick="validate()" type="button" name="send" value="send" id="send" />
					</div>
				</form>
			</td>
		</tr>
	</table>
</div>

	<script type="text/javascript">
		function validate(){
		 $("#error").html('Waiting');
			$.ajax({
				type: "POST",
				url: "docontact.php",
				data: 	"name=" + document.getElementById("name").value + 
						"&email=" + document.getElementById("email").value + 
						"&number=" + document.getElementById("number").value + 
						"&date=" + document.getElementById("date").value + 
						"&location=" + document.getElementById("location").value + 
						"&message=" + document.getElementById("message").value ,
				success: function(html){
					if(html == 'success'){ $("#error").html('Thanks to contact us');resetAll();
					}
					else { $("#error").html(html); }
				}
			});
		}
		
		function resetAll(){
			//$('#form-contact').reset();
			$(':input','#form-contact')
			 .not(':button, :submit, :reset, :hidden')
			 .val('')
			 .removeAttr('checked')
			 .removeAttr('selected');

		}
	</script>