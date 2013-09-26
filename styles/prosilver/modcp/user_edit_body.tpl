<div class="navbar"><a href="{U_INDEX}">{L_INDEX}</a>&gt;<a href="{U_MODCP}">{L_MODCP}</a>&gt;{L_USER_TITLE}</div>
{ERROR_BOX}
<span class="genmed">{L_USER_EXPLAIN}</span>
<form action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post">
	<div class="catSides">
		<span class="cattitle">用户基本信息</span>
	</div>
	<div class="row_hard">
		<span class="genmed">{L_ITEMS_REQUIRED}</span>
	</div>
	<div class="row1">
		{L_USERNAME}: *<br/>
		<input class="post" type="text" name="username" maxlength="40" value="{USERNAME}" />
	</div>
	<div class="row1">
		<span class="gen">帖子数量</span>:<br/>
		<input class="post" type="text" name="user_posts" size="5" style="width: 50px" value="{POSTS}"  />
	</div>
	<div class="row1">
		{L_EMAIL_ADDRESS}: *<br/>
		<input class="post" type="text" name="email" maxlength="255" value="{EMAIL}" />
	</div>
	<div class="row1">
		{L_NEW_PASSWORD}: *<br/>
		<span class="genmed">{L_PASSWORD_IF_CHANGED}</span><br/>
		<input class="post" type="password" name="password" maxlength="32" value="" />
	</div>
	<div class="row1">
		{L_CONFIRM_PASSWORD}: *<br/>
		<span class="genmedl">{L_PASSWORD_CONFIRM_IF_CHANGED}</span><br/>
		<input class="post" type="password" name="password_confirm" maxlength="32" value="" />
	</div>
	<div class="catSides">
		<span class="cattitle">{L_PROFILE_INFO}</span>
	</div>
	<div class="row_hard">
		<span class="genmed">{L_PROFILE_INFO_NOTICE}</span>
	</div>
	<div class="row1">
		{L_ICQ_NUMBER}:<br/>
	<input class="post" type="text" name="icq" maxlength="15" value="{ICQ}" />
	</div>
	<div class="row1">
		{L_NUMBER}:<br/>
		<input class="post" type="text" name="number" maxlength="15" value="{NUMBER}" />
	</div>
	<div class="row1">
		{L_AIM}:<br/>
		<input class="post" type="text" name="aim" maxlength="255" value="{AIM}" />
	</div>
	<div class="row1">
		{L_MESSENGER}:<br/>
		<input class="post" type="text" name="msn" maxlength="255" value="{MSN}" />
	</div>
	<div class="row1">
		{L_YAHOO}:<br/>
		<input class="post" type="text" name="yim" maxlength="255" value="{YIM}" />
	</div>
	<div class="row1">
		{L_WEBSITE}:<br/>
		<input class="post" type="text" name="website" maxlength="255" value="{WEBSITE}" />
	</div> 
	<div class="row1">
		{L_LOCATION}:<br/>
		<input class="post" type="text" name="location" maxlength="100" value="{LOCATION}" />
	</div>
	<div class="row1">
		{L_OCCUPATION}:<br/>
		<input class="post" type="text" name="occupation" maxlength="100" value="{OCCUPATION}" />
	</div>
	<div class="row1">
		{L_INTERESTS}:<br/>
		<input class="post" type="text" name="interests" maxlength="150" value="{INTERESTS}" />
	</div>
	<!-- Start add - Birthday MOD -->
		<div class="row1">
			{L_BIRTHDAY}:<br/>
			{S_BIRTHDAY}
		</div>
	<!-- End add - Birthday MOD -->
	<!-- Start add - Gender MOD -->
		<div class="row1">
			{L_GENDER}:<br/>
			<input type="radio" name="gender" value="0" {GENDER_NO_SPECIFY_CHECKED}/> {L_GENDER_NOT_SPECIFY}<br/>
			<input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> {L_GENDER_MALE}<br/>
			<input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> {L_GENDER_FEMALE}
		</div>
	<!-- End add - Gender MOD -->
	<div class="catSides">
		<span class="cattitle">{L_PREFERENCES}</span>
	</div>
	<div class="row1">
		{L_PUBLIC_VIEW_EMAIL}:<br/>
		<input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} /> {L_YES}<br/>
		<input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_HIDE_USER}:<br/>
		<input type="radio" name="hideonline" value="1" {HIDE_USER_YES} /> {L_YES}<br/>
		<input type="radio" name="hideonline" value="0" {HIDE_USER_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_NOTIFY_ON_REPLY}:<br/>
		<input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} /> {L_YES}<br/>
		<input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_NOTIFY_ON_PRIVMSG}:<br/>
		<input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} /> {L_YES}<br/>
		<input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_POPUP_ON_PRIVMSG}:<br/>
		<input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} /> {L_YES}<br/>
		<input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALWAYS_ADD_SIGNATURE}:<br/>
		<input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} /> {L_YES}<br/>
		<input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALWAYS_ALLOW_BBCODE}:<br/>
		<input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} /> {L_YES}<br/>
		<input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALWAYS_ALLOW_HTML}:<br/>
		<input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} /> {L_YES}<br/>
		<input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALWAYS_ALLOW_SMILIES}:<br/>
		<input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} /> {L_YES}<br/>
		<input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_NIC_COLOR}:<br/>
		<input class="post" type="text" name="nic_color" maxlength="10" value="{NIC_COLOR}" />
	</div>
	<div class="row1">
		{L_TIMEZONE}:<br/>
		{TIMEZONE_SELECT}
	</div>

	<div class="row1">
		{L_DATE_FORMAT}:<br/>
		<input class="post" type="text" name="dateformat" value="{DATE_FORMAT}" maxlength="16" />
	</div>
	<div class="row1">
		{L_TOPICS_PER_PAGE}:<br/>
		<input class="post" type="text" name="topics_per_page" value="{TOPICS_PER_PAGE}" size="5" maxlength="3" />
	</div>
	<div class="row1">
		{L_POSTS_PER_PAGE}:<br/>
		<input class="post" type="text" name="posts_per_page" value="{POSTS_PER_PAGE}" size="5" maxlength="3" />
	</div>
	<div class="catSides">
		<span class="cattitle">{L_AVATAR_PANEL}</span>
	</div>
	<div class="row1">
		{L_CURRENT_IMAGE}:<br/>
		{AVATAR}<br/>
		<input type="checkbox" name="avatardel" /> {L_DELETE_AVATAR}
	</div>
	<!-- BEGIN avatar_local_upload -->
		<div class="row1">
			{L_UPLOAD_AVATAR_FILE}:<br/>
			<input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />
			<input type="file" name="avatar" class="post" />
		</div>
	<!-- END avatar_local_upload -->
	<!-- BEGIN avatar_remote_upload -->
		<div class="row1">
			{L_UPLOAD_AVATAR_URL}:<br/>
			<input class="post" type="text" name="avatarurl" />
		</div>
	<!-- END avatar_remote_upload -->
	<!-- BEGIN avatar_remote_link -->
		<div class="row1">
			{L_LINK_REMOTE_AVATAR}:<br/>
			<input class="post" type="text" name="avatarremoteurl" />
		</div>
	<!-- END avatar_remote_link -->
	<!-- BEGIN avatar_local_gallery -->
		<div class="row1">
			{L_AVATAR_GALLERY}:<br/>
			<input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" />
		</div>
	<!-- END avatar_local_gallery -->
	<div class="catSides">
		<span class="cattitle">{L_SPECIAL}</span>
	</div>
	<div class="row_hard">
		<span class="genmed">{L_SPECIAL_EXPLAIN}</span>
	</div>
	<div class="row1">
		{L_UPLOAD_QUOTA}:<br/>
		{S_SELECT_UPLOAD_QUOTA}
	</div>
	<div class="row1">
		{L_PM_QUOTA}:<br/>
		{S_SELECT_PM_QUOTA}
	</div>
	<div class="row1">
		{L_USER_ACTIVE}:<br/>
		<input type="radio" name="user_status" value="1" {USER_ACTIVE_YES} /> {L_YES}<br/>
		<input type="radio" name="user_status" value="0" {USER_ACTIVE_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALLOW_PM}:<br/>
		<input type="radio" name="user_allowpm" value="1" {ALLOW_PM_YES} /> {L_YES}<br/>
		<input type="radio" name="user_allowpm" value="0" {ALLOW_PM_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_ALLOW_AVATAR}:<br/>
		<input type="radio" name="user_allowavatar" value="1" {ALLOW_AVATAR_YES} /> {L_YES}<br/>
		<input type="radio" name="user_allowavatar" value="0" {ALLOW_AVATAR_NO} /> {L_NO}
	</div>
	<div class="row1">
		{L_SELECT_RANK}:<br/>
		<select name="user_rank">{RANK_SELECT_BOX}</select>
	</div>
	<div class="row1">
		{L_DELETE_USER}?<br/>
		<input type="checkbox" name="deleteuser">
		{L_DELETE_USER_EXPLAIN}
	</div>
	{S_HIDDEN_FIELDS}
	<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
</form>