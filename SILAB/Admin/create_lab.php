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
						<td width="100px">Nama Lab</td>
						<td>:</td>
						<td width="100px"><input width="300" type="text" name="user" required="required"></td>
					</tr>
					<tr>
						<td>Ketua Lab</td>
						<td>:</td>
						<td><select><option>Randy</option><option>Zaka</option><option>Viona</option><option>Hana</option></select></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Tambah Lab" class="button"></td>
					</tr>
				</table>
			</form>	
		</div>			
	</div>
</div>