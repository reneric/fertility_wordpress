<?php
/**
 * @version		$Id: filelist.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Framework
 * @subpackage	Parameter
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('JPATH_BASE') or die;

/**
 * Renders a filelist element
 *
 * @package		Joomla.Framework
 * @subpackage		Parameter
 * @since		1.5
 */

class JElementFileYtlist extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	protected $_name = 'FileYtlist';

	public function fetchElement($name, $value, &$node, $control_name, $attr , $id)
	{
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');

		// path to images directory
		$path		= JPATH_ROOT.DS.$node->attributes('directory');
		$filter		= $node->attributes('filter');
		$exclude	= $node->attributes('exclude');
		$stripExt	= $node->attributes('stripext');
		$files		= JFolder::files($path, $filter);
		
		$options = array ();

		if (!$node->attributes('hide_none'))
		{
			$options[] = JHtml::_('select.option', '-1', JText::_('JOPTION_DO_NOT_USE'));
		}

		if (!$node->attributes('hide_default'))
		{
			$options[] = JHtml::_('select.option', '', JText::_('JOPTION_USE_DEFAULT'));
		}
		
		if (is_array($files))
		{
			foreach ($files as $file)
			{
				if (intVal($exclude))
				{
					if (preg_match(chr(1) . $exclude . chr(1), $file))
					{
						continue;
					}
				}
				if (intVal($stripExt))
				{
					$file = JFile::stripExt($file);
				}
				
				$options[] = JHtml::_('select.option', $file, $file);
			}
		}
		
		/*return JHtml::_('select.genericlist', $options, $control_name .'['. $name .']',
			array(
				'id' => 'param'.$name,
				'list.attr' => 'class="inputbox"',
				'list.select' => $value
			)
		);*/
		return JHTML::_( 'select.genericlist', $options, $name, trim($attr), 'value', 'text', $value, $id );
	}
}
