<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>AutoVotes</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="css/datatables.min.css" rel="stylesheet"/>
    <script src="js/sweetalert.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/datatables.min.js"></script>

    <style>
        #qrcode img {
            border: none;
            /* Remove the border around the QR code */
            display: block;
            /* Remove any extra spacing around the QR code */
            margin: 0 auto;
            /* Center the QR code horizontally */
        }
    </style>

    <script type="text/javascript">
		$(document).ready(function() {
		    $('#voter-table').DataTable({
		      	'processing': true,
		      	'serverSide': true,
		      	'serverMethod': 'post',
		      	'ajax': {
		          	'url':'voters-table.php'
		      	},
		      	'columns': [
		         	{ data: 'school_id' },
		         	{ data: 'first_name'},
                    { data: 'middle_name'},
		         	{ data: 'last_name' },
                    { data: 'gender' },
		         	{ data: 'course' },
                    { data: 'year_level' },
                    { data: 'password' },
                    { data: 'voted_status' }
		      	]
		   });

		} );
	</script>



</head>