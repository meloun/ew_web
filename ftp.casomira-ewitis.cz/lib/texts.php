<?php
 //TEXTY
    switch($_GET['p']){
        case 'ewitis':
        case 'casomira':
            $TEXT['title_prefix'] = "Elektronická Sportovní Čipová";
            break;
        case 'zavody':
            $TEXT['title_prefix'] = "Závody - ";
            break;
        case 'reference':
            $TEXT['title_prefix'] = "Reference - ";
            break;
        case 'cenik':
            $TEXT['title_prefix'] = "Ceník - ";
            break;
        case 'kontakt':
            $TEXT['title_prefix'] = "Kontakt - ";
            break;
        default:
            $TEXT['title_prefix'] = 'Elektronická Sportovní Čipová';
  }
?>
