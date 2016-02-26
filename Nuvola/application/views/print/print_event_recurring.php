<?php 




//$root_path = __DIR__;

$root_path[0] = base_url(); //explode("/application", $root_path);
 
$this->lang->load("reports",$this->session->userdata("language_name"));


//print_r($data);

$date = date('m/d/y h:i a');

$idcol = Lang('Event')." ".Lang('ID');

$locationcol = Lang('Location')?Lang('Location'):'Location';

$guestcol = Lang('Guest')?Lang('Guest'):'Guest';

$issuecol = Lang('Issues')?Lang('Issues'):'Issue';

$deptTagcol = lang('Department_Tag');

$usercol = Lang('User')?Lang('User'):'User';

$dateTimecol = Lang('datetime')?Lang('datetime'):'Date & Time';





$dateheader= lang('Date').': '. date("m/d/y").' - '.lang('Time').': '.date('h:i A');

$Duration = Lang('Duration')?Lang('Duration'):'Duration';





$room = Lang('room')?Lang('room'):'Room';



$NLine = 0;




 

$content = '';

//print_r($data['data']);


$dep_show = "";




//Inicio de la tabla
$content .='<br/> 

    <div style="border: 1px solid #333; width: 100% !important;">

    <table border="0" cellpadding="0" cellspacing="0" style="width:100%; border-collapse: collapse;margin-right:-1px;">

      <tr style="background-color: #143f6c;font-family:Open Sans,sans-serif;font-size:12px;">
       
       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.$dateTimecol.'</td>

       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.$room.'</td>

      <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.Lang('Guest').'</td> 
      
       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.$issuecol.'</td>

       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.$deptTagcol .'</td>

       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'. Lang('Priority') .'</td>

       <td style="font-family:Open Sans, sans-serif; font-weight:600; font-size:12px; color:#fff; padding:8px 5px; text-align:center; border-right:1px solid #fff;">'.Lang('Contacted').'</td>

       
      </tr>';

 

$cont=0;

//LEE EL LISTADO DE LOS RECURRENTES
foreach ($data['data'] as  $value) {
  
  if(($cont % 2) == 0){
    $gris = '';
  }else{
    $gris = 'background-color: #f1f2f2; ';
  }


  if(is_numeric($value['1'])){
    $room = Lang('room').' '.$value['1'];
  }else{
    $room = $value['1'];
  }

  if($value['5'] == 1)
      $priority_txt=Lang('High');
  else if($value['5'] == 2)
      $priority_txt=Lang('Medium');
  else    if($value['5'] == 3)
      $priority_txt=Lang('Low');

  if($value['6'] == 1)
      $contact_txt=Lang('Yes');
  else if($value['6'] == 0)
      $contact_txt=Lang('No');


$day_week = Lang(date('l',strtotime($value[0])));

  $content .='
        <tr style="'.$gris.'font-family:Open Sans,sans-serif;font-size:12px;">

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.$day_week.date(' , M d Y - h:i A',strtotime($value[0])).'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.$room.'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.ucwords($value[2]).'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:left; border-right:1px solid #fff;">'.$value[3].'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.ucwords(strtolower($value[4])).'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.$priority_txt.'</td>

         <td style="font-family:Open Sans, sans-serif; font-weight:400; font-size:12px; color:#000; padding:5px; text-align:center; border-right:1px solid #fff;">'.$contact_txt.'</td>

        </tr>';
  
  $cont ++;

}
$content .= ' 
               

  </table>

  </div>';


 

echo $content;
 



?> 



