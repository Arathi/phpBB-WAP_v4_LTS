		<form method="post" action="{S_POLL_ACTION}">
		<div class="panel">
			<div class="inner"><span class="corners-top"><span></span></span>
			<div class="content">
				<h2>{POLL_QUESTION}</h2>
				<fieldset class="polls">
					<!-- BEGIN poll_option -->
					<dl style="border-top: none;">
						<dt><label>{poll_option.POLL_OPTION_CAPTION}</label></dt>
						<dd style="width: auto;"><input type="radio" name="vote_id" value="{poll_option.POLL_OPTION_ID}" /></dd>
					</dl>
					<!-- END poll_option -->
					<dl>
						<dt>&nbsp;</dt>
						<dd class="resultbar"><input type="submit" name="update" value="{L_SUBMIT_VOTE}" class="button1" /></dd>
					</dl>
					<dl style="border-top: none;">
						<dt>&nbsp;</dt>
						<dd class="resultbar"><a href="{U_VIEW_RESULTS}">{L_VIEW_RESULTS}</a></dd>
					</dl>
				</fieldset>
			</div>
			<span class="corners-bottom"><span></span></span></div>
			{S_HIDDEN_FIELDS}
		</div>
		</form>
		<hr />