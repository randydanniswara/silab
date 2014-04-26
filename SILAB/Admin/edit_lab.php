<?php include "header.html"; ?>
<div class="kolom">			
	<form action="" class="search-wrapper cf search-wrapper1 ">
	    <a href="home.php">Home</a>
	    <input type="text" placeholder="Search..." required="">
	    <button type="submit">Search</button>
	</form>
	<div class="konten">
		<div id="judul-jenis"><strong>CREATE LAB</strong></div>
		<div class="body-in">
			<form action="" method="POST">
				<table>
					<tr>
						<td width="150px">Nama Lab Lama</td>
						<td>:</td>
						<td>Lab ...</td>
					</tr>
					<tr>
						<td>Nama Lab Baru</td>
						<td>:</td>
						<td><input width="300" type="text" name="user" required="required"></td>
					</tr>
					<tr>
						<td>Ketua Lab Lama</td>
						<td>:</td>
						<td>Randy Danniswara</td>
					</tr>
					<tr>
						<td>Ketua Lab Baru</td>
						<td>:</td>
						<td><select><option>Zaka</option><option>Viona</option><option>Hana</option></select></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Update" class="button"></td>
					</tr>
				</table>
			</form>	
		</div>			
	</div>
</div>