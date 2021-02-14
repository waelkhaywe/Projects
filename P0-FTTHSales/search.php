<html>
    <head>
    <title>Dynamic Drop Down List</title>
    </head>
    <BODY bgcolor ="pink">
       
            Employee List :
            <select Emp Name='NEW'>
            <option value="">--- Select ---</option>
            <?
                mysql_connect ("localhost","r6bygbsbx9ve","Khaywe_110");
                mysql_select_db ("cyberiadb");
                $select="company";
                if (isset ($cyberdb)&&$select!=""){
                $select=$_GET ['NEW'];
            }
            ?>
            <?
                $list=mysql_query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema= 'cyberiadb' AND table_name in ('buildings','keycontact','costumer')");
            while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<? echo $row_list['COLUMN_NAME']; ?>"<? if($row_list['COLUMN_NAME']==$select){ echo "selected"; } ?>>
                                         <?echo $row_list[''];?>
                    </option>
                <?
                }
                ?>
            </select>
            <input type="submit" name="Submit" value="Select" />
        </form>
    </body>
</html>