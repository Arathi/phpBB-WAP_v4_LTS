<?php
/*************************************************
 *		admin_groups.php
 *		-------------------
 *      Разработка: phpBB Group.
 *      Оптимизация под WAP: Гутник Игорь ( чел ).
 *          2010 год
 *		简体中文：爱疯的云
 *		描述：小组权限控制
 *************************************************/

define('IN_PHPBB', true);

if ( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['Groups']['Auth_Control_Group'] = $filename;

	return;
}

$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

if ( isset($HTTP_POST_VARS[POST_GROUPS_URL]) || isset($HTTP_GET_VARS[POST_GROUPS_URL]) )
{
	$group_id = ( isset($HTTP_POST_VARS[POST_GROUPS_URL]) ) ? intval($HTTP_POST_VARS[POST_GROUPS_URL]) : intval($HTTP_GET_VARS[POST_GROUPS_URL]);
}
else
{
	$group_id = 0;
}

if ( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
	$mode = htmlspecialchars($mode);
}
else
{
	$mode = '';
}

if ( isset($HTTP_POST_VARS['edit']) || isset($HTTP_POST_VARS['new']) )
{
	$template->set_filenames(array(
		'body' => 'admin/group_edit_body.tpl')
	);

	if ( isset($HTTP_POST_VARS['edit']) )
	{

		$sql = "SELECT *
			FROM " . GROUPS_TABLE . "
			WHERE group_single_user <> " . TRUE . "
			AND group_id = $group_id";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Error getting group information', '', __LINE__, __FILE__, $sql);
		}

		if ( !($group_info = $db->sql_fetchrow($result)) )
		{
			message_die(GENERAL_MESSAGE, $lang['Group_not_exist']);
		}

		$mode = 'editgroup';
		$template->assign_block_vars('group_edit', array());

	}
	else if ( isset($HTTP_POST_VARS['new']) )
	{
		$group_info = array (
			'group_name' 		=> '',
			'group_description' => '',
			'group_moderator' 	=> '',
			'group_type' 		=> GROUP_OPEN);
		$group_open = ' checked="checked"';
		$group_guestbook = 'checked="checked"';

		$mode = 'newgroup';

	}

	if ($group_info['group_moderator'] != '')
	{
		$sql = "SELECT user_id, username
			FROM " . USERS_TABLE . "
			WHERE user_id = " . $group_info['group_moderator'];
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain user info for moderator list', '', __LINE__, __FILE__, $sql);
		}

		if ( !($row = $db->sql_fetchrow($result)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain user info for moderator list', '', __LINE__, __FILE__, $sql);
		}

		$group_moderator = $row['username'];
	}
	else
	{
		$group_moderator = '';
	}

	$group_open = ( $group_info['group_type'] == GROUP_OPEN ) ? ' checked="checked"' : '';
	$group_closed = ( $group_info['group_type'] == GROUP_CLOSED ) ? ' checked="checked"' : '';
	$group_hidden = ( $group_info['group_type'] == GROUP_HIDDEN ) ? ' checked="checked"' : '';
	$group_guestbook = ( $group_info['guestbook_enable'] == 1 ) ? 'checked="checked"' : '';

	$s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" /><input type="hidden" name="' . POST_GROUPS_URL . '" value="' . $group_id . '" />';

	$template->assign_vars(array(
		'GROUP_NAME' 					=> $group_info['group_name'],
		'GROUP_DESCRIPTION' 			=> $group_info['group_description'], 
		'GROUP_LOGO'					=> $group_info['group_logo'],
		'GROUP_MODERATOR' 				=> $group_moderator, 

		'L_GROUP_TITLE' 				=> $lang['Group_administration'],
		'L_GROUP_EDIT_DELETE' 			=> ( isset($HTTP_POST_VARS['new']) ) ? $lang['New_group'] : $lang['Edit_group'], 
		'L_GROUP_NAME' 					=> $lang['group_name'],
		'L_GROUP_DESCRIPTION' 			=> $lang['group_description'],
		'L_GROUP_MODERATOR' 			=> $lang['group_moderator'], 
		'L_FIND_USERNAME' 				=> $lang['Find_username'], 
		'L_GROUP_STATUS' 				=> $lang['group_status'],
		'L_GROUP_OPEN' 					=> $lang['group_open'],
		'L_GROUP_CLOSED' 				=> $lang['group_closed'],
		'L_GROUP_HIDDEN' 				=> $lang['group_hidden'],
		'L_GROUP_DELETE' 				=> $lang['group_delete'],
		'L_GROUP_GB_ENABLE' 			=> $lang['group_gb_enable'],
		'L_GROUP_DELETE_CHECK' 			=> $lang['group_delete_check'],
		'L_SUBMIT' 						=> $lang['Submit'],
		'L_RESET' 						=> $lang['Reset'],
		'L_DELETE_MODERATOR' 			=> $lang['delete_group_moderator'],
		'L_DELETE_MODERATOR_EXPLAIN' 	=> $lang['delete_moderator_explain'],
		'L_YES' => $lang['Yes'],

		'U_ADMIN_GROUPS'				=> append_sid("admin_groups.$phpEx"),
		'U_SEARCH_USER' 				=> append_sid("../search.$phpEx?mode=searchuser"), 

		'S_GROUP_OPEN_TYPE' 			=> GROUP_OPEN,
		'S_GROUP_CLOSED_TYPE' 			=> GROUP_CLOSED,
		'S_GROUP_HIDDEN_TYPE' 			=> GROUP_HIDDEN,
		'S_GROUP_OPEN_CHECKED' 			=> $group_open,
		'S_GROUP_CLOSED_CHECKED' 		=> $group_closed,
		'S_GROUP_HIDDEN_CHECKED' 		=> $group_hidden,
		'S_GROUP_GB_ENABLE' 			=> $group_guestbook,
		'S_GROUP_ACTION' 				=> append_sid("admin_groups.$phpEx"),
		'S_HIDDEN_FIELDS' 				=> $s_hidden_fields)
	);

	$template->pparse('body');

}
else if ( isset($HTTP_POST_VARS['group_update']) )
{
	if ( isset($HTTP_POST_VARS['group_delete']) )
	{
		$sql = "SELECT auth_mod FROM " . AUTH_ACCESS_TABLE . " 
			WHERE group_id = " . $group_id;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not select auth_access', '', __LINE__, __FILE__, $sql);
		}

		$row = $db->sql_fetchrow($result);
		if (intval($row['auth_mod']) == 1)
		{
			$sql = "SELECT user_id FROM " . USER_GROUP_TABLE . "
				WHERE group_id = " . $group_id;
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Could not select user_group', '', __LINE__, __FILE__, $sql);
			}

			$rows = $db->sql_fetchrowset($result);
			for ($i = 0; $i < count($rows); $i++)
			{
				$sql = "SELECT g.group_id FROM " . AUTH_ACCESS_TABLE . " a, " . GROUPS_TABLE . " g, " . USER_GROUP_TABLE . " ug
				WHERE (a.auth_mod = 1) AND (g.group_id = a.group_id) AND (a.group_id = ug.group_id) AND (g.group_id = ug.group_id) 
					AND (ug.user_id = " . intval($rows[$i]['user_id']) . ") AND (ug.group_id <> " . $group_id . ")";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain moderator permissions', '', __LINE__, __FILE__, $sql);
				}

				if ($db->sql_numrows($result) == 0)
				{
					$sql = "UPDATE " . USERS_TABLE . " SET user_level = " . USER . " 
					WHERE user_level = " . MOD . " AND user_id = " . intval($rows[$i]['user_id']);
					
					if ( !$db->sql_query($sql) )
					{
						message_die(GENERAL_ERROR, 'Could not update moderator permissions', '', __LINE__, __FILE__, $sql);
					}
				}
			}
		}

		$sql = "DELETE FROM " . GROUPS_TABLE . "
			WHERE group_id = " . $group_id;
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update group', '', __LINE__, __FILE__, $sql);
		}

		$sql = "DELETE FROM " . USER_GROUP_TABLE . "
			WHERE group_id = " . $group_id;
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update user_group', '', __LINE__, __FILE__, $sql);
		}

		$sql = "DELETE FROM " . AUTH_ACCESS_TABLE . "
			WHERE group_id = " . $group_id;
		if ( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, 'Could not update auth_access', '', __LINE__, __FILE__, $sql);
		}

		$message = $lang['Deleted_group'] . '<br /><br />' . sprintf($lang['Click_return_groupsadmin'], '<a href="' . append_sid("admin_groups.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');

		message_die(GENERAL_MESSAGE, $message);
	}
	else
	{
		$group_type = isset($HTTP_POST_VARS['group_type']) ? intval($HTTP_POST_VARS['group_type']) : GROUP_OPEN;
		$group_guestbook = ( $HTTP_POST_VARS['group_guestbook'] == 0 ) ? 0 : 1;
		$group_name = isset($HTTP_POST_VARS['group_name']) ? htmlspecialchars(trim($HTTP_POST_VARS['group_name'])) : '';
		$group_description = isset($HTTP_POST_VARS['group_description']) ? trim($HTTP_POST_VARS['group_description']) : '';
		$group_moderator = isset($HTTP_POST_VARS['username']) ? $HTTP_POST_VARS['username'] : '';
		$delete_old_moderator = isset($HTTP_POST_VARS['delete_old_moderator']) ? true : false;
		$group_logo = isset($HTTP_POST_VARS['group_logo']) ? htmlspecialchars(trim($HTTP_POST_VARS['group_logo'])) : '';

		if ( $group_name == '' )
		{
			message_die(GENERAL_MESSAGE, $lang['No_group_name']);
		}
		else if ( $group_moderator == '' )
		{
			message_die(GENERAL_MESSAGE, $lang['No_group_moderator']);
		}
		
		$this_userdata = get_userdata($group_moderator, true);
		$group_moderator = $this_userdata['user_id'];

		if ( !$group_moderator )
		{
			message_die(GENERAL_MESSAGE, $lang['No_group_moderator']);
		}
				
		if( $mode == "editgroup" )
		{
			$sql = "SELECT *
				FROM " . GROUPS_TABLE . "
				WHERE group_single_user <> " . TRUE . "
				AND group_id = " . $group_id;
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(GENERAL_ERROR, 'Error getting group information', '', __LINE__, __FILE__, $sql);
			}

			if( !($group_info = $db->sql_fetchrow($result)) )
			{
				message_die(GENERAL_MESSAGE, $lang['Group_not_exist']);
			}
		
			if ( $group_info['group_moderator'] != $group_moderator )
			{
				if ( $delete_old_moderator )
				{
					$sql = "DELETE FROM " . USER_GROUP_TABLE . "
						WHERE user_id = " . $group_info['group_moderator'] . " 
							AND group_id = " . $group_id;
					if ( !$db->sql_query($sql) )
					{
						message_die(GENERAL_ERROR, 'Could not update group moderator', '', __LINE__, __FILE__, $sql);
					}
				}

				$sql = "SELECT user_id 
					FROM " . USER_GROUP_TABLE . " 
					WHERE user_id = $group_moderator 
						AND group_id = $group_id";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, 'Failed to obtain current group moderator info', '', __LINE__, __FILE__, $sql);
				}

				if ( !($row = $db->sql_fetchrow($result)) )
				{
					$sql = "INSERT INTO " . USER_GROUP_TABLE . " (group_id, user_id, user_pending)
						VALUES (" . $group_id . ", " . $group_moderator . ", 0)";
					if ( !$db->sql_query($sql) )
					{
						message_die(GENERAL_ERROR, 'Could not update group moderator', '', __LINE__, __FILE__, $sql);
					}
				}
			}

			$sql = "UPDATE " . GROUPS_TABLE . "
				SET group_type = $group_type, group_name = '" . str_replace("\'", "''", $group_name) . "', group_description = '" . str_replace("\'", "''", $group_description) . "', group_moderator = $group_moderator, guestbook_enable = $group_guestbook, group_logo = '" . str_replace("\'", "''", $group_logo) . "' 
				WHERE group_id = $group_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not update group', '', __LINE__, __FILE__, $sql);
			}
	
			$message = $lang['Updated_group'] . '<br /><br />' . sprintf($lang['Click_return_groupsadmin'], '<a href="' . append_sid("admin_groups.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');;

			message_die(GENERAL_MESSAGE, $message);
		}
		else if( $mode == 'newgroup' )
		{
			$sql = "INSERT INTO " . GROUPS_TABLE . " (group_type, group_name, group_description, group_moderator, group_single_user, guestbook_enable, group_logo) 
				VALUES ($group_type, '" . str_replace("\'", "''", $group_name) . "', '" . str_replace("\'", "''", $group_description) . "', $group_moderator, '0', $group_guestbook, '" . str_replace("\'", "''", $group_logo) . "')";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not insert new group', '', __LINE__, __FILE__, $sql);
			}
			$new_group_id = $db->sql_nextid();

			$sql = "INSERT INTO " . USER_GROUP_TABLE . " (group_id, user_id, user_pending)
				VALUES ($new_group_id, $group_moderator, 0)";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not insert new user-group info', '', __LINE__, __FILE__, $sql);
			}
			
			$message = $lang['Added_new_group'] . '<br /><br />' . sprintf($lang['Click_return_groupsadmin'], '<a href="' . append_sid("admin_groups.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');;

			message_die(GENERAL_MESSAGE, $message);

		}
		else
		{
			message_die(GENERAL_MESSAGE, $lang['No_group_action']);
		}
	}
}
else
{
	$sql = "SELECT group_id, group_name
		FROM " . GROUPS_TABLE . "
		WHERE group_single_user <> " . TRUE . "
		ORDER BY group_name";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain group list', '', __LINE__, __FILE__, $sql);
	}

	$select_list = '';
	if ( $row = $db->sql_fetchrow($result) )
	{
		$select_list .= '<select name="' . POST_GROUPS_URL . '">';
		do
		{
			$select_list .= '<option value="' . $row['group_id'] . '">' . $row['group_name'] . '</option>';
		}
		while ( $row = $db->sql_fetchrow($result) );
		$select_list .= '</select>';
	}

	$template->set_filenames(array(
		'body' => 'admin/group_select_body.tpl')
	);

	$template->assign_vars(array(
		'L_GROUP_TITLE' 		=> $lang['Group_administration'],
		'L_GROUP_EXPLAIN' 		=> $lang['Group_admin_explain'],
		'L_GROUP_SELECT' 		=> $lang['Select_group'],
		'L_LOOK_UP' 			=> $lang['Look_up_group'],
		'L_CREATE_NEW_GROUP' 	=> $lang['New_group'],

		'S_GROUP_ACTION' 		=> append_sid("admin_groups.$phpEx"),
		'S_GROUP_SELECT' 		=> $select_list)
	);

	if ( $select_list != '' )
	{
		$template->assign_block_vars('select_box', array());
	}

	$template->pparse('body');
}

include('./page_footer_admin.'.$phpEx);

?>
