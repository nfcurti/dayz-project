<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/Front/faq.latte

use Latte\Runtime as LR;

class Templatecf3528b867 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>


<?php
		/* line 20 */
		$this->createTemplate("../_header.latte", $this->params, "include")->renderToContentType('html');
?>
<body style="background-color: #e0e0e0">
<iframe width="600" height="400" style="border:none;margin-left: 26%;
    border: none;
    margin-top: 15%;" 
src="https://www.youtube.com/embed/Pb5GKloTfpY">
</iframe>
    
</body>

<?php
		/* line 30 */
		$this->createTemplate("../_footer.latte", $this->params, "include")->renderToContentType('html');
		return get_defined_vars();
	}

}
