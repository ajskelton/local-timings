<?php
include_once('header.php');
?>
    	<div class="container">
    		<h2>Local Break Times</h2>
    		<h3>Step 1: Get PDF of Days Final Timing</h3>
    		<ul>
                <li><a href="http://affiliates.moviestvnetwork.com/" target="_blank">Movies! Affiliates Dashboard</a></li>      
                <li><a href="http://affiliates.metvnetwork.com/" target="_blank">MeTV Affiliates Dashboard</a></li>
            </ul>
    		<hr>
    		<h3>Step 2: Choose file</h3>

			<form enctype="multipart/form-data" action="parse_pdf.php" method="POST">
            
			    <!-- MAX_FILE_SIZE must precede the file input field -->
			    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <!-- Name of input element determines name in $_FILES array -->
			    <div class="form-group">
				    <input name="userfile" type="file" id="moviesInputFile"/>    	
			    </div>
                <hr>
                <h3>Step 3: Select Channel</h3>
                <div class="form-group">
                    <select name="channel" id="channel">
                        <option value="me">Me TV</option>
                        <option value="movies">Movies!</option>
                    </select>
                </div>
                <hr>
                <h3>Step 4: Submit!</h3>

			    <button type="submit" id="submit-button" class="btn btn-default"/>Submit</button>
			</form>
		</div>
        <script type="text/javascript" src="assets/js/loading.js"></script>
	</body>
</html>