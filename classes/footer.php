<?php
class footer
{
	static public function get()
	{
		$footer = '';
		$footer .= htmlTags::footerOpen();
		$footer .= htmlTags::hr();
		date_default_timezone_set('UTC');
		$footer .= "<p>Copyright &copy; 2017-" . date("Y") . " mohammedabdulai.com</p>";
		$footer .= htmlTags::footerClose();
		return $footer;
	}
}
?>