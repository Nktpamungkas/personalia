<html>
    <title><?= $title; ?></title>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet">
      <meta name="author" content="Personal" />
      <link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="<?= base_url(); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:10pt; background-color:white }
      td.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style1 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style2 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style2 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style3 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style3 { vertical-align:top; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style4 { vertical-align:top; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style4 { vertical-align:top; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style5 { vertical-align:top; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style5 { vertical-align:top; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style6 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style6 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style7 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style7 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style8 { vertical-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style8 { vertical-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style9 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style10 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style11 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style12 { vertical-align:center; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style12 { vertical-align:center; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style13 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style13 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style14 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style14 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style15 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style15 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style16 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style16 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style17 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style17 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style18 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style18 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style19 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style19 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style20 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style20 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style21 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style21 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style22 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style22 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style24 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style24 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style26 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style26 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style27 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style27 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style28 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style33 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style33 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style34 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style34 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style35 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style35 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style36 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style36 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style37 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style37 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style38 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style38 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style40 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style40 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style41 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style41 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style42 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style42 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style43 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style43 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style44 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style44 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style45 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style45 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style46 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style47 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style47 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style48 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style48 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style49 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style49 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style50 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style50 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style51 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style51 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style52 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style52 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style53 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style53 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style54 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style54 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style55 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style55 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style56 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style56 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style57 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style57 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style58 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style58 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style59 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style59 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style60 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:14pt; background-color:white }
      th.style60 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:14pt; background-color:white }
      td.style61 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style61 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style62 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style62 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style63 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style63 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style64 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style64 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style65 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style65 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style66 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style66 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style67 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style67 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style68 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style68 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style69 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style70 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style70 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style71 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style71 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style72 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style72 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style73 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style73 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style74 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style74 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style75 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style75 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style76 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      th.style76 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      td.style77 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      th.style77 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      td.style78 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style78 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style79 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style79 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style80 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      th.style80 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      td.style81 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      th.style81 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:8pt; background-color:white }
      td.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style82 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style83 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style83 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style84 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style86 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style86 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style87 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style87 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      td.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      th.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:8pt; background-color:white }
      table.sheet0 col.col0 { width:18.97777756pt }
      table.sheet0 col.col1 { width:155.8888871pt }
      table.sheet0 col.col2 { width:21.01111087pt }
      table.sheet0 col.col3 { width:21.01111087pt }
      table.sheet0 col.col4 { width:21.01111087pt }
      table.sheet0 col.col5 { width:11.52222209pt }
      table.sheet0 col.col6 { width:11.52222209pt }
      table.sheet0 col.col7 { width:11.52222209pt }
      table.sheet0 col.col8 { width:11.52222209pt }
      table.sheet0 col.col9 { width:11.52222209pt }
      table.sheet0 col.col10 { width:11.52222209pt }
      table.sheet0 col.col11 { width:11.52222209pt }
      table.sheet0 col.col12 { width:11.52222209pt }
      table.sheet0 col.col13 { width:11.52222209pt }
      table.sheet0 col.col14 { width:11.52222209pt }
      table.sheet0 col.col15 { width:11.52222209pt }
      table.sheet0 col.col16 { width:11.52222209pt }
      table.sheet0 col.col17 { width:11.52222209pt }
      table.sheet0 col.col18 { width:11.52222209pt }
      table.sheet0 col.col19 { width:11.52222209pt }
      table.sheet0 col.col20 { width:11.52222209pt }
      table.sheet0 col.col21 { width:11.52222209pt }
      table.sheet0 col.col22 { width:11.52222209pt }
      table.sheet0 col.col23 { width:11.52222209pt }
      table.sheet0 col.col24 { width:11.52222209pt }
      table.sheet0 col.col25 { width:11.52222209pt }
      table.sheet0 col.col26 { width:11.52222209pt }
      table.sheet0 col.col27 { width:11.52222209pt }
      table.sheet0 col.col28 { width:11.52222209pt }
      table.sheet0 col.col29 { width:11.52222209pt }
      table.sheet0 col.col30 { width:11.52222209pt }
      table.sheet0 col.col31 { width:11.52222209pt }
      table.sheet0 col.col32 { width:11.52222209pt }
      table.sheet0 col.col33 { width:11.52222209pt }
      table.sheet0 col.col34 { width:11.52222209pt }
      table.sheet0 col.col35 { width:11.52222209pt }
      table.sheet0 col.col36 { width:11.52222209pt }
      table.sheet0 col.col37 { width:11.52222209pt }
      table.sheet0 col.col38 { width:11.52222209pt }
      table.sheet0 col.col39 { width:11.52222209pt }
      table.sheet0 col.col40 { width:11.52222209pt }
      table.sheet0 col.col41 { width:11.52222209pt }
      table.sheet0 col.col42 { width:11.52222209pt }
      table.sheet0 col.col43 { width:11.52222209pt }
      table.sheet0 col.col44 { width:11.52222209pt }
      table.sheet0 col.col45 { width:11.52222209pt }
      table.sheet0 col.col46 { width:11.52222209pt }
      table.sheet0 col.col47 { width:11.52222209pt }
      table.sheet0 col.col48 { width:11.52222209pt }
      table.sheet0 col.col49 { width:11.52222209pt }
      table.sheet0 col.col50 { width:11.52222209pt }
      table.sheet0 col.col51 { width:11.52222209pt }
      table.sheet0 col.col52 { width:11.52222209pt }
      table.sheet0 tr { height:12.75pt }
      table.sheet0 tr.row0 { height:12.75pt }
      table.sheet0 tr.row1 { height:12.75pt }
      table.sheet0 tr.row2 { height:12.75pt }
      table.sheet0 tr.row3 { height:12.75pt }
      table.sheet0 tr.row4 { height:6.75pt }
      table.sheet0 tr.row5 { height:18.75pt }
      table.sheet0 tr.row6 { height:13.5pt }
      table.sheet0 tr.row7 { height:12.75pt }
      table.sheet0 tr.row8 { height:12.75pt }
      table.sheet0 tr.row9 { height:19.5pt }
      table.sheet0 tr.row10 { height:12.75pt }
      table.sheet0 tr.row11 { height:12.75pt }
      table.sheet0 tr.row12 { height:12.75pt }
      table.sheet0 tr.row13 { height:12.75pt }
      table.sheet0 tr.row14 { height:12.75pt }
      table.sheet0 tr.row15 { height:12.75pt }
      table.sheet0 tr.row16 { height:12.75pt }
      table.sheet0 tr.row17 { height:12.75pt }
      table.sheet0 tr.row18 { height:48.75pt }
    </style>
  </head>

  <body onload="print();">
<style>
@page { margin-left: 0.18in; margin-right: 0.35416666666667in; margin-top: 0.24in; margin-bottom: 0.19in; }
body { margin-left: 0.18in; margin-right: 0.35416666666667in; margin-top: 0.24in; margin-bottom: 0.19in; }
</style>
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <col class="col12">
        <col class="col13">
        <col class="col14">
        <col class="col15">
        <col class="col16">
        <col class="col17">
        <col class="col18">
        <col class="col19">
        <col class="col20">
        <col class="col21">
        <col class="col22">
        <col class="col23">
        <col class="col24">
        <col class="col25">
        <col class="col26">
        <col class="col27">
        <col class="col28">
        <col class="col29">
        <col class="col30">
        <col class="col31">
        <col class="col32">
        <col class="col33">
        <col class="col34">
        <col class="col35">
        <col class="col36">
        <col class="col37">
        <col class="col38">
        <col class="col39">
        <col class="col40">
        <col class="col41">
        <col class="col42">
        <col class="col43">
        <col class="col44">
        <col class="col45">
        <col class="col46">
        <col class="col47">
        <col class="col48">
        <col class="col49">
        <col class="col50">
        <col class="col51">
        <col class="col52">
        <tbody>
          <tr class="row0">
            <td class="column0 style47 null style52" colspan="2" rowspan="4"><img src="<?= base_url(); ?>img/logo.png" width="50px"></td>
            <td class="column2 style52 s style60" colspan="39" rowspan="4">FORMULIR ANALISIS KEBUTUHAN PELATIHAN</td>
            <td class="column41 style18 s style19" colspan="12">No. Form   : 07-01</td>
          </tr>
          <tr class="row1">
            <td class="column41 style20 s style21" colspan="12">No. Revisi  : 00</td>
          </tr>
          <tr class="row2">
            <td class="column41 style1 null"></td>
            <td class="column42 style1 null"></td>
            <td class="column43 style1 null"></td>
            <td class="column44 style1 null"></td>
            <td class="column45 style1 null"></td>
            <td class="column46 style2 null"></td>
            <td class="column47 style2 null"></td>
            <td class="column48 style2 null"></td>
            <td class="column49 style2 null"></td>
            <td class="column50 style2 null"></td>
            <td class="column51 style2 null"></td>
            <td class="column52 style3 null"></td>
          </tr>
          <tr class="row3">
            <td class="column41 style4 null"></td>
            <td class="column42 style4 null"></td>
            <td class="column43 style4 null"></td>
            <td class="column44 style4 null"></td>
            <td class="column45 style4 null"></td>
            <td class="column46 style4 null"></td>
            <td class="column47 style4 null"></td>
            <td class="column48 style4 null"></td>
            <td class="column49 style4 null"></td>
            <td class="column50 style4 null"></td>
            <td class="column51 style4 null"></td>
            <td class="column52 style5 null"></td>
          </tr>
          <tr class="row4">
            <td class="column0 style22 null style22" colspan="53"></td>
          </tr>
          <tr class="row5">
            <td class="column0 style23 s style25" colspan="53">Bagian / Departemen   : <?= $user['dept']; ?> </td>
          </tr>
          <tr class="row6">
            <td class="column0 style39 s style40" rowspan="3">No.</td>
            <td class="column1 style44 s style46" rowspan="3">Topik Pelatihan</td>
            <td class="column2 style70 s style72" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*) Level / </td>
            <td class="column5 style26 s style27" colspan="48">Rencana Pelaksanaan Kegiatan Pelatihan (Bulan / Minggu)</td>
          </tr>
          <tr class="row7">
            <td class="column2 style28 s style29" colspan="3">Jabatan</td>
            <td class="column5 style13 s style15" colspan="4">Jan</td>
            <td class="column9 style16 s style15" colspan="4">Feb</td>
            <td class="column13 style13 s style17" colspan="4">Mar</td>
            <td class="column17 style13 s style15" colspan="4">Apr</td>
            <td class="column21 style16 s style15" colspan="4">Mei</td>
            <td class="column25 style13 s style15" colspan="4">Jun</td>
            <td class="column29 style13 s style15" colspan="4">Jul</td>
            <td class="column33 style13 s style17" colspan="4">Agt</td>
            <td class="column37 style13 s style15" colspan="4">Sept</td>
            <td class="column41 style13 s style17" colspan="4">Okt</td>
            <td class="column45 style13 s style15" colspan="4">Nov</td>
            <td class="column49 style16 s style15" colspan="4">Des</td>
          </tr>
          <tr class="row8">
            <td class="column2 style6 s">Opr</td>
            <td class="column3 style6 s">GL</td>
            <td class="column4 style7 s">SPV</td>
            <td class="column5 style64 n">1</td>
            <td class="column6 style6 n">2</td>
            <td class="column7 style6 n">3</td>
            <td class="column8 style65 n">4</td>
            <td class="column9 style66 n">1</td>
            <td class="column10 style6 n">2</td>
            <td class="column11 style6 n">3</td>
            <td class="column12 style65 n">4</td>
            <td class="column13 style64 n">1</td>
            <td class="column14 style6 n">2</td>
            <td class="column15 style6 n">3</td>
            <td class="column16 style7 n">4</td>
            <td class="column17 style64 n">1</td>
            <td class="column18 style6 n">2</td>
            <td class="column19 style6 n">3</td>
            <td class="column20 style65 n">4</td>
            <td class="column21 style66 n">1</td>
            <td class="column22 style6 n">2</td>
            <td class="column23 style6 n">3</td>
            <td class="column24 style65 n">4</td>
            <td class="column25 style64 n">1</td>
            <td class="column26 style6 n">2</td>
            <td class="column27 style6 n">3</td>
            <td class="column28 style65 n">4</td>
            <td class="column29 style64 n">1</td>
            <td class="column30 style6 n">2</td>
            <td class="column31 style6 n">3</td>
            <td class="column32 style65 n">4</td>
            <td class="column33 style64 n">1</td>
            <td class="column34 style6 n">2</td>
            <td class="column35 style6 n">3</td>
            <td class="column36 style7 n">4</td>
            <td class="column37 style64 n">1</td>
            <td class="column38 style6 n">2</td>
            <td class="column39 style6 n">3</td>
            <td class="column40 style65 n">4</td>
            <td class="column41 style64 n">1</td>
            <td class="column42 style6 n">2</td>
            <td class="column43 style6 n">3</td>
            <td class="column44 style7 n">4</td>
            <td class="column45 style67 n">1</td>
            <td class="column46 style68 n">2</td>
            <td class="column47 style68 n">3</td>
            <td class="column48 style69 n">4</td>
            <td class="column49 style66 n">1</td>
            <td class="column50 style6 n">2</td>
            <td class="column51 style6 n">3</td>
            <td class="column52 style65 n">4</td>
          </tr>
          <?php $no=1; foreach($TNA as $value) : ?>
         
          <tr class="row9">
            <td class="column0 style12 null"><?= $no++; ?></td>
            <td class="column1 style8 null"><?= strtolower($value['nama_training']); ?></td>

            <td class="column2 style73 null"><!-- OPR -->
                <?php 
                    $datalevel = $value['level']; 
                    if (strpos($datalevel, 'opr') !== false) { 
                        echo '<i class="fa fa-times"></i>'; 
                    } 
                ?>
            </td> 
            <td class="column3 style73 null"><!-- GL -->
                <?php 
                    $datalevel = $value['level']; 
                    if (strpos($datalevel, 'gl') !== false) { 
                        echo '<i class="fa fa-times"></i>'; 
                    } 
                ?>
            </td> 
            <td class="column4 style74 null"><!-- SPV -->
                <?php 
                    $datalevel = $value['level']; 
                    if (strpos($datalevel, 'spv') !== false) { 
                        echo '<i class="fa fa-times"></i>'; 
                    } 
                ?>
            </td> 
            
            <td class="column5 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jan') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column6 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jan') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column7 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jan') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column8 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jan') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column9 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Feb') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column10 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Feb') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column11 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Feb') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>
            <td class="column12 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Feb') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>

            <td class="column13 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mar') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>
            <td class="column14 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mar') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>
            <td class="column15 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mar') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>
            <td class="column16 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mar') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>

            <td class="column17 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Apr') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>  
            </td>
            <td class="column18 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Apr') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column19 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Apr') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column20 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Apr') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column21 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mei') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column22 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mei') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column23 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mei') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column24 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Mei') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column25 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jun') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column26 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jun') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column27 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jun') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column28 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jun') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column29 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jul') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column30 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jul') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column31 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jul') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column32 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Jul') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column33 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Agt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column34 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Agt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column35 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Agt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column36 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Agt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column37 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Sept') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column38 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Sept') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column39 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Sept') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column40 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Sept') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column41 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Okt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column42 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Okt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column43 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Okt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column44 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Okt') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column45 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Nov') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column46 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Nov') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column47 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Nov') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column48 style74 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Nov') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>

            <td class="column49 style75 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Des') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '1') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column50 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Des') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '2') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column51 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Des') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '3') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
            <td class="column52 style73 null">
                <?php 
                    $databulan = $value['bulan']; 
                    if (strpos($databulan, 'Des') !== false) { 
                        $datamingguke = $value['mingguke'];
                        if(strpos($datamingguke, '4') !== false) {
                            echo '<i class="fa fa-times"></i>'; 
                        }
                    } 
                ?>
            </td>
          </tr>

          <?php endforeach; ?>

          <tr class="row10">
            <td class="column0 style41 s style42" colspan="10">Selesai diisi, mohon dikembalikan selambat-lambatnya tanggal   :</td>
            <td class="column10 style9 null"></td>
            <td class="column11 style9 null"></td>
            <td class="column12 style9 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style9 null"></td>
            <td class="column36 style9 null"></td>
            <td class="column37 style9 null"></td>
            <td class="column38 style9 null"></td>
            <td class="column39 style9 null"></td>
            <td class="column40 style9 null"></td>
            <td class="column41 style9 null"></td>
            <td class="column42 style9 null"></td>
            <td class="column43 style9 null"></td>
            <td class="column44 style9 null"></td>
            <td class="column45 style9 null"></td>
            <td class="column46 style9 null"></td>
            <td class="column47 style9 null"></td>
            <td class="column48 style9 null"></td>
            <td class="column49 style9 null"></td>
            <td class="column50 style9 null"></td>
            <td class="column51 style9 null"></td>
            <td class="column52 style10 null"></td>
          </tr>
          <tr class="row11">
            <td class="column0 style11 null"></td>
            <td class="column1 style9 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style9 null"></td>
            <td class="column11 style9 null"></td>
            <td class="column12 style9 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style42 s style43" colspan="23">Note : Pelatihan untuk semua bagian (termasuk QA) dari QA</td>
          </tr>
          <tr class="row12">
            <td class="column0 style11 s">Keterangan :</td>
            <td class="column1 style9 null"></td>
            <td class="column2 style9 null"></td>
            <td class="column3 style9 null"></td>
            <td class="column4 style9 null"></td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style9 null"></td>
            <td class="column11 style9 null"></td>
            <td class="column12 style9 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style9 null"></td>
            <td class="column36 style9 null"></td>
            <td class="column37 style9 null"></td>
            <td class="column38 style9 null"></td>
            <td class="column39 style9 null"></td>
            <td class="column40 style9 null"></td>
            <td class="column41 style9 null"></td>
            <td class="column42 style9 null"></td>
            <td class="column43 style9 null"></td>
            <td class="column44 style9 null"></td>
            <td class="column45 style9 null"></td>
            <td class="column46 style9 null"></td>
            <td class="column47 style9 null"></td>
            <td class="column48 style9 null"></td>
            <td class="column49 style9 null"></td>
            <td class="column50 style9 null"></td>
            <td class="column51 style9 null"></td>
            <td class="column52 style10 null"></td>
          </tr>
          <tr class="row13">
            <td class="column0 style41 s style42" colspan="5">*) Diisi dengan memberi tanda silang (X)</td>
            <td class="column5 style9 null"></td>
            <td class="column6 style9 null"></td>
            <td class="column7 style9 null"></td>
            <td class="column8 style9 null"></td>
            <td class="column9 style9 null"></td>
            <td class="column10 style9 null"></td>
            <td class="column11 style9 null"></td>
            <td class="column12 style9 null"></td>
            <td class="column13 style9 null"></td>
            <td class="column14 style9 null"></td>
            <td class="column15 style9 null"></td>
            <td class="column16 style9 null"></td>
            <td class="column17 style9 null"></td>
            <td class="column18 style9 null"></td>
            <td class="column19 style9 null"></td>
            <td class="column20 style9 null"></td>
            <td class="column21 style9 null"></td>
            <td class="column22 style9 null"></td>
            <td class="column23 style9 null"></td>
            <td class="column24 style9 null"></td>
            <td class="column25 style9 null"></td>
            <td class="column26 style9 null"></td>
            <td class="column27 style9 null"></td>
            <td class="column28 style9 null"></td>
            <td class="column29 style9 null"></td>
            <td class="column30 style9 null"></td>
            <td class="column31 style9 null"></td>
            <td class="column32 style9 null"></td>
            <td class="column33 style9 null"></td>
            <td class="column34 style9 null"></td>
            <td class="column35 style9 null"></td>
            <td class="column36 style9 null"></td>
            <td class="column37 style9 null"></td>
            <td class="column38 style9 null"></td>
            <td class="column39 style9 null"></td>
            <td class="column40 style9 null"></td>
            <td class="column41 style9 null"></td>
            <td class="column42 style9 null"></td>
            <td class="column43 style9 null"></td>
            <td class="column44 style9 null"></td>
            <td class="column45 style9 null"></td>
            <td class="column46 style9 null"></td>
            <td class="column47 style9 null"></td>
            <td class="column48 style9 null"></td>
            <td class="column49 style9 null"></td>
            <td class="column50 style9 null"></td>
            <td class="column51 style9 null"></td>
            <td class="column52 style10 null"></td>
          </tr>
          <tr class="row14">
            <td class="column0 style61 null style62" colspan="4"></td>
            <td class="column4 style17 s style16" colspan="15">Diajukan oleh :</td>
            <td class="column19 style17 s style16" colspan="17">Diketahui oleh :</td>
            <td class="column36 style17 s style63" colspan="17">Disetujui oleh :</td>
          </tr>
          <tr class="row15">
            <td class="column0 style37 s style38" colspan="4">Nama</td>
            <td class="column4 style82 null style84" colspan="15"><?= $TNA_II->diajukan_oleh_nama; ?></td>
            <td class="column19 style82 null style84" colspan="17"><?= $TNA_II->diketahui_oleh_nama; ?></td>
            <td class="column36 style82 null style85" colspan="17"><?= $TNA_II->disetujui_oleh_nama; ?></td>
          </tr>
          <tr class="row16">
            <td class="column0 style37 s style38" colspan="4">Jabatan</td>
            <td class="column4 style82 null style84" colspan="15"><?= $TNA_II->diajukan_oleh_jabatan; ?></td>
            <td class="column19 style82 null style84" colspan="17"><?= $TNA_II->diketahui_oleh_jabatan; ?></td>
            <td class="column36 style82 null style85" colspan="17"><?= $TNA_II->disetujui_oleh_jabatan; ?></td>
          </tr>
          <tr class="row17">
            <td class="column0 style37 s style38" colspan="4">Tanggal</td>
            <td class="column4 style86 null style88" colspan="15"><?= $TNA_II->diajukan_oleh_tanggal; ?></td>
            <td class="column19 style86 null style88" colspan="17"><?= $TNA_II->diketahui_oleh_tanggal; ?></td>
            <td class="column36 style86 null style89" colspan="17"><?= $TNA_II->disetujui_oleh_tanggal; ?></td>
          </tr>
          <tr class="row18">
            <td class="column0 style30 s style32" colspan="4">Tanda Tangan</td>
            <td class="column4 style33 null style35" colspan="15"></td>
            <td class="column19 style33 null style35" colspan="17"></td>
            <td class="column36 style33 null style36" colspan="17"></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>
