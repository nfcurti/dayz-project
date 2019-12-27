<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/Front/contact.latte

use Latte\Runtime as LR;

class Template0970f2f1f0 extends Latte\Runtime\Template
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
<main id="main_content" style="display: block; margin:0 auto;z-index: 10000;width: 25%;padding: 1em; background-color: white;margin-top: 10%">
        <div class="panel panel-success  iz-action-panel" tabindex=10 role=panel id=panel-contact style="display: block">
            <div class=panel-heading>
                <h4>Contact Us ( Send us a Message )</h4> </div>
            <div class=panel-body>
                <form class=form id="contact-form" method="POST">
                    <div id="contact-error" style="color:red;"></div>
                    <div class="form-group label-static">
                        <label for=contact_name class=control-label>Name</label>
                        <input name=contact_name id=contact_name class=form-control autocorrect=off autocapitalize=none>
                    </div>
                    <div class="form-group label-static">
                        <label for=contact_email class=control-label>Email</label>
                        <input name=contact_email id=contact_email class=form-control autocorrect=off autocapitalize=none>
                    </div>
                    <div class="form-group label-static">
                        <label for=contact_message class=control-label>Message</label>
                        <textarea name=contact_message id=contact_message rows="3" class=form-control></textarea>
                    </div>
                    <div id="recaptcha_box"></div>
                    <input type="hidden" id="recaptcha_response" name="recaptcharesponse">
                    <div class=panel-controls>
                        <button type=submit class="btn btn-primary btn-close" id="btn-cancel-login" style="color: white;background-color: #24476C">Send Message</button>
                    </div>
                </form>
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
            </div>
        </div>
    </main>
    
</body>

<?php
		/* line 54 */
		$this->createTemplate("../_footer.latte", $this->params, "include")->renderToContentType('html');
		return get_defined_vars();
	}

}
