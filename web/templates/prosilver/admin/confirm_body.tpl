				<form action="{S_CONFIRM_ACTION}" method="post">
				<fieldset>
					<h1>{MESSAGE_TITLE}</h1>
					<p>{MESSAGE_TEXT}</p>
					{S_HIDDEN_FIELDS}
					<div style="text-align:center">
						<input type="submit" name="confirm" value="{L_YES}" class="button2" />&nbsp; 
						<input type="submit" name="cancel" value="{L_NO}" class="button2" />
					</div>
				</fieldset>
				</form>