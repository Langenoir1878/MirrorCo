<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 11/02/2015
 * Time: 17:40:54 pm
 * @ 3001-718 Chicago
 */

namespace yzhan214\as3;

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}

require_once 'Note.php';
//require_once 'FileNoteRepository.php';
require_once 'SqliteNoteRepository.php';

//instantiate teh repository to get all the existing notes
$noteRepo = new \yzhan214\as3\SqliteNoteRepository();
$noteList = $noteRepo->getAllNotes();
$max=count($noteList);
//html section
?>


<!DOCTYPE HTML>

<html lang="en">

<head></head>

<body>
	
<div class = "left_side">
	
	<p>NOTES HISTORY :</p>

<ul>
	
	<?php

	
	//display the list of notes
	foreach($noteList as $note){
	//	$a=rand(1,$max);
	//	$tempnote= $noteList->getNoteById($a);
	//print $tempnote;
		//$tempNote = $noteList->getNoteById($a);
		//print "The corresponding note: ".$tempNote->getSubject_line();
		//rand(1,$max);
		print '<li><a href="view.php?id=' . $note->getId(). '">' . $note->getSubject_line() .  
		'<font color= "#00FFFF"> &nbsp; -By: &nbsp;' . $note->getAuthor_name() . '</font><font color="grey"> &nbsp; ' 
		. " &nbsp; ( Date created: " . $note->getCreate_date() . " &nbsp; Last modified: " . $note->getModified_date() 
		.') </font><font color = "red"> -'. $note->getChar_count() . ' characters </font> </a></li><br>';
	}
	
	?>
	
</ul>
	
<br>




</div>
<font color="white">

	<?php
	Print  "The Max count is: " . $max;


	$a=rand(1,$max);
	print "The random number: ".$a;
	$tempNote = $noteRepo->getNoteById($a);
	print $a=$tempNote->getSubject_line();

	//$tempNote = $noteList->getNoteById($a);
	//print "The corresponding note: ".$tempNote->getSubject_line();
	?></font>






	<input type="button" value="talk" onclick="alert('<?php print $a; ?>');">
			<?php /*
				<script>
				function meow(){
					<?php print $a; ?>
				}
				</script>


				<p id="demo">hi</p>
			*/?>

			<p id="demo">Purr, Meow is bored</p>
	<script>
	function meow() {
	    document.getElementById("demo").innerHTML = "<?php print $a; ?>";
	}
	</script>

	<button onclick="meow()"> TALK-2 </button>

	
</body>
</html>








