<?php include "header.html"; ?>
<div class="kolom">			
	<form action="" class="search-wrapper cf search-wrapper1 ">
	    <a href="home.php">Home</a>
	    <input type="text" placeholder="Search..." required="">
	    <button type="submit">Search</button>
	</form>
	<div class="konten">
		<div id="judul-jenis"><strong>EDIT PROFIL</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td width="150px">Upload Foto</td>
						<td>:</td>
						<td width="350px"><input type="text" name="user"><input type="submit" value="Browse" class="button"></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Lahir</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><textarea cols="40" rows="3"></textarea></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Edit" class="button"></td>
					</tr>
				</table>
			</form>	
		</div>			
	</div>
</div>