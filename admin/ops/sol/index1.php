<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
    include ("../../db/DB.Class.php");
    include ("../db/func.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php getAllStyle(); ?>
	<title>Hello SyntaxHighlighter</title>
	<script type="text/javascript" src="../../plug/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
	<script type="text/javascript" src="../../plug/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="../../plug/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
	<script >SyntaxHighlighter.all();</script>
</head>

<body style="background: white; font-family: Helvetica">

<h1>Hello SyntaxHighlighter</h1>
<pre id="code" class="brush: js;">
#include<stdio.h>
#include<string.h>
int main()
{
    printf("Hello world\n");
    return 0;
}
</pre>
    <script> 
       $("#code").html("Hello");
    </script>
</html>
