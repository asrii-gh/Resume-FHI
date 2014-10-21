<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var t = $('#my_table').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
} );
</script>

<table id="my_table">
	<thead>
		<th>1</th>
		<th>2</th>
	</thead>
	<tbody>
		<tr>
			<td>s</td>
			<td>3</td>
		</tr>
	</tbody>
</table>
<img src="<?= IMAGEPATH . 'sort_asc.png' ?>">