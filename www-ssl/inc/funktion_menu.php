<?PHP

function ShowMenu( $MenuName)
{
	global $MenueTableStart, $MenueTableEnd, $_SESSION, $DEBUG, $url, $ENGEL_ROOT;
	$Gefunden=FALSE;

	//�berschift
	$Text = "<h4 class=\"menu\">". Get_Text("$MenuName/"). "</h4>";
	
	//eintr�ge
	foreach( $_SESSION['CVS'] as $Key => $Entry )
		if( strpos( $Key, ".php") > 0)
			if( (strpos( "00$Key", "0$MenuName") > 0) ||
			    ((strlen($MenuName)==0) && (strpos( "0$Key", "/") == 0) ) )
			{
				$TempName = Get_Text($Key, TRUE);
				if(( TRUE||$DEBUG) && (strlen($TempName)==0) )
					$TempName = "not found: \"$Key\"";
				
				if( $Entry == "Y")
				{
					//zum absichtlkichen ausblenden von eintr�gen
					if( strlen($TempName)>1)
					{
						$Gefunden = TRUE;
						$Text .= "\t\t\t<li><a href=\"". $url. substr( $ENGEL_ROOT, 1). $Key. "\">$TempName</a></li>\n";
					}
				}
				elseif( $DEBUG ) 
				{
					$Gefunden = TRUE;
					$Text .= "\t\t\t<li>$TempName ($Key)</li>\n";
				}
			}
	if( $Gefunden)
		echo $MenueTableStart.$Text.$MenueTableEnd;
}//function ShowMenue

?>
