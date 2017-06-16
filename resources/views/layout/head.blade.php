<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }} - @yield("title")</title>

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/core.css" rel="stylesheet" type="text/css">
<link href="assets/css/components.css" rel="stylesheet" type="text/css">
<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/g/sweetalert2@6.6.2(sweetalert2.min.css+sweetalert2.css)">
<!-- /global stylesheets -->

@yield("styles")

<!-- Core JS files -->
<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="js/ajaxSetup.js"></script>
<script src="https://cdn.jsdelivr.net/g/sweetalert2@6.6.2(sweetalert2.min.js+sweetalert2.js)"></script>


<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<!--<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>-->

<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
<!-- /theme JS files -->