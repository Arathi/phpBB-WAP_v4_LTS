		<div class="panel">
			<div class="inner"><span class="corners-top"><span></span></span>
			<div class="content">
				<h2>{POLL_QUESTION}</h2>
				<fieldset class="polls">
					<!-- BEGIN poll_option -->
					<dl style="border-top: none;">
						<dt><label>{poll_option.POLL_OPTION_CAPTION}</label></dt>
						<dd class="resultbar"><div class="pollbar1" style="width:{poll_option.POLL_OPTION_PERCENT};">{poll_option.POLL_OPTION_RESULT}</div></dd>
						<dd>{poll_option.POLL_OPTION_PERCENT}</dd>
					</dl>
					<!-- END poll_option -->
					<dl>
						<dt>&nbsp;</dt>
						<dd class="resultbar">{L_TOTAL_VOTES} : {TOTAL_VOTES}</dd>
					</dl>
				</fieldset>
			</div>
			<span class="corners-bottom"><span></span></span></div>
		</div>