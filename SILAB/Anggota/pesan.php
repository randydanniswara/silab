<?php include "header.html"; ?>
<div class="kolom">
	<form action="" class="search-wrapper cf search-wrapper1 ">
	    <a href="home.php">Home</a>
	    <input type="text" placeholder="Search..." required="">
	    <button type="submit">Search</button>
	</form>			
	<div class="konten">
	<div id="judul-jenis"><strong>PESAN</strong></div>
		<div class="body-in">
			<table>
				<tr>
					<td>To</td>
					<td>:</td>
					<td><input width="300" type="text" name="user" required="required"></td>
				</tr>
				<tr>
					<td>Subject</td>
					<td>:</td>
					<td><input width="300" type="text" name="user" required="required"></td>
				</tr>
				<tr>
					<td>Isi</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div><textarea cols="69" rows="12"></textarea></div>
			<div><input name="btnLogin" type="submit" value="Send" class="button"></div>	
		</div>		
	</div>
</div>