<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/@layout.latte

use Latte\Runtime as LR;

class Template09db22c78c extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> - <?php
		}
		elseif (isset($title)) {
			echo LR\Filters::escapeHtmlText($title) /* line 20 */ ?> - <?php
		}
		echo LR\Filters::escapeHtmlText($service->meta->siteName) /* line 20 */ ?></title>

	<meta charset="utf-8">
	<meta name="author" content="Daniel Dolejška">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo LR\Filters::escapeHtmlAttr($service->meta->description) /* line 25 */ ?>">
	<meta name="keywords" content="<?php echo LR\Filters::escapeHtmlAttr($service->meta->keywords) /* line 26 */ ?>">


	<meta property="og:url" content="<?php echo LR\Filters::escapeHtmlAttr($_SERVER['REQUEST_SCHEME']) /* line 29 */ ?>://<?php
		echo LR\Filters::escapeHtmlAttr($_SERVER['HTTP_HOST']) /* line 29 */;
		echo LR\Filters::escapeHtmlAttr($_SERVER['REQUEST_URI']) /* line 29 */ ?>">
	<meta property="og:type" content="<?php echo LR\Filters::escapeHtmlAttr($service->meta->type) /* line 30 */ ?>">
	<meta property="og:title" content="<?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'htmlAttr', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> - <?php
		}
		elseif (isset($title)) {
			echo LR\Filters::escapeHtmlAttr($title) /* line 31 */ ?> - <?php
		}
		echo LR\Filters::escapeHtmlAttr($service->meta->siteName) /* line 31 */ ?>">
	<meta property="og:description" content="<?php echo LR\Filters::escapeHtmlAttr($service->meta->description) /* line 32 */ ?>">
<?php
		$iterations = 0;
		foreach ($service->meta->images as $url => $info) {
			?>	<meta property="og:image" content="<?php echo LR\Filters::escapeHtmlAttr($_SERVER['REQUEST_SCHEME']) /* line 34 */ ?>://<?php
			echo LR\Filters::escapeHtmlAttr($_SERVER['HTTP_HOST']) /* line 34 */;
			echo LR\Filters::escapeHtmlAttr($url) /* line 34 */ ?>">
	<meta property="og:image:secure_url" content="https://<?php
			echo LR\Filters::escapeHtmlAttr($_SERVER['HTTP_HOST']) /* line 35 */;
			echo LR\Filters::escapeHtmlAttr($url) /* line 35 */ ?>">
	<meta property="og:image:type" content="<?php echo LR\Filters::escapeHtmlAttr($info['type']) /* line 36 */ ?>">
	<meta property="og:image:width" content="<?php echo LR\Filters::escapeHtmlAttr($info['width']) /* line 37 */ ?>">
	<meta property="og:image:height" content="<?php echo LR\Filters::escapeHtmlAttr($info['height']) /* line 38 */ ?>">
<?php
			$iterations++;
		}
		if ($service->meta->facebook->app_id) {
			?>	<meta property="fb:app_id" content="<?php echo LR\Filters::escapeHtmlAttr($service->meta->facebook->app_id) /* line 40 */ ?>">
<?php
		}
		if ((array)$service->meta->facebook->page_ids) {
			?>	<meta property="fb:pages" content="<?php echo LR\Filters::escapeHtmlAttr(implode(',', (array)$service->meta->facebook->page_ids)) /* line 41 */ ?>">
<?php
		}
		if ((array)$service->meta->facebook->admins) {
			?>	<meta property="fb:admins" content="<?php echo LR\Filters::escapeHtmlAttr(implode(',', (array)$service->meta->facebook->admins)) /* line 42 */ ?>">
<?php
		}
?>

	<!-- // CSS & META \\ -->
	<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
	<!-- \\ CSS & META // -->
</head>

<body>
<!-- // HEADER \\ -->
<?php
		/* line 53 */
		$this->createTemplate("_header.latte", $this->params, "include")->renderToContentType('html');
?>
<!-- \\ HEADER // -->

<!-- // CONTENT \\ -->
<div id="alerts"<?php if ($_tmp = array_filter(['container'])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>>
<?php
		if (isset($flashes)) {
			$iterations = 0;
			foreach ($flashes as $flash) {
				?>	<div<?php if ($_tmp = array_filter(['alert', "alert-$flash->type", 'alert-dismissible', 'fade', 'show'])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
				echo LR\Filters::escapeHtmlText($flash->message) /* line 59 */ ?><button type="button" class="close" data-dismiss="alert" aria-label="Zavřít"><span aria-hidden="true">&times;</span></button></div>
<?php
				$iterations++;
			}
		}
?>
</div>
<?php
		$this->renderBlock('content', $this->params, 'html');
?>

<div class="modal fade" tabindex="-1" role="dialog" id="steam-login-force">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Steam Sign-in Required</h5>
			</div>
			<div class="modal-body">
				<p>Please sign in with your Steam account to continue.</p>
<?php
		ob_start(function () {});
		?>				<p><?php
		ob_start();
		echo $service->steam->login->dialogContent /* line 72 */;
		$this->global->ifcontent = ob_get_flush();
?></p>
<?php
		if (rtrim($this->global->ifcontent) === "") ob_end_clean();
		else echo ob_get_clean();
?>
				<div class="text-center">
					<a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($Steam->_loginUrl)) /* line 74 */ ?>">
						<img alt="Sign in" src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="steam-login-prompt">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Steam Sign-in</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Please sign in with your Steam account.</p>
				<div class="text-center">
					<a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($Steam->_loginUrl)) /* line 95 */ ?>">
						<img alt="Sign in" src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png">
					</a>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="no-events">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">No events were found!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<p>There were no events found for this server/log selection.</p>
				<p class="m-0">There are either no recorded events in selected log or the filters are too strict.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- \\ CONTENT // -->

<!-- // FOOTER \\ -->
<?php
		/* line 129 */
		$this->createTemplate("_footer.latte", $this->params, "include")->renderToContentType('html');
?>
<!-- \\ FOOTER // -->

<!-- // JS \\ -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php
		$this->renderBlock('scripts', get_defined_vars());
?>
<script type="text/javascript">
	$(function () {
<?php
		if ($service->steam->login->enabled && $service->steam->login->force) {
?>
		$( "#steam-login-force" ).modal({
			backdrop: 'static',
			keyboard: false,
		});
<?php
		}
		elseif ($service->steam->login->enabled && $service->steam->login->prompt) {
?>
		$( "#steam-login-prompt" ).modal('show');
<?php
		}
?>
	});
</script>
<!-- \\ JS // -->
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['url'])) trigger_error('Variable $url overwritten in foreach on line 33');
		if (isset($this->params['info'])) trigger_error('Variable $info overwritten in foreach on line 33');
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 59');
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		
	}

}
