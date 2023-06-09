<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="nilo.pamungkas" />
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
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style2 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style2 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style5 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style5 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style6 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style7 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style9 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style9 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style11 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style11 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style12 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style12 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style13 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style13 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style14 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style14 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style15 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style16 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style16 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style17 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style17 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style18 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style18 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style19 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style20 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style20 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style21 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style21 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style22 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style22 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style23 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style24 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style24 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style25 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style27 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style27 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style28 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style28 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style29 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style30 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style31 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      th.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      td.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      th.style33 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      td.style34 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      th.style34 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      td.style35 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      th.style35 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:10pt; background-color:white }
      td.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style37 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style37 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style38 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style38 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style39 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style39 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style40 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style40 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style41 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style41 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style42 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style42 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style43 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style43 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style44 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style44 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style45 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style45 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style46 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style46 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style47 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style47 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style48 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style48 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style49 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style49 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style50 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style50 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style51 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style51 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style52 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style54 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      th.style54 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      td.style55 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      th.style55 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      td.style56 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style56 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style57 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style57 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style58 { vertical-align:top; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style58 { vertical-align:top; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style59 { vertical-align:top; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style59 { vertical-align:top; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style60 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      th.style60 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:22pt; background-color:white }
      td.style61 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style61 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style62 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      th.style62 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
      td.style63 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style63 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style64 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style64 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style65 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style65 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style66 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style66 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style67 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style67 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style68 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style68 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style69 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style69 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style70 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style70 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style71 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style71 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style72 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style72 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style73 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style74 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style74 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style75 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style75 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style76 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style76 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style77 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style77 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style78 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style78 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style79 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style79 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style80 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style80 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style81 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style81 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style82 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style82 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style83 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style83 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style84 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style84 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style85 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style86 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style86 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style87 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style87 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style88 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style88 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style89 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style89 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style90 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style90 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style91 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style91 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style92 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style92 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style93 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style93 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style94 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style95 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style95 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style96 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style96 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style97 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style98 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style98 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style99 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style99 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style100 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style100 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style101 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style101 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style102 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style102 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style103 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style103 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style104 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      th.style104 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Wingdings 2'; font-size:9pt; background-color:white }
      td.style105 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style105 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style106 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style106 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style107 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style107 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style108 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style108 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      td.style109 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      th.style109 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
      table.sheet0 col.col0 { width:71.16666585pt }
      table.sheet0 col.col1 { width:21.68888864pt }
      table.sheet0 col.col2 { width:27.1111108pt }
      table.sheet0 col.col3 { width:33.21111073pt }
      table.sheet0 col.col4 { width:23.04444418pt }
      table.sheet0 col.col5 { width:62.35555484pt }
      table.sheet0 col.col6 { width:77.26666578pt }
      table.sheet0 col.col7 { width:54.2222216pt }
      table.sheet0 col.col8 { width:42.02222174pt }
      table.sheet0 col.col9 { width:16.26666648pt }
      table.sheet0 col.col10 { width:25.75555526pt }
      table.sheet0 col.col11 { width:49.47777721pt }
      table.sheet0 col.col12 { width:42pt }
      table.sheet0 col.col13 { width:42pt }
      table.sheet0 col.col14 { width:42pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:39.75pt }
      table.sheet0 tr.row1 { height:27.75pt }
      table.sheet0 tr.row17 { height:15.75pt }
      table.sheet0 tr.row18 { height:15.75pt }
      table.sheet0 tr.row26 { height:15.75pt }
      table.sheet0 tr.row27 { height:15pt }
      table.sheet0 tr.row28 { height:15.75pt }
      table.sheet0 tr.row31 { height:15.75pt }
      table.sheet0 tr.row33 { height:15.75pt }
      table.sheet0 tr.row34 { height:15pt }
      table.sheet0 tr.row37 { height:15.75pt }
    </style>
  </head>

  <body onload="print();">
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines" align="center">
        <tbody>
          <tr class="row0">
            <td class="column0 style60 null style55" rowspan="2"><img src="<?= base_url(); ?>img/logo.png" width="75px" height="75px"></td>
            <td class="column1 style60 s style55" colspan="11">DATA KARYAWAN</td>
          </tr>
          <tr class="row1">
            <td class="column1 style61 s style57" colspan="11">FW-07-HRD-03/05</td>
          </tr>
          <tr class="row2">
            <td class="column0 style76 null style76" colspan="12"></td>
          </tr>
          <tr class="row3">
            <td class="column0 style12 s">Nama </td>
            <td class="column1 style12" colspan="5"><?= $makar->nama; ?></td>
            <td class="column6 style41 null style41" rowspan="3" rowspan="3">Alamat Domisili</td>
            <td class="column7 style41 null style41" colspan="3" rowspan="3" width="100px"><?= $makar->alamat_domisili; ?></td>
            <td class="column10 style48 s style53" colspan="2" rowspan="11">FOTO 3 X 4</td>
          </tr>
          <tr class="row4">
            <td class="column0 style12 s ">Tempat/Tgl. Lahir</td>
            <td class="column1 style12" colspan="5"><?= $makar->tempat_lahir.', '.$makar->tgl_lahir; ?></td>
          </tr>
          <tr class="row5">
            <td class="column0 style12 s">Jenis Kelamin</td>
            <td class="column1 style12" colspan="5"><?= $makar->jenis_kelamin; ?></td>
          </tr>
          <tr class="row6">
            <td class="column0 style12 s">Gol. Darah</td>
            <td class="column1 style84 s"><?php if($makar->gol_darah == "A"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> A</span></td>
            <td class="column2 style84 s"><?php if($makar->gol_darah == "B"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> B</span></td>
            <td class="column3 style84 s"><?php if($makar->gol_darah == "AB"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> AB</span></td>
            <td class="column4 style84 s"><?php if($makar->gol_darah == "O"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> O</span></td>
            <td class="column5 style84 s"><?php if($makar->gol_darah == "-"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Belum Tahu</span></td>
            <td class="column6 style12 s">Kecamatan</td>
            <td class="column7 style44 null style44" colspan="3"><?= $makar->kecamatan_domisili; ?></td>
          </tr>
          <tr class="row7">
            <td class="column0 style12 s">Warga Negara</td>
            <td class="column1 style89 s style90" colspan="3"><?php if($makar->status_karyawan == "expat"){ echo "*"; } else { echo "R"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Indonesia</span></td>
            <td class="column4 style89 s style94" colspan="2"><?php if($makar->status_karyawan == "expat"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Asing</span></td>
            <td class="column6 style12 s">Kab/Kota</td>
            <td class="column7 style44 null style44" colspan="3"><?= $makar->kabupaten_domisili; ?></td>
          </tr>
          <tr class="row8">
            <td class="column0 style88 s style14" rowspan="4">Agama</td>
            <td class="column1 style89 s style90" colspan="2"><?php if($makar->agama == "Islam"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Islam</span></td>
            <td class="column4 style90 s style94" colspan="3"><?php if($makar->agama == "Prostestan"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Prostestan</span></td>
            <td class="column6 style1 s">Kode Pos</td>
            <td class="column7 style45 null style47" colspan="3"><?= $makar->kode_pos; ?></td>
          </tr>
          <tr class="row9">
            <td class="column1 style92 s style91" colspan="2"><?php if($makar->agama == "Buddha"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Budha</span></td>
            <td class="column4 style91 s style91" colspan="3"><?php if($makar->agama == "Kong Hu Cu"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Kong Hu Cu</span></td>
            <td class="column6 style41 s style41" rowspan="3">Telepon </td>
            <td class="column7 style37 null style37" colspan="3" rowspan="3"><?= $makar->no_hp; ?></td>
          </tr>
          <tr class="row10">
            <td class="column1 style92 s style91" colspan="2"><?php if($makar->agama == "Katolik"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Katholik</span></td>
            <td class="column1 style91 s style91" colspan="3"><?php if($makar->agama == "Kristen"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Kristen</span></td>
          </tr>
          <tr class="row11">
            <td class="column1 style92 s style91" colspan="2"><?php if($makar->agama == "Hindu"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Hindu</span></td>
            <td class="column1 style91 s style91" colspan="3" width="100px"><?php if($makar->agama == "Kepercayaan Kepada Tuhan YME"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Kepercayaan Kepada Tuhan YME</span></td>
          </tr>
          <tr class="row12">
            <td class="column0 style88 s style95" rowspan="2">Status Rumah</td>
            <td class="column1 style89 s style90" colspan="3"><?php if($makar->status_rumah == "Sendiri"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Sendiri</span></td>
            <td class="column4 style90 s style94" colspan="2"><?php if($makar->status_rumah == "Dgn. Orang Tua"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Dgn. Orang Tua</span></td>
            <td class="column6 style42 s style42" rowspan="2">No. KTP/SIM/Pasport</td>
            <td class="column7 style43 null style43" colspan="3" rowspan="2"><?= $makar->no_ktp; ?></td>
          </tr>
          <tr class="row13">
            <td class="column1 style97 s style98" colspan="3"><?php if($makar->status_rumah == "Kontrak"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Kontrak</span></td>
            <td class="column4 style98 s style99" colspan="2"><?php if($makar->status_rumah == "Dgn. Saudara"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Dgn. Saudara</span></td>
          </tr>
          <tr class="row14">
            <td class="column0 style12 s">Nama Sekolah</td>
            <td class="column1 style12 null style12" colspan="5"><?= $makar->nama_sekolah; ?></td>
            <td class="column6 style11 s">Pendidikan </td>
            <td class="column7 style38 s"><?php if($makar->pendidikan == "SD"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> SD</span></td>
            <td class="column8 style38 s"><?php if($makar->pendidikan == "SMP"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> SMP</span></td>
            <td class="column9 style39 s style39" colspan="2"><?php if($makar->pendidikan == "SMA"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> SMA</span></td>
            <td class="column11 style38 s"><?php if($makar->pendidikan == "DIPLOMA"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> DIPLOMA   </span></td>
          </tr>
          <tr class="row15">
            <td class="column0 style12 s">Jurusan</td>
            <td class="column1 style12 null style12" colspan="5"><?= $makar->jurusan; ?></td>
            <td class="column6 style40 s">Terakhir</td>
            <td class="column7 style38 s"><?php if($makar->pendidikan == "S1"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> S-1</span></td>
            <td class="column8 style38 s"><?php if($makar->pendidikan == "S2"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> S-2</span></td>
            <td class="column9 style39 s style39" colspan="2"><?php if($makar->pendidikan == "S3"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> S-3</span></td>
            <td class="column11 style38 s"><span style="color:#000000; font-family:'Arial'; font-size:9pt"> </span></td>
          </tr>
          <tr class="row16">
            <td class="column0 style76 null style76" colspan="12"></td>
          </tr>
          <tr class="row17">
            <td class="column0 style29 s style31" colspan="12">JENJANG KARIR AWAL BEKERJA</td>
          </tr>
          <tr class="row18">
            <td class="column0 style12 s">Masuk</td>
            <td class="column1 style100 s style102" colspan="11">Tgl : <?= $makar->tgl_masuk_hari; ?> Bulan : <?= $makar->tgl_masuk_bulan; ?> Th : <?= $makar->tgl_masuk_tahun; ?></td>
          </tr>
          <tr class="row19">
            <td class="column0 style27 s style28" rowspan="5">Departemen</td>
            <td class="column1 style89 s style90" colspan="3"><?php if($makar->dept == "HRD"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> HRD</span></td>
            <td class="column4 style90 s style90" colspan="2"><?php if($makar->dept == "ACC"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Accounting</span></td>
            <td class="column6 style93 s"><?php if($makar->dept == "FIN"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Finance</span></td>
            <td class="column7 style93 s"><?php if($makar->dept == "MKT"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Marketing</span></td>
            <td class="column8 style90 s style90" colspan="2"><?php if($makar->dept == "RMP"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> RMP</span></td>
            <td class="column10 style90 s style94" colspan="2"><?php if($makar->dept == "PCS"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Purchasing</span></td>
          </tr>
          <tr class="row20">
            <td class="column1 style92 s style91" colspan="3"><?php if($makar->dept == "PPC"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> PPC</span></td>
            <td class="column4 style91 s style91" colspan="2"><?php if($makar->dept == "MTC"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Maintenance</span></td>
            <td class="column6 style103 s"><?php if($makar->dept == "DYE"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Dyeing</span></td>
            <td class="column7 style103 s"><?php if($makar->dept == "FIN"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Finishing</span></td>
            <td class="column8 style91 s style91" colspan="2"><?php if($makar->dept == "QAI"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> QAI</span></td>
            <td class="column10 style91 s style96" colspan="2"><?php if($makar->dept == "LAB"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Laboratorium</span></td>
          </tr>
          <tr class="row21">
            <td class="column1 style92 s style91" colspan="3"><?php if($makar->dept == "BRS"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Brushing</span></td>
            <td class="column4 style91 s style91" colspan="2"><?php if($makar->dept == "QCF"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> QCF</span></td>
            <td class="column6 style103 s"><?php if($makar->dept == "GKJ"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Gd. Kain Jadi</span></td>
            <td class="column7 style103 s"><?php if($makar->dept == "GDB"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Gd. Benang</span></td>
            <td class="column8 style91 s style91" colspan="2"><?php if($makar->dept == "MAS"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> MAS</span></td>
            <td class="column10 style91 s style96" colspan="2"><?php if($makar->dept == "GKG"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Gd. Kain Greige</span></td>
          </tr>
          <tr class="row22">
            <td class="column1 style92 s style91" colspan="3"><?php if($makar->dept == "GAC"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Sub. Security</span></td>
            <td class="column4 style91 s style91" colspan="2"><?php if($makar->dept == "PRT"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Printing</span></td>
            <td class="column6 style103 s"><?php if($makar->dept == "KNT"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Knitting</span></td>
            <td class="column7 style103 s"><?php if($makar->dept == "YRN"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Yarndye</span></td>
            <td class="column8 style91 s style91" colspan="2"><?php if($makar->dept == "TAS"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> TAS</span></td>
            <td class="column10 style91 s style96" colspan="2"><?php if($makar->dept == "PCS"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Transport</span></td>
          </tr>
          <tr class="row23">
            <td class="column1 style97 s style98" colspan="3"><?php if($makar->dept == "GAC"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Compliance &amp; GA</span></td>
            <td class="column4 style98 s style98" colspan="2"><?php if($makar->dept == "DIT"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> DIT</span></td>
            <td class="column6 style104 null"></td>
            <td class="column7 style105 null"></td>
            <td class="column8 style106 null style106" colspan="2"></td>
            <td class="column10 style106 null style107" colspan="2"></td>
          </tr>
          <tr class="row24">
            <td class="column0 style12 s">Status Kerja</td>
            <td class="column1 style108 null style109" colspan="3"></td>
            <td class="column4 style86 s style86" colspan="3"><?php if($makar->status_karyawan == "Kontrak1" || $makar->status_karyawan == "Kontrak2"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Kontrak</span></td>
            <td class="column7 style86 s style87" colspan="5"><?php if($makar->status_karyawan == "Tetap"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Arial'; font-size:9pt"> Karyawan Tetap</span></td>
          </tr>
          <tr class="row25">
            <td class="column0 style76 null style76" colspan="12"></td>
          </tr>
          <tr class="row26">
            <td class="column0 style29 s style31" colspan="12">DATA KELUARGA</td>
          </tr>
          <tr class="row27">
            <td class="column0 style5 s style28" rowspan="2">Susunan Keluarga :</td>
            <td class="column1 style34 s style35" colspan="11"><?php if($makar->status_kel == "TK"){ echo "*"; } else { echo "R"; } ?><span style="color:#000000; font-family:'Times New Roman'; font-size:10pt"> Bagi yang sudah Nikah  : Suami/Istri-Anak</span></td>
          </tr>
          <tr class="row28">
            <td class="column1 style32 s style33" colspan="11"><?php if($makar->status_kel == "TK"){ echo "R"; } else { echo "*"; } ?><span style="color:#000000; font-family:'Times New Roman'; font-size:10pt"> Bagi yang belum Nikah  : Orang Tua</span></td>
          </tr>
          <tr class="row29">
            <td class="column0 style25 s style26" colspan="3">Nama</td>
            <td class="column3 style19 s style19" colspan="3">Hubungan</td>
            <td class="column6 style25 s style26" colspan="2">Tempat / Tgl Lahir</td>
            <td class="column8 style19 s style18" colspan="4">Pekerjaan</td>
          </tr>
          <?php 
              $query = $this->db->query("SELECT *, DATE_FORMAT(tgl_lahir, '%d %M %Y') AS ftgl_lahir FROM data_keluarga WHERE no_scan='$no_scan'")->result_array(); 
          ?>
          <?php foreach($query AS $result) : ?>
          <tr class="row30">
            <td class="column0 style36 null style36" colspan="3"><?= $result['nama'] ?></td>
            <td class="column3 style36 null style36" colspan="3"><?= $result['hubungan'] ?></td>
            <td class="column6 style36 null style36" colspan="2"><?= $result['tempat'] ?></td>
            <td class="column8 style36 null style36" colspan="4"><?= $result['pekerjaan'] ?></td>
          </tr>
          <?php endforeach; ?>
          <tr class="row31">
            <td class="column0 style25 s style18" colspan="12"><b>Ket : Untuk Anak hanya No : 1, 2, 3 </b></td>
          </tr>
          <tr class="row32">
            <td class="column0 style76 null style76" colspan="12"></td>
          </tr>
          <tr class="row33">
            <td class="column0 style15 s style36" colspan="12">DATA PENGALAMAN KERJA</td>
          </tr>
          
          <tr class="row34">
            <td class="column0 style19 s style19" colspan="3">Nama Perusahaan</td>
            <td class="column3 style19 s style19" colspan="3">Bagian/Departemen</td>
            <td class="column6 style19 s style19" colspan="2">Jabatan</td>
            <td class="column8 style19 s style19" colspan="4">Masa Kerja</td>
          </tr>
          <?php 
              $query = $this->db->query("SELECT * FROM data_pengalaman_kerja WHERE no_scan = '$no_scan'")->result_array(); 
          ?>
          <?php foreach($query AS $key) : ?>
          <tr class="row35">
            <td class="column0 style25 null style26" colspan="3"><?= $key['nama_perusahaan']; ?></td>
            <td class="column3 style25 null style26" colspan="3"><?= $key['bagian']; ?></td>
            <td class="column6 style25 null style26" colspan="2"><?= $key['jabatan']; ?></td>
            <td class="column8 style25 null style18" colspan="4"><?= $key['masa_kerja']; ?></td>
          </tr>
          <?php endforeach; ?>
          <tr class="row36">
            <td class="column0 style76 null style76" colspan="12"></td>
          </tr>
          <tr class="row37">
            <td class="column0 style15 s style36" colspan="12">KARYAWAN YANG  BERSANGKUTAN</td>
          </tr>
          <tr class="row38">
            <td class="column0 style25 s style77" colspan="3">Nama </td>
            <td class="column3 style25 null style77" colspan="9"><?= $makar->nama; ?></td>
          </tr>
          <tr class="row39">
            <td class="column0 style25 s style77" colspan="3">Jabatan</td>
            <td class="column3 style25 null style77" colspan="9"><?= $makar->jabatan; ?></td>
          </tr>
          <tr class="row40">
            <td class="column0 style25 s style77" colspan="3">Tanggal</td>
            <td class="column3 style25 null style77" colspan="9"><?= date("d M Y"); ?></td>
          </tr>
          <tr class="row41">
            <td class="column0 style27 s style83" colspan="3" rowspan="5">Tanda Tangan</td>
            <td class="column3 style69 null style68" colspan="9" rowspan="5"><br><br><br><br><br></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>
