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
						<td width="100px">Username</td>
						<td>:</td>
						<td width="100px"><input type="text" name="user" required="required"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="pass" required="required"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="email" name="mail" required="required"></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" value="Tambah Lab" class="button"></td>
					</tr>
				</table>
			</form>	
		</div>			
	</div>
</div>