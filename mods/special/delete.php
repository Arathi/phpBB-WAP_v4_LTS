<?php/********************************** *		delete.php *		---------	 *		简体中文：爱疯的云 *		说明：专题功能 **********************************/ define('IN_PHPBB', true);$phpbb_root_path = './../../';include($phpbb_root_path . 'extension.inc');include($phpbb_root_path . 'common.'.$phpEx);$userdata = session_pagestart($user_ip, PAGE_SPECIAL);init_userprefs($userdata);// 验证用户是否登录if ( !$userdata['session_logged_in'] ){	redirect(append_sid("login.$phpEx?redirect=mods/special/index.$phpEx", true));	exit;}if ( isset($HTTP_GET_VARS[POST_FORUM_URL]) ){	$forum_id = intval($HTTP_GET_VARS[POST_FORUM_URL]);}else{	$forum_id = '';}if ( isset($HTTP_GET_VARS['id']) ){	$special_id = intval($HTTP_GET_VARS['id']);}else{	$special_id = '';}if ( !$special_id || !$forum_id ){	message_die(GENERAL_MESSAGE, '请指定论坛和专题！');}$is_mod = ( $userdata['user_level'] == ADMIN || $userdata['user_level'] == MOD || $userdata['user_level'] == MODCP ) ? true : false;if( $is_mod ){		if ( isset($HTTP_POST_VARS['cancel']) )	{		redirect(append_sid("mods/special/index.$phpEx?" . POST_FORUM_URL . "=$forum_id", true));	}	$confirm = ( $HTTP_POST_VARS['confirm'] ) ? true : false;		if( !$confirm )	{		include($phpbb_root_path . 'includes/page_header.'.$phpEx);		$template->set_filenames(array(			'confirm' => 'confirm_body.tpl')		);				$template->assign_vars(array(			'MESSAGE_TITLE' => $lang['Confirm'],			'MESSAGE_TEXT' => '请确认是否删除该专题？',			'L_YES' => $lang['Yes'],			'L_NO' => $lang['No'],			'S_CONFIRM_ACTION' => append_sid("{$phpbb_root_path}mods/special/delete.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;id=$special_id"))		);				$template->pparse('confirm');		include($phpbb_root_path . 'includes/page_tail.'.$phpEx);		exit;	}	else	{		$sql = "DELETE FROM phpbb_specials			WHERE special_id = $special_id";		if ( !($result = $db->sql_query($sql)) )		{			message_die(GENERAL_ERROR, '无法删除数据', '', __LINE__, __FILE__, $sql);		}		$message = '专题已成功删除！<br /><br />点击 <a href="' . append_sid("index.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">这里</a> 上一页面！<br /><br />' . sprintf('点击 %s这里%s 返回首页！', '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');		message_die(GENERAL_MESSAGE, $message);	}}?>