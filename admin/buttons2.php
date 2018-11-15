<?php
$row2 = mysql_fetch_row($result2);
$total_records = $row2[0];
$total_pages = ceil($total_records /30);
echo "<table>";
for ($i=1; $i<=$total_pages; $i++) {
        if (isset($_POST["startday"])) {
                echo "<td>";
                echo "<form action='monitor.php?page=$i' method='post'>";
                echo "<input type='hidden' name='startyear' value='".$_POST['startyear']."' />";
                echo "<input type='hidden' name='startmonth' value='".$_POST['startmonth']."' />";
                echo "<input type='hidden' name='startday' value='".$_POST['startday']."' />";
                echo "<input type='hidden' name='endyear' value='".$_POST['endyear']."' />";
                echo "<input type='hidden' name='endmonth' value='".$_POST['endmonth']."' />";
                echo "<input type='hidden' name='endday' value='".$_POST['endday']."' />";
                echo "<input type='submit' value='$i' />";
                echo "</form>";
                echo "</td>";

} else {
                echo "<td>";
                echo "<form action='monitor.php?page=$i' method='post'>";
                echo "<input type='submit' value='$i' />";
                echo "</form>";
                echo "</td>";

};
}
?>
