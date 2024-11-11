<?php include "phpqrcode/qrlib.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="author" content="NILOKUSUMO TRI" />
    <title>Print Izin Cuti</title>
    <link href="<?= base_url(); ?>img/logo.png" rel="icon">
    <link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">
    <style type="text/css">
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

    th.style2 {
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

    td.style3 {
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

    th.style3 {
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

    td.style4 {
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

    th.style4 {
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

    td.style5 {
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

    th.style5 {
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

    td.style6 {
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

    th.style6 {
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

    td.style7 {
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

    th.style7 {
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

    td.style8 {
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

    th.style8 {
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

    td.style9 {
        vertical-align: top;
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

    th.style9 {
        vertical-align: top;
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

    td.style10 {
        vertical-align: top;
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

    th.style10 {
        vertical-align: top;
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

    td.style11 {
        vertical-align: middle;
        text-align: left;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style11 {
        vertical-align: middle;
        text-align: left;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style12 {
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

    th.style12 {
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

    td.style13 {
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

    th.style13 {
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

    td.style14 {
        vertical-align: top;
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

    th.style14 {
        vertical-align: top;
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

    td.style15 {
        vertical-align: top;
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

    th.style15 {
        vertical-align: top;
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

    td.style16 {
        vertical-align: top;
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

    th.style16 {
        vertical-align: top;
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

    td.style17 {
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

    th.style17 {
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

    td.style18 {
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

    th.style18 {
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

    td.style19 {
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

    th.style19 {
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

    td.style20 {
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

    th.style20 {
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

    td.style21 {
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

    th.style21 {
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

    td.style22 {
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

    th.style22 {
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

    td.style23 {
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

    th.style23 {
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

    td.style24 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 16pt;
        background-color: white
    }

    th.style24 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: 1px solid #000000 !important;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 16pt;
        background-color: white
    }

    td.style25 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 16pt;
        background-color: white
    }

    th.style25 {
        vertical-align: middle;
        text-align: center;
        border-bottom: 1px solid #000000 !important;
        border-top: none #000000;
        border-left: none #000000;
        border-right: none #000000;
        font-weight: bold;
        color: #000000;
        font-family: 'Calibri';
        font-size: 16pt;
        background-color: white
    }

    td.style26 {
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

    th.style26 {
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

    td.style27 {
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

    th.style27 {
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

    td.style28 {
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

    th.style28 {
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

    td.style29 {
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

    th.style29 {
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

    td.style30 {
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

    th.style30 {
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

    td.style31 {
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

    th.style31 {
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

    td.style32 {
        vertical-align: middle;
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

    th.style32 {
        vertical-align: middle;
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

    td.style33 {
        vertical-align: top;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style33 {
        vertical-align: top;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style34 {
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

    th.style34 {
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

    td.style35 {
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

    th.style35 {
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

    td.style36 {
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

    th.style36 {
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

    td.style37 {
        vertical-align: bottom;
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

    th.style37 {
        vertical-align: bottom;
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

    td.style38 {
        vertical-align: bottom;
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

    th.style38 {
        vertical-align: bottom;
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

    td.style39 {
        vertical-align: bottom;
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

    th.style39 {
        vertical-align: bottom;
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

    td.style40 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style40 {
        vertical-align: top;
        text-align: left;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    td.style41 {
        vertical-align: middle;
        text-align: center;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    th.style41 {
        vertical-align: middle;
        text-align: center;
        padding-left: 0px;
        border-bottom: 1px solid #000000 !important;
        border-top: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        color: #000000;
        font-family: 'Calibri';
        font-size: 11pt;
        background-color: white
    }

    table.sheet0 col.col0 {
        width: 42.02222174pt
    }

    table.sheet0 col.col1 {
        width: 35.24444404pt
    }

    table.sheet0 col.col2 {
        width: 63.71111038pt
    }

    table.sheet0 col.col3 {
        width: 55.57777714pt
    }

    table.sheet0 col.col4 {
        width: 43.37777728pt
    }

    table.sheet0 col.col5 {
        width: 39.98888843pt
    }

    table.sheet0 col.col6 {
        width: 42pt
    }

    table.sheet0 col.col7 {
        width: 60.32222153pt
    }

    table.sheet0 col.col8 {
        width: 56.25555491pt
    }

    table.sheet0 col.col9 {
        width: 17.62222202pt
    }

    table.sheet0 col.col10 {
        width: 35.92222181pt
    }

    table.sheet0 col.col11 {
        width: 67.777777pt
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

    table.sheet0 tr.row4 {
        height: 15pt
    }

    table.sheet0 tr.row5 {
        height: 15pt
    }

    table.sheet0 tr.row6 {
        height: 15pt
    }

    table.sheet0 tr.row7 {
        height: 15pt
    }
    </style>
</head>

<body onload="print();">
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
    <?= $dpci->kode_cuti . '-' . sprintf("%07s", $dpci->id); ?>
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
        <tbody>
            <tr class="row0">
                <td class="column0 style17 null style17" rowspan="3"><img src="<?= base_url(); ?>img/logo.png"
                        width="50px" height="50px"></td>
                <td class="column1 style20 s style25" colspan="7" rowspan="3">PT. INDO TAICHEN TEXTILE
                    INDUSTRY<BR>CIBODAS - TANGERANG</td>
                <td class="column8 style4 s">No. Form </td>
                <td class="column9 style26 s style27" colspan="3">: 07 - 14</td>
            </tr>
            <tr class="row1">
                <td class="column8 style5 s">No. Revisi </td>
                <td class="column9 style28 s style29" colspan="3">: 01</td>
            </tr>
            <tr class="row2">
                <td class="column8 style8 s">Tgl. Terbit</td>
                <td class="column9 style30 s style31" colspan="3">: 28 April 2005</td>
            </tr>
            <tr class="row3">
                <td class="column0 style19 s style19" colspan=""></td>
                <td class="column0 style19 s style19" colspan="4"></td>
                <td class="column2 style34 s style34" colspan="10"></td>
            </tr>
            <tr class="row4">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column2 style18 s style18" colspan="5"></td>
                <td class="column8 style18 s style18" colspan="5">
                    <center>Kepada<br>Yth. Bpk Pimpinan Perusahaan<br><b>PT. INDO TAICHEN TEXTILE INDUSTRY</b></center>
                </td>
            </tr>
            <tr class="row5">
                <td class="column0 style18 s style18" colspan="14"><u>
                        <center><b style="font-size: 20px;">PERMOHONAN IZIN / CUTI</b></center>
                    </u></td>
            </tr>
            <tr class="row6">
                <td class="column0 style18 s style18" colspan="4">Saya yang bertanda tangan dibawah ini :</td>
            </tr>
            <tr class="row7">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column0 style18 s style18" colspan="3">Nama</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->nama; ?></td>
            </tr>
            <tr class="row8">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column0 style18 s style18" colspan="3">NIP</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->nip; ?></td>
            </tr>
            <tr class="row9">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column0 style18 s style18" colspan="3">Departemen</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->dept; ?></td>
            </tr>
            <tr class="row10">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column0 style18 s style18" colspan="3">Jabatan</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->jabatan; ?></td>
            </tr>
            <tr class="row11">
                <td class="column0 style18 s style18" colspan="12">Personnel pengganti kerja selama izin / cuti :
                    <input id='output' value="<?= $dpci->ttd; ?>" name="ttd" hidden></input>
                    <b><u><?= $dpci->pengganti_kerja; ?></u></b> Tanda Tangan : <div id="displaySignature"></div>
                </td>
            </tr>
            <tr class="row12">
                <td class="column0 style18 s style18" colspan="12">Mohon izin untuk meninggalkan pekerjaan selama
                    <?= $dpci->lama_izin; ?>
                    <?php if ($dpci->days_or_month == "Hari") {
						echo "hari<s>/bulan</s>";
					} else {
						echo "<s>hari/</s>bulan";
					} ?>
                </td>
            </tr>
            <tr class="row13">
                <td class="column0 style18 s style18" colspan="2">Mulai Tanggal</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->tgl_mulai; ?> s/d
                    <?= $dpci->tgl_selesai; ?>
                </td>
            </tr>
            <tr class="row14">
                <td class="column0 style18 s style18" colspan="2">Alasan</td>
                <td class="column0 style18 s style18" colspan="4">: <?= $dpci->alasan; ?> (<?= $dpci->ket; ?> -
                    <?= $dpci->cuti; ?>)
                </td>
            </tr>
            <tr class="row15">
                <td class="column0 style18 s style18" colspan="2"></td>
            </tr>
            <tr class="row16">
                <td class="column0 style18 s style18" colspan="12">Atas kebijaksanaan Bapak, sebelumnya saya ucapkan
                    terima kasih</td>
            </tr>
            <tr class="row17">
                <td class="column0 style18 s style18" colspan="2"></td>
                <td class="column2 style18 s style18" colspan="5"></td>
                <td class="column8 style18 s style18" colspan="5">
                    <center>Tangerang, Tgl : <?= $dpci->tgl_surat_pemohon; ?></center>
                </td>
            </tr>
            <tr class="row18">
                <td class="column0 style9 s" colspan="2"></td>
                <td class="column1 style14 s style15" colspan="2">Pemohon:</td>
                <td class="column4 style16 s style16" colspan="6">Disetujui Oleh:</td>
                <td class="column6 style17 s style17" colspan="2">Mengetahui:</td>
            </tr>
            <tr class="row19">
                <td class="column0 style9 s" colspan="2">Nama</td>
                <td class="column1 style14 s style15" colspan="2"><?= $dpci->pemohon_nama; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->disetujui_nama_1; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->disetujui_nama_2; ?></td>
                <td class="column6 style17 s style17" colspan="2"><?= $dpci->mengetahui_nama; ?></td>
            </tr>
            <tr class="row20">
                <td class="column0 style9 s" colspan="2">Jabatan</td>
                <td class="column1 style14 s style15" colspan="2"><?= $dpci->pemohon_jabatan; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->disetujui_jabatan_1; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->disetujui_jabatan_2; ?></td>
                <td class="column6 style17 s style17" colspan="2"><?= $dpci->mengetahui_jabatan; ?></td>
            </tr>
            <tr class="row20">
                <td class="column0 style9 s" colspan="2">Tanggal</td>
                <td class="column1 style14 s style15" colspan="2"><?= $dpci->tgl_surat_pemohon; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->ftgl_approval_1; ?></td>
                <td class="column4 style16 s style16" colspan="3"><?= $dpci->ftgl_approval_2; ?></td>
                <td class="column6 style17 s style17" colspan="2"><?= $dpci->tgl_diset_mengetehui; ?></td>

            </tr>
            <tr class="row20">
                <td class="column0 style9 s" colspan="2">Tanda Tangan<br><br><br></td>
                <!-- ttd Pemohon -->
                <td class="column6 style17 s style17" colspan="2">
                    <center>
                        pemohon
                        <?php
						// Include library QRcode
						
						// Nama folder tempat menyimpan file qrcode
						$tempdir1c = "temp/";

						// Cek apakah folder temp sudah ada, jika tidak buat folder baru
						if (!file_exists($tempdir1c)) {
							mkdir($tempdir1c);
						}

						// Isi qrcode jika di scan
						$codeContents1c = $dpci->hash_creation;

						// Nama file qrcode yang akan disimpan
						$namaFile1c = $dpci->id . "/1" . ".png";

						// ECC Level
						$level1c = QR_ECLEVEL_H;

						// Ukuran pixel
						$UkuranPixel1c = 1;

						// Ukuran frame
						$UkuranFrame1c = 1;

						// Buat file QR code
						QRcode::png($codeContents1c, $tempdir1c . $namaFile1c, $level1c, $UkuranPixel1c, $UkuranFrame1c);

						// Tampilkan QR code
						
						?>
                        <img src="<?= base_url($tempdir1c . $namaFile1c); ?>">
                    </center>
                </td>
                <!-- ttd atasan 1 -->
                <?php if ($dpci->status_approval_1 == "Approved"): ?>
                <td class="column6 style17 s style17" colspan="3">
                    <center>
                        atasan 1
                        <?php
							// Include library QRcode
						
							// Nama folder tempat menyimpan file qrcode
							$tempdir1a = "temp/";

							// Cek apakah folder temp sudah ada, jika tidak buat folder baru
							if (!file_exists($tempdir1a)) {
								mkdir($tempdir1a);
							}

							// Isi qrcode jika di scan
							$codeContents1a = $dpci->hash_approval1;

							// Nama file qrcode yang akan disimpan
							$namaFile1a = $dpci->id . ".png";

							// ECC Level
							$level1a = QR_ECLEVEL_H;

							// Ukuran pixel
							$UkuranPixel1a = 1;

							// Ukuran frame
							$UkuranFrame1a = 1;

							// Buat file QR code
							QRcode::png($codeContents1a, $tempdir1a . $namaFile1a, $level1a, $UkuranPixel1a, $UkuranFrame1a);

							// Tampilkan QR code
						
							?>
                        <img src="<?= base_url($tempdir1a . $namaFile1a); ?>">
                    </center>
                </td>
                <?php elseif ($dpci->status_approval_1 == "-"): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br></center>
                </td>
                <?php elseif ($dpci->status_approval_1 == ""): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br>Not Yet Approved</center>
                </td>
                <?php elseif ($dpci->status_approval_1 == "Rejected"): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br><?= $dpci->status_approval_1 ?></center>
                </td>
                <?php endif; ?>
                <!-- ttd atasan 2 -->
                <?php if ($dpci->status_approval_2 == "Approved"): ?>
                <td class="column6 style17 s style17" colspan="3">
                    <center>
                        atasan 2
                        <?php
							// Include library QRcode
						
							// Nama folder tempat menyimpan file qrcode
							$tempdir1b = "temp/";

							// Cek apakah folder temp sudah ada, jika tidak buat folder baru
							if (!file_exists($tempdir1b)) {
								mkdir($tempdir1b);
							}

							// Isi qrcode jika di scan
							$codeContents1b = $dpci->hash_approval2;

							// Nama file qrcode yang akan disimpan
							$namaFile1b = $dpci->id . $codeContents1b . ".png";

							// ECC Level
							$level1b = QR_ECLEVEL_H;

							// Ukuran pixel
							$UkuranPixel1b = 1;

							// Ukuran frame
							$UkuranFrame1b = 1;

							// Buat file QR code
							QRcode::png($codeContents1b, $tempdir1b . $namaFile1b, $level1b, $UkuranPixel1b, $UkuranFrame1b);

							// Tampilkan QR code
						
							?>
                        <img src="<?= base_url($tempdir1b . $namaFile1b); ?>">
                    </center>
                </td>
                <?php elseif ($dpci->status_approval_2 == "Rejected"): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br><?= $dpci->status_approval_2 ?></center>
                </td>
                <?php elseif ($dpci->status_approval_2 == "" && $dpci->no_scan_atasan_2 !== 1): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br>Not Yet Approved</center>
                    </u>
                </td>
                <?php elseif ($dpci->status_approval_2 == "" && $dpci->no_scan_atasan_2 = 1): ?>
                <td class="column4 style15 s style15" colspan="3">
                    <center><br></center>
                    </u>
                </td>
                <?php endif; ?>
                <!-- ttd mengetahui -->
                <?php if ($dpci->status_approval == "Approved"): ?>
                <td class="column6 style17 s style17" colspan="2">
                    <center>
                        Mengetahui
                        <?php
							// Include library QRcode
						

							// Nama folder tempat menyimpan file qrcode
							$tempdir1 = "temp/";

							// Cek apakah folder temp sudah ada, jika tidak buat folder baru
							if (!file_exists($tempdir1)) {
								mkdir($tempdir1);
							}

							// Isi qrcode jika di scan
							$codeContents1 = $dpci->hash_approval;

							// Nama file qrcode yang akan disimpan
							$namaFile1 = $dpci->id . ".png";

							// ECC Level
							$level1 = QR_ECLEVEL_H;

							// Ukuran pixel
							$UkuranPixel1 = 1;

							// Ukuran frame
							$UkuranFrame1 = 1;

							// Buat file QR code
							QRcode::png($codeContents1, $tempdir1 . $namaFile1, $level1, $UkuranPixel1, $UkuranFrame1);

							// Tampilkan QR code
						
							?>
                        <img src="<?= base_url($tempdir1 . $namaFile1); ?>">
                    </center>
                </td>
                <?php elseif ($dpci->status_approval == "Rejected"): ?>
                <td class="column4 style15 s style15" colspan="2">
                    <center><br><?= $dpci->status_approval ?></center>
                </td>
                <?php elseif ($dpci->status_approval == ""): ?>
                <td class="column4 style15 s style15" colspan="2">
                    <center><br>Not Yet Approved</center>
                    </u>
                </td>
                <?php endif; ?>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</body>

</html>
<script>
$(document).ready(function() {
    // Mengambil nilai dari elemen dengan id='output'
    var signature = $('#output').text(); // atau .html() jika ada HTML di dalamnya
    var img = new Image();

    // Pastikan signature adalah string base64 yang valid
    img.src = 'data:image/png;base64,' + signature; // Sesuaikan tipe MIME jika perlu

    // Menambahkan gambar ke elemen dengan id 'displaySignature'
    $('#displaySignature').append(img);
});
S
</script>
