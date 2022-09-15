<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Shop</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="global/css/bootstrap.min599c.css?v4.0.2">
  <link rel="stylesheet" href="global/css/bootstrap-extend.min599c.css?v4.0.2">
  <link rel="stylesheet" href="assets/css/site.min599c.css?v4.0.2">

  <style>
    .last-row>label{
      margin: 7px 5px 0px 35px;
    }
    .last-row{
      padding-right: 0px;
      margin-top: 15px;
    }    
  /* Switch */
  .switch.switch-3d {
      position: relative;
      display: inline-block;
      vertical-align: top;
      width: 40px;
      height: 24px;
      background-color: transparent;
      cursor: pointer;
  }

  .switch.switch-3d .switch-input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
  }

  .switch.switch-3d .switch-label {
      position: relative;
      display: block;
      height: inherit;
      font-size: 10px;
      font-weight: 600;
      text-transform: uppercase;
      background-color: #ddd;
      border: 1px solid #bbb;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      -webkit-transition: opacity background .15s ease-out;
      -o-transition: opacity background .15s ease-out;
      -moz-transition: opacity background .15s ease-out;
      transition: opacity background .15s ease-out;
  }

  .switch.switch-3d .switch-input:checked ~ .switch-label::before {
      opacity: 0;
  }

  .switch.switch-3d .switch-input:checked ~ .switch-label::after {
      opacity: 1;
  }

  .switch.switch-3d .switch-handle {
      position: absolute;
      top: 0;
      left: 0;
      width: 24px;
      height: 24px;
      background: #fbfbfb;
      border: 1px solid #f2f2f2;
      -webkit-border-radius: 1px;
      -moz-border-radius: 1px;
      border-radius: 1px;
      -webkit-transition: left .15s ease-out;
      -o-transition: left .15s ease-out;
      -moz-transition: left .15s ease-out;
      transition: left .15s ease-out;
      border: 0;
      -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.8);
  }

  .switch.switch-3d .switch-input:checked ~ .switch-handle {
      left: 16px;
  }

  .switch.switch-3d .switch-label,
  .switch.switch-3d .switch-handle {
      -webkit-border-radius: 50em !important;
      -moz-border-radius: 50em !important;
      border-radius: 50em !important;
  }

  .switch-primary > .switch-input:checked ~ .switch-label {
      background: #4272d7 !important;
      border-color: #2858be;
  }

  .switch-primary > .switch-input:checked ~ .switch-handle {
      border-color: #2858be;
  }
  </style>

</head>