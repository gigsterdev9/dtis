		<?php 
			date_default_timezone_set('Asia/Manila'); 
			
			$y = date('Y'); 
			if ($y == '2015') 
			{
				$year = '2015';
			}
			else{
				$year = '2015-'.$y;
			}
		?>
		<div class="container">
            
			<p>&nbsp;</p>
			<div id="footer-div" class="small text-right">
				Donsol Tourism Information System v.0.02.
				&copy; <?php echo $year ?>. <br />
				Office of the Mayor. Municipality of Donsol, Sorsogon. All Rights Reserved.<br />
				<!--CodeIgniter <?php echo CI_VERSION; ?>-->
				</div>
			</div>
		</div><!-- container -->
    </body>
</html>
