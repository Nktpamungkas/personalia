<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="author" content="NILOKUSUMO TRI" />
<style type="text/css">
    html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:12pt; background-color:white }
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
    td.style1 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style1 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style2 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style2 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style4 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    th.style4 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    td.style5 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    th.style5 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    td.style6 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style6 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style7 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style7 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style8 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style8 { vertical-align:middle; border-bottom:none #000000; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style9 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style10 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style10 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style11 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style11 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style12 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    th.style12 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    td.style13 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    th.style13 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
    td.style14 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style14 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style15 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style15 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style16 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style16 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style17 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style17 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style18 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style18 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style19 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style19 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style20 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style20 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style21 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style21 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style22 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style22 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style23 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style23 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style24 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style24 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style25 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style25 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style26 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style27 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style28 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style28 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style29 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style30 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style31 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style31 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style32 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style32 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style33 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style34 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style35 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style36 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style37 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style37 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style38 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style38 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style39 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style40 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style40 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style41 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style42 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style42 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style44 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style44 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style45 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style45 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style46 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style46 { vertical-align:bottom; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style47 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style47 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style48 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style48 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style49 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style49 { vertical-align:middle; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style50 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style50 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style51 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style51 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style52 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style53 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style54 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style55 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style55 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style56 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style56 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style57 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style58 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style58 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style59 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style59 { vertical-align:middle; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    td.style60 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    th.style60 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:9pt; background-color:white }
    table.sheet0 col.col0 { width:25.58888871pt }
    table.sheet0 col.col1 { width:21.01111087pt }
    table.sheet0 col.col2 { width:26.43333303pt }
    table.sheet0 col.col3 { width:71.67777707pt }
    table.sheet0 col.col4 { width:201.29999769pt }
    table.sheet0 col.col5 { width:85.01111017pt }
    table.sheet0 col.col6 { width:107.09999923pt }
    table.sheet0 col.col7 { width:77.94444355pt }
    table.sheet0 tr { height:15pt }
    table.sheet0 tr.row43 { height:15pt }
</style>
<title>Print Job Description</title>
<link href="<?= base_url(); ?>img/logo.png" rel="icon">
<link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">
</head>
<?php
$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
        $bulan[date('m')]
        ?>
<head>
  <body onload="print()">
    <body>
        <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
            <thead>
                <tr class="row0">
                    <td class="column0 style1 s style11" colspan="3" rowspan="4">
                        <img src="<?= base_url(); ?>img/logo.png" width="50px" height="50px">
                    </td>
                    <td class="column3 style4 s style13" colspan="3" rowspan="4">JOB DESCRIPTION</td>
                    <td class="column5 style6 s">Judul Dokumen.</td>
                    <td class="column6 style7 s"> :  <?= $doc_jobdesc_1['judul_doc']; ?></td>
                    <td class="column7 style8 s">Status Dokumen</td>
                </tr>
                    <tr><td class="column5 style6 s">No.</td>
                    <?php
                        $namedept = $doc_jobdesc_1['dept'];
                        $qdept = $this->db->query("SELECT * FROM dept WHERE dept_name LIKE '%$namedept%'")->row();
                    ?>
                    <?php
                        $q_no = $this->db->query("SELECT COUNT(*) AS nourut FROM doc_jobdesc_1 WHERE dept = '$namedept'")->row();
                        if($q_no->nourut == 1){
                            $nourut = $q_no->nourut;
                        }else{
                            $nourut = $q_no->nourut+1;
                        }
                    ?>
                    <td class="column6 style7 s"> : JD-10-<?= $qdept->code; ?>-<?= $nourut; ?></td>
                    <td class="column7 style16 null"></td>
                </tr>
                <tr class="row1">
                    <td class="column5 style14 s">Revisi</td>
                    <td class="column6 style15 s"> : <?= $doc_jobdesc_1['no_revisi']; ?></td>
                    <td class="column7 style16 null"></td>
                </tr>
                <tr class="row2">
                    <td class="column5 style17 s">Berlaku tgl</td>
                    <td class="column6 style18 s"> : <?= $doc_jobdesc_1['tgl_terbit']; ?></td>
                    <td class="column7 style16 s">Halaman: 1 of 2</td>
                </tr>
            </thead>
            <tbody>
                <?php  
                    // $no_scan = $job_description['no_scan'];
                    $iddocjobdesc = $id_docjobdesc->id;
                    // $data = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$no_scan'")->row(); 
                ?> 

                <tr class="row3">
                    <td class="column0 style19 null style21" colspan="9"></td>
                </tr>
                <tr class="row5">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 s">1.</td>
                    <td class="column2 style26 s style26" colspan="2">Nama Jabatan</td>
                    <td class="column4 style26 s style27" colspan="5">: <?=$doc_jobdesc_1['jabatan']; ?></td>
                </tr>
                 <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <tr class="row7">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 s">2.</td>
                    <td class="column2 style26 s style26" colspan="2">Departemen</td>
                    <td class="column4 style26 s style27" colspan="5">: <?= $doc_jobdesc_1['dept']; ?></td>
                </tr>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                
                <tr class="row8">
                    <td class="column0 style57 s">3.</td>
                    <td class="column1 style30 s style30" colspan="4">TANGGUNG JAWAB KEPADA</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM Tjawab_kepada WHERE id_docjobdesc ='$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row9">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style26 null style27" colspan="7">3.<?= $no++; ?>. <?= $result['tj_kepada'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <tr class="row10">
                    <td class="column0 style57 s">4.</td>
                    <td class="column1 style30 s style30" colspan="4">TANGGUNG JAWAB UNTUK</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                    <?php 
                    $data = $this->db->query("SELECT * FROM tjawab_untuk WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row11">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style43 null"></td>
                    <td class="column2 style26 null style27" colspan="7"> 4.<?= $no++; ?>. <?= $result['tj_untuk'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <tr class="row13">
                    <td class="column0 style57 s">5.</td>
                    <td class="column1 style30 s style30" colspan="4">FUNGSI UTAMA JABATAN</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <tr class="row14">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style26 null style27" colspan="8"><?= $doc_jobdesc_1['fungsi_utama_jabatan']; ?></td>
                </tr>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <tr class="row15">
                    <td class="column0 style57 s">6.</td>
                    <td class="column1 style30 s style30" colspan="4">WEWENANG</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM wewenang_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row16">
                    <td class="column0 style57 null"> </td>
                    <td class="column1 style26 null style27" colspan="8"> 6.<?= $no++; ?>. <?= $result['wewenang'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>

                <tr class="row15">
                    <td class="column0 style57 s">7.</td>
                    <td class="column1 style30 s style30" colspan="4">TUGAS & TANGGUNG JAWAB</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM tanggung_jawab_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row16">
                    <td class="column0 style57 null"> </td>
                    <td class="column1 style26 null style27" colspan="8"> 6.<?= $no++; ?>. <?= $result['job_responsibilities'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>

                <tr class="row20">
                    <td class="column0 style57 s">8.</td>
                    <td class="column1 style30 s style30" colspan="4">PERSYARATAN KOMPETENSI</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <tr class="row21">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 s">8.1.</td>
                    <td class="column2 style26 s style26" colspan="4">Pendidikan</td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM pendidikan_1 WHERE id_docjobdesc = '$iddocjobdesc'ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row22">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style26 null style27" colspan="7"> 8.1.<?= $no++; ?>. <?= $result['pendidikan'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row23">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 s">8.2.</td>
                    <td class="column2 style26 s style26" colspan="4">Keterampilan</td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM keterampilan_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row24">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style43 null"></td>
                    <td class="column2 style26 null style27" colspan="7"> 8.2.<?= $no++; ?>. <?= $result['keterampilan'] ?></td>
                </tr>
                <?php endforeach; ?>

                <tr class="row25">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 s">8.3.</td>
                    <td class="column2 style26 s style26" colspan="4">Pengalaman</td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM pengalaman_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row26">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style43 null"></td>
                    <td class="column2 style26 null style27" colspan="7"> 8.3.<?= $no++; ?>. <?= $result['pengalaman'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row12">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                </tr>


                <tr class="row27">
                    <td class="column0 style57 s">9.</td>
                    <td class="column1 style30 s style30" colspan="4">PELATIHAN</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM pelatihan_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row28">
                    <td class="column0 style57 null"> </td>
                    <td class="column1 style26 null style27" colspan="8"> 9.<?= $no++; ?>. <?= $result['pelatihan'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="row29">
                    <td class="column0 style39 null"></td>
                    <td class="column1 style25 null"></td>
                    <td class="column2 style25 null"></td>
                    <td class="column3 style25 null"></td>
                    <td class="column4 style25 null"></td>
                    <td class="column5 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column6 style25 null"></td>
                    <td class="column7 style28 null"></td>
                    <tr class="row30">
                    <td class="column0 style57 s">10.</td>
                    <td class="column1 style30 s style30" colspan="4">SYARAT KHUSUS</td>
                    <td class="column4 style31 null"></td>
                    <td class="column5 style31 null"></td>
                    <td class="column6 style31 null"></td>
                    <td class="column7 style32 null"></td>
                </tr>
                <?php 
                    $data = $this->db->query("SELECT * FROM persyaratan_khusus_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                    $no = 1;
                ?>
                <?php foreach($data AS $result): ?>
                <tr class="row16">
                    <td class="column0 style57 null"> </td>
                    <td class="column1 style26 null style27" colspan="11"> 10.<?= $no++; ?>. <?= $result['Persyaratan_khusus'] ?></td>
                </tr>
                <?php endforeach; ?>
           
                <!-- TFOOOT  -->
                    <!-- <tr class="row32">
                        <td class="column0 style50 null style50" colspan="8"></td>
                    </tr> -->
                    <tr class="row33">
                        <td class="column0 style51 s style51" colspan="4"></td>
                        <td class="column4 style51 s " colspan="2"s>Dibuat oleh,</td>
                        <td class="column5 style52 s"colspan="2">Disetujui oleh,</td>
                        <td class="column6 style51 s style51" colspan="2">Disahkan oleh</td>
                        </tr>
                    <tr class="row34">
                        <td class="column0 style51 s style51"  colspan="4">Nama</td>
                        <td class="column4 style52 s"colspan="2">Anggoro Bayu Mukti</td>
                        <td class="column5 style52 s"colspan="2">Kiandoko Limarga</td>
                        <td class="column6 style51 style51" colspan="2">Amy Huang</td>
                    
                    </tr>
                    <tr class="row35">
                        <td class="column0 style51 s style51" colspan="4">Jabatan</td>
                        <td class="column4 style52 s"colspan="2">Manager Personalia</td>
                        <td class="column5 style52 s"colspan="2">ADM. & GA Director</td>
                        <td class="column6 style51 style51" colspan="2">Asst. Persident Director</td>
                    
                    </tr>
                    <tr class="row36">
                        <td class="column0 style51 s style51" colspan="4">Tanggal</td>
                        <td class="column4 style52 s"colspan="2"><?php echo date('d').' '.(strtoupper($bulan[date('m')])).' '.date('Y')  ?></td>
                        <td class="column5 style52 s"colspan="2"><?php echo date('d').' '.(strtoupper($bulan[date('m')])).' '.date('Y');  ?></td>
                        <td class="column5 style51 style51" colspan="2"><?php echo date('d').' '.(strtoupper($bulan[date('m')])).' '.date('Y');  ?></td>
                    </tr>
                    <tr class="row37">
                        <td class="column0 style53 null style53" colspan="4">Tanda Tangan</td>
                        <td class="column4 style54 null"colspan="2"><br><br><br><br></td>
                        <td class="column5 style54 null"colspan="2"><br><br><br><br></td>
                        <td class="column6 style53 null style53" colspan="2"><br><br><br><br></td>
                    </tr>
                <!-- TFOOT -->
            </tbody>
        </table>
    </body>
</html>
