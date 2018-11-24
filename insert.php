<?
    //데이터 베이스 연결하기
include "db_info.php";

    $id = $_GET[id];
    $name = $_POST[name];
    $email = $_POST[email];
    $pass = $_POST[pass];
    $title = $_POST[title];
    $content = $_POST[content];
    $REMOTE_ADDR = $_SERVER[REMOTE_ADDR];

    $query = "INSERT INTO board
    (id, name, email, pass, title, content, wdate, ip, view)
    VALUES ('', '$name', '$email', '$pass', '$title',
    '$content', now(), '$REMOTE_ADDR', 0)";
    $result=mysql_query($query, $conn) or die(mysql_error());

    //데이터베이스와의 연결 종료
    mysql_close($conn);

    // 새 글 쓰기인 경우 리스트로..
    echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
    //1초후에 list.php로 이동함.
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>




여기서 echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");




이것 빼고는 다 익숙한데 이것은 1초후에 list.php로 이동하라는 뜻이다.







edit.php 파일  글 읽기 페이지의 글 수정하기 버튼을 통해서 글 수정하기 페이지로 이동한다. 이때 읽고있던 글의 id값을 넘겨준다.




<html>
<head>
<title>초 허접 게시판</title>
<style>
<!--
td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none;
font-family: 굴림; font-size : 9pt; }
A:visited { text-decoration : none; color : black;
font-size : 9pt; }
A:hover { text-decoration : underline; color : black;
font-size : 9pt;}
-->
</style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form action=update.php?id=<?=$_GET[id]?> method=post>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 align=center bgcolor=#999999>
            <font color=white><B>글 수 정 하 기</B></font>
        </td>
    </tr>
<?
    //데이터 베이스 연결하기
    include "db_info.php";
    $id = $_GET[id];
    $no = $_GET[no];

    // 먼저 쓴 글의 정보를 가져온다.
    $result=mysql_query("SELECT * FROM board WHERE id=$id", $conn);
    $row=mysql_fetch_array($result);
?>
<!-- 입력 부분 -->
    <tr>
        <td bgcolor=white>&nbsp;
        <table>
            <tr>
                <td width=60 align=left >이름</td>
                <td align=left >
                    <INPUT type=text name=name size=20
                    value="<?=$row[name]?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >이메일</td>
                <td align=left >
                    <INPUT type=text name=email size=20
                    value="<?=$row[email]?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >비밀번호</td>
                <td align=left >
                    <INPUT type=password name=pass size=8>
                    (비밀번호가 맞아야 수정가능)
                </td>
            </tr>
            <tr>
                <td width=60 align=left >제 목</td>
                <td align=left >
                    <INPUT type=text name=title size=60
                    value="<?=$row[title]?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >내용</td>
                <td align=left >
                    <TEXTAREA name=content cols=65 rows=15><?=$row[content]?></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td colspan=10 align=center>
                    <INPUT type=submit value="글 저장하기">
                    &nbsp;&nbsp;
                    <INPUT type=reset value="다시 쓰기">
                    &nbsp;&nbsp;
                    <INPUT type=button value="되돌아가기"
                    onclick="history.back(-1)">
                </td>
            </tr>
            </TABLE>
        </td>
    </tr>
<!-- 입력 부분 끝 -->
</table>
</form>
</center>
</body>
</html>
