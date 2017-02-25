
	MySIS.controller('putGradesStudentController', ['$scope', '$http', function($scope, $http)
	{

		$scope.findStudentsInGradeSection = function()
      {
        $scope.dataToSend = {};
        $scope.dataToSend.grade = $scope.grade;
        $scope.dataToSend.section = $scope.section;
        console.log($scope.dataToSend);

        $http({
          method : 'POST',
          url: '/students/listBySectionGrade',
          data: $scope.dataToSend,
          responseType:'json'
        }).success(function(data, status, headers, config)
        {

          console.log("Post hecho exitosamente");
          console.log(data);
          $scope.students= data;

          if(data.error_status!=null)
          {
            console.log("No se encontraron estudiantes");
            $scope.error_status= data.error_status;
            $('#errorAlert').show();
          }
          else
            {
			$(document).ready( function ()
			{
				//default values.
				$scope.table= {};
				$scope.selectedRow= null;

			   	$scope.table= $('#table_id').DataTable({

		    	data: $scope.students,
		    	"dom": 'Zlfrtip',  //Columns Resizable
		    	"colResize": {
		    		"tableWidthFixed": false
		    	},
		        colReorder: true,
		    	columns: [
		    			  { data: 'document_id'},
		    	          { data: 'name' },
		    	          { data: 'last_name' },
		    	          { data: 'grade',  "defaultContent": ""},
		    	      ],
		    		language: {                      //Translating DataTable to Spanish Language
		    	    	    "sProcessing":     "Procesando...",
		    	    	    "sLengthMenu":     "Mostrar _MENU_ registros",
		    	    	    "sZeroRecords":    "No se encontraron resultados",
		    	    	    "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
		    	    	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    	    	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    	    	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    	    	    "sInfoPostFix":    "",
		    	    	    "sSearch":         "Buscar:",
		    	    	    "sUrl":            "",
		    	    	    "sInfoThousands":  ".",
		    	    	    "sLoadingRecords": "Cargando...",
		    	    	    "oPaginate": {
		    	    	        "sFirst":    "Primero",
		    	    	        "sLast":     "Ãšltimo",
		    	    	        "sNext":     "Siguiente",
		    	    	        "sPrevious": "Anterior"
		    	    	    },
		    	    	    "oAria": {
		    	    	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		    	    	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    	    	    }
		    	    	},
		    	paging: true,
		    	scrollY: true,
		    	scrollX: true,
		    	scrollCollapse: true,
		    	select:							//Setting you can select only one row at the time option(Need to download something)
		    		{
		    			style: 'single'
		    		}
		    }
		    );

		   //Getting the Selected Row
		   $scope.table
	        .on( 'select', function ( e, dt, type, indexes ) {

	        	 $scope.selectedRow= $scope.table.rows( {selected: true} ).data().toArray();
	        	 console.log($scope.selectedRow);

	        })

			});

              }

        }).error(function(status){
          $('#showAlert').show();
          console.log("Error obteniendo estudiantes");
        })

      }

  }]);
