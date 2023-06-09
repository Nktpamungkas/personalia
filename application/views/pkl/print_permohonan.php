<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
  <meta name="author" content="NILOKUSUMO TRI" />
  <title>Print Permohonan Lembur</title>
  <link href="<?= base_url(); ?>img/logo.png" rel="icon">
  <link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">
  <link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    p.solid {
      border-style: solid;
      border-width: 1px;
    }

    .col-print-3 {
      width: 25%;
      float: left;
    }

    html {
      font-family: Calibri, Arial, Helvetica, sans-serif;
      font-size: 11pt;
      background-color: white
    }

    a.comment-indicator:hover+div.comment {
      background: #ffd;
      position: absolute;
      display: block;
      border: 1px solid black;
      padding: 0.5em
    }

    a.comment-indicator {
      background: red;
      display: inline-block;
      border: 1px solid black;
      width: 0.5em;
      height: 0.5em
    }

    div.comment {
      display: none
    }

    table {
      border-collapse: collapse;
      page-break-after: always
    }

    .gridlines td {
      border: 1px dotted black
    }

    .gridlines th {
      border: 1px dotted black
    }

    .b {
      text-align: center
    }

    .e {
      text-align: center
    }

    .f {
      text-align: right
    }

    .inlineStr {
      text-align: left
    }

    .n {
      text-align: right
    }

    .s {
      text-align: left
    }

    td.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style1 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style1 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style2 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style2 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style3 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style3 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style4 {
      vertical-align: middle;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style4 {
      vertical-align: middle;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style5 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style5 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style6 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style6 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style7 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style7 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style8 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style8 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style9 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style9 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style10 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style10 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style11 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style11 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style13 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style13 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style14 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style14 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style15 {
      vertical-align: top;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style15 {
      vertical-align: top;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style16 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style16 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style17 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style17 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style18 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style18 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style19 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style19 {
      vertical-align: top;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style20 {
      vertical-align: top;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style20 {
      vertical-align: top;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style21 {
      vertical-align: top;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style21 {
      vertical-align: top;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style22 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style22 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style23 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style23 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style24 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style24 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style25 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style25 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style26 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style26 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style27 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style27 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style28 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style28 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style29 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style29 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style30 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style30 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style31 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style31 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style32 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style32 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style33 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style33 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style34 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style34 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style35 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style35 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style36 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style36 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style37 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style37 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style38 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style38 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style39 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style39 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style40 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style40 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style41 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style41 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style42 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style42 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style43 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style43 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style44 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style44 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style45 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style45 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style46 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style46 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style47 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style47 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style48 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style48 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style49 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style49 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style50 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style50 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style51 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style51 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style52 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style52 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style53 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style53 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style54 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    th.style54 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    td.style55 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    th.style55 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    td.style56 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    th.style56 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    td.style57 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    th.style57 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 16pt;
      background-color: white
    }

    td.style58 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style58 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style59 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style59 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style60 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style60 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style61 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style61 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style62 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style62 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style63 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style63 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style64 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style64 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style65 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style65 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style66 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style66 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style67 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style67 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style68 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style68 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style69 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style69 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style70 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style70 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style71 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style71 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style72 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style72 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style73 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style73 {
      vertical-align: top;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style74 {
      vertical-align: top;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style74 {
      vertical-align: top;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style76 {
      vertical-align: top;
      text-align: left;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    table.sheet0 col.col0 {
      width: 42pt
    }

    table.sheet0 col.col1 {
      width: 82.68888794pt
    }

    table.sheet0 col.col2 {
      width: 7.45555547pt
    }

    table.sheet0 col.col3 {
      width: 42pt
    }

    table.sheet0 col.col4 {
      width: 42pt
    }

    table.sheet0 col.col5 {
      width: 42pt
    }

    table.sheet0 col.col6 {
      width: 49.47777721pt
    }

    table.sheet0 col.col7 {
      width: 42pt
    }

    table.sheet0 col.col8 {
      width: 44.73333282pt
    }

    table.sheet0 col.col9 {
      width: 70.48888808pt
    }

    table.sheet0 col.col10 {
      width: 42pt
    }

    table.sheet0 col.col11 {
      width: 35.92222181pt
    }

    table.sheet0 col.col12 {
      width: 25.07777749pt
    }

    table.sheet0 tr {
      height: 15pt
    }

    table.sheet0 tr.row2 {
      height: 15pt
    }

    table.sheet0 tr.row3 {
      height: 15pt
    }
  </style>
</head>
<body onload="print()">
  <style>
    @page {
      margin-left: 0.7in;
      margin-right: 0.7in;
      margin-top: 0.75in;
      margin-bottom: 0.75in;
    }

    body {
      margin-left: 0.7in;
      margin-right: 0.7in;
      margin-top: 0.75in;
      margin-bottom: 0.75in;
    }
  </style>
  <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines" align="center">
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
    <tbody>
      <tr class="row0">
        <td class="column0 style52 null style53" rowspan="3"><img src="<?= base_url(); ?>img/logo.png" width="50px" height="50px"></td>
        <td class="column1 style54 s style57" colspan="8" rowspan="3">PERMOHONAN KERJA LEMBUR</td>
        <td class="column9 style13 s">No. Form </td>
        <td class="column10 style69 s style70" colspan="3">: 07 - 17</td>
      </tr>
      <tr class="row1">
        <td class="column9 style14 s">No. Revisi </td>
        <td class="column10 style68 s style71" colspan="3">: 00</td>
      </tr>
      <tr class="row2">
        <td class="column9 style74 s">Tgl. Terbit</td>
        <td class="column10 style72 s style73" colspan="3">: 01 - 02 - 12</td>
      </tr>
      <tr class="row3">
        <td class="column0 style58 null style59" colspan="12"></td>
        <td class="column12 style11 null"></td>
      </tr>
      <tr class="row4">
        <td class="column0 style60 s style61" colspan="2">Department</td>
        <td class="column2 style1 s">:</td>
        <td class="column3 style67 null style48" colspan="10"><?= $pkl->dept; ?> <?= $pkl->shift; ?></td>
      </tr>
      <tr class="row5">
        <td class="column0 style26 s style27" colspan="2">Nama</td>
        <td class="column2 style16 s style16">:</td>
        <td class="column3 style16 null style17" colspan="10">
          <p></p>
          <div class="container">
            <div class="row">
              <div class="form-group">
                <?php
                  // $query_pkl = "SELECT * FROM permohonan_kerja_lembur WHERE tanggal = '$tgl' and dept = '$dept' and shift = '$shift' ";
                  $query_pkl = "SELECT * FROM permohonan_kerja_lembur WHERE kode_lembur = '$pkl->kode_lembur' ";
                  $dataPkl = $this->db->query($query_pkl)->result_array();
                  $noUrut = 1;
                ?>
                <?php foreach ($dataPkl as $dp) : ?>
                
                  <?php
                    $no_scan = $dp['no_scan'];

                    $query_nama        = "SELECT * FROM tbl_makar WHERE no_scan = '$no_scan'";
                    $dataKaryawan      = $this->db->query($query_nama)->result_array();
                  ?>
                  <?php foreach ($dataKaryawan as $dk) : ?>
                    <p class="col-print-3 solid" align="left">&nbsp;<?= $noUrut++; ?>. <?= $dk['nama']; ?></p>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

        </td>
      </tr>
      <tr class="row8">
        <td class="column0 style26 s style29" colspan="2" rowspan="2">Tujuan Lembur</td>
        <td class="column2 style2 s">:</td>
        <td class="column3 style27 null style42" colspan="10" rowspan="2"><?= $pkl->tujuan_lembur; ?></td>
      </tr>
      <tr class="row9">
        <td class="column2 style4 null"></td>
      </tr>
      <tr class="row10">
        <td class="column0 style26 s style31" colspan="2" rowspan="2">Target Lembur</td>
        <td class="column2 style2 s">:</td>
        <td class="column3 style27 null style29" colspan="6" rowspan="2"><?= nl2br($pkl->target_lembur);?></td>
        <td class="column9 style26 s style29" rowspan="2">Jam</td>
        <td class="column10 style29 s style46" colspan="3" rowspan="2">: <?= nl2br($pkl->jam); ?></td>
      </tr>
      <tr class="row11">
        <td class="column2 style1 null"></td>
      </tr>
      <tr class="row12">
        <td class="column0 style6 s">Penyebab Lembur</td>
        <td class="column1 style7 null"></td>
        <td class="column2 style2 s">:</td>
        <td class="column3 style27 null style34" colspan="10"><?= $pkl->penyebab_lembur; ?></td>
      </tr>
      <tr class="row13">
        <td class="column0 style9 null"></td>
        <td class="column1 style8 null"></td>
        <td class="column2 style8 null"></td>
        <td class="column3 style8 null"></td>
        <td class="column4 style8 null"></td>
        <td class="column5 style8 null"></td>
        <td class="column6 style8 null"></td>
        <td class="column7 style8 null"></td>
        <td class="column8 style8 null"></td>
        <td class="column9 style8 null"></td>
        <td class="column10 style8 null"></td>
        <td class="column11 style8 null"></td>
        <td class="column12 style10 null"></td>
      </tr>
      <tr class="row14">
        <td class="column0 style9 null"></td>
        <td class="column1 style8 null"></td>
        <td class="column2 style8 null"></td>
        <td class="column3 style8 null"></td>
        <td class="column4 style8 null"></td>
        <td class="column5 style8 null"></td>
        <td class="column6 style8 null"></td>
        <td class="column7 style8 null"></td>
        <td class="column8 style8 null"></td>
        <td class="column9 style8 null"></td>
        <td class="column10 style8 null"></td>
        <td class="column11 style8 null"></td>
        <td class="column12 style10 null"></td>
      </tr>
      <tr class="row15">
        <td class="column0 style9 null"></td>
        <td class="column1 style8 null"></td>
        <td class="column2 style8 null"></td>
        <td class="column3 style8 null"></td>
        <td class="column4 style8 null"></td>
        <td class="column5 style8 null"></td>
        <td class="column6 style8 null"></td>
        <td class="column7 style8 null"></td>
        <td class="column8 style8 null"></td>
        <td class="column9 style8 null"></td>
        <td class="column10 style8 null"></td>
        <td class="column11 style8 null"></td>
        <td class="column12 style10 null"></td>
      </tr>
      <tr class="row16">
        <td class="column0 style37 s style38" colspan="6"><u>(Assistant Manager / Manager)</u></td>
        <td class="column6 style8 null"></td>
        <td class="column7 style8 null"></td>
        <td class="column8 style8 null"></td>
        <td class="column9 style8 null"></td>
        <td class="column10 style8 null"></td>
        <td class="column11 style8 null"></td>
        <td class="column12 style10 null"></td>
      </tr>
      <tr class="row17">
        <td class="column0 style37 s style38" colspan="6">TTD Penanggung Jawab Departmen</td>
        <td class="column6 style8 null"></td>
        <td class="column7 style8 null"></td>
        <td class="column8 style8 null"></td>
        <td class="column9 style8 null"></td>
        <td class="column10 style8 null"></td>
        <td class="column11 style8 null"></td>
        <td class="column12 style15 null"></td>
      </tr>
      <tr class="row18">
        <td class="column0 style50 null style50" colspan="12"></td>
        <td class="column12 style12 null"></td>
      </tr>
      <tr class="row19">
        <td class="column0 style22 null style25" colspan="2" rowspan="2"></td>
        <td class="column2 style37 s style41" colspan="3" rowspan="2">Dibuat Oleh :</td>
        <td class="column5 style37 s style41" colspan="2" rowspan="2">Diperiksa Oleh:</td>
        <td class="column7 style37 s style39" colspan="3">Dir. Dept. Penyebab Lembur</td>
        <td class="column10 style35 s style36" colspan="3">Dir. Terkait</td>
      </tr>
      <tr class="row20">
        <td class="column7 style40 s style41" colspan="3">Diketahui Oleh :</td>
        <td class="column10 style40 null style41" colspan="3"></td>
      </tr>
      <tr class="row21">
        <td class="column0 style47 s style48" colspan="2">Nama</td>
        <td class="column2 style49 null style51" colspan="3"><?= $pkl->dibuat_oleh_nama; ?></td>
        <td class="column5 style49 null style51" colspan="2"><?= $pkl->diperiksa_oleh_nama; ?></td>
        <td class="column7 style49 null style51" colspan="3"><?= $pkl->ddpl_diketahui_nama; ?></td>
        <td class="column10 style49 null style51" colspan="3"><?= $pkl->dt_disetujui_nama; ?></td>
      </tr>
      <tr class="row22">
        <td class="column0 style47 s style48" colspan="2">Jabatan</td>
        <td class="column2 style49 null style51" colspan="3"><?= $pkl->dibuat_oleh_jabatan; ?></td>
        <td class="column5 style49 null style51" colspan="2"><?= $pkl->diperiksa_oleh_jabatan; ?></td>
        <td class="column7 style49 null style51" colspan="3"><?= $pkl->ddpl_diketahui_jabatan; ?></td>
        <td class="column10 style49 null style51" colspan="3"><?= $pkl->dt_disetujui_jabatan; ?></td>
      </tr>
      <tr class="row23">
        <td class="column0 style47 s style48" colspan="2">Tanggal</td>
        <td class="column2 style49 null style51" colspan="3"><?= date_format(date_create($pkl->tanggal), 'd M Y'); ?></td>
        <td class="column5 style49 null style51" colspan="2"><?= date_format(date_create($pkl->tanggal), 'd M Y'); ?></td>
        <td class="column7 style49 null style51" colspan="3"><?= date_format(date_create($pkl->tanggal), 'd M Y');?></td>
        <td class="column10 style49 null style51" colspan="3"><?= date_format(date_create($pkl->tanggal), 'd M Y'); ?></td>
      </tr>
      <tr class="row24">
        <td class="column0 style47 s style34" colspan="2">Tanda Tangan</td>
        <td class="column2 style47 null style36" colspan="3"><br><br><br><br></td>
        <td class="column5 style47 null style65" colspan="2"></td>
        <td class="column7 style47 null style65" colspan="3"></td>
        <td class="column10 style47 null style36" colspan="3"></td>
      </tr>
    </tbody>
    <tfoot>
    <?= $pkl->kode_lembur; ?>
    </tfoot>
    <!-- <br>
        <td colspan="13" class="column3 style76">
          Catatan : <br>
          &nbsp;&nbsp;&nbsp;&nbsp;1. &nbsp;&nbsp; <br>
          &nbsp;&nbsp;&nbsp;&nbsp;2. &nbsp;&nbsp; Hasil print untuk arsip department Personalia
        </td> -->
  </table>
</body>
</html>