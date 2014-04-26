<?php include "header.html"; ?>
<div class="kolom">			
	<form action="" class="search-wrapper cf search-wrapper1 ">
	    <a href="home.php">Home</a>
	    <input type="text" placeholder="Search..." required="">
	    <button type="submit">Search</button>
	</form>
	<div class="konten">
		<div id="judul-jenis"><strong>UBAH PASSWORD</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td width="200px">Password Lama</td>
						<td>:</td>
						<td width="250px"><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Password Baru</td>
						<td>:</td>
						<td><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Verifikasi Password Baru</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Edit" class="button"></td>
					</tr>
				</table>
			</form>	
		</div>			
	</div>
</div>