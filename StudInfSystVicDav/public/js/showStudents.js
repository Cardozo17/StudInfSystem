angular.module('SIEApp', ['ngRoute'])
  .controller('showStudentsController', function($scope, $http) {

  			//default values.
			$scope.table= {};
			$scope.selectedRow= null;

			console.log("Angular funciona WIII");

			//OJOOOOO VER COMO OBTENGO LA DATA QUE YA TENGO EN LA VISTA

			$http({
				method : 'GET',
				url: 'students/list',
				
			}).success(function(data){

				console.log("Get Done");
				console.log(data);
				$scope.students= data;

				//Initializing Table to show all inventoryMasters 
					// Data Grid(DataTables)  Settings 
					$(document).ready( function () 
					{
					   	$scope.table= $('#table_id').DataTable({
					    	
				    	data: $scope.students,
				    	"dom": 'Zlfrtip',  //Columns Resizable
				    	"colResize": {
				            "tableWidthFixed": false,
				        },
				        colReorder: true,
				    	columns: [
				    	          { data: 'person.name' },
				    	          { data: 'person.last_name' },
				    	          
				    	      ],
				    	language:      {                      //Translating DataTable to Spanish Language
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
				    	//responsive: true,
				    	//fixedColums: true, 	    	
				    	paging: true,
				    	scrollY: 300,
				    	scrollX: 500,
				    	scrollCollapse: true,
				    	select:							//Setting you can select only one row at the time option
				    		{
				    			style: 'single'
				    		} 
				    });
				   
				   //Getting the Selected Row
				   $scope.table
			        .on( 'select', function ( e, dt, type, indexes ) {
			        	
			        	 $scope.selectedRow= $scope.table.rows( {selected: true} ).data().toArray();
			            
			        	 console.log(JSON.stringify( $scope.selectedRow ));
			        	 console.log($scope.selectedRow);

			        } )
			        
				}); 


			}).error(function(){

				console.log("Error obteniendo los estudiantes");
			})

  });