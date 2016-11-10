<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Speeltocht quizz</title>

</head>
<body>

<div id="container">
       
   


    <?php foreach($questions as $row) { ?>
    
    <?php $ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->answer);
	shuffle($ans_array); ?>
    
    <p><?=$row->quizID?>.<?=$row->question?></p>
    
    <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[0]?>" required> <?=$ans_array[0]?><br>
    <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
    <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
    <input type="radio" name="quizid<?=$row->quizID?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
    
    <?php } ?>
    
    <br><br>

    <div id="puzzell">
    
   
    <input type="submit" onclick="javascript:quiz();" value="Antwoord">

    <script type="text/javascript">


function quiz(){
  jQuery.ajax({
    'url': '<?php echo base_url();?>index.php/Questions/resultdisplay',
    'success': function(data){
      jQuery('#puzzell').html(data);
    }
  })
  
}

    </script>

        </div>

            </form>
    
    
</div>

</body>
</html>
