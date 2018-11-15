<?php
$row2 = mysql_fetch_row($result2);
$total_records = $row2[0];
$total_pages = ceil($total_records /30);
echo "<table class='ignore-css'>";
for ($i=1; $i<=$total_pages; $i++) {
        if (isset($_POST["startday"])) {
                echo "<td style='border-bottom: none'>";
                echo "<form action='".$thisfile."&page=$i' method='post'>";
                echo "<input class='button' type='hidden' name='startyear' value='".$_POST['startyear']."' />";
                echo "<input class='button' type='hidden' name='startmonth' value='".$_POST['startmonth']."' />";
                echo "<input class='button' type='hidden' name='startday' value='".$_POST['startday']."' />";
                echo "<input class='button' type='hidden' name='endyear' value='".$_POST['endyear']."' />";
                echo "<input class='button' type='hidden' name='endmonth' value='".$_POST['endmonth']."' />";
                echo "<input class='button' type='hidden' name='endday' value='".$_POST['endday']."' />";
                echo "<input class='button' type='submit' value='$i' />";
                echo "</form>";
                echo "</td>";

} else {
                echo "<td style='border-bottom: none'>";
                echo "<form action='".$thisfile."&page=$i' method='post' class='ignore-css'>";
                echo "<input class='button' type='submit' value='$i' />";
                echo "</form>";
                echo "</td>";

};
}
echo "</table>";
?>
