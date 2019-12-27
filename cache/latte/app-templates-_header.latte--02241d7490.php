<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/_header.latte

use Latte\Runtime as LR;

class Template02241d7490 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <link rel="icon" href="assets/favicon.png" type="image/gif" sizes="16x16">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e0ab303162.js"></script>
<nav class="navbar navbar-expand-sm " style="position: absolute;top: 1em ;
    margin:auto;    width: 22em ;
    left: 36.2%;z-index: 10000;background-color: #24476C;padding: 0.5em;border-radius: 3px;color: #fff !important">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center;">
   
        <ul class="navbar-nav " style="margin: auto">
                       
            <li  class="nav-item active ml-2">
                <a style="color:#fff;margin: 1em" href="/index.html">FAQ</a>
            </li>
                        <li  class="nav-item active ml-2">
                <a style="color:#fff;margin: 1em" href="disclaimer.html">Join</a>
            </li>
                        
                        <li  class="nav-item active ml-2">
                <a style="color:#fff;margin: 1em" href="privacy.html">Login</a>
            </li>

                    </ul>

    </div>

</nav>
<?php
		return get_defined_vars();
	}

}
