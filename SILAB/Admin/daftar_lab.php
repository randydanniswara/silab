<?php include "header.html"; ?>
<div class="kolom">			
	<form action="" class="search-wrapper cf search-wrapper1 ">
	    <a href="home.php">Home</a>
	    <input type="text" placeholder="Search..." required="">
	    <button type="submit">Search</button>
	</form>
	<div class="konten">
		<div id="judul-jenis"><strong>DAFTAR LAB</strong></div>
		<div class="body-in-adok body-in">
			<table class="tabel">
				<tr>
					<th width="80px">No</th>
					<th width="370px">Nama Lab</th>
					<th width="300px">Ketua Lab</th>
				</tr>
				<tr>
					<td>1</td>
					<td><a href='lab.php'><span>Lab Satu</span></a></td>
					<td>Randy Danniswara</td>
					<td><input name="btnLogin" type="submit" value="Delete" class="button"></td>
					<td><div class="add"><a href="edit_lab.php">Edit</a></div></td>
				</tr>
				<tr>
					<td>2</td>
					<td><a href='lab.php'><span>Lab Dua</span></a></td>
					<td>...</td>
					<td><input name="btnLogin" type="submit" value="Delete" class="button"></td>
					<td><div class="add"><a href="edit_lab.php">Edit</a></div></td>
				</tr>
				<tr>
					<td>3</td>
					<td><a href='lab.php'><span>Lab Tiga</span></a></td>
					<td>...</td>
					<td><input name="btnLogin" type="submit" value="Delete" class="button"></td>
					<td><div class="add"><a href="edit_lab.php">Edit</a></div></td>
				</tr>
			</table>	
		</div>			
	</div>
</div>