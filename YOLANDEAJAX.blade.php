<script type="text/javascript">
	$(document).ready(function(){
		function fill_datatable(indicators = '')
		{
			var dataTable = $('#customer_data').DataTable({
				processing: true,
				serverSide: true,
				ajax{

					url:{{"route("") "}},
					data:{indicators:indicators}
				},
				colums: [

                              {
                              	data:'region',
                              	name:'region'
                              }
                              {
                              	data:'valeur',
                              	name:'region'
                              }
				        ]
			})
		}
	})
</script>