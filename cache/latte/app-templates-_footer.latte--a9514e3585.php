<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/_footer.latte

use Latte\Runtime as LR;

class Templatea9514e3585 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>

<div style="position: fixed;bottom: 0;background-color: #24476C;color: #fff;width: 100%;padding-top: 0.5em;z-index: 10000">
<p><span style="margin-left: 2%">DayZ </span> <a href="/contact.php" style="background-color: #24476C;color: #fff;margin-left: 60%">Contact Us</a>&nbsp;<a style="background-color: #24476C;color: #fff;margin-left: 2%" href="/index.php">Home</a><a style="background-color: #24476C;color: #fff;margin-left: 2%" href="/tos.php">Terms &amp; Conditions</a></p>
</div><?php
		return get_defined_vars();
	}

}
