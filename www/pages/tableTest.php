<tr id_test="<?php echo $arg[$i]["id_theme"]; ?>" onclick="window.location.href='/pages/wolktest.php?id=<?php echo $arg[$i]["id_theme"]."&id_table=".($i+1); ?>'">
  <td class="click_test tdcenter"><?php echo $arg[$i]["name_theme"]; ?></td>
  <td class="click_test tdcenter"><?php echo $arg[$i]["name_specialty"]; ?></td>
  <td class="click_test tdcenter"><?php echo $arg[$i]["name_subject"];?></td>
  <td class="click_test tdcenter"><?php echo $name_author["surname"]." ".$name_author["name"];?></td>
</tr>
