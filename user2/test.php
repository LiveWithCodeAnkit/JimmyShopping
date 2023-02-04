<table>
<form method="post">
<tr>
<td><input type="checkbox" name="pmode" value="hello"><h4>hello</h4></td>
</tr>
</table>
<input type="submit" value="test" name="btntest">
</form>
<?php
if(isset($_POST['btntest']))
{
    if(isset($_POST['pmode']))
    {
        echo $_POST['pmode'];
    }
    else
    {
        echo "please select payment mode";
    }
}
?>