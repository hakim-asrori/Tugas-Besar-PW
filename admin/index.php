<?php
include "layout/head.php";
include "layout/side.php";
?>
<h1>Welcome</h1>

<label class="modal-open modal-label btn-blue" for="modal-open">Lihat</label>
<input type="radio" name="modal" value="open" id="modal-open" class="modal-radio">

<div class="modal">
	<label class="modal-label overlay"><input type="radio" name="modal" value="close" class="modal-radio"/></label>
	<div class="content">
		<div class="top">
			<h2>Heading </h2>
			<label class="modal-label close-btn">
				<input type="radio" name="modal" value="close" class="modal-radio" />
			</label>
		</div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
</div>


<?php include "layout/foot.php"; ?>